<?php
class Hospital_doctorsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getHospital_doctorsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('hospital_doctors');
        $this->template = 'cms/hospital_doctors/list/list';
    }

    public function postHospital_doctorsList()
    {
    }
}
?>