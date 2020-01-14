<?php
require_once APPPATH . '/models/BaseModel.php';
class Users_model extends BaseModel
{

    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        $this->db->limit(1);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return $qry->result();
        } else {
            return FALSE;
        }
    }

    public function check_exist($username)
    {
        $this->db->select('username');
        $this->db->from($this->table);
        $this->db->where('Username', $username);
        $this->db->limit(1);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return $qry->result();
        } else {
            return FALSE;
        }
    }

    public function get_by_id($id)
    {
        $this->db->where('username', $id);
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->row()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function getAll()
    {
        $this->db->select('*');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function user_update($old_username, $data)
    {
        $this->db->where('username', $old_username);
        $this->db->update($this->table, $data);
    }

    public function user_delete($username)
    {
        // delete in user, 3 comments, rate, saved_book
        $this->db->trans_begin();

        $this->db->where('username', $username);
        $this->db->delete($this->table);

        $this->db->where('fullname', $username);
        $this->db->delete("comment");

        $this->db->where('username', $username);
        $this->db->delete('comment_liking');

        $this->db->where('username', $username);
        $this->db->delete('rate');

        $this->db->where('username', $username);
        $this->db->delete('registered_course');

        $this->db->where('username', $username);
        $this->db->delete('saved_book');

        $this->db->where('username', $username);
        $this->db->delete('saved_book_collection');

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }
}
