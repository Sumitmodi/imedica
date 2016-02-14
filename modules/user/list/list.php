<?php
class UserList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getUserList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('user');
        $this->template = 'cms/user/list/list';
    }

    public function postUserList()
    {
    }
}
?>