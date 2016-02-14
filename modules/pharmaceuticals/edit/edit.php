<?php
class PharmaceuticalsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getPharmaceuticalsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('pharmaceuticals',array('id'=>$id));
        $this->template = 'cms/pharmaceuticals/edit/edit';
    }

    public function postPharmaceuticalsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/pharmaceuticals/edit/edit';
        $config['upload_path']    = './uploads/pharmaceuticals/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pharmaceuticals_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pharmaceuticals_location', 'Location', 'required');
        $this->form_validation->set_rules('pharmaceuticals_email', 'Email', 'required');
        $this->form_validation->set_rules('pharmaceuticals_phone', 'Phone', 'required');

        $pharmaceuticals = $this->db->where('id', $this->input->post('pharmaceuticals_id'))->get('pharmaceuticals')->result_object();
        $this->data['query'] = $pharmaceuticals;

        if ($this->form_validation->run() == FALSE) {
            $this->data['msg'] = $this->form_validation->error_string();
        } else {
            $data = array(
                'name' => $this->input->post("pharmaceuticals_name"),
                'location' => $this->input->post("pharmaceuticals_location"),
                'phone_no' => $this->input->post("pharmaceuticals_phone"),
                'email' => $this->input->post("pharmaceuticals_email")
            );

            if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
                $config['file_name'] = $id;
                $this->load->library('upload', $config);
                $this->upload->do_upload('userfile');
                $d = array('upload_data' => $this->upload->data());
                $file_name = array('logo'=>$d['upload_data']['file_name']);
                $this->db->where('id',$id);
                $this->db->update('pharmaceuticals',$file_name);
            }

            $this->db->where('id', $id);
            if ($this->db->update('pharmaceuticals', $data)) {
                $str=seoURL($this->input->post("pharmaceuticals_name"));
                $url = 'pharmaceutical/'.$str;
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
                $this->db->where('table_name','pharmaceuticals');
                $this->db->update('url_rewrite', $url_array);

                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/pharmaceuticals/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

    }
}
?>