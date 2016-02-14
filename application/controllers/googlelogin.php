<?php
require_once APPPATH.'/third_party/google/autoload.php';


class Googlelogin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->session->unset_userdata('token');
        $this->client = $this->getClient();
        $plus  = new Google_Service_Plus($this->client);
        $me=  $plus->people->get('me');
        $email = $me['modelData']['emails'][0]['value'];
        $name = $me['modelData']['name']['givenName'].' '.$me['modelData']['name']['familyName'];
        $username=explode('@',$email);
        $this->user_model->check_login($name,$username[0],$email);
    }

    function getClient() {
        $client = new Google_Client();
        $client->setApplicationName(APPLICATION_NAME);
        $client->setScopes(SCOPES);
        $client->setAuthConfigFile(CLIENT_SECRET_PATH);
        $client->setRedirectUri(REDIRECT_URI);
        $client->setAccessType('offline');
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $client->addScope("https://www.googleapis.com/auth/plus.me");
        $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        if ($this->session->userdata('token')) {
            $accessToken = $this->session->userdata('token');
        } else {
            $authUrl = $client->createAuthUrl();
            if($this->input->get('code') == false){
                redirect($authUrl);
                return;
            }
            $accessToken = $client->authenticate($this->input->get('code'));
            $this->session->set_userdata('token',$accessToken);
        }
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $client->refreshToken($client->getRefreshToken());
            $this->session->set_userdata('token',$client->getAccessToken());
        }
        return $client;
    }



}