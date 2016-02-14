<?php
class InquiriesReply extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $this->layout = 'themes/cms';
        } else{
            $this->layout = 'themes/client';
        }
    }

    public function getInquiriesReply()
    {
        $id = $this->input->get("id");
        if(false == $id){
            $id = $this->uri->segment(4);
        }
        $this->data['query'] = $this->admin_model->show_inquiries($id);
        if($this->session->userdata('logged_in')){
            $this->template = 'cms/inquiries/reply/reply';
        } else{
            $this->template = 'client/inquiries/reply/reply';
        }
    }

    public function postInquiriesReply()
    {
        //$id = $this->input->post('inq_id');
        $id = $this->uri->segment(4);
        if($this->session->userdata('logged_in')){
            $this->template = 'cms/inquiries/reply/reply';
        } else{
            $this->template = 'client/inquiries/reply/reply';
        }

        $inquiries= $this->db->where('id', $this->input->post('inq_id'))->get('inquiries')->result_object();
        $this->data['query'] = $inquiries;
        $data = array(
            'name' => $this->input->post("inq_name"),
            'email' => $this->input->post("inq_email"),
            'phone' => $this->input->post("inq_phone"),
            'subject' => $this->input->post("subject"),
            'query' => $this->input->post("inq_query")
        );

        $this->db->where('id', $id);
        if ($this->db->update('inquiries', $data)) {
            $this->sendemail($data);

            $this->session->set_flashdata('message','Updated successfully!!!');
            if($this->session->userdata('logged_in')) {
                redirect('admin/inquiries/list');
            }else{
                redirect('client/inquiries/list');
            }
        } else {
            $this->session->set_flashdata('message','Update unsuccessful!!!');
        }
    }

    public function sendemail($data)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($data['email']);
        $this->email->to('sujakhu.umesh@gmail.com');
        $this->email->subject($data['subject']);
        $this->email->message($data['query']);
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }


}
?>