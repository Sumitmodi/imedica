<?php
class Medicine_categoryEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getMedicine_categoryEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('medicine_category',array('id'=>$id));
        $this->template = 'cms/medicine_category/edit/edit';
    }

    public function postMedicine_categoryEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/medicine_category/edit/edit';
        $category = $this->db->where('id', $this->input->post('category_id'))->get('medicine_category')->result_object();
        $this->data['query'] = $category;

        $data = array(
            'category_name' => $this->input->post("category_name")
        );
        $this->db->where('id', $id);
        if ( $this->db->update('medicine_category', $data)) {
            //$this->data['message'] = 'Updated Successfully!!!';
            $this->session->set_flashdata('message','Updated successfully.');
            redirect('admin/medicine_category/list');
        }
        else{
            $this->session->set_flashdata('message','Update Unsuccessful.');
        }

    }

}
?>