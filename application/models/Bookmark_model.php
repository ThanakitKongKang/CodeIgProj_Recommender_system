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

    public function get_saved_list($username, $returnType)
    {

        $sql = "SELECT * FROM `saved_book`,book WHERE username = ? AND book.book_id = saved_book.book_id";
        $query = $this->db->query($sql, array($username));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows")
            return $array;
        else if ($returnType == "count")
            return $query->num_rows();
    }

    public function get_saved_list_dynamic($username, $limit, $start, $returnType, $collection_get)
    {
        if (!empty($collection_get)) {
            $sql = "SELECT * FROM `saved_book`,book 
        WHERE username = ? 
        AND book.book_id = saved_book.book_id 
        AND saved_book.collection_name = ?
        ORDER BY saved_book.date DESC LIMIT ?, ? ";

            if ($returnType == "rows") {
                $query = $this->db->query($sql, array($username, $collection_get, $start, $limit));
                if ($query->num_rows() > 0) {
                    $array = json_decode(json_encode($query->result()), True);
                    return $array;
                } else {
                    return FALSE;
                }
            } else if ($returnType == "count") {
                $query = $this->db->query($sql, array($username, $collection_get, $start, $limit));
                return $query->num_rows();
            }
        } else {
            $sql = "SELECT * FROM `saved_book`,book 
            WHERE username = ? 
            AND book.book_id = saved_book.book_id 
            ORDER BY saved_book.date DESC LIMIT ?, ? ";

            if ($returnType == "rows") {
                $query = $this->db->query($sql, array($username, $start, $limit));
                if ($query->num_rows() > 0) {
                    $array = json_decode(json_encode($query->result()), True);
                    return $array;
                } else {
                    return FALSE;
                }
            } else if ($returnType == "count") {
                $query = $this->db->query($sql, array($username, $start, $limit));
                return $query->num_rows();
            }
        }
    }

    public function get_saved_list_all_num_rows($username, $collection_get)
    {
        if (!empty($collection_get)) {
            $sql = "SELECT * FROM `saved_book`,book 
        WHERE username = ? 
        AND book.book_id = saved_book.book_id 
        AND saved_book.collection_name = ?";

            $query = $this->db->query($sql, array($username, $collection_get));
            return $query->num_rows();
        } else {
            $sql = "SELECT * FROM `saved_book`,book 
            WHERE username = ? 
            AND book.book_id = saved_book.book_id";

            $query = $this->db->query($sql, array($username));
            return $query->num_rows();
        }
    }

    public function get_collection_by_username($username)
    {
        $sql = "SELECT collection_name FROM `saved_book_collection` where username = ?";
        $query = $this->db->query($sql, array($username));
        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function add_to_collection($username, $collection_name, $book_id)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->set('collection_name', "'" . $collection_name . "'", FALSE);
        $this->db->update($this->table);
    }

    public function create_collection($data)
    {
        return $this->db->insert("saved_book_collection", $data);
    }
}
