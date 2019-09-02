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

    public function get_saved_list($username)
    {
        $sql = "SELECT * FROM `saved_book`,book WHERE username = ? AND book.book_id = saved_book.book_id";
        $query = $this->db->query($sql, array($username));
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function get_saved_list_dynamic($limit, $start)
    {
        $start = ($start == 0) ? 0 : ($limit * ($start - 1));
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }
}
