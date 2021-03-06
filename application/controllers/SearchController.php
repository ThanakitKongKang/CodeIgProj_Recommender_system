<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SearchController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->model('bookmark_model');
        $this->load->library("pagination");
    }

    public function search()
    {
        $query = $this->input->get('q');
        $sort = $this->input->get('sort');
        $category = $this->input->get('category');
        $author = $this->input->get('author');
        $not_rated = $this->input->get('notrated');
        $not_saved = $this->input->get('notsaved');
        $rating = $this->input->get('rating');



        $data['query'] = $query;
        $header['previous_query_string'] = $query;

        $config = array();
        $config["base_url"] = base_url() . "search/result";
        $config["total_rows"] = $this->books_model->search_books_get_count($query, $sort, $category, $author, $not_rated, $not_saved, $rating);
        $config["per_page"] = 9;
        //config this NUMBER when path changed
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        // //config this NUMBER when path changed
        // $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();


        $data['books'] = $this->books_model->search_books($config["per_page"], $page, $query, $sort, $category, $author, $not_rated, $not_saved, $rating);
        $data['author_list'] = $this->books_model->search_books_get_author($query, $sort, $category, $not_rated, $not_saved, $rating);



        $data['page'] = $page;
        $data['total_rows'] = $config["total_rows"];
        $data['category_list'] = $this->books_model->search_books_get_category($query, $sort, $not_rated, $not_saved, $rating);
        $header['title'] = 'Search result - CS Book';


        if ($config["total_rows"] > 0)
            $data['search'] = "search-result";
        else
            $data['search'] = "no-book-found";

        if ($this->session->userdata('logged_in') && $query != "" && !is_numeric($query)) {
            $this->activity_search($query);
        }

        $this->load->view('./header', $header);
        $this->load->view('books/search_result', $data);
        $this->load->view('footer');
    }

    function liveSearch()
    {
        $typing = $this->input->post('typing');
        $results = $this->books_model->search_live_soundex($typing);
        $results_not_soundex = $this->books_model->search_live_not_soundex($typing);
        $results_not_soundex_author = $this->books_model->search_live_not_soundex_author($typing);

        echo "<div id='live_search_result_container' class='bg-white position-absolute'>";

        if ($results != FALSE) {
            echo "<div class='live_search_panel font-arial'> title";
            echo "</div>";
            foreach ($results as $result) {
                echo "<a class='dropdown-item-search live_search_result_option' data-book_id='" . $result['book_id'] . "' href>";
                echo $result['book_name'];
                echo "</a>";
            }
        } else if ($results == FALSE && $results_not_soundex != FALSE) {
            echo "<div class='live_search_panel font-arial'> title";
            echo "</div>";
            foreach ($results_not_soundex as $result) {
                echo "<a class='dropdown-item-search live_search_result_option' data-book_id='" . $result['book_id'] . "' href>";
                echo $result['book_name'];
                echo "</a>";
            }
        }

        if ($results_not_soundex_author != FALSE) {
            echo "<div class='live_search_panel font-arial'> author";
            echo "</div>";

            foreach ($results_not_soundex_author as $result) {
                echo "<a class='dropdown-item-search live_search_result_option_author' href>";
                echo $result['author'];
                echo "</a>";
            }
        }

        echo "<a class='dropdown-item live_search_result_all' href>all results for \"" . $typing . "\"</a>";
        echo "</div>";
    }

    public function advanced_search()
    {
        $data['category_list'] = $this->books_model->get_cateory_list();
        $data['author_list'] = $this->books_model->get_authors();
        $header['previous_query_string'] = $this->input->get('q');
        $data["query"] = "what";
        $header['title'] = "Advance Search - CS Book";
        $this->load->view('./header', $header);
        $this->load->view('books/search_advanced', $data);
        $this->load->view('footer');
    }
}
