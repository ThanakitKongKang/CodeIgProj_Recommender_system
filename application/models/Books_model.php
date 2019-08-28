<?php
require_once APPPATH . '/models/BaseModel.php';
class Books_model extends BaseModel
{

    protected $table = 'book';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    public function get_books($limit, $start)
    {
        $start = ($start == 0) ? 0 : ($limit * ($start - 1));
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    //to be continued
    public function get_by_id($name)
    {
        $this->db->where('book_name', $name);
        $this->db->select('*');
        $this->db->from('book');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_top_rated()
    {
        $this->db->order_by('b_rate', 'DESC');
        return $this->db->get($this->table)
            ->result();
    }
}
