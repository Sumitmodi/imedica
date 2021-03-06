<?php
class CimsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getCimsAdd()
    {
        $this->template = 'cms/cims/add/add';
    }

    public function postCimsAdd()
    {
        $this->template = 'cms/cims/add/add';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('composition', 'composition', 'required');
        $this->form_validation->set_rules('dose', 'dose', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'medicine_name' => $this->input->post("medicine_name"),
                'category' => $this->input->post("category"),
                'composition' => $this->input->post("composition"),
                'dose' => implode(';',$this->input->post("dose"))
            );
            if ( $this->db->insert('cims', $data)) {
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

    }

}
?>