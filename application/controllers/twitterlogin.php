<?php

require_once APPPATH . "third_party/twitter/vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class Twitterlogin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        session_start();
        $twitter = $this->config->item('twitter');

        $connection = new TwitterOAuth($twitter['consumer_key'], $twitter['consumer_secret']);



    }

}

