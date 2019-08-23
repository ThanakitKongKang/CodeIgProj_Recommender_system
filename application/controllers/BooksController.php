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
        $config = array();
        $config["base_url"] = base_url() . "books";
        $config["total_rows"] = $this->books_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['books'] = $this->books_model->get_books($config["per_page"], $page);

        $header['title'] = 'Book Recommendation';

        $this->load->view('./header', $header);
        $this->load->view('books/index', $data);
        $this->load->view('footer');
    }

    public function recommend()
    {
        $data['books'] = $this->rate_model->get_rate();
        $data['books'] = $this->flip_array($data['books']);
        $result = $this->transformPreferences($data['books']);

        $data['recommend'] = [];

        //should be top rated by currently user
        $username = "golf";
        $user_books = ['Certified Management Accountant (CMA), Part 1', 'Certified Management Accountant (CMA), Part 2', 'Trading the Decentralization of the Financial Systems', 'Red Tea Detox'];

        foreach ($user_books as $user_book) {
            array_push($data['recommend'], $this->matchItems($result, $user_book));
        }

        $data['recommend'] = $this->array_flatten($data['recommend']);
        // $data['recommend'] = $this->array_average($data['recommend']);

        $header['title'] = 'Recommendation test';

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

    public function array_average($array)
    {
    

   
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
