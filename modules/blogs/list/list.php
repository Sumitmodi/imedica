<?php
class BlogsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getBlogsList()
    {
        $this->data['authors'] = $this->admin_model->table_fetch_rows('author');
        $this->data['query'] = $this->admin_model->table_fetch_rows('blogs');
        $this->template = 'cms/blogs/list/list';
    }

    public function postBlogsList()
    {

    }
}
?>