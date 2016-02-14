<?php
class Hospital_doctorsDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospital_doctorsDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'hospital_doctors', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

