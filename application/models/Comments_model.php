<?php
require_once APPPATH . '/models/BaseModel.php';
class Comments_model extends BaseModel
{
    protected $table = 'comment';
    public function __construct()
    {
        parent::__construct();
    }
    public function get_comments_of_book($bookid)
    {

        $this->db->where('book_id', $bookid);
        $this->db->select('id,created,modified,content,fullname,upvote_count');
        $this->db->from($this->table);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function delete_comment($book_id, $comment_id)
    {
        $this->db->where('id', $comment_id);
        $this->db->where('book_id', $book_id);
        $this->db->delete($this->table);
    }

    public function update_upvote_count($book_id, $comment_id, $upvote_count)
    {
        $this->db->where('id', $comment_id);
        $this->db->where('book_id', $book_id);
        // false = escape parameter
        $this->db->set('upvote_count', $upvote_count, FALSE);
        $this->db->update($this->table);
    }

    public function update($comment_id, $book_id, $content, $modified)
    {
        $this->db->where('id', $comment_id);
        $this->db->where('book_id', $book_id);
        $this->db->set('modified', $modified);
        $this->db->set('content', $content);
        $this->db->update($this->table);
    }
}
