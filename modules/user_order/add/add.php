<?php
class User_orderAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

            $this->layout = 'themes/user';
    }

    public function getUser_orderAdd()
    {
        $id = $this->uri->segment(4);
        if ($id != NULL) {
            $this->data['val'] = $id;
        }
        $this->template = 'user/user_order/add/add';
    }

    public function postUser_orderAdd()
    {
        $this->template = 'user/user_order/add/add';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('disease', 'Prescription', 'trim|required|xss_clean');
        if($this->input->post('reoccuring_order')){
            $this->form_validation->set_rules('reoccuring_interval', 'Reoccuring Interval', 'trim|required|xss_clean');
        }

        $session_data = $this->session->userdata('login');
        $id = $session_data->id;

        if ($this->form_validation->run() == FALSE) {
            $this->data['error'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'patient' => $this->input->post("patient"),
                'parent_id' => $id,
                'disease' => $this->input->post("disease"),
                'date' => date('Y-m-d'),
                'status' => '1',
            );
            $reoccuring_order = $this->input->post('reoccuring_order');
            if ($reoccuring_order == 1) {
                $data['reoccuring_order'] = $reoccuring_order;
                $data['reoccuring_interval'] = $this->input->post('reoccuring_interval');
                if ($this->input->post('notify') == 1) {
                    $data['notify'] = $this->input->post('notify');
                } else {
                    $data['notify'] = '0';
                }
                if ($this->input->post('place_automatic') == 1) {
                    $data['place_automatic'] = $this->input->post('place_automatic');
                } else {
                    $data['place_automatic'] = '0';
                }
            } else {
                $data['reoccuring_order'] = '0';
                $data['reoccuring_interval'] = '0';
                $data['notify'] = '0';
                $data['place_automatic'] = '0';
            }

            if ($this->db->insert('order', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            } else {
                $this->data['error'] = 'Sorry,The data could not be saved';
            }
        }

    }

}
?>