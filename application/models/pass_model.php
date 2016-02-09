<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->load->library('session');

		//initialize data
		$this->encryp_key     = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
	}

    function ecryptThis() {
    	$key_size =  strlen($key);
	    echo "Key size: " . $key_size . "\n";
	    
	    $plaintext = "This string was AES-256 / CBC / ZeroBytePadding encrypted.";

	    # create a random IV to use with CBC encoding
	    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

	     $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

	    # prepend the IV for it to be available for decryption
	    $ciphertext = $iv . $ciphertext;
	    
	    # encode the resulting cipher text so it can be represented by a string
	    $ciphertext_base64 = base64_encode($ciphertext);

	    echo  $ciphertext_base64 . "\n";

	}

}