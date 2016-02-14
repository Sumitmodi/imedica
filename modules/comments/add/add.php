<?php
class CommentsAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getCommentsAdd()
    {
        $this->template = 'cms/comments/add/add';
    }

    public function postCommentsAdd()
    {
        $this->template = 'cms/comments/add/add';

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

