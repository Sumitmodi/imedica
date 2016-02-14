<?php
class NimsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getNimsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('nims',array('id'=>$id));
        $this->template = 'cms/nims/edit/edit';
    }

    public function postNimsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/nims/edit/edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('composition', 'composition', 'required');
        $this->form_validation->set_rules('dose', 'dose', 'required');

        $cims = $this->db->where('id', $this->input->post('nims_id'))->get('nims')->result_object();
        $this->data['query'] = $cims;

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'medicine_name' => $this->input->post("medicine_name"),
                'category' => $this->input->post("category"),
                'composition' => $this->input->post("composition"),
                'dose' => implode(';',$this->input->post("dose"))
            );

            $this->db->where('id', $id);
            if ($this->db->update('nims', $data)) {
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/nims/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}
?>