<?php
class InquiriesForm extends MY_Controller
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

    public function getInquiriesForm()
    {
    }

    public function postInquiriesForm()
    {
        if($this->session->userdata('logged_in')) {
            $this->template = 'cms/inquiries/form/form';
        }else{
            $this->template = 'client/inquiries/form/form';
        }

        $data = array(
            'name' => $this->input->get("inq_name"),
            'email' => $this->input->get("inq_email"),
            'phone' => $this->input->get("inq_phone"),
            'subject' => $this->input->get("subject"),
            'query' => $this->input->get("inq_query")
        );

        if ($this->db->insert('inquiries', $data)) {
            $this->sendemail($data);

            $this->data['message'] = 'Saved Successfully!!!';
        } else {
            $this->data['message'] = 'Sorry,The data could not be saved..';
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