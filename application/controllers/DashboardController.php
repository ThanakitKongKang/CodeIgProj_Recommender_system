<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        // show data log of new user/comment and new books/ rate book via log
        $data = 0;
        $header["title"] = "Dashboard";
        $header["dashboard"] = "active";
        $this->load->view('./header', $header);
        $this->load->view('dashboard/index', $data);
        $this->load->view('footer');
    }
    public function insertbook_page()
    {
    }
    public function book_manage_page()
    {
        // on/off comment
        // edit book detail
        // edit course keywords
    }
    public function user_manage_page()
    {

    }
    public function comment_manage()
    {
        
    }
}
