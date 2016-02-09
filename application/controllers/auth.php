<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index() {

		if($this->session->userdata('username')) {
			echo "currently logged in";
			exit;
		}

		$this->load->view('auth/login');
	}

	public function login() {
		if(!empty($this->input->post('identity')) && !empty($this->input->post('password'))) {
			if($this->auth_model->login($this->input->post('identity'), $this->input->post('password'))) {
				echo "success";
				exit;
			} else {
				$this->session->set_flashdata('message.content', 'Login failed. Check username and password');
				$this->session->set_flashdata('message.label', 'label-warning');
			}
		}

		$this->load->view('auth/login');
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('message.content', 'Logout Successful');
		$this->session->set_flashdata('message.label', 'label-success');
		$this->load->view('auth/login');
	}

	public function create() {
		//if($this->input->post('identity')) {
			$this->auth_model->create('restie', 'restie');
		//}
		$this->load->view('auth/login');
	}
}