<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pass_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
        $this->load->library('encrypt');
		$this->load->library('session');
	}

	public function saveAccount($data = null) {
        $data['password'] = $this->encrypt->encode($data['password']);
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

    function getPassword($id = null) {
        $this->db->select('password');
        $this->db->where('id', $id);
        $query = $this->db->get('accounts');

        if($query->num_rows() !== 0) {
            foreach($query->result() as $account) {
                echo $this->encrypt->decode($account->password);
            }
            return $query->result();
        } else {
            return FALSE;
        }
    }
}