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
}
