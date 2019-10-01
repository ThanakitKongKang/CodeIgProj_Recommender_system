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

    public function search_books($limit, $start, $query, $sort_rate, $category, $author)
    {
        $start = ($start == 0) ? 0 : ($limit * ($start - 1));
        $this->db->like('book_name', $query, 'both');

        if (!empty($sort_rate)) {
            $this->db->order_by('b_rate', $sort_rate);
        }
        if (!empty($category)) {
            if ($category != "all")
                $this->db->where('book_type', $category);
        }
        if (!empty($author)) {
            $this->db->where('author', $author);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function search_books_get_count($query, $sort_rate, $category, $author)
    {
        $this->db->like('book_name', $query, 'both');

        if (!empty($sort_rate)) {
            $this->db->order_by('b_rate', $sort_rate);
        }
        if (!empty($category)) {
            if ($category != "all")
                $this->db->where('book_type', $category);
        }
        if (!empty($author)) {
            $this->db->where('author', $author);
        }
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function search_books_get_author($query, $sort_rate, $category)
    {
        $this->db->select('author');
        $this->db->distinct();
        $this->db->like('book_name', $query, 'both');

        if (!empty($sort_rate)) {
            $this->db->order_by('b_rate', $sort_rate);
        }
        if (!empty($category)) {
            if ($category != "all")
                $this->db->where('book_type', $category);
        }
        $query = $this->db->get($this->table);

        return $query->result();
    }
    public function search_books_get_category($query, $sort_rate)
    {
        $this->db->select('book_type');
        $this->db->distinct();
        $this->db->like('book_name', $query, 'both');

        if (!empty($sort_rate)) {
            $this->db->order_by('b_rate', $sort_rate);
        }
        $query = $this->db->get($this->table);

        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    public function search_live_soundex($typing)
    {

        $sql = "SELECT book_name FROM book WHERE soundex_match(?, book_name, ' ') LIMIT 10";
        $query = $this->db->query($sql, array($typing));

        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function search_live_not_soundex($typing)
    {
        $this->db->like('book_name', $typing, 'both');
        $this->db->limit(10);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $array = json_decode(json_encode($query->result()), True);
            return $array;
        } else {
            return FALSE;
        }
    }

    public function get_name_all()
    {
        $this->db->select('book_name');
        $this->db->from('book');
        $query = $this->db->get();
        $array = json_decode(json_encode($query->result()), True);
        return $array;
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

        $sql = "SELECT (count(book_id)/count(DISTINCT book_id)) as avg_num_votes,
        SUM(rate)/COUNT(book_id) as avg_rating,
        (SELECT COUNT(book_id) FROM rate WHERE book_id = ?) as this_num_votes,
        (SELECT ROUND(SUM(rate)/COUNT(book_id),2) FROM rate WHERE book_id = ?) as this_rating  
        FROM `rate`";
        $query = $this->db->query($sql, array($book_id, $book_id));

        $this->db->where('book_id', $book_id);

        if ($query->num_rows() == 1) {
            $array = json_decode(json_encode($query->row()), True);
            $bayesian_average = (($array['avg_num_votes'] * $array['avg_rating']) + ($array['this_num_votes'] * $array['this_rating'])) / ($array['avg_num_votes'] + $array['this_num_votes']);

            $this->db->set('b_rate', $bayesian_average, FALSE);
        } else {
            $this->db->set('b_rate', $rate, FALSE);
        }


        $this->db->set('count_rate', 'count_rate+1', FALSE);
        $this->db->update($this->table);

        $this->update_all_books_bayesian_rate();

        return $bayesian_average;
    }

    public function update_book_rate_exists($book_id)
    {
        $sql = "SELECT (count(book_id)/count(DISTINCT book_id)) as avg_num_votes,
        SUM(rate)/COUNT(book_id) as avg_rating,
        (SELECT COUNT(book_id) FROM rate WHERE book_id = ?) as this_num_votes,
        (SELECT ROUND(SUM(rate)/COUNT(book_id),2) FROM rate WHERE book_id = ?) as this_rating  
        FROM `rate`";
        $query = $this->db->query($sql, array($book_id, $book_id));
        $array = json_decode(json_encode($query->row()), True);
        $bayesian_average = (($array['avg_num_votes'] * $array['avg_rating']) + ($array['this_num_votes'] * $array['this_rating'])) / ($array['avg_num_votes'] + $array['this_num_votes']);

        $this->update_all_books_bayesian_rate();

        return $bayesian_average;
    }

    function update_all_books_bayesian_rate()
    {
        // update all each book that rated
        $sql = "SELECT DISTINCT book_id FROM `rate`";
        $query = $this->db->query($sql);
        $books_id = json_decode(json_encode($query->row()), True);

        foreach ($books_id as $book_id) {
            $sql = "SELECT (count(book_id)/count(DISTINCT book_id)) as avg_num_votes,
            SUM(rate)/COUNT(book_id) as avg_rating,
            (SELECT COUNT(book_id) FROM rate WHERE book_id = ?) as this_num_votes,
            (SELECT ROUND(SUM(rate)/COUNT(book_id),2) FROM rate WHERE book_id = ?) as this_rating  
            FROM `rate`";
            $query = $this->db->query($sql, array($book_id, $book_id));
            $array = json_decode(json_encode($query->row()), True);
            $bayesian_average = (($array['avg_num_votes'] * $array['avg_rating']) + ($array['this_num_votes'] * $array['this_rating'])) / ($array['avg_num_votes'] + $array['this_num_votes']);
            $this->db->where('book_id', $book_id);
            $this->db->set('b_rate', $bayesian_average, FALSE);
            $this->db->update($this->table);
        }
    }

    // random strategy
    public function get_random_book($limit, $book_names)
    {
        $this->db->select('book_name');
        $this->db->from('book');
        if (!empty($book_names)) {
            $this->db->where_not_in('book_name', $book_names);
        }

        $this->db->order_by('bookd_id', 'RANDOM');
        $this->db->limit($limit);
        $query = $this->db->get();
        $array = json_decode(json_encode($query->result()), True);
        return $array;
    }

    // browse
    public function get_content_list_dynamic($limit, $start, $returnType, $category)
    {
        if ($category == "all")
            $sql = "SELECT * FROM `book` ORDER BY book_id DESC LIMIT ?, ?";
        else if ($category != "all")
            $sql = "SELECT * FROM `book` WHERE book_type = ? ORDER BY book_id DESC  LIMIT ?, ?";


        if ($category == "all")
            $query = $this->db->query($sql, array($start, $limit));
        else if ($category != "all")
            $query = $this->db->query($sql, array($category, $start, $limit));

        if ($returnType == "rows") {
            if ($query->num_rows() > 0) {
                $array = json_decode(json_encode($query->result()), True);
                return $array;
            } else {
                return FALSE;
            }
        } else if ($returnType == "count") {
            return $query->num_rows();
        }
    }

    // browse
    public function get_all_num_rows_by_category($category)
    {
        if ($category == "all")
            $sql = "SELECT * FROM `book` ORDER BY book_id DESC";
        else if ($category != "all")
            $sql = "SELECT * FROM `book` WHERE book_type = ? ORDER BY book_id DESC";

        if ($category == "all")
            $query = $this->db->query($sql);
        else if ($category != "all")
            $query = $this->db->query($sql, array($category));

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }

    // bayesian average
    public function bayesianAVG($book_id)
    {
        $sql = "SELECT (count(book_id)/count(DISTINCT book_id)) as avg_num_votes,
            SUM(rate)/COUNT(book_id) as avg_rating,
            (SELECT COUNT(book_id) FROM rate WHERE book_id = ?) as this_num_votes,
            (SELECT ROUND(SUM(rate)/COUNT(book_id),2) FROM rate WHERE book_id = ?) as this_rating  
            FROM `rate`";
        $query = $this->db->query($sql, array($book_id, $book_id));
        $array = json_decode(json_encode($query->row()), True);
        $bayesian_average = (($array['avg_num_votes'] * $array['avg_rating']) + ($array['this_num_votes'] * $array['this_rating'])) / ($array['avg_num_votes'] + $array['this_num_votes']);

        $this->db->where('book_id', $book_id);
        $this->db->set('b_rate', $bayesian_average, FALSE);

        $this->db->update($this->table);

        return $bayesian_average;
    }
}
