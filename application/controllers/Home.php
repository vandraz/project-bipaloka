<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   

class Home extends CI_Controller {
    
     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User');
        $this->load->model('Register');
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
		$this->load->view('home/home');
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
        
        public function tutor(){
            
           
            if(isset($_POST['tutor'])){
                 $kodetutor = $this->input->post('tutor');
                // $data['kodetutor'] = $kodetutor;
            $this->session->set_userdata('tutor',$kodetutor);
            if($kodetutor == '1'){
                $name = 'Ulul Azmy';
            }else {
                $name = "";
            }
            $this->session->set_userdata('name',$name);
            
            $data['time_tutor'] = $this->Register->gettimetutor($kodetutor);
            //print_r($data['time_tutor']);
            
            foreach ($data['time_tutor'] as $value){
               $data['timebyday'] = $this->Register->gettimebyday($kodetutor,$value['id_day']);
               $data['div'] = '<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">coba gan</label>
                          </div>';
               //$data['getwaktu'] = $this->Register->getwaktu();
                //print_r($data['timebyday']);
                //print_r($data['timebyday'][0]['time']);
                //print_r($data['getwaktu']);
               
            }
            echo json_encode($data);
            //print_r($data['timebyday']);
               
            
           
            //$data['timebyday'] = $this->Register->gettimebyday($kodetutor,$idday);
            //print_r($data['timebyday']);
            }else{
                echo 'b';
                 $kodetutor = "";
                $name = "";
                $idday = "";
                $data['kodetutor'] = "Belum masuk POst";
                //$data['time_tutor'] = $this->Register->gettimetutor($kodetutor);
                $data['timebyday'] = $this->Register->gettimebyday('1','1');
                /*$data['div'] = '<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">coba gan</label>
                          </div>'; */
            $this->session->set_userdata('tutor',$kodetutor);
            }
            
            
            
            
            $this->load->view('statis/header');
            $this->load->view('home/tutor', $data);
            $this->load->view('statis/footer');
        }
        
        public function temp_modal(){
            if($this->input->post()){
                 $kodetutor = $this->input->post('tutor');
                 $data['kodetutor'] = $kodetutor;
                 $data['kode'] = 'a';
                 $data['time_tutor'] = $this->Register->gettimetutor($kodetutor);
                 foreach ($data['time_tutor'] as $value){
                    
                     $data['timebyday'] = $this->Register->gettimebyday($kodetutor,$value['id_day']);
                    // echo json_encode($data);
                     $data['div'] = '<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">'.$value['time'].'</label>
                          </div>';
                     echo $data['div'];
                }
                 //$data['timebyday'] = $this->Register->gettimebyday('1','1');
                 
                 echo json_encode($data);
                 
            }else {
                $data['kodetutor'] = "tidak bisa masuk";
            }
            //$this->load->view('home/tutor', $data);
        }


        public function aboutus(){
           $this->load->view('statis/header');
            $this->load->view('home/aboutus');
            $this->load->view('statis/footer'); 
        }
        
        public function packages(){
            
            if($this->input->post()){
                 $kodetutorial = $this->input->post('kodetutorial');
            $this->session->set_userdata('kodetutorial',$kodetutorial);
             $this->session->userdata('kodetutorial');
            }
           
            
           $this->load->view('statis/header');
            $this->load->view('home/packages');
            $this->load->view('statis/footer'); 
        }
        
        public function contactus(){
           $this->load->view('statis/header');
            $this->load->view('home/contactus');
            $this->load->view('statis/footer'); 
        }
        
        public function confirmation(){
           $this->load->view('statis/header');
            $this->load->view('home/confirmation');
            $this->load->view('statis/footer'); 
        }
        
        public function sendmessage(){
            if($this->input->post()){
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $email = $this->input->post('email');
                $message = $this->input->post('message');
                
                if($fname == "" || $lname == "" || $email == "" || $message == ""){
                    echo 'c';
                } else {
                     $this->User->sendmessage($fname,$lname,$email,$message);
                
                echo 'a';
                }
            }else {
                echo 'b';
            }
        }
        
        
        
        
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */