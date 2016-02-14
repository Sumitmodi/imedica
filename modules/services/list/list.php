<?php
class ServicesList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getServicesList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('services',array(),array('position'=>'asc'));
        $this->template = 'cms/services/list/list';
    }

    public function postServicesList()
    {

    }
}
?>