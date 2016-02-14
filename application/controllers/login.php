<?php
class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in'))
        {
           redirect('admin');
        }
        $this->layout='themes/login';
    }

    function index()
    {
        if (($this->session->userdata('admin_email')!= FALSE))
        {
            $this->display('cms/admin/main','');
        } else {
            $this->load->helper('form');
            $this->load->view($this->layout,'');
        }

    }

    function verify()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('admin_email', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('admin_password', 'Password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->display('cms/login/form/form','');
        } else //valid
        {
            $this->load->model('admin_model');
            $res = $this->admin_model->login($this->input->post('admin_email', TRUE), $this->input->post('admin_password', TRUE));
            $result=array($res);
            if ($res != false && $result[0]->admin_status == 1) {
                $this->session->set_userdata('logged_in', $res);
                redirect('admin','refresh');
            }
            else {
                //display message, user does not exist.
                $this->data['message'] = 'User does not exist.';
                $this->display('cms/login/form/form', ['message' => $this->data]);
                return;
            }
            if($this->session->set_userdata('logged_in', $res)){
                $this->db
                    ->set('last_login', now())
                    ->where('admin_email', $this->input->post('admin_email'))
                    ->update('admin');
            }
            redirect('admin','refresh');
        }
    }
}