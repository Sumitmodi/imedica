<?php
class Why_choose_usList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getWhy_choose_usList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('why_choose_us');
        $this->template = 'cms/why_choose_us/list/list';
    }

    public function postWhy_choose_usList()
    {
    }
}
?>