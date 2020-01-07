<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CommentsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('comments_model');
        $this->load->model('comments_liking_model');
    }
    public function get()
    {
        $bookid = $this->input->get('book_id');
        $commentsArray = $this->comments_model->get_comments_of_book($bookid);
        
        // {
        //     "id": 3,
        //     "parent": null,
        //     "created": "2015-01-03",
        //     "modified": "2015-01-03",
        //     "content": "@Hank Smith sed posuere interdum sem.\nQuisque ligula eros ullamcorper https://www.google.com/ quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget #velit.",
        //     "pings": [3],
        //     "creator": 1,
        //     "fullname": "You",
        //     "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
        //     "created_by_admin": false,
        //     "created_by_current_user": true,
        //     "upvote_count": 2,
        //     "user_has_upvoted": true,
        //     "is_new": false
        //  },

        // assign created by current user and isAdmin to array
        $username = $this->session->userdata('user')['username'];
        $i = 0;
        foreach ($commentsArray as $sub_cm) {
            $commentsArray[$i]["creator"] = $sub_cm["fullname"];
            $commentsArray[$i]["created_by_current_user"] = false;
            $commentsArray[$i]["created_by_admin"] = false;

            // is current user
            if ($sub_cm["fullname"] ==  $username) {
                $commentsArray[$i]["created_by_current_user"] = true;
            }
            // is admin
            if ($sub_cm["fullname"] ==  "admin") {
                $commentsArray[$i]["created_by_admin"] = true;
            }
            // is liked by current user
            

            $i++;
        }

        if ($commentsArray == FALSE) {
            echo "nocm";
        } else {
            echo json_encode($commentsArray);
        }
    }
    public function post()
    {
        $username = $this->session->userdata('user')['username'];
        $post_data = array(
            'id' => $this->input->post('id'),
            'book_id' => $this->input->post('book_id'),
            'created' => date('Y-m-d H:i:s'),
            'content' => $this->input->post('content'),
            'upvote_count' => 0,
            'fullname' => $username,
        );
        $this->comments_model->insert($post_data);
        echo json_encode($post_data);
    }

    public function delete()
    {
    }
    public function upvote()
    {
    }
}
