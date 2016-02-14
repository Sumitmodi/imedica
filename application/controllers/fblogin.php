<?php

class Fblogin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // To use site_url and redirect on this controller.
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->library('facebook', array(
            'appId' => '887281518053257',
            'secret' => '182a7ce9b722a1c3c887fbc4a9c3506b',
        ));

        $this->facebook->destroySession();

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me','GET');
                $name= $data['user_profile']['name'];
                $fb_id= $data['user_profile']['id'];
                $data = array('name'=>$name,'facebook_id'=>'www.facebook.com/'.$fb_id);
                if(($this->db->where('name',$name)->where('facebook_id','www.facebook.com/'.$fb_id)->get('user')->num_rows()) == 0){
                    $this->db->insert('user',$data);
                }
                $this->session->set_userdata('fb_login', $data);
                redirect(base_url());
            } catch (FacebookApiException $e) {
                $user = null;
            }
            $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {

            $this->facebook->destroySession();
            $login_url= $this->facebook->getLoginUrl();
            redirect($login_url);
        }

    }
}




