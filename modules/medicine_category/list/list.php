<?php
class Medicine_categoryList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicine_categoryList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('medicine_category');
        $this->template = 'cms/medicine_category/list/list';
    }

    public function postMedicine_categoryList()
    {
    }
}
?>