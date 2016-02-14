<?php
class Why_choose_usDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getWhy_choose_usDelete()
    {

        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'why_choose_us', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}

