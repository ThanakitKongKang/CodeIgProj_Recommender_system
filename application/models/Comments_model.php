<?php
require_once APPPATH . '/models/BaseModel.php';
class Comments_model extends BaseModel
{
    protected $table = 'comment';
    public function __construct()
    {
        parent::__construct();
    }
    public function get_comments_of_book($bookid)
    {
        $this->db->where('book_id', $bookid);
        $this->db->select('id,created,content,fullname,upvote_count');
        $this->db->from($this->table);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }
}
