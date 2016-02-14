<?php
class SiteEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getSiteEdit()
    {
        $this->template = 'cms/site/edit/edit';
        $this->data['query'] = $this->admin_model->table_fetch_rows('site');
        if(empty($this->data['query']))
        {
            $this->template = 'cms/site/form/form';
            redirect('admin/site/form');
        }
    }

    public function postSiteEdit()
    {
        $id = $this->input->post('site_id');
        $config['upload_path'] = './uploads/site/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;

        $this->template = 'cms/site/edit/edit';
        $site = $this->db->where('id', $this->input->post('site_id'))->get('site')->result_object();
        $this->data['query'] = $site;

        $data = array(
            'email' => $this->input->post("email"),
            'address' => $this->input->post("address"),
            'phone' => $this->input->post("phone"),
            'opening_day' => $this->input->post("opening_day"),
            'opening_hour' => $this->input->post("opening_hour"),
            'facebook_link' => $this->input->post("facebook_link"),
            'twitter_link' => $this->input->post("twitter_link"),
            'youtube_link' => $this->input->post("youtube_link"),
            'google_link' => $this->input->post("google_link"),
            'homepage_header' => $this->input->post("header"),
            'footer' => $this->input->post("footer"),
        );
        $this->db->where('id', $id);
        if ($this->db->update('site', $data)) {

            if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] == 0) {
                if (!file_exists(ROOTDIR . '/uploads/site/') && !is_dir(ROOTDIR . '/uploads/site/')) {
                    mkdir(ROOTDIR . '/uploads/site/', "1");
                }
                $config['file_name'] = $id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('logo' => $data['upload_data']['file_name']);
                $this->db->where('id', $id);
                $this->db->update('site', $file_name);
            }
            $this->session->set_flashdata('message', 'Updated successfully!!!');
            redirect('admin/site/list');
        } else {
            $this->session->set_flashdata('message', 'Update unsuccessful!!!');
        }

    }

}
?>
