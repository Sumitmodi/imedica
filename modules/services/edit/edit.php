<?php
class ServicesEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getServicesEdit()
    {
        //$id = $this->input->get("id");
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('services',array('id'=>$id));
        $this->template = 'cms/services/edit/edit';
    }

    public function postServicesEdit()
    {
        //$id = $this->input->post('services_id');
        $id = $this->uri->segment(4);
        $this->template = 'cms/services/edit/edit';
        $services = $this->db->where('id', $this->input->post('services_id'))->get('services')->result_object();
        $this->data['query'] = $services;

        $data = array(
            'title' => $this->input->post('services_title'),
            'content' => $this->input->post('services_content'),
            'status' => $this->input->post('services_status')
        );

        $this->db->where('id', $id);
        if ($this->db->update('services', $data)) {
            $str=seoURL($this->input->post("services_title"));
            $url = 'service/'.$str;
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
            $this->db->where('table_name','services');
            $this->db->update('url_rewrite', $url_array);
                $this->session->set_flashdata('message','Updated successfully.');
                redirect('admin/services/list');
            } else {
            $this->session->set_flashdata('message','Update Unsuccessful.');
            }
    }
}
?>