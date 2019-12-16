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
        $header["title"] = "Your course";
        $header["yourcourse"] = "active";

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
                // echo "<br>true " . $key_a;
            } else {
                // echo "<br>false " . $key_a;
            }
        }
        // echo "<br>dot_product : ".$dot_product;
        return $dot_product;

        // $products = array_map(function ($a, $b) {
        //     // echo "<br>array_map : " . $a * $b;
        //     return $a * $b;
        // }, $a, $b);
        // return array_reduce($products, function ($a, $b) {
        //     return $a + $b;
        // });

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
        // echo "<div class='container'><h4>watcher</h4>";
        // echo "<br><br>";
        // echo "<br>magnitude a : " . self::magnitude($a);
        // echo "<br>magnitude b : " . self::magnitude($b);
        // echo "<br>magnitude a*b : " . self::magnitude($a) * self::magnitude($b);
        // echo "<br>dotproduct ab : " . self::dot_product($a, $b);
        // echo "</div>";

        return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
    }
}
