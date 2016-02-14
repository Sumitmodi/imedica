<?php
class Medicine_categoryAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicine_categoryAdd()
    {
        $this->template = 'cms/medicine_category/add/add';
    }

    public function postMedicine_categoryAdd()
    {
        $this->template = 'cms/medicine_category/add/add';
        $data = array(
            'category_name' => $this->input->post("category_name")
        );
        if ( $this->db->insert('medicine_category', $data)) {
            $this->data['message'] = 'Saved Successfully!!!';
        }
        else{
            $this->data['message'] = 'Sorry,The data could not be saved';
        }
    }
}
?>