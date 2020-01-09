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
        $this->db->where('status', TRUE);
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
