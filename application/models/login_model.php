<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function get_user ($name, $password)
	{
		$query = $this->db->get_where('users', array('username' => $name));

		if ($query->num_rows() > 0) {

			$query       = $query->row_array();
			$user_name   = $query['username'];
			$password_db = $query['password'];
			$id_user     = $query['id'];

			if($name === $user_name && $password === $password_db){

				$this->_add_assistance($id_user);
				return true;

			} else {

				return false;
				
			}
		}

	}

	private function _add_assistance ($id_user)
	{
		$date = date("Y-m-d H:i:s"); 
		$this->db->set("users_id", $id_user);
		$this->db->set("date", $date);
		$this->db->insert("assistance");
	}

}