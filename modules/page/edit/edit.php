<?php
class PageEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPageEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('page',array('id'=>$id));
        $this->template = 'cms/page/edit/edit';
    }

    public function postPageEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/page/edit/edit';
        $config['upload_path']    = './uploads/page/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $page = $this->db->where('id', $this->input->post('page_id'))->get('page')->result_object();
        $this->data['query'] = $page;

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

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('header_img'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('page',$file_name);
        }

        $this->db->where('id', $id);
        if ($this->db->update('page', $data)) {
            $url_array = array(
                'url' => $this->input->post('url')
            );
            $this->db->where('table_id', $id);
            $this->db->where('table_name','page');
            $this->db->update('url_rewrite', $url_array);
            $this->session->set_flashdata('message','Updated successfully.');
            redirect('admin/page/list');
        } else {
            $this->session->set_flashdata('message','Update Unsuccessful.');
        }
    }
}
?>