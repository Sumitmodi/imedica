<?php
class HospitalsDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospitalsDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'hospitals', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

