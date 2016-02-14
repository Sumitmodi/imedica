<?php
class Prescribed_medicineAdd extends MY_Controller
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

    public function getPrescribed_medicineAdd()
    {
        $id = $this->uri->segment(4);
        if($id != NULL)
        {
            $this->data['val'] = $id;
        }
        if ($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescribed_medicine/add/add';
        } else {
            $this->template = 'user/order/prescribed_medicine/add/add';
        }
    }

    public function postPrescribed_medicineAdd()
    {
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/prescribed_medicine/add/add';
        }else {
            $this->template = 'user/order/prescribed_medicine/add/add';
        }

        $config['upload_path']    = './uploads/prescription/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|docx|txt';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine', 'Medicine Name', 'required|xss_clean');
        $this->form_validation->set_rules('disease', 'Disease', 'required');
        $this->form_validation->set_rules('dose', 'Dose', 'required|xss_clean');

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
            if ( $this->db->insert('prescribed_medicine', $data)) {
                if(!file_exists(ROOTDIR.'/uploads/prescription/') && !is_dir(ROOTDIR.'/uploads/prescription/')){
                    mkdir(ROOTDIR.'/uploads/prescription/',755);
                }
                $pres_med_id = $this->db->insert_id();
                $config['file_name'] = $this->input->post("patient");
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('prescription'=>$data['upload_data']['file_name']);
                $this->db->where('id',$pres_med_id);
                $this->db->update('prescribed_medicine',$file_name);

                $data = array(
                    'patient' =>$this->input->post("patient"),
                    'prescribed_medicine' =>$pres_med_id,
                    'status' =>'1',
                );
                $this->db->insert('order',$data);
                $this->data['message'] = 'Saved Successfully!!!';
                }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

    }

}
?>