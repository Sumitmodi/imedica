<?php
class PharmaceuticalsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPharmaceuticalsAdd()
    {
        $this->template = 'cms/pharmaceuticals/add/add';
    }

    public function postPharmaceuticalsAdd()
    {
        $this->template = 'cms/pharmaceuticals/add/add';
        $config['upload_path']    = './uploads/pharmaceuticals/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pharmaceuticals_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pharmaceuticals_location', 'Location', 'required');
        $this->form_validation->set_rules('pharmaceuticals_email', 'Email', 'required');
        $this->form_validation->set_rules('pharmaceuticals_phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' => $this->input->post("pharmaceuticals_name"),
                'location' => $this->input->post("pharmaceuticals_location"),
                'phone_no' => $this->input->post("pharmaceuticals_phone"),
                'email' => $this->input->post("pharmaceuticals_email")
            );
            if ( $this->db->insert('pharmaceuticals', $data)) {
                $last_id = $this->db->insert_id();
                if(!file_exists(ROOTDIR.'/uploads/pharmaceuticals/') && !is_dir(ROOTDIR.'/uploads/pharmaceuticals/')){
                    mkdir(ROOTDIR.'/uploads/pharmaceuticals/',"1");}
                $config['file_name'] = $last_id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('logo'=>$data['upload_data']['file_name']);
                $this->db->where('id',$last_id);
                $this->db->update('pharmaceuticals',$file_name);

                $str=seoURL($this->input->post("pharmaceuticals_name"));
                $url = 'pharmaceutical/'.$str;
                if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                    $url_array = array(
                        'table_id' => $last_id,
                        'table_name' => 'pharmaceuticals',
                        'url' => $url. '-1'
                    );
                }else{
                    $url_array = array(
                        'table_id' => $last_id,
                        'table_name' => 'pharmaceuticals',
                        'url' => $url
                    );
                }
                $this->db->insert('url_rewrite',$url_array);
                $this->data['message'] = 'Saved Successfully!!!';
            }
            else{
                $this->data['message'] = 'Sorry,The data could not be saved';
            }

        }

    }

}
?>