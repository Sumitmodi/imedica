<?php
class MedicinesList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicinesList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('medicines');
        $this->template = 'cms/medicines/list/list';
    }

    public function postMedicinesList()
    {
    }
}
?>