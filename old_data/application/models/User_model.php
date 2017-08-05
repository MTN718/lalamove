<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $first_name
	 * @param mixed $last_name
	 * @param mixed $email
	 * @param mixed $mobile
	 * @param mixed $password
	 * @param mixed $user_type
	 * @return bool true on success, false on failure
	 */
	public function create_user($first_name, $last_name, $email, $mobile, $password, $user_type) {
		
		$data = array(
			'first_name'   => $first_name,
			'last_name'   => $last_name,
			'email'      => $email,
			'mobile'      => $mobile,
			'password'   => $this->hash_password($password),
			'user_type'      => $user_type,
			'status' => 1,				
			'created_dt' => date('Y-m-d H:i:s'),
			'updated_dt' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('users', $data);
		
	}

	/**
	 * create_company function.
	 * 
	 * @access public
	 * @param mixed $first_name
	 * @param mixed $last_name
	 * @param mixed $email
	 * @param mixed $mobile
	 * @param mixed $password
	 * @param mixed $company_name
	 * @param mixed $industry
	 * @param mixed $staff
	 * @param mixed $user_type
	 * @return bool true on success, false on failure
	 */
	public function create_company($first_name, $last_name, $email, $mobile, $password, $company_name, $industry, $staff, $user_type) {
		
		$data = array(
			'first_name'   	=> $first_name,
			'last_name'   	=> $last_name,
			'email'      	=> $email,
			'mobile'      	=> $mobile,
			'password'   	=> $this->hash_password($password),
			'company_name'  => $company_name,
			'industry'      => $industry,
			'staff'      	=> $staff,			
			'user_type'     => $user_type,
			'status' 		=> 1,				
			'created_dt' 	=> date('Y-m-d H:i:s'),
			'updated_dt' 	=> date('Y-m-d H:i:s')
		);
				
		return $this->db->insert('users', $data);
		
	}

	/**
	 * create_driver function.
	 * 
	 * @access public
	 * @param mixed $first_name
	 * @param mixed $last_name
	 * @param mixed $email
	 * @param mixed $mobile
	 * @param mixed $password
	 * @param mixed $company_name
	 * @param mixed $industry
	 * @param mixed $staff
	 * @param mixed $user_type
	 * @return bool true on success, false on failure
	 */
	public function create_driver($first_name, $email, $mobile, $vehicle_type, $training_session, $password, $user_type) {
		
		$data = array(
			'first_name'   		=> $first_name,
			'email'      		=> $email,
			'mobile'      		=> $mobile,
			'password'   		=> $this->hash_password($password),
			'vehicle_type'  	=> $vehicle_type,
			'training_session'  => $training_session,
			'user_type'     	=> $user_type,
			'status' 			=> 0,				
			'created_dt' 		=> date('Y-m-d H:i:s'),
			'updated_dt' 		=> date('Y-m-d H:i:s')
		);
				
		return $this->db->insert('users', $data);
		
	}

	/**
	 * update_password function.
	 * 
	 * @access public
	 * @param mixed $email	 
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function update_password($email, $password) {
		$password = $this->hash_password($password);
		$this->db->set('password', $password);		
		$this->db->where('email', $email);
		return $this->db->update('users');
	}

	/**
	 * update_password_userid function.
	 * 
	 * @access public
	 * @param mixed $email	 
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function update_password_userid($user_id, $password) {
		$password = $this->hash_password($password);
		$this->db->set('password', $password);		
		$this->db->where('id', $user_id);
		return $this->db->update('users');
	}
	
	/**
	 * resolve_user_login_email function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login_email($email, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}

	/**
	 * resolve_user_login_mobile function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login_mobile($mobile, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('mobile', $mobile);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
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

	/**
	 * get_user_id_from_mobile function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_mobile($mobile) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('mobile', $mobile);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}

	/**
	 * get_user_by_email function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user_by_email($email) {
		
		$this->db->from('users');
		$this->db->where('email', $email);
		return $this->db->get()->row();
		
	}

	/**
	 * generate_password function.
	 * 
	 * @access public	 
	 * @return passowrd
	 */

	public function  generate_password(){
		$symbol=array('0','1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'v', 'u', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'V', 'U', 'W', 'X', 'Y', 'Z', '@', '%', '^', '-');
		$symbol_amount	=	count($symbol)-1;
		$password=$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)].$symbol[rand(0, $symbol_amount)];
	return $password;
	}

	/**
	 * insertToken function.
	 * 
	 * @access private
	 * @param mixed $user_id	 
	 */
	public function insertToken($user_id){   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }

    /**
	 * isTokenValid function.
	 * 
	 * @access private
	 * @param mixed $token	 
	 */
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->get_user($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    } 
	
	/**
	 * deleteToken function.
	 * 
	 * @access private
	 * @param mixed $userid	 
	 */

	public function deleteToken($user_id){		
		$this->db->where('user_id', $user_id);
		return $this->db->delete('tokens');
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}
