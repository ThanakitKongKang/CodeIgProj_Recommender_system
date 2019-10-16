<?php
require_once APPPATH . '/models/BaseModel.php';
class Course_model extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_course_registered($username)
    {
        $sql = "SELECT * FROM registered_course,course
        WHERE username = ? 
        AND registered_course.course_id = course.course_id 
        order by date DESC";

        $query = $this->db->query($sql, array($username));

        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function select_search_course($typing, $mode)
    {
        $this->db->select('*');
        $this->db->distinct();
        $this->db->from("course");
        $this->db->like('course_id', $typing, 'both');
        $this->db->or_like('course_name_th', $typing, 'both');
        $this->db->or_like('course_name_en', $typing, 'both');
        $this->db->limit(20);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            if ($mode == "rows") {
                $i = 0;
                foreach ($query->result_array() as $row) {
                    $final_search_result[$i]["id"] = $i;
                    $final_search_result[$i]["course_id"] = $row["course_id"];
                    $final_search_result[$i]["course_name_th"] = $row["course_name_th"];
                    $final_search_result[$i]["course_name_en"] = $row["course_name_en"];
                    $i++;
                }
                return $final_search_result;
            } else if ($mode == "count") {
                return $query->num_rows();
            }
        } else {
            return FALSE;
        }
    }
}
