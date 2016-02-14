<?php
class AdminAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->layout = 'themes/cms';
        $this->layout = 'themes/cms';
    }

    public function getAdminAdd()
    {
        $this->template = 'cms/admin/add/add';
    }

    public function postAdminAdd()
    {
        $this->template = 'cms/admin/add/add';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('admin_username', 'Username', 'trim|required|xss_clean|is_unique[admin.admin_username]');
        $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email||is_unique[admin.admin_email]');
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_admin_password', 'Password Confirmation', 'trim|required|matches[admin_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'admin_name' => $this->input->post("admin_name",TRUE),
                'admin_username' => $this->input->post('admin_username'),
                'admin_email' => $this->input->post("admin_email"),
                'admin_password' => md5($this->input->post("admin_password")),
                'admin_status' => $this->input->post("admin_status")
                );

            if ( $this->db->insert('admin', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }
    }
}
?>