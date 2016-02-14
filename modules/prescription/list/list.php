<?php
class PrescriptionList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')) {
            $this->layout = 'themes/cms';
        }else{
            $this->layout = 'themes/user';
        }
    }

    public function getPrescriptionList()
    {
        if($this->session->userdata('logged_in')) {
            $this->data['query'] = $this->admin_model->table_fetch_rows('patient');
            $this->template = 'cms/prescription/list/list';
        }else{
            $session_data=$this->session->userdata('login');
            $id = $session_data->id;
            $this->data['query'] = $this->user_model->show_patient($id);
            $this->template = 'user/prescription/list/list';
        }
    }

    public function postPrescriptionList()
    {
    }
}
?>