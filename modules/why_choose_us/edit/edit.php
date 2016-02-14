<?php
class Why_choose_usEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getWhy_choose_usEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('why_choose_us',array('id'=>$id));
        $this->template = 'cms/why_choose_us/edit/edit';
    }

    public function postWhy_choose_usEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/why_choose_us/edit/edit';
        $config['upload_path']    = './uploads/why_choose_us/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'title'=>$this->input->post("title"),
            'description' => $this->input->post("description")
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$data['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('why_choose_us',$file_name);
        }

        $this->db->where('id', $id);
        if ($this->db->update('why_choose_us', $data)) {
            $this->data['message'] = 'Saved Successfully!!!';
        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
        redirect('admin/why_choose_us/list');
    }

}
?>