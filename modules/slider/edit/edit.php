<?php
class SliderEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSliderEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('slider',array('id'=>$id));
        $this->template = 'cms/slider/edit/edit';
    }

    public function postSliderEdit()
    {
        //$id = $this->uri->segment(4);
        $id = $this->uri->segment(4);
        $this->template = 'cms/slider/edit/edit';
        $config['upload_path'] = './uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $slider = $this->db->where('id', $this->input->post('slider_id'))->get('slider')->result_object();
        $this->data['query'] = $slider;

        $data = array(
            'title' => $this->input->post('slider_title'),
            'link' => $this->input->post('slider_link'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('slider',$file_name);
        }

        $this->db->where('id', $id);
        if ($this->db->update('slider', $data)) {
            $str=seoURL($this->input->post("slider_title"));
            $url = 'slider-'.$str.".html";
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
            $this->db->where('table_name','slider');
            $this->db->update('url_rewrite', $url_array);

            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/slider/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>






















