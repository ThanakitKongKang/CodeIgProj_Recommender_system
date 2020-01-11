<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->model('course_model');
        $this->load->model('bookmark_model');
        $this->load->model('comments_model');
        $this->load->model('comments_enabling_model');
        $this->load->model('comments_liking_model');
        $this->load->model('registered_course_model');
        $this->load->model('users_model');
        $this->check_auth_admin("dashboard");
    }

    public function book_manage_page()
    {
        // all books data
        $data['category_list'] = $this->books_model->get_cateory_list();


        // on/off comment
        // edit book detail
        // edit course keywords
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isBookManage"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/book_manage_page', $data);
        $this->load->view('footer');
    }

    public function insert_book_page()
    {
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isInsert"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/insert_book_page', $data);
        $this->load->view('footer');
    }



    public function user_manage_page()
    {
        $this->check_auth("dashboard");
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isUserManage"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/user_manage_page', $data);
        $this->load->view('footer');
    }

    public function user_comment_manage_page()
    {
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isComment"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/user_comment_manage_page', $data);
        $this->load->view('footer');
    }

    public function course_manage_page()
    {
        // manage course detail
        // manage course keyword
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isCourse"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/course_manage_page', $data);
        $this->load->view('footer');
    }

    // api
    public function book_get()
    {
        $books = $this->books_model->getAll();
        echo json_encode($books);
    }
    public function book_update()
    {
        $book_id = $this->input->post('book_id');
        $post_data = array(
            'book_name' => $this->input->post('book_name'),
            'author' =>  $this->input->post('author'),
            'book_type' => $this->input->post('book_type'),
        );

        $this->books_model->book_update($book_id, $post_data);
    }

    public function book_delete()
    {
        $book_id = $this->input->post('book_id');

        // save data and delete

        // delete in book, 3 comments, rate, saved_book
        // update book.book_id
        // update comment.book_id
        // update comment_enabling.book_id
        // update comment.liking.book_id
        // update rate.book_id
        // update saved_book.book_id
        $this->books_model->book_delete($book_id);

    }
}
