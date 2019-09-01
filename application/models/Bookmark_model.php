<?php
require_once APPPATH . '/models/BaseModel.php';
class Bookmark_model extends BaseModel
{

    protected $table = 'saved_book';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_if_user_bookmarked($book_id, $username)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->limit(1);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function removeBookmark($book_id, $username)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->delete($this->table);
    }

}
