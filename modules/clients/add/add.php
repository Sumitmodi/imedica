<?php
class ClientsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getClientsAdd()
    {
        $this->template = 'cms/clients/add/add';
    }

    public function postClientsAdd()
    {
        $this->template = 'cms/clients/add/add';
        $config['upload_path']    = './uploads/clients/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'name' => $this->input->post("client_name"),
            'phone' => $this->input->post("client_phone"),
            'email' => $this->input->post("client_email"),
        );

        if ($this->db->insert('clients', $data)) {
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/clients/') && !is_dir(ROOTDIR.'/uploads/clients/')){
                mkdir(ROOTDIR.'/uploads/clients/',"1");}
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('logo'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('clients',$file_name);

            $this->data['message'] = 'Saved Successfully!!!';

        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }

}
?>