<?php
class AuthorList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getAuthorList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('author');
        $this->template = 'cms/author/list/list';
    }

    public function postAuthorList()
    {

    }
}
?>