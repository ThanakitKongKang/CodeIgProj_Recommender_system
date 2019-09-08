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
        $sort_rate = $this->input->get('sort_rate');
        $category = $this->input->get('category');
        $author = $this->input->get('author');

        $data['query'] = $query;
        $header['previous_query_string'] = $query;

        $config = array();
        $config["base_url"] = base_url() . "search/result";
        $config["total_rows"] = $this->books_model->search_books_get_count($query, $sort_rate, $category, $author);
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

        $data['books'] = $this->books_model->search_books($config["per_page"], $page, $query, $sort_rate, $category, $author);
        $data['author_list'] = $this->books_model->search_books_get_author($query, $sort_rate, $category);



        $data['page'] = $page;
        $data['total_rows'] = $config["total_rows"];
        $data['category_list'] = $this->books_model->get_cateory_list();
        $header['title'] = 'Search result';


        if ($config["total_rows"] > 0)
            $data['search'] = "search-result";
        else
            $data['search'] = "no-book-found";

        $this->load->view('./header', $header);
        $this->load->view('books/search_result', $data);
        $this->load->view('footer');
    }
}
