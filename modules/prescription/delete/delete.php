<?php
class PrescriptionDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPrescriptionDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'patient', array('id' => $id));
        $this->admin_model->delete_table_record($id,'prescribed_medicine', array('patient' => $id));
        $this->admin_model->delete_table_record($id,'order', array('patient' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

