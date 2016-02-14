<?php
class Admin_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function login($admin_email, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin_email', $admin_email);
        $this->db->where('admin_password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }


    function get_id()
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        } else {
            $id = $this->uri->segment(4);
        }
        return $id;
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

    function table_fetch_row($table, $where = array(), $order_by = array())
    {
        $this->db->select('*');
        $this->db->from($table);

        $this->prepare_where($where);
        $this->prepare_order_by($order_by);

        $query = $this->db->get();
        return $query->result();
    }

    function get_table_fields($table)
    {
        $fields = $this->db->list_fields($table);
        return $fields;
    }

    private function prepare_table_data($table, $data = array())
    {
        $fields = $this->get_table_fields($table);
        // print_r($fields);
        if (false == $fields || count($fields) == 0) {
            return false;
        }

        $insert = array();
        $data = empty($data) ? $this->input->post(null, true) : $data;
        //print_r($data);

        foreach ($fields as $field) {
            if (!isset($data[$field])) {
                continue;
            }

            $insert[$field] = $data[$field];
        }

        if (!empty($insert)) {
            return $insert;
        } else
            return false;
    }

    function table_insert($table, $data = array())
    {
        $insert = $this->prepare_table_data($table, $data);

        if ($insert == false) {
            return false;
        }

        if ($this->db->insert($table, $insert)) {
            return $this->db->insert_id();
        } else
            return false;
    }


    function table_update($table, $data = array(), $where = array())
    {
        $insert = $this->prepare_table_data($table, $data);

        if ($insert == false) {
            return false;
        }

        $this->prepare_where($where);

        if ($this->db->update($table, $insert)) {
            return true;
        } else
            return false;
    }

    function delete_table_record($id, $table, $where)
    {
        $this->prepare_image_delete($table, $where);

        $this->delete_url_row(array('table_id' => $id, 'table_name' => $table));

        $this->delete_table_row($table, $where);
    }


    function prepare_image_delete($table, $where)
    {
        $fields = $this->get_table_fields($table);
        $images = array('logo', 'header_img', 'banner_img', 'image', 'profile_img', 'prescription');

        foreach ($fields as $field) {
            if (in_array($field, $images)) {
                $img = $field;
                break;
            }
        }
        if ($img == NULL) {
            return false;
        }

        $res = $this->admin_model->table_fetch_row($table, $where, array());
        if($table == 'prescribed_medicine'){
            $path = ROOTDIR . DS . 'uploads/prescription' . DS . $res[0]->$img;
        }else{
            $path = ROOTDIR . DS . 'uploads' . DS . $table . DS . $res[0]->$img;
        }
        if ($path != false) {
            unlink($path);
        } else {
            return false;
        }

        $path1 = ROOTDIR . DS . 'uploads' . DS . $table . DS . $res[0]->id;
        if (is_dir($path1)) {
            delete_files($path1, true);
            rmdir($path1);
        } else {
            return false;
        }
    }


    function delete_table_row($table, $where)
    {
        $this->prepare_where($where);
        $this->db->delete($table);
    }


    function delete_url_row($where)
    {
        $result = $this->table_fetch_row('url_rewrite', $where);
        if ($result == false) {
            return false;
        }
        $url_id = $result[0]->id;

        $this->prepare_where($where);
        if ($this->db->delete('url_rewrite')) {
            $path = ROOTDIR . DS . 'application/cache/' . $url_id . '.html';
            if ($path != NULL) {
                unlink($path);
            } else {
                return false;
            }
        }
    }


    function delete_image_row($where)
    {
        $result = $this->table_fetch_row('image', $where);
        if ($result == false) {
            return false;
        }

        $this->prepare_where($where);
        $this->db->delete('image');
    }


    function delete_images($id, $name, $module)
    {
        $path = "uploads/" . $module . "/" . $id . "/" . $name;
        if ($path != false) {
            unlink($path);
        } else {
            return false;
        }
    }

    function get_patient()
    {
        $this->db->select('user.id,user.name')->from('user');
        $this->db->join('patient','user.id=patient.patient');
        $query=$this->db->get();
        return $query->result();
    }


    function get_search($match)
    {
        $tables =['medicines','cims','nims','pharmaceuticals','doctors','hospitals'];
        $results =[];
        $count=0;
        if (strpos($match, ' ') > 0) {
            $keyword = explode(' ',$match);
        }else{
            $keyword[] = $match;
        }
        foreach ($tables as $t) {
            $temp = [];
            $fields = $this->db->list_fields($t);
            $this->db->select('*');
            $this->db->from($t);
            foreach ($fields as $f) {
                foreach ($keyword as $k){
                    $this->db->or_like("LOWER($f)", strtolower($k));
            }
        }
            $query = $this->db->get();
            $total[] = $query->num_rows();
            if($query->num_rows() == 0)
            {
                continue;
            }
            $temp['results'] = $query->result();
            $temp['table'] = $t;
            $results[] = $temp;
        }
        foreach($total as $t){
            $count =$count + $t;
        }

        return array($count,$total,$results);
    }

    function show_search($table,$key)
    {
        $fields = $this->db->list_fields($table);
        $this->db->select('*')->from($table);
        if (strpos($key, ' ') > 0) {
            $keyword = explode(' ',$key);
        } else{
            $keyword[] = $key;
        }
        foreach ($fields as $f) {
            foreach ($keyword as $k) {
                $this->db->or_like("LOWER($f)", strtolower($k));
            }
        }
        $query = $this->db->get();
        return $query->result();
    }

    function badCharHeuristic($str, $size, &$badchar)
    {
        for ($i = 0; $i < 256; $i++)
            $badchar[$i] = -1;

        for ($i = 0; $i < $size; $i++)
            $badchar[ord($str[$i])] = $i;
    }

    function SearchString($pat)
    {
        $tables =['medicines'];
        //$tables =['medicines','cims','nims','pharmaceuticals','doctors','hospitals'];
        $m = strlen($pat);
        $result =[];
        foreach ($tables as $t) {
            $temp = [];
            $query = $this->db->select('*')->from($t)->get();
            $values = $query->result();

            foreach($values as $v){
                foreach($v as $field=>$value){
                    $string[] = $value;
                }
            }
            //$str = 'this is test.';
            foreach($string as $str){
                $n = strlen($str);
                $i = 0;
                $this->badCharHeuristic($pat, $m, $badchar);
                $s = 0;
                while ($s <= ($n - $m)) {
                    $j = $m - 1;
                    while ($j >= 0 && $pat[$j] == $str[$s + $j])
                        $j--;
                    if ($j < 0) {
                        $arr[$i++] = $s;
                        $s += ($s + $m < $n) ? $m - $badchar[ord($str[$s + $m])] : 1;
                    } else
                        $s += max(1, $j - $badchar[ord($str[$s + $j])]);
                }
                for ($j = 0; $j < $i; $j++) {
                    $result[$j] = $arr[$j];
                }
                //return $result;
            }

            $temp['table'] = $t;
        }
        $temp['result'] = $result;
        //print_r($temp);
        return $temp;
    }
}
?>