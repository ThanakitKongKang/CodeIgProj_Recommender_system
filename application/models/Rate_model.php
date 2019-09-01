<?php
require_once APPPATH . '/models/BaseModel.php';
class Rate_model extends BaseModel
{

    protected $table = 'rate';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    public function get_rate()
    {
        $this->db->select('book.book_name,rate.username,rate.rate');
        $this->db->from('rate');
        $this->db->join('book', 'rate.book_id = book.book_id');
        $query = $this->db->get();
        $query->result();
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function get_rate_by_username($username)
    {
        $this->db->select('book.book_name');
        $this->db->from('rate');
        $this->db->join('book', 'rate.book_id = book.book_id');
        $this->db->where('username', $username);
        $this->db->order_by('rate', 'DESC');
        $query = $this->db->get();
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function get_rate_user_book($username, $book_id)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $array = json_decode(json_encode($query->row()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function update_rate($book_id, $username, $rate)
    {
        $this->db->where('book_id', $book_id);
        $this->db->where('username', $username);
        $this->db->set('rate', $rate, FALSE);
        $this->db->update($this->table);
    }
}
