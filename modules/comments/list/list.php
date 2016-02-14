<?php
class CommentsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getCommentsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('comments');
        $this->data['blogs'] = $this->admin_model->table_fetch_rows('blogs');
        // print_r($this->data['blogs']); die;
        $this->template = 'cms/comments/list/list';
    }

    public function postCommentsList()
    {

    }
}
?>