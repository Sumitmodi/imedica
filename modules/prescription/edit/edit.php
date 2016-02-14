<?php
class PrescriptionEdit extends MY_Controller
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

    public function getPrescriptionEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('patient',array('id'=>$id));
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescription/edit/edit';
        }else{
            $this->template = 'user/prescription/edit/edit';
        }
    }

    public function postPrescriptionEdit()
    {
        $id = $this->uri->segment(4);
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescription/edit/edit';
        }else{
            $this->template = 'user/prescription/edit/edit';
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('patient_age', 'Age', 'required');

        $patient = $this->db->where('id', $this->input->post('patient_id'))->get('patient')->result_object();
        $this->data['query'] = $patient;

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            if($this->session->userdata('login')) {
                $data = array('parent_id'=>$this->input->post('parent_id'),
                    'patient' => $this->input->post("patient"),
                    'age' => $this->input->post("patient_age"),
                    'location' => $this->input->post("patient_location"),
                    'phone_no' => $this->input->post("patient_phone"),
                    'email' => $this->input->post("patient_email"));
            }else {
                $data = array(
                    'patient' => $this->input->post("patient"),
                    'age' => $this->input->post("patient_age"),
                    'location' => $this->input->post("patient_location"),
                    'phone_no' => $this->input->post("patient_phone"),
                    'email' => $this->input->post("patient_email")
                );
            }
            $this->db->where('id', $id);
            if ($this->db->update('patient', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                if($this->session->userdata('logged_in')){
                    redirect('admin/prescription/list');
                }else{
                    redirect('user/prescription/list');
                }
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }

}
?>