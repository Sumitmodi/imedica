<?php
class PharmaceuticalsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPharmaceuticalsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('pharmaceuticals');
        $this->template = 'cms/pharmaceuticals/list/list';
    }

    public function postPharmaceuticalsList()
    {
    }
}
?>