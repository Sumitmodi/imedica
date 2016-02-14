<?php
class User_login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login'))
        {
            redirect('user');
        }
        $this->layout='themes/user_login';
    }

    function index()
    {
        if (($this->session->userdata('user_email')!= FALSE))
        {
            $this->display('user/main','');
        } else {
            $this->load->helper('form');
            $this->load->view($this->layout,'');
        }

    }

    function verify()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_email', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->display('user/login/form/form','');
        } else //valid
        {
            $this->load->model('user_model');
            $res = $this->user_model->login($this->input->post('user_email', TRUE), $this->input->post('user_password', TRUE));
            $result=array($res);

            if ($res != false && $result[0]->status == 1) {
                $this->session->set_userdata('login', $res);
                if($this->input->post('hidden_email') || $this->input->post('user_login')){
                    redirect('user','refresh');
                }else{
                    redirect(base_url());
                }
            }
            else{
                //display message, user does not exist.
                $this->data['message'] = 'User does not exist.';
                $this->display('user/login/form/form',['message'=>$this->data]);
                return;
            }
        }
    }
}