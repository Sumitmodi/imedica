<?php
class OrderList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getOrderList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('order');
        $this->template = 'cms/order/list/list';
    }

    public function postOrderList()
    {
    }
}
?>