<?php
class Doctor_categoryEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctor_categoryEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('doctor_category',array('id'=>$id));
        $this->template = 'cms/doctor_category/edit/edit';
    }

    public function postDoctor_categoryEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/doctor_category/edit/edit';
        $category = $this->db->where('id', $this->input->post('category_id'))->get('doctor_category')->result_object();
        $this->data['query'] = $category;

        $data = array(
            'category_name' => $this->input->post("category_name")
        );

        $this->db->where('id', $id);
        if ( $this->db->update('doctor_category', $data)) {
            $str=seoURL($this->input->post("category_name"));
            $url = 'doctors/'.$str;
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
            $this->db->where('table_name','doctor_category');
            $this->db->update('url_rewrite', $url_array);
            $this->session->set_flashdata('message','Updated successfully.');
            redirect('admin/doctor_category/list');
        }
        else{
            $this->session->set_flashdata('message','Update Unsuccessful.');
        }

    }

}
?>