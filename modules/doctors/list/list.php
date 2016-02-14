<?php
class DoctorsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctorsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('doctors');
        $this->template = 'cms/doctors/list/list';
    }

    public function postDoctorsList()
    {
    }
}
?>