<?php
class FaqList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getFaqList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('faq');
        $this->template = 'cms/faq/list/list';
    }

    public function postFaqList()
    {

    }
}
?>