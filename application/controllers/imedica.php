<?php

class Imedica extends MY_Controller
{
    public function categories()
    {
       $query = $this->db->select('*')->from('medicine_category')->get();
        foreach ($query->result_array() as $row) {
            $r[] = htmlentities(stripslashes($row['category_name']));
        }
        echo json_encode($r);
    }

    public function cims()
    {
        $this->db->select('cims.*,medicine_category.category_name')->from('cims');
        $this->db->join('medicine_category', 'cims.category=medicine_category.id');
        $this->db->order_by('cims.Medicine_name', 'asc');
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }
}

