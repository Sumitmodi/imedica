<?php
class SiteList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSiteList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('site');
        $this->template = 'cms/site/list/list';
    }

    public function postSiteList()
    {

    }
}
?>

