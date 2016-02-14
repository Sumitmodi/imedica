<?php
class Prescribed_medicineList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
}

    public function getPrescribed_medicineList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('prescribed_medicine');
        $this->template = 'cms/prescribed_medicine/list/list';
    }

    public function postPrescribed_medicineList()
    {
    }
}
?>