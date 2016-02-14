<?php
class Why_choose_usAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getWhy_choose_usAdd()
    {
        $this->template = 'cms/why_choose_us/add/add';
    }

    public function postWhy_choose_usAdd()
    {
        $this->template = 'cms/why_choose_us/add/add';
        $config['upload_path']    = './uploads/why_choose_us/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'title'=>$this->input->post("title"),
            'description' => $this->input->post("description")
        );

        if ($this->db->insert('why_choose_us', $data)) {
            if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
                $last_id = $this->db->insert_id();
                if(!file_exists(ROOTDIR.'/uploads/why_choose_us/') && !is_dir(ROOTDIR.'/uploads/why_choose_us/')){
                    mkdir(ROOTDIR.'/uploads/why_choose_us/',"1");}
                $config['file_name'] = $last_id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('image'=>$data['upload_data']['file_name']);
                $this->db->where('id',$last_id);
                $this->db->update('why_choose_us',$file_name);
            }
            $this->data['message'] = 'Saved Successfully!!!';

        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }

}
?>