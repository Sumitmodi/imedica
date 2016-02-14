<?php
class DoctorsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctorsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('doctors',array('id'=>$id));
        $this->template = 'cms/doctors/edit/edit';
    }

    public function postDoctorsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/doctors/edit/edit';
        $config['upload_path']    = './uploads/doctors/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('doctor_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('specialization', 'specialization', 'trim|required|xss_clean');
        $this->form_validation->set_rules('degree', 'degree', 'trim|required|xss_clean');
        $this->form_validation->set_rules('doctor_location', 'Location', 'required');
        $this->form_validation->set_rules('doctor_email', 'Email', 'required');
        $this->form_validation->set_rules('doctor_phone', 'Phone', 'required');

        $doctors = $this->db->where('id', $this->input->post('doctors_id'))->get('doctors')->result_object();
        $this->data['query'] = $doctors;

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('name', $this->input->post('doctor_name'))->
            get('doctors')->num_rows() > 0 ) {
            $this->data['message'] = 'Doctor name has already been added.Please check.';
            return;
        }

        if (
            $this->
            db->
            where('id !=', $this->uri->segment(4))->
            where('email', $this->input->post('doctor_email'))->
            get('doctors')->num_rows() > 0 ) {
            $this->data['message'] = 'Email is already in use by another account.';
            return;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' => $this->input->post("doctor_name"),
                'specification' => $this->input->post("specification"),
                'specialization' => $this->input->post("specialization"),
                'degree' => $this->input->post("degree"),
                'location' => $this->input->post("doctor_location"),
                'phone_no' => $this->input->post("doctor_phone"),
                'email' => $this->input->post("doctor_email")
            );

            if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
                $config['file_name'] = $id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $d = array('upload_data' => $this->upload->data());
                $file_name = array('profile_img'=>$d['upload_data']['file_name']);
                $this->db->where('id',$id);
                $this->db->update('doctors',$file_name);
            }

            $this->db->where('id', $id);
            if ($this->db->update('doctors', $data)) {
                $str=seoURL($this->input->post("doctor_name"));
                $url = 'doctor/'.$str;
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
                $this->db->where('table_name','doctors');
                $this->db->update('url_rewrite', $url_array);
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/doctors/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}
?>