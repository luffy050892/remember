<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restie {

	public function __construct() {
		$this->ci->load->library('email');
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
		 
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
				
			$this->email->from($data['from'], $data['from_name']);
			$this->email->to($data['to']);
			$this->email->subject($data['subject']);
			$this->email->message($data['message']);
			$this->email->send();
		}
		//$this->email->print_debugger();
	}
}