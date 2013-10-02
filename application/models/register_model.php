<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function insert_user ($name, $password)
	{
		$this->db->set("username", $name);
		$this->db->set("password", $password);
		$this->db->set("status"  , 1);
		$this->db->insert("users");

		return true;
		
	}

}