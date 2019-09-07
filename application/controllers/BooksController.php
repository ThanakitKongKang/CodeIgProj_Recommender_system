<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BooksController extends CI_Controller
{

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
        $data['get_url'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : "All";
        $data['page'] = str_replace("-", " ", $data['get_url']);

        $data['i'] = 0;
        $data['category_list'] = $this->books_model->get_cateory_list();

        $data['content_list'] = $this->books_model->get_content_list_dynamic(21, 0, "rows", $data['page']);
        $data['num_rows'] = $this->books_model->get_content_list_dynamic(21, 0, "count", $data['page']);
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
        $data['what'] = $data['all_num_rows'];

        $data['content_list'] = $this->books_model->get_content_list_dynamic(21, $start, "rows", $category);
        $data['num_rows'] = $this->books_model->get_content_list_dynamic(21, $start, "count", $category);

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
            $data['saved_list'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, 0, "rows");
            $data['num_rows'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, 0, "count");
            $header["title"] = "Saved items";
            $data['showheader'] = true;
            $data['i'] = 0;
            $data['round_count'] = 1;
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
        $data['showheader'] = false;
        $data['round_count'] = ((int) $this->input->post('round_count')) + 1;
        $start = (int) $this->input->post('start');
        $data['i'] = (int) $this->input->post('i');
        $save_removed = (int) $this->input->post('bookmark_trigger_count');
        $username = $this->session->userdata('user')['username'];

        $data['saved_list'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, $start - $save_removed, "rows");
        $data['num_rows'] = $this->bookmark_model->get_saved_list_dynamic($username, 5, $start - $save_removed, "count");

        $this->load->view('books/saved', $data);
    }
    /*
    | -------------------------------------------------------------------------
    | test page
    | -------------------------------------------------------------------------
    */
    public function testmode()
    {
        $header["title"] = "Test mode";
        $this->load->view('./header', $header);
        $this->load->view('books/testmode');
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
            );

            $this->rate_model->insert($rate_data);
            $rate_avg = $this->books_model->update_book_rate($bookid, $rate);
        } else {
            // update instead of create
            $this->rate_model->update_rate($bookid, $username, $rate);
            $rate_avg = $this->books_model->update_book_rate_exists($bookid);
        }
        echo number_format($rate_avg['avg'], 1);
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
            if (array_key_exists($key, $preferences[$person2]))
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
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
}
