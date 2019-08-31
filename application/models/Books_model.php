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
        $this->db->limit(20);
        $query = $this->db->get($this->table);
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function get_cateory_list()
    {
        $this->db->select('book_type');
        $this->db->distinct();
        $query = $this->db->get($this->table);
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function get_by_category()
    {
        $category = $this->input->post('category');
        $this->db->where('book_type', $category);
        $this->db->select('*');
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
