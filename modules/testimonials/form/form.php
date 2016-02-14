<?php
class TestimonialsForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getTestimonialsForm()
    {
        $this->template = 'cms/testimonials/form/form';
    }

    public function postTestimonialsForm()
    {
        $this->template = 'cms/testimonials/form/form';
        $config['upload_path']    = './uploads/testimonials/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $data = array(
            'name' => $this->input->post("name"),
            'post' => $this->input->post("post"),
            'description' => $this->input->post("description"),
            'status' => $this->input->post('status')
        );

        if ($this->db->insert('testimonials', $data)) {
            echo $this->input->post('userfile');
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/testimonials/') && !is_dir(ROOTDIR.'/uploads/testimonials/')){
                mkdir(ROOTDIR.'/uploads/testimonials/',"1");}
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');

            $data = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('testimonials',$file_name);

            $str=seoURL($this->input->post("name"));
            $url = '/testimonials-'.$str;
            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'testimonials',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'testimonials',
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