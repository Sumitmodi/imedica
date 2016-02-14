<?php
class FaqAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getFaqAdd()
    {
        $this->template = 'cms/faq/add/add';
    }

    public function postFaqAdd()
    {
        $this->template = 'cms/faq/add/add';

        $data = array(
            //'id' => $this->input->post('faq_id'),
            'faq_question' => $this->input->post('faq_question'),
            'faq_answer' => $this->input->post('faq_answer'),
            'faq_date' => $this->input->post('faq_date')
        );
            if($this->db->insert('faq',$data)){
            $this->data['message'] = 'Saved Successfully!!!';
        }
        else{
            $this->data['message'] = 'Sorry,The data could not be saved..';
        }
    }
}
?>

