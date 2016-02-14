<?php
class InquiriesList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $this->layout = 'themes/cms';
        } else{
            $this->layout = 'themes/client';
        }
    }
    public function getInquiriesList()
    {
        if ($this->session->userdata('login')) {
            $session_data = $this->session->userdata('login');
            $id = $session_data->id;
            $this->data['query'] = $this->client_model->show_inquiries($id);
            $this->template = 'client/inquiries/list/list';

        } else {
            $this->data['query'] = $this->admin_model->table_fetch_rows('inquiries');
            $this->template = 'cms/inquiries/list/list';
        }
    }

    public function postInquiriesList()
    {
    }
}
?>