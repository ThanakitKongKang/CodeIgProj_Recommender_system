<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CoursesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->model('bookmark_model');
    }

    public function index()
    {
        $this->check_auth('dashboard');
        $header["title"] = "Your course";
        $this->load->view('./header', $header);
        $this->load->view('courses/index');
        $this->load->view('footer');
    }
}
