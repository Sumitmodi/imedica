<?php
class OrderEdit extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getOrderEdit()
    {
        $this->template = 'cms/order/edit/edit';
    }

    public function postOrderEdit()
    {

    }
}