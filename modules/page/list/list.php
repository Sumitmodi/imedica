<?php
class PageList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPageList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('page',array(),array('position'=>'asc'));
        $this->template = 'cms/page/list/list';

    }

    public function postPageList()
    {


    }
}
?>