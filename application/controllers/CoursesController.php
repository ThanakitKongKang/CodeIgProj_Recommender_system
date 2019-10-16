<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CoursesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('course_model');
        $this->load->model('bookmark_model');
    }

    public function index()
    {
        $this->check_auth('dashboard');

        $data['course_registered'] = $this->course_model->get_course_registered("admin");
        $header["title"] = "Your course";
        $this->load->view('./header', $header);
        $this->load->view('courses/index', $data);
        $this->load->view('footer');
    }

    function select_search()
    {
        $typing = $this->input->get('q');
        $search_result["items"] = $this->course_model->select_search_course($typing, "rows");
        if ($search_result["items"] != FALSE) {
            $search_result_count = $this->course_model->select_search_course($typing, "count");

            $search_result["total_count"] = $search_result_count;
            echo json_encode($search_result);
        }
    }
}
