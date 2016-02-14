<?php
class Doctor_categoryDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctor_categoryDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'doctor_category', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

