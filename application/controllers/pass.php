<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pass extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index() {
		$this->load->view('pass/index');
	}

	public function add() {

		if($this->input->post('username')) {
			$data = array(
					'account' => $this->input->post('account'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				);
			
			if($this->pass_model->saveAccount($data)) {

			} else {

			}
		}

		$this->load->view('pass/save_pass');
	}
}