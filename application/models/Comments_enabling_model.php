<?php
require_once APPPATH . '/models/BaseModel.php';
class Comments_enabling_model extends BaseModel
{
    protected $table = 'comment_enabling';
    public function __construct()
    {
        parent::__construct();
    }
    public function isEnabled($book_id)
    {
        $this->db->where('book_id', $book_id);
        $this->db->select('*');
        $this->db->from($this->table);

        $query = $this->db->get();
        $array = json_decode(json_encode($query->row()), True);
        if ($array["status"] == "0") {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function toggle($book_id, $isChecked)
    {
        $this->db->where('book_id', $book_id);
        $this->db->set('status', $isChecked);
        $this->db->update($this->table);
    }

    public function isExists($book_id)
    {
        $this->db->where('book_id', $book_id);
        $this->db->select('*');
        $this->db->from($this->table);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
