<?php
class ClientsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getClientsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('clients',array(),array('position'=>'asc'));
        $this->template = 'cms/clients/list/list';
    }

    public function postClientsList()
    {

    }
}
?>