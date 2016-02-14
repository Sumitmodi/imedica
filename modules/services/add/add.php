<?php
class ServicesAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getServicesAdd()
    {
        $this->template = 'cms/services/add/add';
    }

    public function postServicesAdd()
    {
        $this->template = 'cms/services/add/add';

        $data = array(
            'title' => $this->input->post('services_title'),
            'content' => $this->input->post('services_content'),
            'status' => $this->input->post('services_status')
        );

        if ( $this->db->insert('services', $data)) {
            $last_id = $this->db->insert_id();
            $str=seoURL($this->input->post("services_title"));
            $url = 'service/'.$str;
            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'services',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'services',
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