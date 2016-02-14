<?php
class Medicine_categoryDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicine_categoryDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'medicine_category', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

