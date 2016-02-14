<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('restie');
		$this->load->model('auth_model');
	}

	public function index() {

		if($this->session->userdata('username')) {
			redirect('pass', 'refresh');
		}

		redirect('auth/login', 'refresh');
	}

	public function login() {
		if(!empty($this->input->post('identity')) && !empty($this->input->post('password'))) {
			
			if($this->checkLog()) {
				if($this->auth_model->login($this->input->post('identity'), $this->input->post('password'))) {
					$mail = array(
						'to' => $this->session->userdata('email'),
						'subject' => 'Last Login',
						'message' => 'You login to your account @ '.date("F j, Y, g:i a"),
						); 
					$this->restie->send_mail($mail);
					redirect('pass', 'refresh');
				} else {
					
					$this->recordAttempt();

					$this->session->set_flashdata('message.content', 'Login failed. Check username and password');
					$this->session->set_flashdata('message.label', 'label-warning');
				}
			}
			
		}

		$this->load->view('auth/login');
	}

	public function recordAttempt() {
		if(!empty($this->session->userdata('log_attemp'))) {
			$this->session->set_userdata('log_attemp', 1 + $this->session->userdata('log_attemp'));
			
			if($this->session->userdata('log_attemp') > 2) {
				$this->session->set_userdata('log_time', date("h:i:sa"));
			}
		} else {
			$this->session->set_userdata('log_attemp', 1);
		}
	}

	public function checkLog() {
		if(!empty($this->session->userdata('log_attemp'))) {
			if($this->session->userdata('log_attemp') > 2) {
				$interval = abs(strtotime(date("h:i:sa")) - strtotime($this->session->userdata('log_time')));
				$minutes  = round($interval / 60);
				if($minutes < 3) {
					$mail = array(
						'to' => $this->session->userdata('email'),
						'subject' => 'Login attemp exceeded',
						'message' => 'You failed login to your account 3 times @ '.date("F j, Y, g:i a").'.',
						); 
					$this->restie->send_mail($mail);

					$this->session->set_flashdata('message.content', 'Login attemps exceeded (4 times). Please try again after a 3 minutes');
					$this->session->set_flashdata('message.label', 'label-danger');
					return false;
				}

				$this->session->unset_userdata('log_time');
				$this->session->unset_userdata('log_attemp');
			}
		}

		return true;
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('message.content', 'Logout Successful');
		$this->session->set_flashdata('message.label', 'label-success');
		$this->load->view('auth/login');
	}

	/*public function create() {
		//if($this->input->post('identity')) {
			$this->auth_model->create('restie', 'restie');
		//}
		$this->load->view('auth/login');
	}*/
}