<?php
class User_orderEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')) {
            $this->layout = 'themes/cms';
        }else{
            $this->layout = 'themes/user';
        }
    }

    public function getUser_orderEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('prescribed_medicine',array('id'=>$id));
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescribed_medicine/edit/edit';
        }else{
            $this->template = 'user/order/edit/edit';
        }
    }

    public function postUser_orderEdit()
    {
        $id = $this->uri->segment(4);
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescribed_medicine/edit/edit';
        }else{
            $this->template = 'user/order/edit/edit';
        }

        $config['upload_path'] = './uploads/prescription/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|txt';
        $config['overwrite'] = TRUE;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine', 'Medicine Name', 'required|xss_clean');
        $this->form_validation->set_rules('disease', 'Disease', 'required');
        $this->form_validation->set_rules('dose', 'Dose', 'required|xss_clean');

        $prescribed_medicine = $this->db->where('id', $this->input->post('prescribed_medicine_id'))->get('prescribed_medicine')->result_object();
        $this->data['query'] = $prescribed_medicine;

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'patient' => $this->input->post("patient"),
                'medicine' => implode(';',$this->input->post("medicine")),
                'disease' => $this->input->post("disease"),
                'prescribed_by' => $this->input->post("prescribed_by"),
                'dose' => implode(';',$this->input->post("dose"))
            );

            if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
                $config['file_name'] = $id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('prescription'=>$data['upload_data']['file_name']);
                $this->db->where('id',$id);
                $this->db->update('prescribed_medicine',$file_name);
                }

            $this->db->where('id', $id);
            if ($this->db->update('prescribed_medicine', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/prescribed_medicine/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }

}
?>