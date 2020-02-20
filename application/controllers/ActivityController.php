<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ActivityController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('activity_model');
    }

    public function activity_view()
    {
        $bookid = $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y/m/d H:i:s', time());
        $data = array(
            'book_id' => $bookid,
            'date' => $date,
            'username' => $username,
        );

        $this->activity_model->insert_view($data);
    }

    public function get_recently_view()
    {
        $username = $this->session->userdata('user')['username'];
        echo json_encode($this->activity_model->get_recently_view($username, 5, "rows"));
    }

    public function get_recently_search()
    {
        $username = $this->session->userdata('user')['username'];
        echo json_encode($this->activity_model->get_recently_search($username, "rows"));
    }
}
