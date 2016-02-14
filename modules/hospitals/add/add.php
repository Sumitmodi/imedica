<?php
class HospitalsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospitalsAdd()
    {
        $this->template = 'cms/hospitals/add/add';
    }

    public function postHospitalsAdd()
    {
        $this->template = 'cms/hospitals/add/add';
        $config['upload_path']    = './uploads/hospitals/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hospital_name', 'Name', 'trim|required|xss_clean|is_unique[hospitals.hospital_name]');
        $this->form_validation->set_rules('hospital_location', 'location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hospital_phone', 'Phone', 'required');
        $this->form_validation->set_rules('hospital_email', 'Email', 'is_unique[hospitals.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'hospital_name' => $this->input->post("hospital_name"),
                'location' => $this->input->post("hospital_location"),
                'emergency_service' => $this->input->post("emergency_service"),
                'ambulance' => $this->input->post("ambulance"),
                'phone_no' => $this->input->post("hospital_phone"),
                'email' => $this->input->post("hospital_email"),
                //'doctors' => implode(';',$this->input->post("doctor")),

            );
            if ( $this->db->insert('hospitals', $data)) {
                $last_id = $this->db->insert_id();
                if(!file_exists(ROOTDIR.'/uploads/hospitals/') && !is_dir(ROOTDIR.'/uploads/hospitals/')){
                    mkdir(ROOTDIR.'/uploads/hospitals/',"1");}
                $config['file_name'] = $last_id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('logo'=>$data['upload_data']['file_name']);
                $this->db->where('id',$last_id);
                $this->db->update('hospitals',$file_name);
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

    }

}
?>