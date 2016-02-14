<?php
class AuthorEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
        //$this->load->library('cloud');
    }

    public function getAuthorEdit()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->table_fetch_row('author',array('id'=>$id));
        $this->template = 'cms/author/edit/edit';
    }

    public function postAuthorEdit()
    {
        //$id = $this->input->post('partner_id');
        $id = $this->uri->segment(4);
        $config['upload_path']    = './uploads/author/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite']  = TRUE;

        $this->template = 'cms/author/edit/edit';
        $author = $this->db->where('id', $this->input->post('author_id'))->get('author')->result_object();
        $this->data['query'] = $author;

        $data = array(
            'title' => $this->input->post("title"),
            'post' => $this->input->post("post"),
            'description' => $this->input->post("description"),
            // 'image' => $this->input->post("userfile"),
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('author',$file_name);

            //$this->cloud->upload(ROOTDIR . '/uploads/author/' . $d['upload_data']['file_name'], array('public_id' => 'uploads/author/' . $id), 'author', $id);

        }

        $this->db->where('id', $id);
        if ($this->db->update('author', $data)) {
            $str=seoURL($this->input->post("title"));
            $url = 'author/'.$str;

            if ($this->db->where('table_id !=', $id)->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                   'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                   'url' => $url
                );
            }
            $this->db->where('table_id', $id);
            $this->db->where('table_name','author');
            $this->db->update('url_rewrite', $url_array);

            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/author/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>