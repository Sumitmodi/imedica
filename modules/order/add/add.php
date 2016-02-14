<?php
class OrderAdd extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getOrderAdd()
    {
        $this->template = 'cms/order/add/add';
    }

    public function postOrderAdd()
    {

    }
}