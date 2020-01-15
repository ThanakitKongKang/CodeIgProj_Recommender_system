<?php
require_once APPPATH . '/models/BaseModel.php';
class Course_model extends BaseModel
{
    protected $table = 'course';
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('*');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function get_course_by_id($course_id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('course_id', $course_id);
        $this->db->limit(1);

        $qry =  $this->db->get();
        if ($qry->num_rows() == 1) {
            return $qry->result();
        } else {
            return FALSE;
        }
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
        $sql = "SELECT DISTINCT * 
        FROM `course` 
        where course.course_id 
        NOT IN (SELECT course_id from registered_course where username = ?) 
        AND (course.course_id like ?
        OR course.course_name_th like ?
        OR course.course_name_en like ?)
        limit 20";

        $username = $this->session->userdata('user')['username'];
        $query = $this->db->query($sql, array($username, '%' . $typing . '%', '%' . $typing . '%', '%' . $typing . '%'));

        if ($query->num_rows() > 0) {
            if ($mode == "rows") {
                $i = 0;
                foreach ($query->result_array() as $row) {
                    $final_search_result[$i]["id"] = $row["course_id"];
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

    public function course_update($course_id, $data)
    {
        $this->db->where('course_id', $course_id);
        $this->db->update($this->table, $data);
    }

    public function course_delete($course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->delete($this->table);
    }
}
