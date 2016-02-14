<?php
class Doctors_timingList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctors_timingList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('doctors_timing');
        $this->template = 'cms/doctors_timing/list/list';
    }

    public function postDoctors_timingList()
    {
    }
}
?>