<?php
class AuthorDelete extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
        $this->load->library('cloud');
    }

    public function getAuthorDelete()
    {
        $id = $this->admin_model->get_id();
        $this->admin_model->delete_table_record($id,'author', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }
}