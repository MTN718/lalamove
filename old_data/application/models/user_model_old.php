<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
        $query = $this->db->get('users');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($user_id)
	{
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
	}

	// /**
	//  * get_user function.
	//  * 
	//  * @access public
	//  * @param mixed $user_id
	//  * @return object the user object
	//  */
	// public function get_user($user_id) {
		
	// 	$this->db->from('users');
	// 	$this->db->where('id', $user_id);
	// 	return $this->db->get()->row();
		
	// }

	/**
	 * get_user_id_from_email function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_email($email) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('id');
		
	}
	
	// insert
	function insert_user($data)
    {
		return $this->db->insert('users', $data);
	}
}?>