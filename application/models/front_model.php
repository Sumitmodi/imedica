<?php

class Front_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->db) || !is_object($this->db)) {
            $this->db = $this->load->database('default', true);
        }
    }

    function prepare_where($where)
    {
        if (is_array($where) && count($where) > 0) {
            foreach ($where as $column => $value) {
                $this->db->where($column, $value);
            }
        } elseif (is_string($where)) {
            $this->db->where($where);
        }

    }


    function prepare_order_by($order_by)
    {
        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $column => $value) {
                $this->db->order_by($column, $value);
            }
        } elseif (is_string($order_by)) {
            $this->db->order_by($order_by);
        }

    }


    function table_fetch_rows($table, $where = array(), $order_by = array())
    {
        $this->db->select('*');
        $this->db->from($table);

        $this->prepare_where($where);
        $this->prepare_order_by($order_by);

        $query = $this->db->get();
        return $query->result();
    }

    public function record_count($page)
    {
        $r = $this->db->count_all($page);
        //$rows = ceil($r/5);
        return $r;
    }

    function sliders()
    {
        $query = $this->db->select('*')->from('slider')->where('status', '1')->order_by('position', 'asc')->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        return $query->result_array();
    }

    function faq()
    {
        $this->db->select('*')->from('faq');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        return $query->result_array();
    }

    function blogs($url = null, $limit = null, $offset = null)
    {
        if ($url == null) {
            $this->db->select('blogs.*, author.title as author_name,author.post,url_rewrite.url');
            $this->db->join('author', 'blogs.author = author.id', 'left');
            $this->db->join('url_rewrite', 'blogs.id = url_rewrite.table_id', 'left');
            $this->db->where('url_rewrite.table_name', 'blogs');
            if (!empty($limit)) {
                $this->db->limit($limit, $offset);
            }
            $query = $this->db->get('blogs');

            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } else {
            $query = $this->db->select('table_name, table_id')->where('url',
                "blogs/" . $url)->from('url_rewrite')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            $result = $query->row_array();

            $table_name = $result['table_name'];
            $table_id = $result['table_id'];

            $this->db->select('blogs.id, blogs.title, blogs.category, blogs.date, blogs.description, blogs.image, author.title as author_name, author.post,author.image as author_image, author.description as author_desc')->where('blogs.id', $table_id)->from($table_name);
            $this->db->join('author', 'blogs.author = author.id', 'left');
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->row_array();
        }
    }

    function site_infos()
    {
        $this->db->select('*')->from('site');
        $query = $this->db->get();
        return $query->row_array();
    }

    function clients()
    {
        $this->db->select('*')->from('clients');
        $this->db->order_by('position','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function testimonials()
    {
        $this->db->select('*')->from('testimonials');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    function why_choose_us()
    {
        $this->db->select('*')->from('why_choose_us');
        $query = $this->db->get();
        return $query->result_array();
    }

    function services()
    {
        $this->db->select('*')->from('services');
        $this->db->where('status','1');
        $this->db->order_by('position','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function add_comment($comments){
        if($this->db->insert('comments', $comments)) {
            $last_id = $this->db->insert_id();
            return true;
        }else return false;

    }

    function next_page($id, $table_name)
    {
        $query = $this->db->where('table_name', $table_name)->where('table_id > ', $id)->limit(1, 0)->order_by('id', 'asc')->get('url_rewrite');
        if ($query->num_rows() == 0) {
            return false;
        }
        $result = $query->row_array();
        $return['url'] = $result['url'];

        $select = "title";
        $query = $this->db->where('id', $result['table_id'])->get($table_name);
        $result = $query->row_array();
        $return['name'] = $result[$select];
        return $return;
    }

    function prev_page($id, $table_name)
    {
        $query = $this->db->where('table_name', $table_name)->where('table_id < ', $id)->limit(1, 0)->order_by('id', 'desc')->get('url_rewrite');
        if ($query->num_rows() == 0) {
            return false;
        }
        $result = $query->row_array();
        $return['url'] = $result['url'];

        $select = "title";
        $query = $this->db->where('id', $result['table_id'])->get($table_name);
        $result = $query->row_array();
        $return['name'] = $result[$select];
        return $return;
    }

    function doctors($url = null)
    {
        if ($url == null) {
            $this->db->select('doctors.*, doctor_category.category_name, url_rewrite.url')->from('doctors');
            $this->db->join('doctor_category', 'doctors.specification=doctor_category.id');
            $this->db->join('url_rewrite', 'doctors.id = url_rewrite.table_id', 'left');
            $query = $this->db->where('url_rewrite.table_name', 'doctors')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } else {
            $query = $this->db->select('table_name, table_id')->where('url', "doctor/" . $url)->from('url_rewrite')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            $result = $query->row_array();

            $table_name = $result['table_name'];
            $table_id = $result['table_id'];

            $this->db->select($table_name . '.*,doctor_category.category_name')->from($table_name);
            $this->db->join('doctor_category', 'doctors.specification=doctor_category.id');
            $query = $this->db->where('doctors.id', $table_id)->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->row_array();
        }
    }

    function doctor_category($url=null)
    {
        if($url == null) {
            $this->db->select('doctor_category.*, url_rewrite.url')->from('doctor_category');
            $this->db->join('url_rewrite', 'doctor_category.id = url_rewrite.table_id', 'left');
            $query = $this->db->where('url_rewrite.table_name', 'doctor_category')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        }else{
            $query = $this->db->select('table_name, table_id')->where('url', "doctors/" . $url)->from('url_rewrite')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            $result = $query->row_array();
            $table_id = $result['table_id'];

            $this->db->select('doctors.*,doctor_category.category_name,url_rewrite.url')->from('doctors');
            $this->db->join('doctor_category', 'doctors.specification=doctor_category.id');
            $this->db->join('url_rewrite', 'doctors.id = url_rewrite.table_id', 'left');
            $query = $this->db->where('url_rewrite.table_name', 'doctors')->where('doctors.specification',$table_id)->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        }
    }

    function hospitals()
    {
        $this->db->select('*')->from('hospitals');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hospital_doctors($id)
    {
        $this->db->select('hospitals.*,hospital_doctors.*,doctors.name')->from('hospitals');
        $this->db->join('hospital_doctors', 'hospitals.id=hospital_doctors.hospital_id');
        $query = $this->db->join('doctors', 'hospital_doctors.doctor_id=doctors.id')->where('hospitals.id', $id)->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        return $query->result_array();
    }

    function cims()
    {
        $this->db->select('cims.*,medicine_category.category_name')->from('cims');
        $this->db->join('medicine_category', 'cims.category=medicine_category.id');
        $this->db->order_by('cims.Medicine_name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function nims()
    {
        $this->db->select('nims.*,medicine_category.category_name')->from('nims');
        $this->db->join('medicine_category', 'nims.category=medicine_category.id');
        $this->db->order_by('nims.Medicine_name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function working_days($id)
    {
        $this->db->select('doctors_timing.*,day.day,hospitals.hospital_name')->from('doctors');
        $this->db->join('doctors_timing', 'doctors.id=doctors_timing.doctor_id');
        $this->db->join('day', 'doctors_timing.day=day.id');
        $query = $this->db->join('hospitals', 'doctors_timing.hospital_id=hospitals.id')->where('doctors.id', $id)->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        return $query->result_array();
    }

    function news($url = null, $limit = null, $offset = null)
    {
        if ($url == null) {
            $this->db->select('news.*, url_rewrite.url')->from('news');
            $this->db->join('url_rewrite', 'news.id = url_rewrite.table_id', 'left');
            $this->db->where('url_rewrite.table_name', 'news')->where('status', 1);
            //$this->db->order_by('news.id','desc');
            if (!empty($limit)) {
                $this->db->limit($limit, $offset);
            }
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } else {
            $query = $this->db->select('table_name, table_id')->where('url', "news/" . $url)->from('url_rewrite')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            $result = $query->row_array();

            // Table Name and ID of related url
            $table_name = $result['table_name'];
            $table_id = $result['table_id'];

            // Join members and profiles table
            $this->db->select('*')->from($table_name);
            $this->db->where('id', $table_id);
            //$this->db->order_by('id','desc');
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->row_array();
        }
    }

    function pharmaceuticals($url = null)
    {
        if ($url == null) {
            $this->db->select('pharmaceuticals.*, url_rewrite.url')->from('pharmaceuticals');
            $this->db->join('url_rewrite', 'pharmaceuticals.id = url_rewrite.table_id', 'left');
            $query = $this->db->where('url_rewrite.table_name', 'pharmaceuticals')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } else {
            $query = $this->db->select('table_name, table_id')->where('url', "pharmaceutical/" . $url)->from('url_rewrite')->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            $result = $query->row_array();

            // Table Name and ID of related url
            $table_name = $result['table_name'];
            $table_id = $result['table_id'];

            // Join members and profiles table
            $this->db->select('pharmaceuticals.name, medicines.id, medicines.medicine_name, medicines.composition, medicine_category.category_name')->from($table_name);
            $this->db->join('medicines', $table_name . '.id=medicines.pharmaceuticals');
            $this->db->join('medicine_category', 'medicines.category=medicine_category.id');
            $this->db->order_by('medicines.medicine_name', 'asc');
            $query = $this->db->where($table_name . '.id', $table_id)->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        }
    }

    function verify($email)
    {
        $query = $this->db->select('*')->from('user')->where('email', $email)->get();
        return $query->result_array();

    }

    function category()
    {
        $query = $this->db->select('*')->from('medicine_category')->get();
        return $query->result_array();

    }

    function search_data($key, $page)
    {
        if (strpos($key, ' ') > 0) {
            $keyword = explode(' ', $key);
        } else {
            $keyword[] = $key;
        }

        if ($page == 'doctors' || $page == 'news') {
            $fields = $this->db->list_fields($page);
            $this->db->select($page . '.*,url_rewrite.url', 'url_rewrite.table_name')->from($page);
            foreach ($fields as $f) {
                foreach ($keyword as $k) {
                    $this->db->or_like("LOWER($page.$f)", strtolower($k));
                }
            }
            $this->db->join('url_rewrite', $page . '.id = url_rewrite.table_id AND url_rewrite.table_name =' . "'" . $page . "'");
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } elseif ($page == 'cims' || $page == 'nims' || $page == 'hospitals') {
            $fields = $this->db->list_fields($page);
            $this->db->select('*')->from($page);
            foreach ($fields as $f) {
                foreach ($keyword as $k) {
                    $this->db->or_like("LOWER($page.$f)", strtolower($k));
                }
            }
            if ($page == 'cims' || $page == 'nims') {
                $this->db->join('medicine_category', $page . '.category=medicine_category.id');
            }
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            }
            return $query->result_array();
        } else if ($page == 'knowledgebase') {
            $tables = ['cims', 'nims', 'pharmaceuticals', 'hospitals'];
            $results = [];
            foreach ($tables as $t) {
                $temp = [];
                $fields = $this->db->list_fields($t);
                $this->db->select('*');
                $this->db->from($t);
                foreach ($fields as $f) {
                    foreach ($keyword as $k) {
                        $this->db->or_like("LOWER($t.$f)", strtolower($k));
                    }
                }
                if ($t == 'cims' || $t == 'nims') {
                    $this->db->join('medicine_category', $t . '.category=medicine_category.id');
                }
                $query = $this->db->get();
                $total[] = $query->num_rows();
                if ($query->num_rows() == 0) {
                    continue;
                }
                $temp['results'] = $query->result();
                $temp['table'] = $t;
                $results[] = $temp;
            }
            return $results;
        }


    }


}

?>