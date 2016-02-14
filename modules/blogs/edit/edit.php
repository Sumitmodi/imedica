<?php
class BlogsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getBlogsEdit()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->table_fetch_row('blogs',array('id'=>$id));
        $this->data['authors'] = $this->admin_model->table_fetch_rows('author');
        $this->template = 'cms/blogs/edit/edit';
    }

    public function postBlogsEdit()
    {
        $id = $this->uri->segment(4);
        $config['upload_path']    = './uploads/blogs/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite']  = TRUE;

        $this->template = 'cms/blogs/edit/edit';
        $blogs = $this->db->where('id', $this->input->post('blogs_id'))->get('blogs')->result_object();
        $this->data['query'] = $blogs;

        $data = array(
            'title' => $this->input->post("title"),
            'description' => $this->input->post("description"),
            'author' => $this->input->post("author"),
            'category' => $this->input->post("category"),
            'date' => $this->input->post("date"),
            // 'image' => $this->input->post("userfile"),
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('blogs',$file_name);

        }

        $this->db->where('id', $id);
        if ($this->db->update('blogs', $data)) {
            $str=seoURL($this->input->post("title"));
            $url = 'blogs/'.$str;

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
            $this->db->where('table_name','blogs');
            $this->db->update('url_rewrite', $url_array);

            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/blogs/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>