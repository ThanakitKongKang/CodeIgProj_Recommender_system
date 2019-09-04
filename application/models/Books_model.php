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

    public function get_by_name($name)
    {
        $this->db->where('book_name', $name);
        $this->db->select('*');
        $this->db->from('book');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id($id)
    {
        $this->db->where('book_id', $id);
        $this->db->select('*');
        $this->db->from('book');
        $query = $this->db->get();
        $array = json_decode(json_encode($query->row()), True);
        return $array;
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
        $this->db->limit(48);
        $this->db->select('*');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function update_book_rate($book_id, $rate)
    {
        $sql = "SELECT ROUND(SUM(rate)/COUNT(book_id),2) as avg FROM rate WHERE book_id = ?";
        $query = $this->db->query($sql, array($book_id));


        if ($query->num_rows() == 1) {
            $array = json_decode(json_encode($query->row()), True);
            $this->db->where('book_id', $book_id);
            $this->db->set('b_rate', $array['avg'], FALSE);
        } else {
            $this->db->where('book_id', $book_id);
            $this->db->set('b_rate', $rate, FALSE);
        }

        $this->db->where('book_id', $book_id);
        $this->db->set('count_rate', 'count_rate+1', FALSE);
        $this->db->update($this->table);

        return $array = json_decode(json_encode($query->row()), True);
    }

    public function update_book_rate_exists($book_id)
    {
        $sql = "SELECT ROUND(SUM(rate)/COUNT(book_id),2) as avg FROM rate WHERE book_id = ?";
        $query = $this->db->query($sql, array($book_id));
        $array = json_decode(json_encode($query->row()), True);
        $this->db->where('book_id', $book_id);
        $this->db->set('b_rate', $array['avg'], FALSE);

        $this->db->update($this->table);

        return $array = json_decode(json_encode($query->row()), True);
    }
}
