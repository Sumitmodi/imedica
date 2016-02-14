<?php
class DoctorsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctorsAdd()
    {
        $this->template = 'cms/doctors/add/add';
    }

    public function postDoctorsAdd()
    {
        $this->template = 'cms/doctors/add/add';
        $config['upload_path']    = './uploads/doctors/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('doctor_name', 'Name', 'trim|required|xss_clean|is_unique[doctors.name]');
        $this->form_validation->set_rules('specialization', 'specialization', 'trim|required|xss_clean');
        $this->form_validation->set_rules('degree', 'degree', 'trim|required|xss_clean');
        $this->form_validation->set_rules('doctor_location', 'Location', 'required');
        $this->form_validation->set_rules('doctor_email', 'Email', 'required|is_unique[doctors.email]');
        $this->form_validation->set_rules('doctor_phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' =>  $this->input->post("doctor_name"),
                'specification' =>  $this->input->post("specification"),
                'specialization' => $this->input->post("specialization"),
                'degree' => $this->input->post("degree"),
                'location' => $this->input->post("doctor_location"),
                'phone_no' => $this->input->post("doctor_phone"),
                'email' => $this->input->post("doctor_email")
            );
            if ( $this->db->insert('doctors', $data)) {
                $last_id = $this->db->insert_id();
                if(!file_exists(ROOTDIR.'/uploads/doctors/') && !is_dir(ROOTDIR.'/uploads/doctors/')){
                    mkdir(ROOTDIR.'/uploads/doctors/',"1");}
                $config['file_name'] = $last_id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $data = array('upload_data' => $this->upload->data());
                $file_name = array('profile_img'=>$data['upload_data']['file_name']);
                $this->db->where('id',$last_id);
                $this->db->update('doctors',$file_name);

                $str=seoURL($this->input->post("doctor_name"));
                $url = 'doctor/'.$str;
                if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                    $url_array = array(
                        'table_id' => $last_id,
                        'table_name' => 'doctors',
                        'url' => $url. '-1'
                    );
                }else{
                    $url_array = array(
                        'table_id' => $last_id,
                        'table_name' => 'doctors',
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