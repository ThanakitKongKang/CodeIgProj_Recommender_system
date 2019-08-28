<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BooksController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');

        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->library("pagination");
    }

    public function index()
    {

        $header['title'] = 'Book Recommendation';
        $data['books'] = $this->books_model->get_all();

        $header['home'] = 'active';
        $this->load->view('./header', $header);
        $this->load->view('books/index', $data);
        $this->load->view('footer');
    }

    public function pagination()
    {
        $config = array();
        $config["base_url"] = base_url() . "books/pagination";
        $config["total_rows"] = $this->books_model->get_count();
        $config["per_page"] = 10;
        //config this NUMBER when path changed
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        //config this NUMBER when path changed
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['books'] = $this->books_model->get_books($config["per_page"], $page);

        $header['title'] = 'pagination';
       

        $this->load->view('./header', $header);
        $this->load->view('books/pagination', $data);
        $this->load->view('footer');
    }

    public function recommend()
    {
        // array declaring
        $data['recommend_matched'] = array();
        $data['recommend_averaged'] = array();
        $data['recommend_flattened'] = array();
        $data['recommend_list'] = array();
        $data['recommend_list_bookname'] = array();
        $data['final_recommend_list'] = array();
        $data['target_books'] = array();

        //should be top rated by currently user
        // $data['target_books'] = ['Certified Management Accountant (CMA), Part 2','Trading the Decentralization of the Financial Systems','High Performance Python (from Training at EuroPython 2011)','Red Tea Detox'];
        $username = $this->session->userdata('user')['username'];
        $data['raw_target_books'] = $this->rate_model->get_rate_by_username($username);

        // get current user preferenced books
        foreach ($data['raw_target_books'] as $user_book) {
            $data['target_books'][] = $user_book['book_name'];
        }

        $data['raw_books'] = $this->rate_model->get_rate();
        $data['books'] = $this->flip_array($data['raw_books']);
        $result = $this->transformPreferences($data['books']);
        foreach ($data['target_books'] as $user_book) {
            array_push($data['recommend_matched'], $this->matchItems($result, $user_book));
        }

        $data['recommend_averaged'] = $this->array_average($data['recommend_matched']);
        $data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

        $data['target_books_flipped']  = array_flip($data['target_books']);
        // remove items that user given a rate
        $data['recommend_list'] = array_diff_key($data['recommend_flattened'], $data['target_books_flipped']);
        $data['recommend_list_bookname'] = array_keys($data['recommend_list']);

        // get item details from their name
        foreach ($data['recommend_list_bookname'] as $row_recommend) {
            $data['recommend_list_detail'][] = $this->books_model->get_by_id($row_recommend);
        }

        $data['final_recommend_list'] = json_decode(json_encode($data['recommend_list_detail']), True);

        // push match score into result array
        $i = 0;
        foreach ($data['recommend_list'] as $row_recommend) {
            $data['final_recommend_list'][$i]["match"] = $row_recommend;
            $i++;
        }

        $header['title'] = 'Recommendation test';
        $header['test'] = "active"; 

        $this->load->view('./header', $header);
        $this->load->view('recommend_test', $data);
        $this->load->view('footer');
    }



    public function similarityDistance($preferences, $person1, $person2)
    {
        $similar = array();
        $sum = 0;

        foreach ($preferences[$person1] as $key => $value) {
            if (array_key_exists($key, $preferences[$person2]))
                $similar[$key] = 1;
        }

        if (count($similar) == 0)
            return 0;

        foreach ($preferences[$person1] as $key => $value) {
            if (array_key_exists($key, $preferences[$person2]))
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
        }

        return  1 / (1 + sqrt($sum));
    }


    public function matchItems($preferences, $person)
    {
        $score = array();

        foreach ($preferences as $otherPerson => $values) {

            if ($otherPerson !== $person) {

                $sim = $this->similarityDistance($preferences, $person, $otherPerson);

                if ($sim > 0) {
                    $score[$otherPerson] = $sim;
                }
            }
        }

        array_multisort($score, SORT_DESC);
        return $score;
    }


    public function transformPreferences($preferences)
    {
        $result = array();

        foreach ($preferences as $otherPerson => $values) {
            foreach ($values as $key => $value) {
                $result[$key][$otherPerson] = $value;
            }
        }

        return $result;
    }

    public function flip_array($data)
    {
        $arr = array();
        $keys = array_keys($data);
        $book_name = "";
        $username = "";
        for ($i = 0; $i < count($data); $i++) {

            foreach ($data[$keys[$i]] as $key => $value) {
                if ($key == "book_name") {
                    $book_name = $value;
                } else if ($key == "username") {
                    $username = $value;
                } else if ($key == "rate") {
                    $arr[$username][$book_name] = $value;
                }
            }
        }
        return $arr;
    }

    public function array_average($input)
    {
        $sum = array();
        $repeat = array();
        $result = array();
        foreach ($input as $array) {
            foreach ($array as $key => $value) {
                if (array_key_exists($key, $sum)) {
                    $repeat[$key] = $repeat[$key] + 1;
                    $sum[$key] = $sum[$key] + $value;
                } else {
                    $repeat[$key] = 1;
                    $sum[$key] = $value;
                }
            }
        }
        foreach ($sum as $key => $value) {
            $result[][$key] = $value / $repeat[$key];
        }
        return $result;
    }

    public function array_flatten($array)
    {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
