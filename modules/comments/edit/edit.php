<?php
class CommentsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getCommentsEdit()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->table_fetch_row('comments', array('id' => $id));
        $this->data['blog'] = $this->admin_model->table_fetch_row('blogs', array('id' => $this->data['query'][0]->blog_id));
        // echo $this->data['blog'][0]->title; die;

        $this->template = 'cms/comments/edit/edit';
    }

    public function postCommentsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/comments/edit/edit';
        $comments = $this->db->where('id', $this->input->post('comment_id'))->get('comments')->result_object();
        $this->data['query'] = $comments;

        $data = array(
            //'id' => $this->input->post('faq_id'),
            // 'faq_question' => $this->input->post('faq_question'),
            // 'faq_answer' => $this->input->post('faq_answer'),
            // 'faq_date' => $this->input->post('faq_date')
            'status' => $this->input->post('status')
        );

        $this->db->where('id', $id);
        if ($this->db->update('comments', $data)) {
            $this->session->set_flashdata('message','Updated successfully!!!');
            redirect('admin/comments/edit/'.$id);
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }
}
?>