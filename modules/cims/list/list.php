<?php
class CimsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getCimsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('cims');
        $this->template = 'cms/cims/list/list';
    }

    public function postCimsList()
    {
    }
}
?>