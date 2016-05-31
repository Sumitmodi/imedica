<?php
session_start();
class user_authentication extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        include_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
        include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
        include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";
        $client_id = '255060988222-09bko1ov6r7farv2hn14na78h7bu8rbp.apps.googleusercontent.com';
        $client_secret = 'mqDbUyuyXqwrXY8AIhAUdjhv';
        $redirect_uri = base_url().'/index.php/user_authentication';
        $simple_api_key = 'AIzaSyComkDcL1qUu3woAG2rgPmcs147vk5SneY';
        $client = new Google_Client();
        $client->setApplicationName("Php google OAuth Login Example");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $objOAuthService = new Google_Service_Oauth2($client);
        if(isset($_GET['code']))
        {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
        if(isset($_SESSION['access_token']) && $_SESSION['access_token'])
        {
            $client->setAccessToken($_SESSION['access_token']);
        }
        if($client->getAccessToken())
        {
            $userData = $objOAuthService->userinfo->get();
            $data['userData'] = $userData;
            $_SESSION['access_token'] = $client->getAccessToken();
        }
        else
        {
            $authUrl = $client->createAuthUrl();
            $data['authUrl'] = $authUrl;
        }
        $this->load->view('google_authentication', $data);
    }
    public function logout()
    {
        unset($_SESSION['access_token']);
        redirect('http://localhost:8000/knowledgebase/index.php/user_authentication/');
    }
}
?>
	