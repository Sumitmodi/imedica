<?php
class User_orderList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/user';
}

    public function getUser_orderList()
    {
        $session_data = $this->session->userdata('login');
        $id = $session_data->id;
        $this->data['query'] = $this->user_model->table_fetch_rows('order',array('parent_id'=>$id));
        $this->template = 'user/user_order/list/list';
    }

    public function postUser_orderList()
    {
    }
}
?>