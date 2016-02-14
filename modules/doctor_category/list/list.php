<?php
class Doctor_categoryList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctor_categoryList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('doctor_category');
        $this->template = 'cms/doctor_category/list/list';
    }

    public function postDoctor_categoryList()
    {
    }
}
?>