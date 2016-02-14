<?php
class NewsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getNewsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('news');
        $this->template = 'cms/news/list/list';
    }

    public function postNewsList()
    {
    }
}
?>