<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   

class Auth extends CI_Controller {
    
     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('Facebook');
        $this->load->library('Google');
        $this->load->model('User');
        $this->load->model('Register');
        $this->load->helper('url');
        
        $this->config->load('google_config');
    }
	
/*	function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
	}
 * */
 

	public function index()
	{
            	//$ip['alamat'] = $this->get_client_ip();
	
		$this->load->view('statis/header');
                
                // Redirect ke halaman profile jika pengguna sudah login
		
                // Facebook authentication url
                $data['auth_fb_url'] = $this->facebook->login_url(); 
                //$this->load->view('auth/register',$data);
	        if($this->facebook->is_authenticated()){
			$userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');
                        
                        $kode = '1';
			$data = array('name'=>$userProfile['first_name'],
							  'fullname'=>$userProfile['name'],
							  'email'=>$userProfile['email'],
							  'id'=>$userProfile['id'],
							  'gambar'=>$userProfile['picture']['data']['url']);							  
                                                      $this->session->set_userdata($data);
                        $cek = $this->Register->checkuser($data['id']);
                        if(empty($cek)){
                        $this->Register->insertuser($kode, $data['id'],$data['fullname'],$data['email'],$data['gambar'],"");                              
                        redirect('home');
                        }else {
                        redirect('home');
                        }
                        
                }else {
                $data['auth_fb_url'] = $this->facebook->login_url(); 
                $this->load->view('auth/register',$data);
		}
                
                $this->load->view('statis/footer');
	}
        
                
        function glogin()
        {
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
            $client_id = $this->config->item('google_client_id');
            $client_secret = $this->config->item('google_client_secret');
            $redirect_uri = $this->config->item('google_redirect_url');

            //Create Client Request to access Google API
            $client = new Google_Client();
            $client->setApplicationName("Bipaloka");
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->addScope("email");
            $client->addScope("profile");

            //Send Client Request
            $objOAuthService = new Google_Service_Oauth2($client);

            $authUrl = $client->createAuthUrl();

            header('Location: '.$authUrl);
        }
    
        function gcallback()
        {
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
            $client_id = $this->config->item('google_client_id');
            $client_secret = $this->config->item('google_client_secret');
            $redirect_uri = $this->config->item('google_redirect_url');

            //Create Client Request to access Google API
            $client = new Google_Client();
            $client->setApplicationName("Bipaloka");
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->addScope("email");
            $client->addScope("profile");

            //Send Client Request
            $service = new Google_Service_Oauth2($client);

            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();

            // User information retrieval starts..............................
            
            $user = $service->userinfo->get(); //get user info 
            $kode = '2';
            $data = array(
                'id'=>$user->id,
                'name'=>$user->given_name,
            );
            $this->session->set_userdata($data);
            $cek = $this->Register->checkuser($user->id);
                if(empty($cek)){
                    $this->Register->insertuser($kode, $user->id,$user->name,$user->email,$user->picture, "");                              
                    redirect('home');
                }else {
                    redirect('home');
                }

        }
                
     
        public function register(){
            
            if (isset($_POST['btn'])){
                $email = $_POST['email'];
                //$username = $_POST['email'];
                //$skypeid= $_POST['skypeid'];
                //$phone= $_POST['phone'];
                $password= md5($_POST['password']);
                $kode = '3';
                $iduser = $kode."-".rand();
                
                $this->Register->insertuser($kode,$iduser,"",$email,"", $password);
                
                $this->session->set_userdata('email',$email);
                
                echo 'a';
            }
            else {echo "b";}
        }
        
        public function login(){
            
            if (isset($_POST['btn_login'])){
                $email = $_POST['email'];
                //$username = $_POST['email'];
                //$skypeid= $_POST['skypeid'];
                //$phone= $_POST['phone'];
                $password= md5($_POST['password']);
                
                $cek = $this->Register->getuser($email,$password);
                if(!empty($cek)){
                 //   print_r($cek);
                 $this->session->set_userdata('email',$email);
                    echo 'a';
                }else {
                    echo "c";
                }
            }
            else {echo "b";}
        }
        
        public function logout() {
                $this->facebook->logout_url(); 
		$this->facebook->destroy_session();
                $this->session->sess_destroy();
		redirect('auth/');
    }
        
       
        
       
        
        
        
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */



