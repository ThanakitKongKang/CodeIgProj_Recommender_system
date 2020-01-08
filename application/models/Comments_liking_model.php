<?php
require_once APPPATH . '/models/BaseModel.php';
class Comments_liking_model extends BaseModel
{
    protected $table = 'comment_liking';
    public function __construct()
    {
        parent::__construct();
    }
    public function isUserLiked($book_id, $comment_id, $username)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('comment_id', $comment_id);
        $this->db->where('username', $username);
        $this->db->select('*');
        $this->db->from($this->table);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_related_comment($book_id, $comment_id)
    {
        $this->db->where('id', $comment_id);
        $this->db->where('book_id', $book_id);
        $this->db->select('upvote_count');
        $this->db->from("comment");

        $query = $this->db->get();
        $count = $query->row()->upvote_count;

        for ($i = 0; $i < $count; $i++) {
            $this->db->where('comment_id', $comment_id);
            $this->db->where('book_id', $book_id);
            $this->db->delete($this->table);
        }

        return $count;
    }

    public function remove_upvote($book_id, $comment_id, $username)
    {
        $this->db->where('comment_id', $comment_id);
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->delete($this->table);
    }
}
