<?php
class MedicinesAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicinesAdd()
    {
        $this->template = 'cms/medicines/add/add';
    }

    public function postMedicinesAdd()
    {
        $this->template = 'cms/medicines/add/add';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('composition', 'composition', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'medicine_name' => $this->input->post("medicine_name"),
                'pharmaceuticals' => $this->input->post("pharmaceutical_id"),
                'category' => $this->input->post("category"),
                'composition' => $this->input->post("composition")
            );
            if ( $this->db->insert('medicines', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

    }

}
?>