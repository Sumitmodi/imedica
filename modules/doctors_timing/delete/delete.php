<?php
class Doctors_timingDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctors_timingDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'doctors_timing', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

