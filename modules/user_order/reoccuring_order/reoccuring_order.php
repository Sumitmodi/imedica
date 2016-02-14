<?php
class User_orderReoccuring_order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/user';
    }

    public function getUser_orderReoccuring_order()
    {
        $session_data = $this->session->userdata('login');
        $id = $session_data->id;
        $this->data['query'] = $this->user_model->table_fetch_rows('order',array('parent_id'=>$id,'reoccuring_order'=>'1'));
        $this->template = 'user/user_order/reoccuring_order/reoccuring_order';
    }

    public function postUser_orderReoccuring_order()
    {
    }
}
?>