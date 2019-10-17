<?php
require_once APPPATH . '/models/BaseModel.php';
class Registered_course_model extends BaseModel
{
    protected $table = 'registered_course';
    public function __construct()
    {
        parent::__construct();
    }

    public function delete_registered_course($where)
    {
        $this->db->where($where);
        $this->db->delete($this->table);
    }
}
