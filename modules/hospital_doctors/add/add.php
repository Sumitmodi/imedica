<?php
class Hospital_doctorsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospital_doctorsAdd()
    {
        $this->template = 'cms/hospital_doctors/add/add';
    }

    public function postHospital_doctorsAdd()
    {
        $this->template = 'cms/hospital_doctors/add/add';

            $data = array(
                'hospital_id' => $this->input->post("hospital_id"),
                'doctor_id' => $this->input->post("doctor_id")
            );
            if ( $this->db->insert('hospital_doctors', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }
    }

}
?>