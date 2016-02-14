<?php
class AdminList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

   public function getAdminList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('admin');
        $this->template = 'cms/admin/list/list';
    }

    public function postAdminList()
    {
    }
}
?>