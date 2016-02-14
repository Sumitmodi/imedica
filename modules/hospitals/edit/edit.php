<?php
class HospitalsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospitalsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('hospitals',array('id'=>$id));
        $this->template = 'cms/hospitals/edit/edit';
    }

    public function postHospitalsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/hospitals/edit/edit';
        $config['upload_path']    = './uploads/hospitals/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hospital_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hospital_location', 'location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hospital_phone', 'Phone', 'required');

        $hospitals = $this->db->where('id', $this->input->post('hospital_id'))->get('hospitals')->result_object();
        $this->data['query'] = $hospitals;

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('hospital_name', $this->input->post('hospital_name'))->
            get('hospitals')->num_rows() > 0 ) {
            $this->data['message'] = 'This Hospital has already been added.Please check.';
            return;
        }

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('email', $this->input->post('hospital_email'))->
            get('hospitals')->num_rows() > 0 ) {
            $this->data['message'] = 'Email is already in use by another account.';
            return;
        }

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

            if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
                $config['file_name'] = $id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $d = array('upload_data' => $this->upload->data());
                $file_name = array('logo'=>$d['upload_data']['file_name']);
                $this->db->where('id',$id);
                $this->db->update('hospitals',$file_name);
            }

            $this->db->where('id', $id);
            if ($this->db->update('hospitals', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/hospitals/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}
?>