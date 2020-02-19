<?php
require_once APPPATH . '/models/BaseModel.php';
class Activity_model extends BaseModel
{
    protected $table_view = 'activity_view';
    protected $table_search = 'activity_search';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_view($data)
    {
        $interval_time = 6;
        $sql = "SELECT * FROM `activity_view` WHERE username = ? AND book_id = ? AND date > DATE_SUB(NOW(), INTERVAL ? HOUR) order by view_id desc limit 1";
        $query = $this->db->query($sql, array($data["username"], $data["book_id"], $interval_time));
        if ($query->num_rows() == 0) {
            return $this->db->insert($this->table_view, $data);
        }
    }


    public function get_recently_view($username, $returnType)
    {
        $recently_count = 5;
        $sql = "SELECT *,count(book_id) as count FROM `activity_view` WHERE username = ? group by book_id order by view_id desc limit ?";
        $query = $this->db->query($sql, array($username, $recently_count));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function insert_search($data)
    {
        return $this->db->insert($this->table_search, $data);
    }

    public function get_recently_search($username, $returnType)
    {
        $recently_count = 5;
        $sql = "SELECT * FROM `activity_search` WHERE username = ? order by search_id desc limit ?";
        $query = $this->db->query($sql, array($username, $recently_count));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }
}
