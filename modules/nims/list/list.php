<?php
class NimsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getNimsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('nims');
        $this->template = 'cms/nims/list/list';
    }

    public function postNimsList()
    {
    }
}
?>