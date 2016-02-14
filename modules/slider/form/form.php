<?php
class SliderForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSliderForm()
    {
        $this->template = 'cms/slider/form/form';
    }

    public function postSliderForm()
    {
        $this->template = 'cms/slider/form/form';
        $config['upload_path']    = './uploads/slider/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';

        $data = array(
            'title' => $this->input->post('slider_title'),
            'link' => $this->input->post('slider_link'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );
        if ( $this->db->insert('slider', $data)) {
            $last_id = $this->db->insert_id();
            if(!file_exists(ROOTDIR.'/uploads/slider/') && !is_dir(ROOTDIR.'/uploads/slider/')){
                mkdir(ROOTDIR.'/uploads/slider/',"1");}

            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('image'=>$data['upload_data']['file_name']);
            $this->db->where('id',$last_id);
            $this->db->update('slider',$file_name);

            $str=seoURL($this->input->post("slider_title"));
            $url = 'slider-'.$str.".html";
            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'slider',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'slider',
                    'url' => $url
                );
            }
            $this->db->insert('url_rewrite',$url_array);
            $this->data['message'] = 'Saved Successfully!!!';

        }
        else{
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }
}
?>

