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
        $data['test'] = $this->rate_model->get_rate();
        $data['test'] = $this->flip_array($data['test']);

        $data['books'] =  array(
            "admin" => array(
            "Certified Management Accountant (CMA), Part 2" => 4,
            "Trading the Decentralization of the Financial Systems" => 4,
            "High Performance Python (from Training at EuroPython 2011)" => 5,
            "Red Tea Detox" => 5
            ),

            "phil" => array(
                "my girl" => 2.5, "the god delusion" => 3.5,
                "tweak" => 3, "the shack" => 4,
                "the birds in my life" => 2.5,
                "new moon" => 3.5
            ),

            "sameer" => array(
                "the last lecture" => 2.5, "the god delusion" => 3.5,
                "the noble wilds" => 3, "the shack" => 3.5,
                "the birds in my life" => 2.5, "new moon" => 1
            ),

            "john" => array(
                "a thousand splendid suns" => 5, "the secret" => 3.5,
                "tweak" => 1
            ),

            "peter" => array("chaos" => 5, "php in action" => 3.5),

            "jill" => array(
                "the last lecture" => 1.5, "the secret" => 2.5,
                "the noble wilds" => 4, "the host: a novel" => 3.5,
                "the world without end" => 2.5, "new moon" => 3.5
            ),

            "bruce" => array(
                "the last lecture" => 3, "the hollow" => 1.5,
                "the noble wilds" => 3, "the shack" => 3.5,
                "the appeal" => 2, "new moon" => 3
            ),

            "tom" => array("not" => 2.5, "B" => 3),
            "cat" => array("should" => 2.5, "B" => 5),
            "golf" => array("chaos" => 5, "new moon" => 4, "the last lecture" => 4, "B" => 5)
        );

        // $array_data = $re->getRecommendations($books, "jill");
        $result = $this->transformPreferences($data['test']);


        echo "<br><br><h2>data['test'] before</h2>";
        print("<pre>" . print_r($data['test'], true) . "</pre>");
        echo "<br><br><h2>data['test'] after</h2>";
        print("<pre>" . print_r($result, true) . "</pre>");

        // echo "<br><br><h2>data['books'] before</h2>";
        // print("<pre>" . print_r($data['books'], true) . "</pre>");
        // echo "<br><br><h2>data['books'] after</h2>";
        // print("<pre>" . print_r($this->transformPreferences($data['books']), true) . "</pre>");

        $data['array_data'] = [];

        //should be top rated by currently user
        $username = "golf";
        $user_books = ['Certified Management Accountant (CMA), Part 2'];

        foreach ($user_books as $user_book) {
            // $data['array_data'][$user_book] = $this->matchItems($result, $user_book);
            array_push($data['array_data'], $this->matchItems($result, $user_book));
        }


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
        $count = 0;
        $book_name = "";
        $username = "";
        for ($i = 0; $i < count($data); $i++) {
            $count++;
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
}
