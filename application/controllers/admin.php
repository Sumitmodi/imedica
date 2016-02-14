<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    function index()
    {
        //if (isset($_GET['module']) && ($_GET['action'])) {
        //$this->data['primary_nav'] = $this->config->item('admin_nav');
        $module = $this->input->get('module');
        //echo $module;
        $action = $this->input->get('action');
        //echo $action;
        if (empty($module)) {
            $module = $this->uri->segment(2);
        }
        if (empty($action)) {
            $action = $this->uri->segment(3);
        }
        // echo $module.' '.$action;die;
        if (isset($module) && ($action)) {
            $controller = $this->load->module($module, $action);
            if ($this->session->flashdata('message') != false) {
                $controller->data['message'] = $this->session->flashdata('message');
            }
            $controller->data['admin'] = $this->session->userdata('logged_in');
            $controller->call();
            $controller->display();
            return;
        }

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $this->data['admin_name'] = $session_data->admin_name;
            $this->data['admin'] = $this->session->userdata('logged_in');
            $this->template = 'cms/admin/main';
            $this->display('cms/admin/main');
        } else {
            //If no session, redirect to login page
            redirect('admin/login', 'refresh');
        }
    }

    public function updateOrder($module = false){
        $module = false == $module ? strtolower($this->uri->segment(3)) : strtolower($module);
        $conf  = $this->config->item('module_tables');
        $table = $conf[$module];
        $data = json_decode(file_get_contents('php://input'),TRUE);
        foreach($data as $d){
            $this->db->where('id',$d['id'])->update($table,array('position'=>$d['position']));
        }

        echo json_encode(array('res'=>'Position updated'));
    }

//    function search()
//    {
//        $match = $this->input->post('keyword');
//        if ($this->session->userdata('logged_in')) {
//            $session_data = $this->session->userdata('logged_in');
//            //$this->data['admin_name'] = $session_data->admin_name;
//            //$this->data['user'] = $this->session->userdata('logged_in');
//            $this->data['query'] = $this->admin_model->SearchString($match);
//            $this->data['keyword'] = $match;
//            echo "<pre>";
//            print_r($this->data);
//            die;
//        }
//    }

    function search()
    {
        $match = $this->input->post('keyword');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $this->data['admin_name'] = $session_data->admin_name;
            $this->data['admin'] = $this->session->userdata('logged_in');
            $this->data['query'] = $this->admin_model->get_search($match);
            $this->data['keyword'] = $match;
            foreach($this->data['query'][2] as $value){
                $query = $this->db->select('*')->from('search')->where('keyword',$match)->where('table',$value['table'])->get();
                if($query->num_rows() == 0)
                {
                    $this->db->set('keyword', $match)->set('table', $value['table'])->insert('search');
                }
            }
            $this->template = 'searchview';
            $this->display('searchview');
        }
    }

    function searchlist()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $this->data['admin_name'] = $session_data->admin_name;
            $this->data['admin'] = $this->session->userdata('logged_in');
            $key = $this->input->get('keyword');
            $table = $this->input->get('table');
            $this->data['query'] = $this->admin_model->show_search($table,$key);
            $this->template = 'cms/' . $table . '/list/list';
            $this->display('cms/' . $table . '/list/list');

        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('admin', 'refresh');
    }




}

?>