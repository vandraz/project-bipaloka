<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   

class Schedule extends CI_Controller {
    
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
		$this->load->view('schedule/lookactivities');
		$this->load->view('statis/footer');
	}

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */