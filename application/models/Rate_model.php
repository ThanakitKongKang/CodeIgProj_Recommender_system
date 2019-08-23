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
}
