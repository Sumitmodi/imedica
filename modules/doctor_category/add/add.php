<?php
class Doctor_categoryAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getDoctor_categoryAdd()
    {
        $this->template = 'cms/doctor_category/add/add';
    }

    public function postDoctor_categoryAdd()
    {
        $this->template = 'cms/doctor_category/add/add';

        $data = array(
            'category_name' => $this->input->post("category_name"),
        );
        if ( $this->db->insert('doctor_category', $data)) {
            $last_id = $this->db->insert_id();

            $str=seoURL($this->input->post("category_name"));
            $url = 'doctors/'.$str;
            if ($this->db->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'doctor_category',
                    'url' => $url. '-1'
                );
            }else{
                $url_array = array(
                    'table_id' => $last_id,
                    'table_name' => 'doctor_category',
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
?>