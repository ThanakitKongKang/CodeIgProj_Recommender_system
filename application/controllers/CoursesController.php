<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
        $header["title"] = "My course - CS Book";
        $header["yourcourse"] = "active shadow";

        $this->load->view('./header', $header);
        $this->load->view('courses/index', $data);
        $this->load->view('footer');
    }

    function seemore()
    {
        $data['get_url'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : "none";
        $page = $data['get_url'];
        $data["isCourseExists"] = $this->course_model->get_course_by_id($data['get_url']);

        if ($data['isCourseExists'] == FALSE) {
            if ($data['get_url'] == "rec_by_viewed") {
                $this->check_auth('seemore');
                $data['isCourseExists'] = "TRUE";
                $data['recommend_list_detail_course']['detail'] = "rec_by_viewed";
                $data['recommend_list_detail_course'][] = $this->getActivityRecommend_viewed();
                $data['page'] = "Based on your recently viewed";
                $data["title_mfy"] = "<i class='fas fa-glasses pr-3'></i>Recommended by activity";
                $data["title_main"] = "Based on your recently viewed";
                $header["title"] = "Recommended by activity - CS Book";
            } else if ($data['get_url'] == "rec_by_search") {
                $this->check_auth('seemore');
                $data['isCourseExists'] = "TRUE";
                $data['recommend_list_detail_course']['detail'] = "rec_by_search";
                $data['recommend_list_detail_course'][] = $this->getActivityRecommend_search();
                $data['page'] = "Based on your recently searching";
                $data["title_mfy"] = "<i class='fas fa-search fa-flip-horizontal pl-3'></i>Recommended by activity";
                $data["title_main"] = "Based on recently searching";
                $header["title"] = "Recommended by activity - CS Book";
            } else if ($data['get_url'] == "popular") {
                $data['isCourseExists'] = "TRUE";
                $data['recommend_list_detail_course']['detail'] = "popular";
                $data['recommend_list_detail_course'][] = $this->getActivity_popular();
                $data['page'] = "popular";
                $data["title_mfy"] = "<i class='fas fa-fire-alt pr-3'></i>Trending Now";
                $data["title_main"] = "popular";
                $header["title"] = "Trending Now - CS Book";
            } else if ($data['get_url'] == "view_again") {
                $this->check_auth('seemore');
                $data['isCourseExists'] = "TRUE";
                $data['recommend_list_detail_course']['detail'] = "view_again";
                $data['recommend_list_detail_course'][] = $this->getActivity_viewAgain();
                $data['page'] = "View it again";
                $data["title_mfy"] = "<i class='fas fa-redo pr-3'></i>Recommended by activity";
                $data["title_main"] = "View it again";
                $header["title"] = "Recommended by activity - CS Book";
            } else {
                $data['all_num_rows'] = 0;
                $data['page'] = "404-Page-Not-Found";
                $data["title_mfy"] = "";
                $data["title_main"] = "Page not found!";
                $header["title"] = "404-Page-Not-Found - CS Book";
            }
        } else {
            $this->check_auth('seemore');
            $data['recommend_list_detail_course'] = $this->getCourseRecommend();

            // get only requested course
            $data['recommend_list_detail_course'] = array_filter($data['recommend_list_detail_course'], function ($array_key) use ($page) {
                return $array_key == $page;
            }, ARRAY_FILTER_USE_KEY);
            if ($data['recommend_list_detail_course'] != FALSE) {
                $data["title_mfy"] = "<i class='fas fa-heart pr-3'></i>Made for you";
                $data["title_main"] = $data["recommend_list_detail_course"][$data["get_url"]]["detail"]["course_name_en"] . '';
            } else {
                $data['isCourseExists'] = FALSE;
                $data["title_mfy"] = "";
                $data["title_main"] = "Page not found!";
            }
            $header["title"] = "Course - " . $data['get_url']." - CS Book";
        }

        $this->load->view('./header', $header);
        $this->load->view('courses/seemore', $data);
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
