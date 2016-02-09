<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->load->library('session');

		//initialize data
		$this->salt_length     = 10;
		$this->store_salt     = FALSE;
	}

	public function hash_password($password, $salt = false) {
		if (empty($password)) {
			return FALSE;
		}

		if ($this->store_salt && $salt) {
			return  sha1($password . $salt);
		} else {
			$salt = $this->salt();
			return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}


	public function hash_password_db($id, $password) {
		if (empty($id) || empty($password)) {
			return FALSE;
		}

		$query = $this->db->select('password')
		                  ->where('id', $id)
		                  ->limit(1)
		                  ->get('users');

		$hash_password_db = $query->row();

		if ($query->num_rows() !== 1) {
			return FALSE;
		}

		if ($this->store_salt) {
			return sha1($password . $hash_password_db->salt);
		}
		else
		{
			$salt = substr($hash_password_db->password, 0, $this->salt_length);

			return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

	public function salt() {
		return substr(md5(uniqid(rand(), true)), 0, $this->salt_length);
	}

	public function login($identity = null, $password = null) {
		if (empty($identity) || empty($password)) {
			return FALSE;
		}

		$query = $this->db->select('username, email, id, password, last_login')
		                  ->where(sprintf("(username = '%1\$s' OR email = '%1\$s')", $this->db->escape_str($identity)))
		                  ->limit(1)
		                  ->get('users');

		$user = $query->row();

		if ($query->num_rows() == 1) {
			$password = $this->hash_password_db($user->id, $password);

			if ($user->password === $password) {

				$session_data = array(
                    'username'             => $user->username,
                    'email'                => $user->email,
                    'user_id'              => $user->id, //everyone likes to overwrite id so we'll use user_id
                    'old_last_login'       => $user->last_login
                );

                $this->session->set_userdata($session_data);

                return true;
			}
		}
		
		return false;
	}
	/*
	public function create($identity, $password) {
        $data = array(
            'username' => $identity,
            'password' => $this->hash_password($password),
        );

       // $this->db->insert('users', $data);
        exit;
	}*/
}