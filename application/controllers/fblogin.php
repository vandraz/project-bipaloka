<?php

require_once("Facebook/autoload.php");

// require file

class Fblogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        // cek jika login
        if($this->session->userdata('loggedin') == FALSE) 
        {
            redirect('fblogin/login');
        }
        
        $this->load->view('fblogin/dashboard', $this->data);
    }
    
    public function login()
    {
        // 1. masukan app id, secret and redirect url
        ////////////////////////////////////////////////////////////////////
        // pada langkah ke 1, kamu akan diminta untuk memasukan App ID, App
        // Secret dan Redirect URL. App ID dan App Secret bisa kamu dapatkan
        // di halaman DASHBOARD di https://developer.facebook.com. Redirect
        // URL adalah url halaman tempat login facebook kamu.
        ////////////////////////////////////////////////////////////////////
        $app_id = '933216297039237';
        $app_secret = '4e45f580e94727e41159f95f56ece1e0';
        $redirect_url='http://localhost/auth_bipaloka2/fblogin/login';
        
        // 2. inisialisasi, buat helper object and dapatkan session
        FacebookSession::setDefaultApplication($app_id, $app_secret);
        $helper = new FacebookRedirectLoginHelper($redirect_url);
        $sess = $helper->getSessionFromRedirect();
        
        // 3. cek validasi akun pengguna
        if($this->session->userdata('fb_token'))
        {
            $sess = new FacebookSession($this->session->userdata('fb_token'));
            
            try
            {
                $sess->Validate($id, $secret);
            }
            catch(FacebookAuthorizationException $e)
            {
                print_r($e);
            }
        }
        
        $this->data['loggedin'] = FALSE;
        // login url
        $this->data['login_url'] = $helper->getLoginUrl(array('email'));
        
        // 4. jika fb session ada maka buat session pengguna
        if(isset($sess))
        {
                $this->session->set_userdata('fb_token', $sess->getToken());
                $request = new FacebookRequest($sess, 'GET', '/me');
                $response = $request->execute();
                $graph = $response->getGraphObject(GraphUser::classname());
            $sess_data = array(
                'id' => $graph->getId(),
                'name' => $graph->getName(),
                'email' => $graph->getProperty('email'),
                'image' => 'https://graph.facebook.com/'.$graph->getId().'/picture?width=50',
                'loggedin' => TRUE
            );
            $this->session->set_userdata($sess_data);
            
            redirect('fblogin');
        }
        
        $this->load->view('fblogin/login', $this->data);
    }
    
    public function logout()
    {
        // logout
        $sess_data = array(
            'id' => NULL,
                'name' => NULL,
                'email' => NULL,
                'image' => NULL,
                'loggedin' => FALSE
        );
        $this->session->unset_userdata($sess_data);
        
        delete_cookie('ci_session');
        
        redirect('fblogin/login');
    }
}