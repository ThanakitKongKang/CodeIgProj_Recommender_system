<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'BooksController.php';

class CoursesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('books_model');
        $this->load->model('course_model');
        $this->load->model('registered_course_model');
    }

    public function index()
    {
        $this->check_auth('courses/index');
        $username = $this->session->userdata('user')['username'];
        $data['course_registered'] = $this->course_model->get_course_registered($username);
        $header["title"] = "Your course";
        $header["yourcourse"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('courses/index', $data);
        $this->load->view('footer');
    }

    function seemore()
    {
        $data['get_url'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : "all";
        $data['round_count'] = 1;
        $data['i'] = 0;

        $data['content_list'] = $this->books_model->get_content_list_dynamic(9, 0, "rows", $data['page']);
        $data['num_rows'] = $this->books_model->get_content_list_dynamic(9, 0, "count", $data['page']);
        $data['all_num_rows'] = $this->books_model->get_all_num_rows_by_category($data['page']);

        $username = $this->session->userdata('user')['username'];
        $url = base_url() . 'crsrec';

        //Use Curl for making the REST API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $data['recommend_list_detail_course'] = curl_exec($ch);
        $page = $data['get_url'];
        $data['recommend_list_detail_course'] = array_filter($data['recommend_list_detail_course'], function ($array_key) use ($page) {
            return $array_key == $page;
        }, ARRAY_FILTER_USE_KEY);

        if ($data['all_num_rows'] == false) {
            $data['all_num_rows'] = 0;
            $data['page'] = "404-Page-Not-Found";
        }

        $header["title"] = "Course - " . $data['page'];
        $this->load->view('./header', $header);
        $this->load->view('courses/seemore');
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

    function add_course()
    {
        $username = $this->session->userdata('user')['username'];
        $post_data = array(
            'course_id' => $this->input->post('course_id'),
            'username' => $username,
            'date' => date('Y-m-d H:i:s'),
        );

        $this->registered_course_model->insert($post_data);
    }

    function delete_course()
    {
        $username = $this->session->userdata('user')['username'];
        $post_data = array(
            'course_id' => $this->input->post('course_id'),
            'username' => $username,
        );

        $this->registered_course_model->delete_registered_course($post_data);
    }
    public function dot_product($a, $b)
    {
        $dot_product = 0;

        foreach ($a as $key_a => $value_a) {
            if (array_key_exists($key_a, $b)) {
                $dot_product += $a[$key_a] * $b[$key_a];
            } else {
            }
        }

        return $dot_product;
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
        return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
    }
}
