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
            $i = 0;
            $sql_count = "SELECT COUNT(book_id) as count FROM `saved_book` where username = ? and collection_name = ?";
            foreach ($query->result_array() as $row) {
                $query2 = $this->db->query($sql_count, array($username, $row["collection_name"]));
                $count_result = $query2->row();
                $array[$i]["collection_name"] = $row["collection_name"];
                $array[$i]["count_this_collection"] = $count_result->count;
                $i++;
                echo $count_result;
            }
            return $array;
        } else {
            return FALSE;
        }
    }

    public function get_collection_book_in($username, $book_id)
    {
        $sql = "SELECT collection_name FROM `saved_book` where username = ? AND book_id = ?";
        $query = $this->db->query($sql, array($username, $book_id));
        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->row()), True);
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
        $insert = $this->db->insert("saved_book_collection", $data);
        if (!$insert && $this->db->_error_number() == 1062) {
            //some logics here, you may create some string here to alert user
            return true;
        } else {
            return false;
        }
    }

    public function get_collection_by_id($collection_name, $username)
    {
        $this->db->select('*');
        $this->db->from("saved_book_collection");
        $this->db->where('collection_name', $collection_name);
        $this->db->where('username', $username);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit_collection_name($collection_name, $old_collection_name, $username)
    {
        $this->db->where('collection_name', $old_collection_name);
        $this->db->where('username', $username);
        $this->db->set('collection_name', "'" . $collection_name . "'", FALSE);
        $this->db->update("saved_book_collection");

        $sql_update_collection_name = "SELECT * FROM `saved_book` where username = ? AND collection_name = ?";
        $query = $this->db->query($sql_update_collection_name, array($username, $old_collection_name));
        if ($query->num_rows() > 0) {
            $sql_update_each_row = "UPDATE `saved_book` SET `collection_name` = ? 
            WHERE `saved_book`.`book_id` = ? 
            AND `saved_book`.`username` = ?";
            foreach ($query->result_array() as $row) {
                $query = $this->db->query($sql_update_each_row, array($collection_name, $row["book_id"], $username));
            }
        }
    }

    public function delete_collection_by_id($collection_name, $username)
    {
        $this->db->where('collection_name', $collection_name);
        $this->db->where('username', $username);
        $this->db->delete("saved_book_collection");

        $sql_delete_collection_name = "SELECT * FROM `saved_book` where username = ? AND collection_name = ?";
        $query = $this->db->query($sql_delete_collection_name, array($username, $collection_name));
        if ($query->num_rows() > 0) {
            $sql_delete_each_row = "DELETE FROM `saved_book`
            WHERE `saved_book`.`book_id` = ? 
            AND `saved_book`.`username` = ?";
            foreach ($query->result_array() as $row) {
                $query = $this->db->query($sql_delete_each_row, array($row["book_id"], $username));
            }
        }
    }

    public function remove_from_collection($book_id, $username)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->set('collection_name', 'none');
        $this->db->update("saved_book");
    }
}
