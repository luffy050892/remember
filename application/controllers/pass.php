<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pass extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('pass_model');
		$this->load->helper('string');

		if(!$this->session->userdata('username')) {
			redirect('auth/login', 'refresh');
		}

	}

	public function index() {
		$this->data['accounts'] = $this->pass_model->getAccounts();
		$this->load->view('pass/index', $this->data);
	}

	public function add() {

		if($this->input->post('username')) {
			$data = array(
					'account' => $this->input->post('account'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'description' => $this->input->post('description'),
					'user_id' => $this->session->userdata('user_id'),
				);
			
			$this->pass_model->saveAccount($data);
		}

		$this->load->view('pass/save_pass');
	}

	public function edit() {
		if($this->input->post('username')) {
			$data = array(
					'account' => $this->input->post('account_name'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'description' => $this->input->post('description'),
				);
			
			$this->pass_model->updateAccount($data, $this->input->post('id'));
		}
		//$this->load->view('pass');
	}

	function random_str($length = 8) {
	    //echo $str;exit;
		$lengthDeduct = ($length / 4);
		$specials = substr(str_shuffle("[]{};:/?<>.&*()%^$#@"), 0, $lengthDeduct);
		$length -= $lengthDeduct;
		$randomStr = str_shuffle(random_string('alnum', $length).$specials); 
		echo $randomStr; exit;
	    return random_string('alnum', $length);
	}

	function getPassword() {
		//echo $this->input->post('id');
		$this->pass_model->getPassword($this->input->post('id'));
	}
}