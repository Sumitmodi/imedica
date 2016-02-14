<?php
class User_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function login($user_email, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $user_email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
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

    function table_fetch_row($table, $where = array(), $order_by = array())
    {
        $this->db->select('*');
        $this->db->from($table);

        $this->prepare_where($where);
        $this->prepare_order_by($order_by);

        $query = $this->db->get();
        return $query->result();
    }

    function check_login($name,$username,$email)
    {
        $res= $this->table_fetch_row('user',array('email'=>$email));

        if($res == null)
        {
            $data=array('name'=>$name,
                'username'=>$username,
                'email'=>$email,
                'status'=>'1');
            $this->db->insert('user',$data);
            $result = $this->table_fetch_row('user',$data);
            $this->session->set_userdata('login', $result[0]);
            redirect(base_url(),'refresh');
        }
        else{
            if(($res[0]->username == '') ||($res[0]->name == '')){
                $data=array('name'=>$name,
                    'username'=>$username
                );
                $this->db->where('email', $email);
                $this->db->update('user',$data);
                $result = $this->table_fetch_row('user',$data);
                $this->session->set_userdata('login', $result[0]);
            }else{
                $this->session->set_userdata('login', $res[0]);
            }
            redirect(base_url(),'refresh');
        }
    }


    function show_orders($id)
    {
        $this->db->select('patient.*,patient.patient as pname,order.*,prescribed_medicine.prescription,prescribed_medicine.medicine,prescribed_medicine.dose,prescribed_medicine.disease,prescribed_medicine.id as pid')->from('user');
        $this->db->join('patient','user.id=patient.parent_id OR user.email=patient.email');
        $this->db->join('order','patient.id=order.patient');
        $query = $this->db->join('prescribed_medicine','patient.id=prescribed_medicine.patient AND order.prescribed_medicine=prescribed_medicine.id')->where('user.id', $id)->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        return $query->result_array();
    }

    function cancel_order($id)
    {
        $data=array('status'=>'5');
        $this->db->where('prescribed_medicine',$id);
        $this->db->update('order',$data);
    }

    function show_patient($id)
    {
        $this->db->select('patient.*')->from('user');
        $this->db->join('patient','user.id=patient.parent_id OR user.email=patient.email');
        $this->db->where('user.id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    function show_my_patients($id)
    {
        $this->db->select('*')->from('patient')->where('parent_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
}
