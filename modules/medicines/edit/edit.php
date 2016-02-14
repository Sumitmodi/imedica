<?php
class MedicinesEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicinesEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('medicines',array('id'=>$id));
        $this->template = 'cms/medicines/edit/edit';
    }

    public function postMedicinesEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/medicines/edit/edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('composition', 'composition', 'required');

        $cims = $this->db->where('id', $this->input->post('medicines_id'))->get('medicines')->result_object();
        $this->data['query'] = $cims;

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'medicine_name' => $this->input->post("medicine_name"),
                'pharmaceuticals' => $this->input->post("pharmaceutical_id"),
                'category' => $this->input->post("category"),
                'composition' => $this->input->post("composition")
            );

            $this->db->where('id', $id);
            if ($this->db->update('medicines', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/medicines/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}
?>