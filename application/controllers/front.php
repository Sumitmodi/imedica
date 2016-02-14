<?php
require_once APPPATH . 'third_party/vendor/autoload.php';
use \Mailgun\Mailgun;

class Front Extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('front_model');
    }

    public function index()
    {

        $data['page'] = "home";
        $data['url'] = "home";
        $data['action'] = "list";
        $data['heading'] = "Home";
        $data['site_infos'] = $this->front_model->site_infos();
        $data['why_choose_us'] = $this->front_model->why_choose_us();
        $data['services'] = $this->front_model->services();
        $data['clients'] = $this->front_model->clients();
        $data['testimonials'] = $this->front_model->testimonials();
        $data['sliders'] = $this->front_model->sliders();
        $data['news'] = $this->front_model->news();
        $data['blogs'] = $this->front_model->blogs();
        $this->load->view('themes/frontend', $data);
    }

    public function oneSegment()
    {

        $page = $this->uri->segment(1);
        $this->data['page'] = $page;
        $this->data['url'] = $page;
        $this->data['action'] = "list";
        $this->data['heading'] = ucfirst($page);
        $this->data['site_infos'] = $this->front_model->site_infos();
        $this->data['news'] = $this->front_model->news();
        $this->data['blogs'] = $this->front_model->blogs();
        $this->data['clients'] = $this->front_model->clients();
        $found = true;
        if ($page == "home") {
            redirect('/');
        } elseif ($page == "doctors") {
            $this->data['doctors'] = $this->front_model->doctors();
            $this->data['category'] = $this->front_model->doctor_category();
            if ($this->data['doctors'] == false) {
                $found = false;
            }
        } elseif ($page == "hospitals") {
            $this->data['hospitals'] = $this->front_model->hospitals();
            $this->data['doctors'] = $this->front_model->doctors();
            if ($this->data['hospitals'] == false) {
                $found = false;
            }
        } elseif ($page == "allhospitals") {
            $this->data['page'] = "hospitals";
            $this->data['action'] = "allhospitals";
            $this->data['hospitals'] = $this->front_model->hospitals();
            if ($this->data['news'] == false) {
                $found = false;
            }
        } elseif ($page == "cims") {
            $this->data['cims'] = $this->front_model->cims();
            if ($this->data['cims'] == false) {
                $found = false;
            }
        } elseif ($page == "nims") {
            $this->data['nims'] = $this->front_model->nims();
            if ($this->data['nims'] == false) {
                $found = false;
            }
        } elseif ($page == "news") {
            $offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2) : 0);
            $config['total_rows'] = $this->front_model->record_count('news');;
            $config['per_page'] = 8;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['base_url'] = base_url() . $page;

            $this->pagination->initialize($config);
            $this->data['paginglinks'] = $this->pagination->create_links();
            $this->data['news'] = $this->front_model->news('', $config['per_page'], $offset);
            if ($this->data['news'] == false) {
                $found = false;
            }
        } elseif ($page == "allnews") {
            $this->data['page'] = 'news';
            $this->data['action'] = 'allnewslist';
            $this->data['news'] = $this->front_model->news();
            if ($this->data['news'] == false) {
                $found = false;
            }
        } elseif ($page == "knowledgebase") {
            $this->data['pharmaceuticals'] = $this->front_model->pharmaceuticals();
            if ($this->data['pharmaceuticals'] == false) {
                $found = false;
            }
        } elseif ($page == "faq") {
            $this->data['faq'] = $this->front_model->faq();
            if ($this->data['faq'] == false) {
                $found = false;
            }
        } elseif ($page == "blogs") {
            $offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2) : 0);
            $config['total_rows'] = $this->front_model->record_count('blogs');;
            $config['per_page'] = 8;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['base_url'] = base_url() . $page;

            $this->pagination->initialize($config);
            $this->data['paginglinks'] = $this->pagination->create_links();
            $this->data['blogs'] = $this->front_model->blogs('', $config["per_page"], $offset);
            if ($this->data['blogs'] == false) {
                $found = false;
            }
        } elseif ($page == "works") {
            $this->data['sliders'] = $this->front_model->sliders();
        } elseif ($page == "contact-us") {
            if ($this->input->post() > 0) {
                $this->data['message'] = $this->front_model->contact($this->data);
            }
        }elseif(!in_array($page,array('order','login','signup'))){
            return show_404();
        }
        $this->data['found'] = $found;
        $this->load->view('themes/frontend', $this->data);
    }

    public function twoSegment()
    {
        $page = $this->uri->segment(1);
        $url = $this->uri->segment(2);
        $this->data['page'] = $page;
        $this->data['url'] = $url;
        $this->data['action'] = "view";
        $this->data['heading'] = ucfirst($page);
        $this->data['site_infos'] = $this->front_model->site_infos();
        $this->data['news'] = $this->front_model->news();
        $this->data['blogs'] = $this->front_model->blogs();
        $this->data['clients'] = $this->front_model->clients();
        $found = true;

        if (($page == 'blogs') && (is_numeric($this->uri->segment(2)))) {
            $this->data['page'] = "blogs";
            $this->data['action'] = "list";
            $offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2) : 0);
            $config['total_rows'] = $this->front_model->record_count('blogs');;
            $config['per_page'] = 8;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 2;
            $config['base_url'] = base_url() . $page;

            $this->pagination->initialize($config);
            $this->data['paginglinks'] = $this->pagination->create_links();
            $this->data['blogs'] = $this->front_model->blogs('', $config["per_page"], ($offset - 1) * $config['per_page']);
            if ($this->data['blogs'] == false) {
                $found = false;
            }
        } elseif ($page == "blogs") {
            $this->data['page'] = "blogs";
            $this->data['blog_url'] = $url;
            $this->data['blog'] = $this->front_model->blogs($url, '', '');
            $this->data['comments'] = $this->front_model->table_fetch_rows('comments', array('blog_id' => $this->data['blog']['id'], 'status' => '1'));
            $this->data['blogs'] = $this->front_model->blogs();
            if (false == $this->data['blog']) {
                $found = false;
            }
            $blog_id = $this->data['blog']['id'];
            $next = $this->front_model->next_page($blog_id, "blogs");
            $prev = $this->front_model->prev_page($blog_id, "blogs");
            if (false != $next) {
                $this->data['next'] = $next;
            }
            if (false != $prev) {
                $this->data['prev'] = $prev;
            }

        } elseif (($page == 'news') && (is_numeric($this->uri->segment(2)))) {
            $this->data['page'] = "news";
            $this->data['action'] = "list";
            $offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2) : 0);
            $config['total_rows'] = $this->front_model->record_count('news');;
            $config['per_page'] = 8;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 2;
            $config['base_url'] = base_url() . $page;
            $this->pagination->initialize($config);
            $this->data['paginglinks'] = $this->pagination->create_links();
            $this->data['news'] = $this->front_model->news('', $config["per_page"], ($offset - 1) * $config['per_page']);
            if ($this->data['news'] == false) {
                $found = false;
            }
        } elseif ($page == "news") {
            $this->data['news_url'] = $url;
            $this->data['n'] = $this->front_model->news($url, '', '');
            if (false == $this->data['news']) {
                $found = false;
            }
            $news_id = $this->data['n']['id'];
            $next = $this->front_model->next_page($news_id, "news");
            $prev = $this->front_model->prev_page($news_id, "news");
            if (false != $next) {
                $this->data['next'] = $next;
            }
            if (false != $prev) {
                $this->data['prev'] = $prev;
            }
        } elseif ($page == "doctor") {
            $this->data['page'] = "doctors";
            $this->data['doctors'] = $this->front_model->doctors($url);
            if (false == $this->data['doctors']) {
                $found = false;
            }
        } elseif ($page == "doctors") {
            $this->data['page'] = "doctors";
            $this->data['action'] = "list";
            $this->data['cat_url'] = $url;
            $this->data['doctors'] = $this->front_model->doctor_category($url);
            $this->data['category'] = $this->front_model->doctor_category();
            $this->data['msg'] = 'Sorry,No results found.';
            if (false == $this->data['doctors']) {
                $found = false;
            }
        } elseif ($page == "pharmaceutical") {
            $this->data['page'] = "pharmaceuticals";
            $this->data['pharmaceuticals'] = $this->front_model->pharmaceuticals($url);
            if (false == $this->data['pharmaceuticals']) {
                $found = false;
            }
        }else{
            return show_404();
        }
        $this->data['found'] = $found;
        $this->load->view('themes/frontend', $this->data);
    }

    public function addComment()
    {
        if ($this->session->userdata('login')) {
            $comments = array(
                'name' => $this->input->post('name'),
                'blog_id' => $this->input->post('blog_id'),
                'email' => $this->input->post('email'),
                'comment' => $this->input->post('message'),
                'comment_date' => date("Y-m-d"),
                'status' => '0'
            );
            $ch = $this->front_model->add_comment($comments);
            if ($ch == TRUE) {
                $this->data['msg'] = 'Your Comment is successfully posted';
                $this->session->set_flashdata('message', $this->data['msg']);
            } else {
                $this->data['msg'] = 'Your Comment is unable to post';
                $this->session->set_flashdata('message', $this->data['msg']);
            }
            redirect('blogs/' . $this->input->post('blog_url'));
        } else {
            $this->data['msg'] = 'You are not logged in!Please login first.';
            $this->session->set_flashdata('message', $this->data['msg']);
            redirect('login');
        }
    }

    public function process()
    {
        $mg = new Mailgun('key-7a0fe93001855da87e42098771dda2c9');
        $domain = "sandboxad204f2f10c148eba5a9bbb2cfdc04ce.mailgun.org";
        $mg->sendMessage($domain, array(
            'from' => $this->input->post('contact_email'),
            'cc' => 'info@nurakantech.com',
            'to' => 'sujakhu.umesh@gmail.com',
            'subject' => 'Enquiry By ' . $this->input->post('contact_name'),
            'html' => 'Hi Admin,I am ' . $this->input->post('contact_name') . '<br>Message : ' . $this->input->post('contact_message')
        ));
        $data = array(
            'name' => $this->input->post("contact_name"),
            'email' => $this->input->post("contact_email"),
            'phone' => $this->input->post("contact_phone"),
            'subject' => $this->input->post("contact_subject"),
            'query' => $this->input->post("contact_message")
        );
        $this->db->insert('inquiries', $data);
        $this->data['msg'] = 'Your query is successfully sent.';
        $this->session->set_flashdata('message', $this->data['msg']);

        redirect('contact-us');
    }

    public function orderForm()
    {
        $config['upload_path'] = './uploads/prescription/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';

        $query = $this->db->select('*')->from('patient')->where('email', $this->input->post('email'))->get();
        $result = objectToArray($query->result());
        if ($query->num_rows() != 0) {
            $patient_id = $result[0]['id'];
        } else {
            $patient = array(
                'patient' => $this->input->post('name'),
                'age' => $this->input->post('age'),
                'location' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone')
            );
            $this->db->insert('patient', $patient);
            $patient_id = $this->db->insert_id();
        }
        //if ($this->db->insert('patient', $patient)) {
        //$patient_id = $this->db->insert_id();
        $pres_med = array(
            'patient' => $patient_id,
            'medicine' => implode(';', $this->input->post('medicine')),
            'dose' => implode(';', $this->input->post('dose')),
            'quantity' => implode(';',$this->input->post('quantity')),
            'disease' => $this->input->post('disease'),
            'prescribed_by' => $this->input->post('prescribed_by'),
            'hospital_name' => $this->input->post('hospital'),

        );
        if ($this->db->insert('prescribed_medicine', $pres_med)) {
            if (!file_exists(ROOTDIR . '/uploads/prescription/') && !is_dir(ROOTDIR . '/uploads/prescription/')) {
                mkdir(ROOTDIR . '/uploads/prescription/', 755);
            }
            $last_id = $this->db->insert_id();
            $config['file_name'] = $patient_id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $file_name = array('prescription' => $data['upload_data']['file_name']);
            $this->db->where('id', $last_id);
            $this->db->update('prescribed_medicine', $file_name);

        }
        $this->order_sent($this->input->post('email'));
        $data = array(
            'patient' => $patient_id,
            'disease' => $this->input->post('disease'),
            'date' => date('Y-m-d'),
            'status' => '1',
        );
        $this->db->insert('order', $data);
        //}

        $this->data['msg'] = 'Your order is successfully saved.Please check your email for verification.';
        $this->session->set_flashdata('message', $this->data['msg']);
        redirect('order');
    }

    public function order_sent($email)
    {
        $mg = new Mailgun('key-7a0fe93001855da87e42098771dda2c9');
        $domain = "sandboxad204f2f10c148eba5a9bbb2cfdc04ce.mailgun.org";
        $mg->sendMessage($domain, array(
            'from' => 'info@nurakantech.com',
            'cc' => 'sujakhu.umesh@gmail.com',
            'to' => $email,
            'subject' => 'Order Confirmation for iMedica ',
            'html' => 'Hi ' . $email . '<br>Click the link to confirm your order placed<br>' . base_url() . 'verify?email=' . $email,
        ));
        $query = $this->db->select('*')->from('user')->where('email', $email)->get();
        if ($query->num_rows() == 0) {
            $data = array('email' => $email, 'status' => '0');
            $this->db->insert('user', $data);
        }

    }

    function verify_order()
    {
        $email = $this->input->get('email');
        $this->data['user'] = $this->front_model->verify($email);
        if ((($this->data['user'][0]['password']) == NULL) && ($this->data['user'][0]['status'] == 0)) {
            $this->data['msg'] = 'Please SignUp for verification.';
            $this->session->set_flashdata('message', $this->data['msg']);
            $this->data['user_email'] = $email;
            $this->session->set_flashdata('email', $this->data['user_email']);
            redirect('signup');
        } elseif (($this->data['user'][0]['password']) != NULL && ($this->data['user'][0]['status'] == 1)) {
            $this->data['msg'] = 'You are verified user.Please Login';
            $this->session->set_flashdata('message', $this->data['msg']);
            $this->data['user_email'] = $email;
            $this->session->set_flashdata('email', $this->data['user_email']);
            redirect('login');

        }

    }

    function signup()
    {
        if($this->input->post('password') != $this->input->post('retype_password')){
            $this->data['msg'] = 'Password didnot match.';
            $this->session->set_flashdata('message', $this->data['msg']);
            $this->data['user_email'] = $this->input->post('email');
            $this->session->set_flashdata('email', $this->data['user_email']);
            redirect('signup');
        }
        $user = $this->db->where('email', $this->input->post('email'))->where('password','')->where('status','0')->get('user')->result_object();
        if($user != NULL){
            $pwd = array('password' => md5($this->input->post('password')), 'status' => '1');
            $this->db->where('email', $this->input->post('email'));
            $this->db->update('user', $pwd);
        }elseif(($this->db->where('email', $this->input->post('email'))->where('status','1')->get('user')->num_rows()) > 0) {
            $this->data['msg'] = 'User already exist';
            $this->session->set_flashdata('message', $this->data['msg']);
            redirect('signup');
        }else{
            $data = array('email'=>$this->input->post('email'),'password' => md5($this->input->post('password')), 'status' => '1');
            $this->db->insert('user',$data);
            $this->data['msg'] = 'SignUp Successful!Please Login to continue.';
            $this->session->set_flashdata('message', $this->data['msg']);
            $this->data['user_email'] = $this->input->post('email');
            $this->session->set_flashdata('email', $this->data['user_email']);
            redirect('login');
        }

    }

    function search()
    {
        $keyword = $this->input->post('search');
        $page = $this->input->post('current_page');
        $this->data['url'] = $page;
        $this->data['page'] = $page;
        $this->data['action'] = "list";
        $this->data['heading'] = ucfirst($page);
        $this->data['site_infos'] = $this->front_model->site_infos();
        $this->data['news'] = $this->front_model->news();
        if ($page == 'knowledgebase') {
            $this->data['results'] = $this->front_model->search_data($keyword, $page);
            if ($this->data['results'] != NULL) {
                foreach ($this->data['results'] as $key => $value) {
                    $page = $value['table'];
                    $this->data['page'] = $page;
                    $this->data[$page] = objectToArray($value['results']);
                }
            } else {
                $this->data['page'] = $page;
                $this->data['msg'] = 'Sorry,No results found.';
                $this->session->set_flashdata('message', $this->data['msg']);
                redirect($page);
            }
        } else {
            $this->data[$page] = $this->front_model->search_data($keyword, $page);
            if ($this->data[$page] == NULL) {
                $this->data['msg'] = 'Sorry,No results found.';
                $this->session->set_flashdata('message', $this->data['msg']);
                redirect($page);
            }
        }
        $this->load->view('themes/frontend', $this->data);

    }


    function login()
    {
        $this->load->model('user_model');
        $res = $this->user_model->login($this->input->post('user_email', TRUE), $this->input->post('user_password', TRUE));
        $result=array($res);

        if ($res != false && $result[0]->status == 1) {
            $this->session->set_userdata('login', $res);
            redirect('home');
        } else {
            $this->data['msg'] = 'Email Or Password Incorrect!';
            $this->session->set_flashdata('message', $this->data['msg']);
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function suggest()
    {
        $k = strtolower($_POST['keyword']);
        $t = $_POST['type'];
        switch ($t) {
            case 'doctor':
                $this->db->select('*');
                $this->db->like('name', $k);
                $query = $this->db->get('doctors');
                if($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row) {
                        $r[] = htmlentities(stripslashes($row['name']));
                    }
                    echo json_encode($r);
                }
                break;
            case 'hospital':
                $this->db->select('*');
                $this->db->like('hospital_name', $k);
                $query = $this->db->get('hospitals');
                if($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row) {
                        $r[] = htmlentities(stripslashes($row['hospital_name']));
                    }
                    echo json_encode($r);
                }
                break;
            case 'medicine':
                $this->db->select('*');
                $this->db->like('medicine_name', $k);
                $query = $this->db->get('medicines');
                if($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row) {
                        $r[] = htmlentities(stripslashes($row['medicine_name']));
                    }
                    echo json_encode($r);
                }
                break;
        }
    }
}

?>