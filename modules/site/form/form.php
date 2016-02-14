<?php
class SiteForm extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSiteForm()
    {
        $this->template = 'cms/site/form/form';
    }

    public function postSiteForm()
    {
        $config['upload_path'] = './uploads/site/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->template = 'cms/site/form/form';

        $data = array(
            'email' => $this->input->post("email"),
            'address' => $this->input->post("address"),
            'phone' => $this->input->post("phone"),
            'facebook_link' => $this->input->post("facebook_link"),
            'twitter_link' => $this->input->post("twitter_link"),
            'youtube_link' => $this->input->post("youtube_link"),
            'google_link' => $this->input->post("google_link"),
            'homepage_header' => $this->input->post("header"),
            'footer' => $this->input->post("footer"),
        );


        if ($this->db->insert('site', $data)) {
            if(!file_exists(ROOTDIR.'/uploads/site/') && !is_dir(ROOTDIR.'/uploads/site/')){
                mkdir(ROOTDIR.'/uploads/site/',"1");}
            $last_id = $this->db->insert_id();
            $config['file_name'] = $last_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');

            $data = array('upload_data' => $this->upload->data());
            $file_name = array('logo' => $data['upload_data']['file_name']);
            $this->db->where('id', $last_id);
            $this->db->update('site', $file_name);
            $this->data['message'] = 'Saved Successfully!!!';
        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }

}
?>