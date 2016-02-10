<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pass_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->load->library('session');
	}

	public function saveAccount($data = null) {
        $this->db->insert('accounts',$data);

        return true;
	}

	function getAccounts() {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->get('accounts');

        if($query->num_rows() !== 0) {
            return $query->result();
        } else {
        	return FALSE;
        }
    }
}