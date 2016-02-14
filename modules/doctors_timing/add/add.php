<?php
class Doctors_timingAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctors_timingAdd()
    {
        $this->template = 'cms/doctors_timing/add/add';
    }

    public function postDoctors_timingAdd()
    {
        $this->template = 'cms/doctors_timing/add/add';

            $data = array(
                'doctor_id' => $this->input->post("doctor_id"),
                'hospital_id' => $this->input->post("hospital_id"),
                'start_time' => $this->input->post("start_time"),
                'end_time' => $this->input->post("end_time"),
                'day' => $this->input->post("day")
            );
            if ( $this->db->insert('doctors_timing', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

}
?>