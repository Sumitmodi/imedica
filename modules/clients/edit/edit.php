<?php
class ClientsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getClientsEdit()
    {        
        $id = $this->uri->segment(4);        
        $this->data['query'] = $this->admin_model->table_fetch_row('clients',array('id'=>$id));
        $this->template = 'cms/clients/edit/edit';
    }

    public function postClientsEdit()
    {
        //$id = $this->input->post('client_id');
        $id = $this->uri->segment(4);
        $config['upload_path']    = './uploads/clients/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite']  = TRUE;

        $this->template = 'cms/clients/edit/edit';
        $clients = $this->db->where('id', $this->input->post('clients_id'))->get('clients')->result_object();
        $this->data['query'] = $clients;

        $data = array(
            'name' => $this->input->post("client_name"),
            'phone' => $this->input->post("client_phone"),
            'email' => $this->input->post("client_email")
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('logo'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('clients',$file_name);
        }

        $this->db->where('id', $id);
        if ($this->db->update('clients', $data)) {
            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/clients/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>