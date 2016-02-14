<?php
class PageForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPageForm()
    {
        $this->template = 'cms/page/form/form';
    }

    public function postPageForm()
    {
        $this->template = 'cms/page/form/form';
        $config['upload_path']    = './uploads/page/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'parent_id' => $this->input->post('parent'),
            'menu_title' => $this->input->post('menu_title'),
            'page_title' => $this->input->post('page_title'),
            'h1_title' => $this->input->post('h1_title'),
            'content' => $this->input->post('content'),
            'meta_keywords' => $this->input->post('meta_keywords'),
            'meta_description' => $this->input->post('meta_description'),
            'status' => $this->input->post('status')
        );
        if ($this->db->insert('page', $data)) {
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/page/') && !is_dir(ROOTDIR.'/uploads/page/')){
                mkdir(ROOTDIR.'/uploads/page/',"1");}
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('header_img'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('page',$file_name);

            $url_array = array(
                'table_id' => $last_id,
                'table_name' => 'page',
                'url' => $this->input->post('url')
            );
            $this->db->insert('url_rewrite',$url_array);
            $this->data['message'] = 'Saved Successfully!!!';

        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }
}
?>