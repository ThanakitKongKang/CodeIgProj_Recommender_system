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


    public function get_recently_view($username, $recently_count, $returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as count FROM `activity_view`,book WHERE username = ? AND activity_view.book_id=book.book_id group by activity_view.book_id order by view_id desc limit ?";
        $query = $this->db->query($sql, array($username, $recently_count));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_view_log($returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as count FROM `activity_view`,book WHERE activity_view.book_id=book.book_id group by activity_view.book_id order by view_id desc";
        $query = $this->db->query($sql);
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_search_log($returnType)
    {
        $sql = "SELECT * FROM `activity_search` order by search_id desc";
        $query = $this->db->query($sql);
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

    public function get_recently_for_livesearch($username, $returnType)
    {
        $recently_count = 5;
        $sql = "SELECT DISTINCT search_keyword,username FROM `activity_search` WHERE username = ? order by search_id desc limit ?";
        $query = $this->db->query($sql, array($username, $recently_count));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_popular_view($interval, $limit, $returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as viewed_count FROM `activity_view`,book WHERE activity_view.book_id = book.book_id AND date >= NOW() - INTERVAL ? DAY group by activity_view.book_id ORDER BY `viewed_count`  DESC LIMIT ?";
        $query = $this->db->query($sql, array($interval, $limit));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_popular_view_month($interval, $returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as viewed_count FROM `activity_view`,book WHERE activity_view.book_id = book.book_id AND date >= NOW() - INTERVAL ? DAY group by activity_view.book_id ORDER BY `viewed_count`  DESC LIMIT 10";
        $query = $this->db->query($sql, array($interval));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_popular_view_alltime($returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as viewed_count FROM `activity_view`,book WHERE activity_view.book_id = book.book_id group by activity_view.book_id ORDER BY `viewed_count`  DESC LIMIT 10";
        $query = $this->db->query($sql);
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_views_by_id_day($book_id, $interval, $returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as viewed_count 
        FROM `activity_view`,book 
        WHERE activity_view.book_id = book.book_id 
        AND activity_view.book_id = ?
        AND date(date) = CURDATE()-? 
        group by activity_view.book_id 
        ORDER BY `viewed_count` DESC";
        $query = $this->db->query($sql, array($book_id, $interval));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_views_by_id_month($book_id, $interval, $returnType)
    {
        $sql = "SELECT *,count(activity_view.book_id) as viewed_count 
        FROM `activity_view`,book 
        WHERE activity_view.book_id = book.book_id 
        AND activity_view.book_id = ?
        AND MONTH(date) = MONTH(CURDATE())-?
		AND YEAR(date) = YEAR(CURRENT_DATE())
        group by activity_view.book_id 
        ORDER BY `viewed_count` DESC";
        $query = $this->db->query($sql, array($book_id, $interval));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_popular_search($interval, $returnType)
    {
        if (isset($interval)) {
            $sql = "SELECT *,count(activity_search.search_keyword) as search_count FROM `activity_search` WHERE date >= NOW() - INTERVAL ? DAY group by activity_search.search_keyword ORDER BY `search_count`  DESC LIMIT 10";
            $query = $this->db->query($sql, array($interval));
        } else {
            $sql = "SELECT *,count(activity_search.search_keyword) as search_count FROM `activity_search` group by activity_search.search_keyword ORDER BY `search_count`  DESC LIMIT 10";
            $query = $this->db->query($sql);
        }
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_search_by_kw_day($interval, $keyword, $returnType)
    {
        $sql = "SELECT *,count(activity_search.search_keyword) as search_count 
        FROM `activity_search`
        WHERE date(date) = CURDATE()-? 
        AND search_keyword = ?
        group by activity_search.search_keyword 
        ORDER BY `search_count` DESC";
        $query = $this->db->query($sql, array($interval, $keyword));
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    public function get_popular_search_alltime($returnType)
    {
        $sql = "SELECT *,count(activity_search.search_keyword) as search_count FROM `activity_search` group by activity_search.search_keyword ORDER BY `search_count`  DESC LIMIT 10";
        $query = $this->db->query($sql);
        $array = json_decode(json_encode($query->result()), True);
        if ($returnType == "rows") {
            return $array;
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }
}
