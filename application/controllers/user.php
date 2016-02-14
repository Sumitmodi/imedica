<?php
class User extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->layout = 'themes/user';
        if($this->session->userdata('logged_in')){
            $this->session->unset_userdata('logged_in');
        }
    }

    function index()
    {
        $this->data['primary_nav'] = $this->config->item('user_nav');

        //if (isset($_GET['module']) && ($_GET['action'])) {
        $module = $this->input->get('module');
        //echo $module;
        $action = $this->input->get('action');
        //echo $action;
        if (empty($module)) {
            $module = $this->uri->segment(2);
            //echo $module;
        }
        if (empty($action)) {
            $action = $this->uri->segment(3);
        }

        if (isset($module) && ($action)) {
            $controller = $this->load->module($module, $action);

            if ($this->session->flashdata('message') != false) {
                $controller->data['message'] = $this->session->flashdata('message');
            }
            $controller->data['user'] = $this->session->userdata('login');
            $controller->call();
            $controller->display();
            return;
        }
        else {

            if ($this->session->userdata('login')) {
                $session_data = $this->session->userdata('login');
                $this->data['email'] = $session_data->email;
                $this->data['id'] = $session_data->id;
                $this->data['user'] = $this->session->userdata('login');
                $this->data['query'] = $this->user_model->table_fetch_rows('order', array('parent_id' => $session_data->id));
                $this->template = 'user/user_order/list/list';
                $this->display('user/user_order/list/list');
            }elseif($this->session->userdata('fb_login')) {
                $session_data = $this->session->userdata('login');
                $this->data['name'] = $session_data['name'];
                $this->template = 'user/user_order/list/list';
                $this->display('user/user_order/list/list');
            }else {
                //If no session, redirect to login page
                redirect('user/login', 'refresh');
            }
        }
    }

    function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();
        redirect('user', 'refresh');
    }

    public function download_prescription()
    {
        $name = $this->input->get('name');
        $data = file_get_contents(base_url() . '/uploads/prescription/' . $name);
        force_download($name, $data);
    }

    function show_specific_patient()
    {
        $email = $_POST['email'];
        $this->db->select('*')->from('patient');
        $this->db->where('email',$email);
        $query = $this->db->get();
        echo json_encode($query->row_array());
    }
    function show_patient_details()
    {
        $pid = $_POST['pid'];
        $parent_id = $_POST['parent_id'];
        $this->db->select('*')->from('patient');
        $this->db->where('id',$pid)->where('parent_id',$parent_id);
        $query = $this->db->get();
        echo json_encode($query->row_array());
    }

    function select_disease()
    {
        $pid = $_POST['pid'];
        $this->db->select('disease')->from('prescribed_medicine');
        $this->db->where('patient',$pid);
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }

    function cancel_order()
    {
        $id =$this->input->get('id');
        $this->user_model->cancel_order($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

}
?>