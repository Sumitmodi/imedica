<?php
class UserEdit extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')) {
            $this->layout = 'themes/cms';
        }else{
            $this->layout = 'themes/user';
        }
    }

    public function getUserEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('user',array('id'=>$id));
        $this->template = 'cms/user/edit/edit';
    }

    public function postUserEdit()
    {
        $id = $this->uri->segment(4);
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/user/edit/edit';
        }else{
            $this->data['query'] = $this->user_model->show_orders($this->input->post('user_email'));
            $this->template = 'user/order/list/list';
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_location', 'Location', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required');
        $this->form_validation->set_rules('user_phone', 'Phone', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|matches[user_password]');

        $user = $this->db->where('id', $this->input->post('user_id'))->get('user')->result_object();
        $this->data['query'] = $user;

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('username', $this->input->post('user_username'))->
            get('user')->num_rows() > 0 ) {
            $this->data['message'] = 'Username is already in use by another account.';
            return;
        }

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('email', $this->input->post('user_email'))->
            get('user')->num_rows() > 0 ) {
            $this->data['message'] = 'Email is already in use by another account.';
            return;
        }

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('phone_no', $this->input->post('user_phone'))->
            get('user')->num_rows() > 0 ) {
            $this->data['message'] = 'Phone Number is already in use by another account.';
            return;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' => $this->input->post("user_name"),
                'username' => $this->input->post("user_username"),
                'location' => $this->input->post("user_location"),
                'phone_no' => $this->input->post("user_phone"),
                'email' => $this->input->post("user_email")
            );

            if($this->input->post("user_password")) {
                $data['password'] = md5($this->input->post("user_password"));
            }
            if($this->input->post("user_status")) {
                $data['status'] = $this->input->post("user_status");
            }

            $this->db->where('id', $id);
            if ($this->db->update('user', $data)) {
                $this->session->set_flashdata('message', 'Account Updated successfully!!!');
                if($this->session->userdata('logged_in')) {
                    redirect('admin/user/list');
                }else{
                    redirect('user/order/list');
                }
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}