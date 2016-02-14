<?php
class BlogsForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getBlogsForm()
    {
        $this->data['authors'] = $this->admin_model->table_fetch_rows('author');
        $this->template = 'cms/blogs/form/form';
    }

    public function postBlogsForm()
    {
        $this->template = 'cms/blogs/form/form';
        $config['upload_path']    = './uploads/blogs/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'title' => $this->input->post("title"),
            'author' => $this->input->post("author"),
            'category' => $this->input->post("category"),
            'date' => $this->input->post("date"),
            'description' => $this->input->post("description")
        );

        if ($this->db->insert('blogs', $data)) {
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/blogs/') && !is_dir(ROOTDIR.'/uploads/blogs/')){
                mkdir(ROOTDIR.'/uploads/blogs/',"1");}
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');

            $str=seoURL($this->input->post("title"));
            $url = 'blogs/'.$str;
            
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('blogs',$file_name);


            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'blogs',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'blogs',
                    'url' => $url
                );
            }
            $this->db->insert('url_rewrite',$url_array);
            $this->data['message'] = 'Saved Successfully!!!';

        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }

}
?>