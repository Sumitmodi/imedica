<?php
class UserAdd extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getUserAdd()
    {
        $this->template = 'cms/user/add/add';
    }

    public function postUserAdd()
    {
        $this->template = 'cms/user/add/add';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_username', 'Username', 'trim|required|xss_clean|is_unique[user.username]');
        $this->form_validation->set_rules('user_location', 'Location', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('user_phone', 'Phone', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[user_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' => $this->input->post("user_name"),
                'username' => $this->input->post("user_username"),
                'password' => md5($this->input->post("user_password")),
                'location' => $this->input->post("user_location"),
                'email' => $this->input->post("user_email"),
                'phone_no' => $this->input->post("user_phone"),
                'status' => $this->input->post("user_status")
            );
            if ( $this->db->insert('user', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }


    }
}