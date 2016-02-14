<?php
class SliderList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSliderList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('slider',array(),array('position'=>'asc'));
        $this->template = 'cms/slider/list/list';
    }

    public function postSliderList()
    {

    }
}
?>