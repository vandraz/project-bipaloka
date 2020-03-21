<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   

class Bookaclass extends CI_Controller {
    
     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User');
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
		$this->load->view('statis/menu');
		$this->load->view('bookaclass/booking');
		$this->load->view('statis/footer');
	}

	public function FunctionName($value='')
	{
		# code...
	}
	
	public function Insertbtn(){
		$this->load->model("Tmptraking");
		if($this->input->is_ajax_request($_POST['btn'])){
			$btn = $_POST['btn'];
		 $ip['lokal'] = $this->get_client_ip();
			$data = $this->Tmptraking->bacadata($ip['lokal']);
			foreach ($data as $row){
		$ipdatabase = $row->ipaddress;
			}
			if(empty($ipdatabase)){
			$this->Tmptraking->insertbtn($btn,$ip['lokal']); 
			}
		}
	}
	
	public function Updatebtn(){
		$this->load->Model("Tmptraking");
		$ipdatabase = "";
			$ip['lokal'] = $this->get_client_ip();
		$data = $this->Tmptraking->bacadata($ip['lokal']);
		//print_r($data);
		foreach ($data as $row){
			$ipdatabase = $row->ipaddress;
		}
		
		if($ip['lokal'] == $ipdatabase){
		    $email = $_POST['email'];
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		    if($this->form_validation->run() == FALSE){
		        echo "a";
		    }else {$this->Tmptraking->updatebtn($ip['lokal'],$email);}
		}
	}
        
        function setiduser($user,$email,$password){
           
            $datauser = $this->User->getuser();
            
            if(empty($datauser)){
                $this->User->insertuser($user, $email, $password);
            }
        }


        public function Registermanual(){
            
            $model1 = $this->load->model('User');
            
            if(isset($_REQUEST)){
            $email = $this->input->post('email');
            $nohp = $this->input->post('nohp');
            $password = $this->input->post('password');
            
            
            echo 'a';    
            }else {echo 'b';}
            
        }
        
        public function Loginmanual(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            echo 'a';
        }
        
        public function payment(){
            $this->load->view('statis/header');
            $this->load->view('statis/menu');
            $this->load->view('bookaclass/payment');
            $this->load->view('statis/footer');
        }
        
        public function kelas(){
            $this->load->view('statis/header');
            $this->load->view('statis/menu');
            $this->load->view('bookaclass/kelas');
            $this->load->view('statis/footer');
        }
        
         public function booking(){
            $this->load->view('statis/header');
            $this->load->view('statis/menu');
            $this->load->view('bookaclass/booking');
            $this->load->view('statis/footer');
        }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */