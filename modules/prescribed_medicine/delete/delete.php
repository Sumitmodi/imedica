<?php
class Prescribed_medicineDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPrescribed_medicineDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'prescribed_medicine', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

