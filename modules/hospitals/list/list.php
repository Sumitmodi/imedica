<?php
class HospitalsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospitalsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('hospitals');
        $this->template = 'cms/hospitals/list/list';
    }

    public function postHospitalsList()
    {
    }
}
?>