<?php
class Hospital_doctorsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospital_doctorsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('hospital_doctors',array('id'=>$id));
        $this->template = 'cms/hospital_doctors/edit/edit';
    }

    public function postHospital_doctorsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/hospital_doctors/edit/edit';

        $hosp_doctors = $this->db->where('id', $this->input->post('hosdoc_id'))->get('hospital_doctors')->result_object();
        $this->data['query'] = $hosp_doctors;

        $data = array(
            'hospital_id' => $this->input->post("hospital_id"),
            'doctor_id' => $this->input->post("doctor_id")
            );

            $this->db->where('id', $id);
            if ($this->db->update('hospital_doctors', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/hospital_doctors/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

    }
}
?>