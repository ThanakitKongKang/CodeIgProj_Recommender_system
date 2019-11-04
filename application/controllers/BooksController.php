<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once './vendor/autoload.php';

use Phpml\FeatureExtraction\TfIdfTransformer;

class BooksController extends CI_Controller
{
    public static $stopWords = [
        'a', 'about', 'above', 'after', 'again', 'against', 'all', 'am', 'an', 'and', 'any', 'are', 'aren\'t', 'as', 'at', 'be', 'because',
        'been', 'before', 'being', 'below', 'between', 'both', 'but', 'by', 'can\'t', 'cannot', 'could', 'couldn\'t', 'did', 'didn\'t',
        'do', 'does', 'doesn\'t', 'doing', 'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 'further', 'had', 'hadn\'t', 'has',
        'hasn\'t', 'have', 'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 'her', 'here', 'here\'s', 'hers', 'herself', 'him',
        'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 'i\'m', 'i\'ve', 'if', 'in', 'into', 'is', 'isn\'t', 'it', 'it\'s', 'its',
        'itself', 'let\'s', 'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 'nor', 'not', 'of', 'off', 'on', 'once', 'only', 'or',
        'other', 'ought', 'our', 'oursourselves', 'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 'she\'ll', 'she\'s', 'should',
        'shouldn\'t', 'so', 'some', 'such', 'than', 'that', 'that\'s', 'the', 'their', 'theirs', 'them', 'themselves', 'then', 'there',
        'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 'too', 'under',
        'until', 'up', 'very', 'was', 'wasn\'t', 'we', 'we\'d', 'we\'ll', 'we\'re', 'we\'ve', 'were', 'weren\'t', 'what', 'what\'s',
        'when', 'when\'s', 'where', 'where\'s', 'which', 'while', 'who', 'who\'s', 'whom', 'why', 'why\'s', 'with', 'won\'t', 'would',
        'wouldn\'t', 'you', 'you\'d', 'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 'yourself', 'yourselves', '-', 'I', 'II', 'III',
        'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'The', 'A', '_', 'st', 'nd', 'th', 'edition', 'Volume', '\'s',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');

        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->model('bookmark_model');
        $this->load->library("pagination");
    }

    /*
    | -------------------------------------------------------------------------
    | browse
    | -------------------------------------------------------------------------
    */
    public function browse()
    {
        $data['get_url'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : "all";
        $data['page'] = str_replace("-", " ", $data['get_url']);
        $data['round_count'] = 1;
        $data['i'] = 0;
        $data['category_list'] = $this->books_model->get_cateory_list();

        $data['content_list'] = $this->books_model->get_content_list_dynamic(9, 0, "rows", $data['page']);
        $data['num_rows'] = $this->books_model->get_content_list_dynamic(9, 0, "count", $data['page']);
        $data['all_num_rows'] = $this->books_model->get_all_num_rows_by_category($data['page']);

        if ($data['all_num_rows'] == false) {
            $data['all_num_rows'] = 0;
            $data['page'] = "404-Page-Not-Found";
        }

        $header["title"] = "Browse - " . $data['page'];
        $header['browse_all'] = 'active';
        $this->load->view('./header', $header);
        $this->load->view('books/browse', $data);
        $this->load->view('footer');
    }

    function browse_loadMoreData()
    {

        $start = (int) $this->input->post('start');
        $data['i'] = (int) $this->input->post('i');
        $category = $this->input->post('category');
        $data['all_num_rows'] = $this->input->post('all_num_rows');
        $data['round_count'] = ((int) $this->input->post('round_count')) + 1;

        $data['content_list'] = $this->books_model->get_content_list_dynamic(9, $start, "rows", $category);
        $data['num_rows'] = $this->books_model->get_content_list_dynamic(9, $start, "count", $category);

        // debug
        $data['category'] = $category;
        $data['start'] = $start;
        $this->load->view('books/browse_content_list', $data);
    }

    /*
    | -------------------------------------------------------------------------
    | book detail page
    | -------------------------------------------------------------------------
    */
    public function book()
    {
        $username = $this->session->userdata('user')['username'];
        $bookid = $this->uri->segment(2);
        $data['book_detail'] = $this->books_model->get_by_id($bookid);

        $data['user_rate'] = $this->rate_model->get_rate_user_book($this->session->userdata('user')['username'], $bookid);

        $data['bookmark'] = $this->bookmark_model->get_if_user_bookmarked($bookid, $username);

        /*
        | -------------------------------------------------------------------------
        | Content-based recommendation
        | -------------------------------------------------------------------------
        */
        $data['books_name'] = $this->books_model->get_name_all();
        // TF
        $data['words_segment'] = array();
        foreach ($data['books_name'] as $book_name) {
            array_push($data['words_segment'], array_count_values(str_word_count($book_name['book_name'], 1)));
        }

        // Stop words removal
        $stopWords = array_flip(self::$stopWords);
        $data['tf_no_stopwords'] = array();
        foreach ($data['words_segment'] as $word_segment) {
            array_push($data['tf_no_stopwords'], array_diff_key($word_segment, $stopWords));
        }
        $transformer = new TfIdfTransformer($data['tf_no_stopwords']);
        $transformer->transform($data['tf_no_stopwords']);

        // cosine similarity 
        $data['cosineSim'] = array();
        $i = 0;
        $bookid--;
        foreach ($data['books_name'] as $book_name) {
            $data['cosineSim'][$i + 1] =  $this->cosine($data['tf_no_stopwords'][$bookid], $data['tf_no_stopwords'][$i]);
            $i++;
        }
        // $data['cosineSim'][2] =  $this->cosine($data['tf_no_stopwords'][1], $data['tf_no_stopwords'][2]);
        // $data['cosineSim'][3] =  $this->cosine($data['tf_no_stopwords'][1], $data['tf_no_stopwords'][3]);
        // $data['cosineSim'][4] =  $this->cosine($data['tf_no_stopwords'][1], $data['tf_no_stopwords'][4]);
        // remove itself from array
        unset($data['cosineSim'][$bookid + 1]);

        // remove 0 similarity from array
        foreach ($data['cosineSim'] as $key => $cosineSim) {
            if ($cosineSim == 0 || is_nan($cosineSim)) {
                unset($data['cosineSim'][$key]);
            }
        }

        // get content based books detail
        foreach ($data['cosineSim'] as $key => $value) {
            $data['recommend_list_detail'][$key] = $this->books_model->get_by_id($key);
        }
        foreach ($data['cosineSim'] as $key => $value) {
            $data['recommend_list_detail'][$key]['match'] = $value;
        }
        // sort by similarity score
        $match = array_column($data['recommend_list_detail'], 'match');
        array_multisort($match, SORT_DESC, $data['recommend_list_detail']);

        // chopping to get only 12 items
        $data['recommend_list_detail'] = (array_slice($data['recommend_list_detail'], 0, 12));


        $header["title"] = $data['book_detail']['book_name'];
        $this->load->view('./header', $header);
        $this->load->view('books/detail', $data);
        $this->load->view('footer');
    }

    /*
    | -------------------------------------------------------------------------
    | saved_items page
    | -------------------------------------------------------------------------
    */
    public function saved()
    {
        // $data['books'] = $this->bookmark_model->get_saved_list_dynamic(10, $page);
        $username = $this->session->userdata('user')['username'];

        if ($username != null) {
            $collection_get  = isset($_GET['collection']) ? $_GET['collection'] : NULL;
            if (!isset($_GET['collection'])) {
                $data["all_saved"] = "active";
            }
            $data['saved_list'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, 0, "rows", $collection_get);
            $data['num_rows'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, 0, "count", $collection_get);
            $data['all_num_rows'] = $this->bookmark_model->get_saved_list_all_num_rows($username, $collection_get);

            $header["title"] = "Saved items";
            $header["saveditem"] = "active";
            $data['showheader'] = true;
            $data['i'] = 0;
            $data['round_count'] = 1;
            $data["collection_get"] = $collection_get;

            $data["collection_name"] = $this->bookmark_model->get_collection_by_username($username);
            $data["all_saved_count"] =
                $this->load->view('./header', $header);
            $this->load->view('books/saved', $data);
            $this->load->view('footer');
        } else {
            $header["title"] = "Error";
            $this->load->view('./header', $header);
            $this->load->view('sessions/landing_error_login');
            $this->load->view('footer');
        }
    }

    function loadMoreData()
    {
        $collection_get  = isset($_POST['collection_get']) ? $_POST['collection_get'] : NULL;
        $data['showheader'] = false;
        $data['round_count'] = ((int) $this->input->post('round_count')) + 1;
        $start = (int) $this->input->post('start');
        $data['i'] = (int) $this->input->post('i');
        $save_removed = (int) $this->input->post('bookmark_trigger_count');
        $username = $this->session->userdata('user')['username'];

        $data['saved_list'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, $start - $save_removed, "rows", $collection_get);
        $data['num_rows'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, $start - $save_removed, "count", $collection_get);

        $this->load->view('books/saved', $data);
    }
    /*
    | -------------------------------------------------------------------------
    | test page
    | -------------------------------------------------------------------------
    */

    public function testmode()
    {

        $data['books_name'] = $this->books_model->get_name_all();
        // TF
        $data['words_segment'] = array();
        foreach ($data['books_name'] as $book_name) {
            array_push($data['words_segment'], array_count_values(str_word_count($book_name['book_name'], 1)));
        }

        // Stop words removal

        $stopWords = array_flip(self::$stopWords);
        $data['tf_no_stopwords'] = array();
        foreach ($data['words_segment'] as $word_segment) {
            array_push($data['tf_no_stopwords'], array_diff_key($word_segment, $stopWords));
            // print("<pre> " . print_r(array_diff_key($word_segment, $stopWords), true) . "</pre>");
        }

        $transformer = new TfIdfTransformer($data['tf_no_stopwords']);
        $transformer->transform($data['tf_no_stopwords']);

        // cosine similarity
        $data['cosineCheck1'] = $this->input->post('cosineCheck1');
        $data['cosineCheck2'] = $this->input->post('cosineCheck2');
        if (!empty($data['cosineCheck1']) && !empty($data['cosineCheck2'])) {
            // $data['cosineSim'] = array();
            // array_push(
            //     $data['cosineSim'],
            //     $this->cosine(
            //         $data['tf_no_stopwords'][$data['cosineCheck1']],
            //         $data['tf_no_stopwords'][$data['cosineCheck2']]
            //     )
            // );
            $data['cosineSim'] = $this->cosine($data['tf_no_stopwords'][$data['cosineCheck1']-1], $data['tf_no_stopwords'][$data['cosineCheck2']-1]);
        }

        $header["title"] = "Test mode";
        $this->load->view('./header', $header);
        $this->load->view('books/testmode', $data);
        $this->load->view('footer');
    }

    public function getBooksByCategory()
    {
        echo json_encode($this->books_model->get_by_category());
    }
    /*
    | -------------------------------------------------------------------------
    | bookmark
    | -------------------------------------------------------------------------
    */
    public function update_bookmark()
    {
        $bookid = $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];
        $isBookmarked = $this->bookmark_model->get_if_user_bookmarked($bookid, $username);
        if ($username != null) {
            if ($isBookmarked) {
                // delete from table
                $this->bookmark_model->removeBookmark($bookid, $username);
                echo "removed";
                $this->session->set_userdata('count_all_saved_list', $this->bookmark_model->get_saved_list($username, "count"));
            } else {
                //  insert to table
                date_default_timezone_set('Asia/Bangkok');
                $date = date('Y/m/d H:i:s', time());
                $post_data = array(
                    'book_id' => $bookid,
                    'username' => $username,
                    'date' => $date,
                );

                $this->bookmark_model->insert($post_data);


                echo "inserted";
                $this->session->set_userdata('count_all_saved_list', $this->bookmark_model->get_saved_list($username, "count"));
            }
        } else {
            echo "login";
        }
    }

    function isBookmarked()
    {
        $bookid = $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];
        $isBookmarked = $this->bookmark_model->get_if_user_bookmarked($bookid, $username);
        echo $isBookmarked;
    }

    function get_collection_by_username()
    {
        $username = $this->session->userdata('user')['username'];
        $collection = $this->bookmark_model->get_collection_by_username($username);
        $bookid = $this->input->post('book_id');
        $collection_name_in = $this->bookmark_model->get_collection_book_in($username, $bookid);

        if ($collection != false) {
            $string_html = "";
            foreach ($collection as $cl) {
                if ($cl["collection_name"] == $collection_name_in["collection_name"]) {
                    $string_html .= "<div data-cn='" . $cl["collection_name"] . "' title='Click to remove from current collection.' class='dropdown-item text-secondary collection_remove_to_default'>" . $cl["collection_name"] . "<i class='fas fa-check-circle text-primary float-right pt-1'></i></div>";
                } else {
                    $string_html .= "<div class='dropdown-item collection_select'>" . $cl["collection_name"] . "</div>";
                }
            }
            echo $string_html;
        } else {
            echo "zero";
        }
    }

    function add_to_collection()
    {
        $username = $this->session->userdata('user')['username'];
        $bookid = $this->input->post('book_id');
        $collection_name = $this->input->post('collection_name');
        $this->bookmark_model->add_to_collection($username, $collection_name, $bookid);
    }

    function create_collection()
    {
        $username = $this->session->userdata('user')['username'];
        $collection_name = $this->input->post('collection_name');

        $query = $this->bookmark_model->get_collection_by_id($collection_name, $username);

        if ($query) {
            echo "duplicate";
        } else {
            $post_data = array(
                'username' => $username,
                'collection_name' =>  $collection_name,
            );
            echo $this->bookmark_model->create_collection($post_data);
        }
    }

    function edit_collection_name()
    {
        $username = $this->session->userdata('user')['username'];
        $collection_name = $this->input->post('collection_name');
        $old_collection_name = $this->input->post('old_collection_name');

        $query = $this->bookmark_model->get_collection_by_id($collection_name, $username);

        if ($query) {
            echo "duplicate";
        } else {
            echo $this->bookmark_model->edit_collection_name($collection_name, $old_collection_name, $username);
        }
    }

    function delete_collection()
    {
        $username = $this->session->userdata('user')['username'];
        $collection_name = $this->input->post('collection_name');
        $this->bookmark_model->delete_collection_by_id($collection_name, $username);

        // update count all saved list to session
        $this->session->set_userdata('count_all_saved_list', $this->bookmark_model->get_saved_list($username, "count"));
    }

    function remove_from_collection()
    {
        $username = $this->session->userdata('user')['username'];
        $bookid = $this->input->post('book_id');
        $this->bookmark_model->remove_from_collection($bookid, $username);
    }

    /*
    | -------------------------------------------------------------------------
    | rate
    | -------------------------------------------------------------------------
    */
    public function rateBook()
    {
        $bookid = $this->input->post('book_id');
        $rate = $this->input->post('rating');
        $username = $this->session->userdata('user')['username'];
        $rate_exists = $this->rate_model->get_rate_user_book($username, $bookid);
        if ($rate_exists == FALSE) {
            $rate_data = array(
                'book_id' => $bookid,
                'username' => $username,
                'rate' =>  $rate,
                'date' => date('Y-m-d H:i:s'),
            );
            $this->rate_model->insert($rate_data);
            $rate_avg = $this->books_model->update_book_rate($bookid, $rate);
        } else {
            // update instead of create
            $date = date('Y-m-d H:i:s');
            $this->rate_model->update_rate($bookid, $username, $rate, $date);
            $rate_avg = $this->books_model->update_book_rate_exists($bookid);
        }


        echo number_format($rate_avg, 1);
    }

    // HCI EVENT
    function progress_hci()
    {
        $bookid =  $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];

        $book_type = $this->books_model->get_by_id($bookid);
        if ($book_type["book_type"] == "Human computer interaction") {
            $progress = $this->rate_model->progress_rate_hci($username);
            echo $progress["progress"];
        }
    }

    function getBookRateByUser()
    {
        $bookid = $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];
        $isRated = $this->rate_model->get_rate_user_book($username, $bookid);
        echo $isRated["rate"];
    }
    /*
    | -------------------------------------------------------------------------
    | index
    | -------------------------------------------------------------------------
    */
    public function index()
    {
        // array declaring
        $data['recommend_matched'] = array();
        $data['recommend_averaged'] = array();
        $data['recommend_flattened'] = array();
        $data['recommend_list'] = array();
        $data['recommend_list_bookname'] = array();
        $data['final_recommend_list'] = array();
        $data['target_books'] = array();

        //should be top rated by currently user
        // $data['target_books'] = ['Certified Management Accountant (CMA), Part 2','Trading the Decentralization of the Financial Systems','High Performance Python (from Training at EuroPython 2011)','Red Tea Detox'];
        $username = $this->session->userdata('user')['username'];
        $data['raw_target_books'] = $this->rate_model->get_rate_by_username($username);

        // get current user preferenced books
        foreach ($data['raw_target_books'] as $user_book) {
            $data['target_books'][] = $user_book['book_name'];
        }

        $data['raw_books'] = $this->rate_model->get_rate();
        $data['books'] = $this->flip_array($data['raw_books']);
        $result = $this->transformPreferences($data['books']);
        foreach ($data['target_books'] as $user_book) {
            array_push($data['recommend_matched'], $this->matchItems($result, $user_book));
        }

        $data['recommend_averaged'] = $this->array_average($data['recommend_matched']);
        $data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

        $data['target_books_flipped']  = array_flip($data['target_books']);
        // remove items that user given a rate
        $data['recommend_list'] = array_diff_key($data['recommend_flattened'], $data['target_books_flipped']);
        //   sort by matching value desc
        arsort($data['recommend_list']);

        $data['recommend_list_bookname'] = array_keys($data['recommend_list']);
        if (sizeof($data['recommend_list_bookname']) < 9) {
            $data['full_list_bookname'] = array(9);
            $size = sizeof($data['recommend_list_bookname']);
            $need = 9 - $size;
            $data['list_bookname_to_merge'] = $this->books_model->get_random_book($need, $data['recommend_list_bookname']);
            $i = 0;
            for ($size; $size < 9; $size++) {
                $data['recommend_list_bookname'][$size] =  $data['list_bookname_to_merge'][$i]["book_name"];
                $i++;
            }
        }

        // get item details from their name
        foreach ($data['recommend_list_bookname'] as $row_recommend) {
            $data['recommend_list_detail'][] = $this->books_model->get_by_name($row_recommend);
        }
        if (!empty($data['recommend_list_detail'])) {
            $data['final_recommend_list'] = json_decode(json_encode($data['recommend_list_detail']), True);

            // push match score into result array
            $i = 0;
            foreach ($data['recommend_list'] as $row_recommend) {
                $data['final_recommend_list'][$i]["match"] = $row_recommend;
                $i++;
            }
        } else {
            $data['final_recommend_list'] = false;
        }

        $data['top_rated'] = $this->books_model->get_top_rated();
        $data['category_list'] = $this->books_model->get_cateory_list();

        $header['title'] = 'Book Recommendation';
        $data['books'] = $this->books_model->get_all();

        $header['home'] = 'active';
        $this->load->view('./header', $header);
        $this->load->view('books/index', $data);
        $this->load->view('footer');
    }
    /*
    | -------------------------------------------------------------------------
    | admin_index
    | -------------------------------------------------------------------------
    */
    public function admin_index()
    {
        // array declaring
        $data['recommend_matched'] = array();
        $data['recommend_averaged'] = array();
        $data['recommend_flattened'] = array();
        $data['recommend_list'] = array();
        $data['recommend_list_bookname'] = array();
        $data['final_recommend_list'] = array();
        $data['target_books'] = array();

        //should be top rated by currently user
        // $data['target_books'] = ['Certified Management Accountant (CMA), Part 2','Trading the Decentralization of the Financial Systems','High Performance Python (from Training at EuroPython 2011)','Red Tea Detox'];
        $username = $this->session->userdata('user')['username'];
        $data['raw_target_books'] = $this->rate_model->get_rate_by_username($username);

        // get current user preferenced books
        foreach ($data['raw_target_books'] as $user_book) {
            $data['target_books'][] = $user_book['book_name'];
        }

        $data['raw_books'] = $this->rate_model->get_rate();
        $data['books'] = $this->flip_array($data['raw_books']);
        $result = $this->transformPreferences($data['books']);
        foreach ($data['target_books'] as $user_book) {
            array_push($data['recommend_matched'], $this->matchItems($result, $user_book));
        }

        $data['recommend_averaged'] = $this->array_average($data['recommend_matched']);
        $data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

        $data['target_books_flipped']  = array_flip($data['target_books']);
        // remove items that user given a rate
        $data['recommend_list'] = array_diff_key($data['recommend_flattened'], $data['target_books_flipped']);
        //   sort by matching value desc
        arsort($data['recommend_list']);

        $data['recommend_list_bookname'] = array_keys($data['recommend_list']);
        if (sizeof($data['recommend_list_bookname']) < 9) {
            $data['full_list_bookname'] = array(9);
            $size = sizeof($data['recommend_list_bookname']);
            $need = 9 - $size;
            $data['list_bookname_to_merge'] = $this->books_model->get_random_book($need, $data['recommend_list_bookname']);
            $i = 0;
            for ($size; $size < 9; $size++) {
                $data['recommend_list_bookname'][$size] =  $data['list_bookname_to_merge'][$i]["book_name"];
                $i++;
            }
        }

        // get item details from their name
        foreach ($data['recommend_list_bookname'] as $row_recommend) {
            $data['recommend_list_detail'][] = $this->books_model->get_by_name($row_recommend);
        }
        if (!empty($data['recommend_list_detail'])) {
            $data['final_recommend_list'] = json_decode(json_encode($data['recommend_list_detail']), True);

            // push match score into result array
            $i = 0;
            foreach ($data['recommend_list'] as $row_recommend) {
                $data['final_recommend_list'][$i]["match"] = $row_recommend;
                $i++;
            }
        } else {
            $data['final_recommend_list'] = false;
        }

        $data['top_rated'] = $this->books_model->get_top_rated();
        $data['category_list'] = $this->books_model->get_cateory_list();

        $header['title'] = 'Book Recommendation';
        $data['books'] = $this->books_model->get_all();

        $header['home'] = 'active';
        $this->load->view('./header', $header);
        $this->load->view('books/admin_index', $data);
        $this->load->view('footer');
    }

    /*
    | -------------------------------------------------------------------------
    | pagination
    | -------------------------------------------------------------------------
    */
    public function pagination()
    {
        $config = array();
        $config["base_url"] = base_url() . "books/pagination";
        $config["total_rows"] = $this->books_model->get_count();
        $config["per_page"] = 10;
        //config this NUMBER when path changed
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        //config this NUMBER when path changed
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['books'] = $this->books_model->get_books($config["per_page"], $page);

        $header['title'] = 'pagination';


        $this->load->view('./header', $header);
        $this->load->view('books/pagination', $data);
        $this->load->view('footer');
    }

    /*
    | -------------------------------------------------------------------------
    | google form hci event
    | -------------------------------------------------------------------------
    */
    public function form()
    {
        $this->check_auth('form');

        $username = $this->session->userdata('user')['username'];
        $progress = $this->rate_model->progress_rate_hci($username);

        if ($progress["progress"] < 10) {
            $this->session->set_flashdata('not_enough_hci', TRUE);
            $this->session->set_flashdata('not_enough_hci_progress', $progress["progress"]);
            redirect(base_url('browse/human-computer-interaction'));
        } else {
            $header['title'] = 'Form';
            $this->load->view('./header', $header);
            $this->load->view('form');
            $this->load->view('footer');
        }
    }
    /*
    | -------------------------------------------------------------------------
    | test
    | -------------------------------------------------------------------------
    */
    public function recommend()
    {
        $this->check_auth('recommend');

        // array declaring
        $data['recommend_matched'] = array();
        $data['recommend_averaged'] = array();
        $data['recommend_flattened'] = array();
        $data['recommend_list'] = array();
        $data['recommend_list_bookname'] = array();
        $data['final_recommend_list'] = array();
        $data['target_books'] = array();

        //should be top rated by currently user
        // $data['target_books'] = ['Certified Management Accountant (CMA), Part 2','Trading the Decentralization of the Financial Systems','High Performance Python (from Training at EuroPython 2011)','Red Tea Detox'];
        $username = $this->session->userdata('user')['username'];
        $data['raw_target_books'] = $this->rate_model->get_rate_by_username($username);

        // get current user preferenced books
        foreach ($data['raw_target_books'] as $user_book) {
            $data['target_books'][] = $user_book['book_name'];
        }

        $data['raw_books'] = $this->rate_model->get_rate();
        $data['books'] = $this->flip_array($data['raw_books']);
        $result = $this->transformPreferences($data['books']);
        foreach ($data['target_books'] as $user_book) {
            array_push($data['recommend_matched'], $this->matchItems($result, $user_book));
        }

        $data['recommend_averaged'] = $this->array_average($data['recommend_matched']);
        $data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

        $data['target_books_flipped']  = array_flip($data['target_books']);
        // remove items that user given a rate
        $data['recommend_list'] = array_diff_key($data['recommend_flattened'], $data['target_books_flipped']);
        //   sort by matching value desc
        arsort($data['recommend_list']);

        $data['recommend_list_bookname'] = array_keys($data['recommend_list']);

        if (sizeof($data['recommend_list_bookname']) < 9) {
            $data['full_list_bookname'] = array(9);
            $size = sizeof($data['recommend_list_bookname']);
            $need = 9 - $size;
            $data['list_bookname_to_merge'] = $this->books_model->get_random_book($need, $data['recommend_list_bookname']);
            $i = 0;
            for ($size; $size < 9; $size++) {
                $data['recommend_list_bookname'][$size] =  $data['list_bookname_to_merge'][$i]["book_name"];
                $i++;
            }
        }

        // get item details from their name
        foreach ($data['recommend_list_bookname'] as $row_recommend) {
            $data['recommend_list_detail'][] = $this->books_model->get_by_name($row_recommend);
        }
        if (!empty($data['recommend_list_detail'])) {
            $data['final_recommend_list'] = json_decode(json_encode($data['recommend_list_detail']), True);

            // push match score into result array
            $i = 0;
            foreach ($data['recommend_list'] as $row_recommend) {
                $data['final_recommend_list'][$i]["match"] = $row_recommend;
                $i++;
            }
        } else {
            $data['final_recommend_list'] = false;
        }

        $header['title'] = 'Recommendation test';
        $header['test'] = "active";

        $this->load->view('./header', $header);
        $this->load->view('recommend_test', $data);
        $this->load->view('footer');
    }

    /*
    | -------------------------------------------------------------------------
    | rating history
    | -------------------------------------------------------------------------
    */

    public function rating_history()
    {
        $this->check_auth('rating_history');

        $username = $this->session->userdata('user')['username'];
        $data["rating_history_list"] = $this->rate_model->get_rate_by_username_dynamic($username, 5, 0, "rows");
        $data["num_rows"] = $this->rate_model->get_rate_by_username_dynamic($username, 5, 0, "count");
        $data['all_num_rows'] = $this->rate_model->get_all_num_rows_username($username);

        $data["showheader"] = true;
        $data['i'] = 0;

        $header['title'] = 'Rating history';
        $header['ratinghistory'] = "active";

        $this->load->view('./header', $header);
        $this->load->view('books/rating_history', $data);
        $this->load->view('footer');
    }

    function loadMoreData_rating_history()
    {
        $data['showheader'] = false;
        $start = (int) $this->input->post('start');
        $data['i'] = (int) $this->input->post('i');
        $data['all_num_rows'] = (int) $this->input->post('all_num_rows');
        $username = $this->session->userdata('user')['username'];

        $data['rating_history_list'] = $this->rate_model->get_rate_by_username_dynamic($username, 5, $start, "rows");
        $data['num_rows'] = $this->rate_model->get_rate_by_username_dynamic($username, 5, $start, "count");

        $this->load->view('books/rating_history', $data);
    }



    public function similarityDistance($preferences, $person1, $person2)
    {
        $similar = array();
        $sum = 0;

        foreach ($preferences[$person1] as $key => $value) {
            if (array_key_exists($key, $preferences[$person2]))
                $similar[$key] = 1;
        }

        if (count($similar) == 0)
            return 0;

        foreach ($preferences[$person1] as $key => $value) {
            if (array_key_exists($key, $preferences[$person2])) {
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
            }
        }

        return  1 / (1 + sqrt($sum));
    }


    public function matchItems($preferences, $person)
    {
        $score = array();

        foreach ($preferences as $otherPerson => $values) {

            if ($otherPerson !== $person) {

                $sim = $this->similarityDistance($preferences, $person, $otherPerson);

                if ($sim > 0) {
                    $score[$otherPerson] = $sim;
                }
            }
        }

        array_multisort($score, SORT_DESC);
        return $score;
    }


    public function transformPreferences($preferences)
    {
        $result = array();

        foreach ($preferences as $otherPerson => $values) {
            foreach ($values as $key => $value) {
                $result[$key][$otherPerson] = $value;
            }
        }

        return $result;
    }

    public function flip_array($data)
    {
        $arr = array();
        $keys = array_keys($data);
        $book_name = "";
        $username = "";
        for ($i = 0; $i < count($data); $i++) {

            foreach ($data[$keys[$i]] as $key => $value) {
                if ($key == "book_name") {
                    $book_name = $value;
                } else if ($key == "username") {
                    $username = $value;
                } else if ($key == "rate") {
                    $arr[$username][$book_name] = $value;
                }
            }
        }
        return $arr;
    }

    public function array_average($input)
    {
        $sum = array();
        $repeat = array();
        $result = array();
        foreach ($input as $array) {
            foreach ($array as $key => $value) {
                if (array_key_exists($key, $sum)) {
                    $repeat[$key] = $repeat[$key] + 1;
                    $sum[$key] = $sum[$key] + $value;
                } else {
                    $repeat[$key] = 1;
                    $sum[$key] = $value;
                }
            }
        }
        foreach ($sum as $key => $value) {
            $result[][$key] = $value / $repeat[$key];
        }
        return $result;
    }

    public function array_flatten($array)
    {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function dot_product($a, $b)
    {
        $dot_product = 0;

        foreach ($a as $key_a => $value_a) {
            if (array_key_exists($key_a, $b)) {
                $dot_product += $a[$key_a] * $b[$key_a];
                // echo "<br>true " . $key_a;
            } else {
                // echo "<br>false " . $key_a;
            }
        }
        // echo "<br>dot_product : ".$dot_product;
        return $dot_product;

        // $products = array_map(function ($a, $b) {
        //     // echo "<br>array_map : " . $a * $b;
        //     return $a * $b;
        // }, $a, $b);
        // return array_reduce($products, function ($a, $b) {
        //     return $a + $b;
        // });

    }
    public function magnitude($point)
    {
        $squares = array_map(function ($x) {
            return pow($x, 2);
        }, $point);
        return sqrt(array_reduce($squares, function ($a, $b) {
            return $a + $b;
        }));
    }

    public function cosine($a, $b)
    {
        // echo "<div class='container'><h4>watcher</h4>";
        // echo "<br><br>";
        // echo "<br>magnitude a : " . self::magnitude($a);
        // echo "<br>magnitude b : " . self::magnitude($b);
        // echo "<br>magnitude a*b : " . self::magnitude($a) * self::magnitude($b);
        // echo "</div>";

        return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
    }
}
