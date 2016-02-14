<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restie {

	protected $ci;

	public function __construct() {
		$this->ci =& get_instance();
	}

	public function send_mail($data = null) {
		if(!empty($data)) {
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'prometheuswebsite@gmail.com',
			    'smtp_pass' => 'Guevarra05',
			    'smtp_timeout' => '4',
			    'mailtype'  => 'text', 
			    'charset'   => 'iso-8859-1'
			);
		 
			$this->ci->load->library('email', $config);
			$this->ci->email->set_newline("\r\n");
				
			$this->ci->email->from('prometheuswebsite@gmail.com', 'Prometheus Admin');
			$this->ci->email->to($data['to']);
			$this->ci->email->subject($data['subject']);
			$this->ci->email->message($data['message']."\n - Prometheus Website");
			//$this->ci->email->send();
		}
		//$this->ci->email->print_debugger();
	}
}