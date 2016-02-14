<?php
class AuthorForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
        //$this->load->library('cloud');
    }

    public function getAuthorForm()
    {
        $this->template = 'cms/author/form/form';
    }

    public function postAuthorForm()
    {
        $this->template = 'cms/author/form/form';
        $config['upload_path']    = './uploads/author/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'title' => $this->input->post("title"),
            'post' => $this->input->post("post"),
            'description' => $this->input->post("description")
        );

        if ($this->db->insert('author', $data)) {
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/author/') && !is_dir(ROOTDIR.'/uploads/author/')){
                mkdir(ROOTDIR.'/uploads/author/',"1");}
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');

            $str=seoURL($this->input->post("title"));
            $url = 'author/'.$str;
            
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('author',$file_name);



            //$this->cloud->upload(ROOTDIR . '/uploads/author/' . $data['upload_data']['file_name'], array('public_id' => 'uploads/author/' . $last_id), 'author', $last_id);


            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'author',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'author',
                    'url' => $url
                );
            }
            $this->db->insert('url_rewrite',$url_array);
            $this->data['message'] = 'Saved Successfully!!!';
            redirect('admin/author/list');

        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }

}
?>