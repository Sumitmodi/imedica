<?php
class AdminEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getAdminEdit()
    {
        //$id = $this->input->get("id");
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('admin',array('id'=>$id));
        $this->template = 'cms/admin/edit/edit';
    }

    public function postAdminEdit()
    {
        //$id = $this->input->post('admin_id');
        $id = $this->uri->segment(4);
        $this->template = 'cms/admin/edit/edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('admin_username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('admin_password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_admin_password', 'Password Confirmation', 'trim|matches[admin_password]');

        $admin = $this->db->where('id', $this->input->post('admin_id'))->get('admin')->result_object();
        $this->data['query'] = $admin;

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('admin_username', $this->input->post('admin_username'))->
            get('admin')->num_rows() > 0 ) {
            $this->data['message'] = 'Username is already in use by another account.';
            return;
        }

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('admin_email', $this->input->post('admin_email'))->
            get('admin')->num_rows() > 0 ) {
            $this->data['message'] = 'Email is already in use by another account.';
            return;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'admin_name' => $this->input->post("admin_name"),
                'admin_username' => $this->input->post('admin_username'),
                'admin_email' => $this->input->post("admin_email")
            );
            if($this->input->post("admin_password")) {
                $data['admin_password'] = md5($this->input->post("admin_password"));
            }
            if($this->input->post("admin_status")) {
                $data['admin_status'] = $this->input->post("admin_status");
            }

            $this->db->where('id', $id);
            if ($this->db->update('admin', $data)) {
                //$this->data['message'] = 'Updated Successfully!!!';
                $this->session->set_flashdata('message','Updated successfully.');
                redirect('admin/admin/list');
            } else {
                $this->session->set_flashdata('message','Update Unsuccessful.');
            }

        }
    }
}
?>