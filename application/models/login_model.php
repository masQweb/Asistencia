<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function get_user ($name, $password, $type)
	{
		$query = $this->db->get_where('users', array('username' => $name,
													 'password' => $password));

		if ($query->num_rows() > 0) {

			$query    = $query->row_array();
			$id_user  = $query['id'];

    		if ($this->_validate_entry_output($id_user, $type) === true){

					$this->_add_assistance($id_user, $type);
					return true;
			}

		} else {
				return false;
		}
	}

	private function _validate_entry_output ($id_user, $type)
	{	
		$this->db->where('users_id'   , $id_user);
    	$this->db->where('YEAR(date)' , date("Y"));
		$this->db->where('MONTH(date)', date("m"));
		$this->db->where('DAY(date)'  , date("d"));
		$this->db->where('type'       , $type);

		$query = $this->db->get('assistance');

		if ($query->num_rows() > 0) {

			return false;

		} else {

			if ($type == 0){
				$this->db->where('users_id'   , $id_user);
		    	$this->db->where('YEAR(date)' , date("Y"));
				$this->db->where('MONTH(date)', date("m"));
				$this->db->where('DAY(date)'  , date("d"));
				$this->db->where('type'       , 1);

				$query = $this->db->get('assistance');

				if ($query->num_rows() > 0) {
					return true;
				} else {
					return false;
				}

			}
			
			return true;
		}

	}

	private function _add_assistance ($id_user, $type)
	{
		$date = date("Y-m-d H:i:s"); 
		$this->db->set("users_id", $id_user);
		$this->db->set("date", $date);
		$this->db->set("type", $type);
		$this->db->insert("assistance");
	}

}