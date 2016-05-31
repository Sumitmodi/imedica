<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fb_login extends MY_Controller {

    public function __construct(){
        parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
    }

    public function index(){

        //$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        $this->load->library('facebook', array(
            'appId' => '523679531131143',
            'secret' => '621388b846dc548f5abb18d3ec392c59',
        ));

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            //$data['logout_url'] = site_url('fb_login/logout'); // Logs off application
            // OR 
            // Logs off FB!
            $data['logout_url'] = $this->facebook->getLogoutUrl();


        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fb_login/index'),
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('loginwithfb',$data);

    }

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('fb_login/index');
    }

}

