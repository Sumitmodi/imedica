<?php

class PrescriptionAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            $this->layout = 'themes/cms';
        } else {
            $this->layout = 'themes/user';
        }
    }

    public function getPrescriptionAdd()
    {
        if ($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescription/add/add';
        } else {
            $this->template = 'user/prescription/add/add';
        }
    }

    public function postPrescriptionAdd()
    {
        if ($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescription/add/add';
        } else {
            $this->template = 'user/prescription/add/add';
        }

        $config['upload_path'] = './uploads/prescription/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|txt';


        if ($this->session->userdata('login')) {
                $data = array('parent_id' => $this->input->post('parent_id'),
                    'patient' => $this->input->post("name"),
                    'age' => $this->input->post("age"),
                    'location' => $this->input->post("location"),
                    'phone_no' => $this->input->post("phone_no"),
                    'email' => $this->input->post("email"));
        } else {
            $data = array(
                'patient' => $this->input->post("patient"),
                'age' => $this->input->post("patient_age"),
                'location' => $this->input->post("patient_location"),
                'phone_no' => $this->input->post("patient_phone"),
                'email' => $this->input->post("patient_email")
            );
        }
        if(!$this->input->post('own_id')){
            $this->db->insert('patient',$data);
        }$last_id = $this->db->insert_id();



        if (($last_id != NULL) || ($this->input->post('own_id'))){
            $prescription_data = array(
                'medicine' => implode(';', $this->input->post("medicine")),
                'quantity' => implode(';', $this->input->post("quantity")),
                'disease' => $this->input->post("disease"),
                'prescribed_by' => $this->input->post("doctor"),
                'hospital_name' => $this->input->post("hospital"),
                'dose' => implode(';', $this->input->post("dose"))
            );
            if ($this->input->post('own_id')) {
                $prescription_data['patient'] = $this->input->post('own_id');
            } else {
                $prescription_data['patient'] = $last_id;
            }

            if ($this->db->insert('prescribed_medicine', $prescription_data)) {
                if (!file_exists(ROOTDIR . '/uploads/prescription/') && !is_dir(ROOTDIR . '/uploads/prescription/')) {
                    mkdir(ROOTDIR . '/uploads/prescription/', 755);
                }
                $pres_med_id = $this->db->insert_id();
                if ($this->input->post('own_id')) {
                    $config['file_name'] = $this->input->post('own_id');
                }else{
                    $config['file_name'] = $last_id;
                }
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('prescription' => $data['upload_data']['file_name']);
                $this->db->where('id', $pres_med_id);
                $this->db->update('prescribed_medicine', $file_name);

            }
            $this->data['message'] = 'Saved Successfully!!!';
        } else {
            $this->data['message'] = 'Sorry,The data could not be saved';
        }

    }

}

?>