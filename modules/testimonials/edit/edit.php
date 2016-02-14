<?php
class TestimonialsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getTestimonialsEdit()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->table_fetch_row('testimonials',array('id'=>$id));
        $this->template = 'cms/testimonials/edit/edit';
    }

    public function postTestimonialsEdit()
    {
        $id = $this->uri->segment(4);
        $config['upload_path']    = './uploads/testimonials/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite']  = TRUE;

        $this->template = 'cms/testimonials/edit/edit';
        $testimonials = $this->db->where('id', $this->input->post('testimonials_id'))->get('testimonials')->result_object();
        $this->data['query'] = $testimonials;

        $data = array(
            'name' => $this->input->post("name"),
            'post' => $this->input->post("post"),
            'description' => $this->input->post("description"),
            'status' => $this->input->post('status')
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('testimonials',$file_name);
        }

        $this->db->where('id', $id);
        if ($this->db->update('testimonials', $data)) {
            $str=seoURL($this->input->post("name"));
            $url = '/testimonials-'.$str;
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
            $this->db->where('table_name','testimonials');
            $this->db->update('url_rewrite', $url_array);
            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/testimonials/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>