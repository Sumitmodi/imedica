<?php
class Doctors_timingEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctors_timingEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('doctors_timing',array('id'=>$id));
        $this->template = 'cms/doctors_timing/edit/edit';
    }

    public function postDoctors_timingEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/doctors_timing/edit/edit';

        $cims = $this->db->where('id', $this->input->post('doc_id'))->get('doctors_timing')->result_object();
        $this->data['query'] = $cims;

            $data = array(
                'doctor_id' => 'Dr.'. $this->input->post("doctor_id"),
                'hospital_id' => $this->input->post("hospital_id"),
                'start_time' => $this->input->post("start_time"),
                'end_time' => $this->input->post("end_time"),
                'day' => $this->input->post("day")
            );

            $this->db->where('id', $id);
            if ($this->db->update('doctors_timing', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/doctors_timing/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

    }
}
?>