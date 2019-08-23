<?php
require_once APPPATH.'/models/BaseModel.php';
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

    public function getPaper($paperID)
    {
        $this->db->select(' title ');
        $this->db->from($this->table);
        $this->db->where('ID', $paperID);
        $this->db->limit(1);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return $qry->result();
        } else {
            return FALSE;
        }
    }
}
