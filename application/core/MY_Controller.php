<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('front_model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->db = $this->load->database('default', true);
        //$this->load->library('facebook', array('appId' => '523679531131143', 'secret' => '621388b846dc548f5abb18d3ec392c59'));
    }

    function display($filename = null, $data = array())
    {
        if(isset($this->layout)){
            $this->load->view($this->layout,$this->data);
        }
    }

    public function call()
    {
        $method = strtolower($this->input->server('REQUEST_METHOD'));
       // echo $method;
        $module = get_class($this);
       // echo $module;
        $func = $method.ucfirst($module);
        $this->$func();
    }

}
?>