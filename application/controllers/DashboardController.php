<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->model('books_model');
        $this->load->model('rate_model');
        $this->load->model('course_model');
        $this->load->model('bookmark_model');
        $this->load->model('comments_model');
        $this->load->model('comments_enabling_model');
        $this->load->model('comments_liking_model');
        $this->load->model('registered_course_model');
        $this->load->model('users_model');

        $this->check_auth_admin("dashboard");
    }

    public function book_manage_page()
    {
        // all books data
        $data['category_list'] = $this->books_model->get_cateory_list();


        // on/off comment
        // edit book detail
        // edit course keywords
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isBookManage"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/book_manage_page', $data);
        $this->load->view('footer');
    }

    public function insert_book_page()
    {
        $data['category_list'] = $this->books_model->get_cateory_list();

        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isInsert"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/insert_book_page', $data);
        $this->load->view('footer');
    }



    public function user_manage_page()
    {
        $this->check_auth("dashboard");
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isUserManage"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/user_manage_page');
        $this->load->view('footer');
    }

    public function user_comment_manage_page()
    {
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isComment"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/user_comment_manage_page');
        $this->load->view('footer');
    }

    public function course_manage_page()
    {
        // manage course detail
        // manage course keyword
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isCourse"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/course_manage_page');
        $this->load->view('footer');
    }

    public function course_insert_page()
    {
        // manage course detail
        // manage course keyword
        $header["title"] = "Dashboard";

        // active
        $header["dashboard"] = "active";
        $data_nav["isInsertCourse"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/course_insert_page');
        $this->load->view('footer');
    }

    // api
    public function book_get()
    {
        $books = $this->books_model->getAll();
        echo json_encode($books);
    }

    public function book_update()
    {
        $book_id = $this->input->post('book_id');

        if (empty($this->input->post('book_type'))) {
            $book_type = "Unknown";
        } else {
            $book_type = $this->input->post('book_type');
        }

        $post_data = array(
            'book_name' => $this->input->post('book_name'),
            'author' =>  $this->input->post('author'),
            'book_type' => $book_type,
        );

        $old_book_name =  $this->books_model->get_by_id($book_id);

        $old = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/book_files/" . $old_book_name["book_name"] . ".pdf";
        $new = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/book_files/" . $this->input->post('book_name') . ".pdf";
        rename($old, $new);

        $this->books_model->book_update($book_id, $post_data);
    }

    public function book_delete()
    {
        $book_id = $this->input->post('book_id');
        $book_name = $this->books_model->get_by_id($book_id);
        // save data and delete

        // delete in book, 3 comments, rate, saved_book
        // update book.book_id
        // update comment.book_id
        // update comment_enabling.book_id
        // update comment.liking.book_id
        // update rate.book_id
        // update saved_book.book_id
        $this->books_model->book_delete($book_id);

        $this->load->helper("file");
        // delete book cover and book file
        $book_cover_file = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/book_covers/$book_id.PNG";
        $book_file = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/book_files/" . $book_name["book_name"] . ".pdf";

        // Use unlink() function to delete a file  
        if (is_file($book_cover_file)) {
            chmod($book_cover_file, 0777);
            chmod($book_file, 0777);
            unlink($book_file);
            if (!unlink($book_cover_file)) {
                echo ("$book_id cannot be deleted due to an error");
            } else {
                echo ("$book_id has been deleted");
            }
        } else {
            echo "$book_id File does not exist";
        }
    }

    public function book_insert()
    {
        if (empty($this->input->post('book_type'))) {
            $book_type = "Unknown";
        } else {
            $book_type = $this->input->post('book_type');
        }
        $post_data = array(
            'book_name' => $this->input->post('book_name'),
            'author' =>  $this->input->post('author'),
            'book_type' => $book_type,
        );

        $this->books_model->insert($post_data);
    }

    public function isBookNameExists()
    {
        $book_name = $this->input->post('book_name');
        $row = $this->books_model->get_by_name($book_name);

        if ($row != null) {
            echo "true";
        }
    }

    public function book_cover_upload()
    {
        if ($this->input->post('is_new') == "true") {
            $last_book_id = $this->books_model->getLastID();
            $last_book_id = $last_book_id["book_id"]++;
        } else {
            $last_book_id = $this->input->post('book_id');
        }

        $encodedstring = $this->input->post('image');
        $data = $encodedstring;

        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
                throw new \Exception('invalid image type');
            }

            $data = base64_decode($data);

            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data ' . $data);
        }
        file_put_contents("assets/book_covers/{$last_book_id}.PNG", $data);
    }

    public function book_file_upload()
    {
        ini_set('memory_limit', '500M');
        ini_set('upload_max_filesize', '500M');
        ini_set('post_max_size', '500M');
        ini_set('max_input_time', 3600);
        ini_set('max_execution_time', 3600);

        $book_name = $this->input->post('name');

        $target_file = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/book_files/";


        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'assets/book_files/' . $book_name . ".pdf");
        }

        echo "name : " . ($book_name) . "<br>";
        echo "file : " . $_FILES['file']['name'] . "<br>";
        echo "file : " . $_FILES['file']['tmp_name'] . "<br>";

        echo "folder : " . $target_file . "<br>";
        exit();
    }

    public function isCommentEnabled()
    {
        $book_id = $this->input->post('book_id');
        echo $this->comments_enabling_model->isEnabled($book_id);
    }

    // USER api
    public function user_get()
    {
        $users = $this->users_model->getAll();
        echo json_encode($users);
    }



    public function user_update()
    {
        $old_username = $this->input->post('old_username');
        $post_data = array(
            'username' => $this->input->post('username'),
            'first_name' =>  $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        );

        $this->users_model->user_update($old_username, $post_data);

        // Update session data
        $sessionArr = $this->users_model->get_by_id($this->input->post('username'));
        $this->session->set_userdata('user', $sessionArr);
    }

    public function user_delete()
    {
        $username = $this->input->post('username');

        $this->users_model->user_delete($username);
    }


    // COMMENT api
    public function comment_get()
    {
        $comments = $this->comments_model->getAll();
        echo json_encode($comments);
    }

    public function comment_delete()
    {
        $cid = $this->input->post('id');
        $book_id = $this->input->post('book_id');
        // delete from comment and comment liking
        $this->comments_liking_model->delete_related_comment($book_id, $cid);
        $this->comments_model->delete_comment($book_id, $cid);
    }

    // COURSE api
    public function course_get()
    {
        $course = $this->course_model->getAll();
        echo json_encode($course);
    }

    public function course_get_by_id()
    {
        $course_id = $this->input->post('course_id');

        $file = base_url() . "assets/_etc/course_registered_keyword.json";
        $jsonString = file_get_contents($file);
        $courses = json_decode($jsonString, true);

        $keywords = array();
        foreach ($courses as $key => $course) {
            if ($key == $course_id) {
                $keywords[] = $course;
            }
        }
        echo json_encode($keywords);
    }

    public function course_update()
    {
        $course_id = $this->input->post('course_id');

        $post_data = array(
            'course_name_th' =>  $this->input->post('course_name_th'),
            'course_name_en' => $this->input->post('course_name_en'),
        );

        $this->course_model->course_update($course_id, $post_data);
    }

    public function course_update_json()
    {
        $course_id = $this->input->post('course_id');
        // Update file
        // print_r($_POST);

        if (!empty($this->input->post('addmore'))) {
            $file = base_url() . "assets/_etc/course_registered_keyword.json";

            $jsonString = file_get_contents($file);
            $data = json_decode($jsonString, true);
            $replacementData = $data;
            // reset keyword to get new one
            unset($replacementData[$course_id]);

            foreach ($this->input->post('addmore') as $post_key => $post_value) {
                if (!empty($post_value)) {
                    $replacementData[$course_id][$post_value] = "1";
                }
            }

            $file_document_root = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/_etc/course_registered_keyword.json";
            $newJsonString = json_encode($replacementData);
            $writable = (is_writable($file_document_root)) ? TRUE : chmod($file, 0777);
            if ($writable) {
                echo "writable";
                if (file_put_contents($file_document_root, $newJsonString, 2)) {
                    print_r($newJsonString);
                }
            } else {
                echo "unwritable " . $file_document_root;
            }
        }
    }

    public function course_delete()
    {
        $course_id = $this->input->post('course_id');
        // delete from keywords.json
        $this->course_model->course_delete($course_id);

        $file = base_url() . "assets/_etc/course_registered_keyword.json";

        $jsonString = file_get_contents($file);
        $data = json_decode($jsonString, true);
        $replacementData = $data;
        // reset keyword to get new one
        unset($replacementData[$course_id]);
        $file_document_root = ($_SERVER['DOCUMENT_ROOT']) . "/CodeIgProj_Recommender_system" . "/assets/_etc/course_registered_keyword.json";
        $newJsonString = json_encode($replacementData);
        $writable = (is_writable($file_document_root)) ? TRUE : chmod($file, 0777);
        if ($writable) {
            echo "writable";
            if (file_put_contents($file_document_root, $newJsonString, 2)) {
                print_r($newJsonString);
            }
        } else {
            echo "unwritable " . $file_document_root;
        }
    }

    public function isCourseIdExists()
    {
        $course_id = $this->input->post('course_id');
        $row = $this->course_model->get_course_by_id($course_id);

        if ($row != FALSE) {
            echo "true";
        }
    }

    public function course_insert()
    {
        $post_data = array(
            'course_id' => $this->input->post('course_id'),
            'course_name_th' =>  $this->input->post('course_name_th'),
            'course_name_en' => $this->input->post('course_name_en'),
        );

        $this->course_model->insert($post_data);
    }

    public function activity_view_page()
    {
        // all books data
        $data['category_list'] = $this->books_model->get_cateory_list();
        $header["title"] = "Dashboard";
        $data["api_url"] =  base_url() . "api/activity/get_dashboard_view";
        $data["main_title"] = "Viewed Activity";
        // active
        $header["dashboard"] = "active";
        $data_nav["isActivity_view"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/activity_page', $data);
        $this->load->view('footer');
    }

    public function get_dashboard_view()
    {
        // switch case by post data
        // week
        $arrLabels = array("6 Days ago", "5 Days ago", "4 Days ago", "3 Days ago", "2 Days ago", "Yesterday", "Today");
        $arrDatasets = array(
            array(
                'label' => "Bookid1",
                'fill' => 'false',
                // 'fillColor' => "rgba(220,220,220,0.2)",
                'borderColor' => "rgb(255, 99, 132)",
                'strokeColor' => "rgb(255, 99, 132)",
                'pointColor' => "rgb(255, 99, 132)",
                'data' => array('5', '8', '8', '9', '8', '16', '20')
            ),
            array(
                'label' => "Bookid2",
                'fill' => 'false',
                // 'fillColor' => "rgba(220,220,220,0.2)",
                'borderColor' => "rgb(54, 162, 235)",
                'strokeColor' => "rgb(54, 162, 235)",
                'pointColor' => "rgb(54, 162, 235)",
                'data' => array('10', '8', '7', '5', '10', '15', '16')
            ),
        );
        $arrReturn = array(array('labels' => $arrLabels, 'datasets' => $arrDatasets, 'type' => 'line',));


        // // month
        // $arrLabels = array("6 Months ago", "5 Months ago", "4 Months ago", "3 Months ago", "2 Months ago", "1 Month ago", "This month");
        // $arrDatasets = array(
        //     array(
        //         'label' => "Bookid1",
        //         'fill' => 'false',
        //         // 'fillColor' => "rgba(220,220,220,0.2)",
        //         'borderColor' => "rgb(255, 99, 132)",
        //         'strokeColor' => "rgb(255, 99, 132)",
        //         'pointColor' => "rgb(255, 99, 132)",
        //         'data' => array('5', '8', '8', '9', '8', '16', '20')
        //     ),
        //     array(
        //         'label' => "Bookid2",
        //         'fill' => 'false',
        //         // 'fillColor' => "rgba(220,220,220,0.2)",
        //         'borderColor' => "rgb(54, 162, 235)",
        //         'strokeColor' => "rgb(54, 162, 235)",
        //         'pointColor' => "rgb(54, 162, 235)",
        //         'data' => array('10', '8', '7', '5', '10', '15', '16')
        //     ),
        // );
        // $arrReturn = array(array('labels' => $arrLabels, 'datasets' => $arrDatasets, 'type' => 'line',));


        // // alltime
        // $arrLabels = array("book1", "book2", "book3", "book4", "book5", "book6", "book7");
        // $arrDatasets = array(
        //     array(
        //         'label' => "All time views",
        //         'fill' => 'false',
        //         'fillColor' => "rgb(255, 99, 132)",
        //         'borderColor' => "rgb(255, 99, 132)",
        //         'strokeColor' => "rgb(255, 99, 132)",
        //         'backgroundColor' => array(
        //             'rgb(255, 99, 132)',
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF)),
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF)),
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF)),
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF)),
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF)),
        //             sprintf('#%06X', mt_rand(0x000000, 0xFFFFFF))
        //         ),
        //         'pointColor' => "rgb(255, 99, 132)",
        //         'data' => array('100', '80', '70', '50', '40', '10', '5')
        //     ),
        // );
        // $arrReturn = array(array('labels' => $arrLabels, 'datasets' => $arrDatasets, 'type' => 'bar',));


        echo (json_encode($arrReturn[0]));
    }

    public function activity_search_page()
    {
        // all books data
        $data['category_list'] = $this->books_model->get_cateory_list();
        $header["title"] = "Dashboard";

        $header["dashboard"] = "active";
        // active
        $data["main_title"] = "Search Activity";
        $data_nav["isActivity_search"] = "active";

        $this->load->view('./header', $header);
        $this->load->view('dashboard/dashboard_sidenav', $data_nav);
        $this->load->view('dashboard/activity_page', $data);
        $this->load->view('footer');
    }
}
