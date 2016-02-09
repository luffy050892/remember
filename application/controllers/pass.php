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
}