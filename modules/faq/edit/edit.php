<?php
class FaqEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getFaqEdit()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->table_fetch_row('faq',array('id'=>$id));
        $this->template = 'cms/faq/edit/edit';
    }

    public function postFaqEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/faq/edit/edit';
        $faq = $this->db->where('id', $this->input->post('faq_id'))->get('faq')->result_object();
        $this->data['query'] = $faq;

        $data = array(
            //'id' => $this->input->post('faq_id'),
            'faq_question' => $this->input->post('faq_question'),
            'faq_answer' => $this->input->post('faq_answer'),
            'faq_date' => $this->input->post('faq_date')
        );

        $this->db->where('id', $id);
        if ($this->db->update('faq', $data)) {
            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/faq/list');
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>