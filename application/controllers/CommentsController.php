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
        $this->load->model('comments_enabling_model');
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
        // var usersArray = [
        //     {
        //        id: 1,
        //        fullname: "Current User",
        //        email: "current.user@viima.com",
        //        profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
        //     },
        //  ]

        // assign created by current user and isAdmin to array
        $username = $this->session->userdata('user')['username'];
        $i = 0;
        foreach ($commentsArray  as $key => $sub_cm) {
            $commentsArray[$i]["creator"] = $sub_cm["fullname"];
            $commentsArray[$i]["created_by_current_user"] = false;
            $commentsArray[$i]["created_by_admin"] = false;
            $commentsArray[$i]["user_has_upvoted"] = false;

            // is current user
            if ($sub_cm["fullname"] ==  $username) {
                $commentsArray[$i]["created_by_current_user"] = true;
            }
            // is admin
            if ($sub_cm["fullname"] ==  "admin") {
                $commentsArray[$i]["created_by_admin"] = true;
            }
            // is liked by current user
            if ($this->comments_liking_model->isUserLiked($bookid, $sub_cm["id"], $username)) {
                $commentsArray[$i]["user_has_upvoted"] = true;
            }


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
        $date = date('Y-m-d H:i:s');
        $post_data = array(
            // 'id' => $this->input->post('id'),
            'book_id' => $this->input->post('book_id'),
            'created' => $date,
            'modified' => $date,
            'content' => $this->input->post('content'),
            'upvote_count' => 0,
            'fullname' => $username,
        );
        $this->comments_model->insert($post_data);
        echo json_encode($post_data);
    }

    public function delete()
    {
        $cid = $this->input->post('id');
        $book_id = $this->input->post('book_id');
        // delete from comment and comment liking
        $this->comments_liking_model->delete_related_comment($book_id, $cid);
        $this->comments_model->delete_comment($book_id, $cid);
    }

    public function upvote()
    {
        $cid = $this->input->post('id');
        $book_id = $this->input->post('book_id');
        $username = $this->session->userdata('user')['username'];
        $upvote_count = $this->input->post('upvote_count');
        // update upvote_count in comment to $upvote_count
        $this->comments_model->update_upvote_count($book_id, $cid, $upvote_count);
        // insert $cid $book_id $username to comment_liking 
        if ($this->comments_liking_model->isUserLiked($book_id, $cid, $username)) {
            $this->comments_liking_model->remove_upvote($book_id, $cid, $username);
        } else {
            $post_data = array(
                'comment_id' => $cid,
                'book_id' =>  $book_id,
                'username' => $username,
            );
            $this->comments_liking_model->insert($post_data);
        }
        echo $upvote_count;
    }

    public function edit()
    {
        $cid = $this->input->post('id');
        $book_id = $this->input->post('book_id');
        $content = $this->input->post('content');
        $modified = date('Y-m-d H:i:s');

        $this->comments_model->update($cid, $book_id, $content, $modified);
        echo $cid;
        echo $book_id;
        echo $content;
    }
}
