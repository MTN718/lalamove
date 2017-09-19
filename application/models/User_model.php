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
	 * update_password function.
	 * 
	 * @access public
	 * @param mixed $email	 
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function update_password($email, $password) {
		$password = $this->hash_password($password);
		$this->db->set('current_password', $password);		
		$this->db->where('user_login_id', $email);
		return $this->db->update('user_login');
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
		$this->db->set('current_password', $password);		
		$this->db->where('party_id', $user_id);
		return $this->db->update('user_login');
	}

	/**
	 * updateEreceipt function.
	 * 
	 * @access public
	 * @param mixed $email	 
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function updateEreceipt($party_id, $email, $e_receipt) {		
		$data = array(
        'party_id' => $party_id,
        'email' => $email,
        'e_receipt' => $e_receipt
		);

		$this->db->where('party_id', $party_id);
		return $this->db->update('billing_receipt', $data);
		
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
		
		$this->db->select('current_password');
		$this->db->from('user_login');
		$this->db->where('user_login_id', $email);
		$hash = $this->db->get()->row('current_password');
		
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
	public function resolve_user_login_mobile($mobile_code, $mobile, $password) {
		
		$this->db->select('current_password');
		$this->db->from('user_login');
		$this->db->where('mobile_code', $mobile_code);
		$this->db->where('mobile_number', $mobile);
		$hash = $this->db->get()->row('current_password');
		
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
		
		$this->db->select('party_id');
		$this->db->from('user_login');
		$this->db->where('user_login_id', $email);

		return $this->db->get()->row('party_id');
		
	}

	/**
	 * get_email_bill function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_email_bill($party_id) {
		
		$this->db->select('*');
		$this->db->from('billing_receipt');
		$this->db->where('party_id', $party_id);

		return $this->db->get()->row();
		
	}

	/**
	 * get_user_id_from_mobile function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_mobile($mobile) {
		
		$this->db->select('party_id');
		$this->db->from('user_login');
		$this->db->where('mobile_number', $mobile);

		return $this->db->get()->row('party_id');
		
	}

	/**
	 * get_user_wallet function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user_wallet($user_id) {
		$this->db->select('*');
		$this->db->from('wallet');
		$this->db->where('party_id', $user_id);		
		return $this->db->get()->row();
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {

		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->join('person', 'person.party_id = user_login.party_id');
		$this->db->join('party', 'party.party_id = user_login.party_id');		
		$this->db->where('user_login.party_id', $user_id);
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
		
		$this->db->from('user_login');
		$this->db->where('user_login_id', $email);
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
	 * @param mixed $party_id	 
	 */
	public function insertToken($party_id){   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'party_id'=>$party_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $party_id;
        
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
            'tokens.party_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->get_user($row->party_id);
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

	public function deleteToken($party_id){		
		$this->db->where('party_id', $party_id);
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

	/**
	 * walletTopUp function.
	 * 
	 * @access public
	 * @param mixed $party_id
	 * @return row
	 */
	public function walletTopUp($party_id) {
		
		$this->db->select('*');
		$this->db->from('wallet');
		$this->db->where('party_id', $party_id);

		return $this->db->get()->row();
		
	}



	/**************************Add party_type_id************************************/
	 // Add New Party
    public function addPartyId($party_type_id,$email)
    {

		$data1 = array(
			'party_type_id'	=> $party_type_id
		);
		$this->db->insert('party', $data1);
		$party_id = $this->db->insert_id();

        $data2 = array(
			'party_id'		=> $party_id,
			'user_login_id' => $email
		);
		$this->db->insert('user_login', $data2);

		$data3 = array(
			'party_id'				=> $party_id,
			'last_updated_stamp' 	=> date('Y-m-d H:i:s'),
			'created_stamp' 		=> date('Y-m-d H:i:s')
		);
		$this->db->insert('person', $data3);

        return $party_id;
    }

    // Add Pasword     
    public function addUserPassword($party_id,$email,$mobile_code,$mobile,$password)
    {
        $party_id = $party_id;
        $user_login_ID = $email;
        $CURRENT_PASSWORD = $this->hash_password($password);

    	$data = array(
			'mobile_code'			=> $mobile_code,
			'mobile_number'		=> $mobile,
			'current_password'	=> $CURRENT_PASSWORD,					
		);
		$this->db->where('party_id', $party_id);
		$this->db->update('user_login', $data);		
    }

    // Add Billing Email
    public function addBillingDetails($party_id,$email)
    {
       	$data = array(
			'party_id'	=> $party_id,
			'email'		=> $email,
			'e_receipt'	=> "YES"			
		);
		$this->db->insert('billing_receipt', $data);
    }

    // Add Connect Mech Type Id
    public function addPartyContactMechId($party_id, $contact_mech_type_id)
    {
        $sql = "INSERT INTO `contact_mech`(`contact_mech_type_id`) VALUES('$contact_mech_type_id')";
        $this->db->query($sql);
        $contact_mech_id = $this->db->insert_id();

        $sql2 = "INSERT INTO `party_contact_mech`(`party_id`,`contact_mech_id`) VALUES('$party_id','$contact_mech_id')";
        $this->db->query($sql2);

        if ($contact_mech_type_id == 'telecom_number') {
            $sql3 = "INSERT INTO `telecom_number`(`contact_mech_id`) VALUES('$contact_mech_id')";
            $this->db->query($sql3);
        }

        if ($contact_mech_type_id == 'postal_address') {
            $sql3 = "INSERT INTO `postal_address`(`contact_mech_id`) VALUES('$contact_mech_id')";
            $this->db->query($sql3);
        }
        return $contact_mech_id;
    }


    /*************************Update details************************/


     // Update User Basic Info
    public function updateUserBasicInfo($model_data)
    {

    	$data = array(
        'first_name' => $model_data['first_name'],
        'last_name' => $model_data['last_name'],
        'company_name' => $model_data['company_name'],
        'industry' => $model_data['industry'],
        'staff' => $model_data['staff'],
        'vehicle_type' => $model_data['vehicle_type'],
        'training_session' => $model_data['training_session'],		
        'last_updated_stamp' => date('Y-m-d H:i:s')
		);

		$this->db->where('party_id', $model_data['party_id']);
		$this->db->update('person', $data);
      
    }


    // Update User Email Info
    public function updateUserEmailInfo($email_mech_id, $email)
    {
        $email_mech_id = $email_mech_id;
        $info_string = $email;

        $sql = "UPDATE `contact_mech` SET `info_string`= '$info_string' WHERE contact_mech_id = '$email_mech_id'";
        $this->db->query($sql);
    }

      // Update User Contact Info
    public function updateUserContactInfo($telecom_mech_id, $mobile, $mobile_code)
    {
        $telecom_mech_id = $telecom_mech_id;        
        $mobile_number = $mobile;
        $mobile_code = $mobile_code;

        $sql = "UPDATE `telecom_number` SET `mobile_number` = $mobile_code, `mobile_number` = '$mobile_number' WHERE contact_mech_id = '$telecom_mech_id'";
        $this->db->query($sql);
    }

    // Update User Address Info
    public function updateUserAddressInfo($postal_mech_id)
    {
        $postal_mech_id = $postal_mech_id;

        $sql = "UPDATE `postal_address` SET `to_name` = '$to_name', `address1` = '$address1', `address2` = '$address2', `city` = '$city', `state_province_geo_id` = '$state', `postal_code` = '$postal_code' WHERE contact_mech_id = '$postal_mech_id'";
        $this->db->query($sql);
    }

    /************************************Get users order_move details*********************************/
    public function getUsersDetails($party_id){
    	$this->db->select('*');
        $this->db->from('party');
        $this->db->join('person', 'person.party_id = party.party_id');
        $this->db->join('user_login', 'user_login.party_id = party.party_id');
        $this->db->where('party.party_id', $party_id);
        return $this->db->get()->row();

    }

    public function getOrderDetails($party_id){
		$this->db->select('*');
        $this->db->from('order_move');        
        $this->db->where('order_move.party_id', $party_id);        
        return $this->db->get()->result();    	
    }

    public function getOrderStart($order_id){
    	$this->db->select('*');
        $this->db->from('order_location'); 
        $this->db->where('order_id',$order_id);
        $this->db->where('location_type','START');                                                
        $this->db->where('order_location.location_type','START');
        return $this->db->get()->row();        

    }

    public function getOrderStop($order_id){
    	$this->db->select('*');
        $this->db->from('order_location'); 
        $this->db->where('order_id',$order_id);
        $this->db->where('location_type','STOP');
        return $this->db->get()->num_rows();
    }

    public function getOrderEnd($order_id){
    	$this->db->select('*');
        $this->db->from('order_location'); 
        $this->db->where('order_id',$order_id);
        $this->db->where('location_type','END');
        $this->db->where('order_location.location_type','END');
        return $this->db->get()->row();
    }

    public function getDriverDetails($no){
    	$this->db->select('*');
        $this->db->from('vehicle');
        $this->db->join('person', 'person.party_id = vehicle.driver_id');
        $this->db->where('no',$no);
        return $this->db->get()->row();
    }

    public function cancelOrder($order_id){
 		$data = array(
        'order_status_id' => "CANCELLED",
        'last_modified_date' => date('Y-m-d H:i:s')        
		);

		$this->db->where('order_id', $order_id);
		return $this->db->update('order_move', $data);   	
    }

    public function getWalletTransaction($party_id){
    	$this->db->select('*');
        $this->db->from('wallet_transaction');
        $this->db->join('order_move', 'order_move.order_id = wallet_transaction.order_id');
        $this->db->where('wallet_transaction.party_id', $party_id);
        return $this->db->get()->result();
    }

    public function favoriteDriver($order_id,$no){
 		$data = array(
        'favorite_drivers_licence' => $no        
		);
		$this->db->where('order_id', $order_id);
		return $this->db->update('order_contact', $data);
    }

    public function addFavoriteDriver($party_id,$driver_id){
    	$this->db->select('*');
    	$this->db->from('party_favourite_driver');
    	$this->db->where('party_customer_id', $party_id);
    	$this->db->where('party_driver_id', $driver_id);
    	$result = $this->db->get()->result();

    	if(empty($result)){
    		$data = array(
        	'party_customer_id' => $party_id,
        	'party_driver_id' => $driver_id,
        	'status' => 1
		);
		return $this->db->insert('party_favourite_driver', $data);
    	}else{
    		$this->db->set('status', 1);
			$this->db->where('party_customer_id', $party_id);
			$this->db->where('party_driver_id', $driver_id);
			// echo "<pre>"; print_r($this->db->update('party_favourite_driver'));
			return $this->db->update('party_favourite_driver');
    	}    	
    }

    public function getFavoriteDriver($party_id){
    	$this->db->select('*');    	
    	$this->db->select('party_favourite_driver.status AS favStatus');
    	$this->db->from('party_favourite_driver');
    	$this->db->join('person', 'person.party_id = party_favourite_driver.party_driver_id');
    	$this->db->join('vehicle', 'vehicle.driver_id = party_favourite_driver.party_driver_id');
    	$this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
    	$this->db->where('party_customer_id', $party_id);    	
    	return $this->db->get()->result_array();
    }

    public function removeFavDriver($party_driver_id,$party_customer_id){    	
    	$this->db->set('status', 0);		
		$this->db->where('party_driver_id', $party_driver_id);
		$this->db->where('party_customer_id', $party_customer_id);
		return $this->db->update('party_favourite_driver');
    }

/*    public function addDriverLicense($party_id,$license_no){    	
    	$this->db->select('*');
    	$this->db->from('vehicle');
    	$this->db->where('no', $license_no);
    	$result = $this->db->get()->row();
    	
    	if(!empty($result)){
    			$this->db->select('*');
		    	$this->db->from('party_favourite_driver');
		    	$this->db->where('party_customer_id', $party_id);
		    	$this->db->where('party_driver_id', $result->driver_id);
		    	$result1 = $this->db->get()->result();

		    	if(empty($result1)){
		    		$data = array(
		        	'party_customer_id' => $party_id,
		        	'party_driver_id' => $result->driver_id,
		        	'status' => 1
				);
				return $this->db->insert('party_favourite_driver', $data);
		    	}else{
		    		$this->db->set('status', 1);
					$this->db->where('party_customer_id', $party_id);
					$this->db->where('party_driver_id', $result->driver_id);
					// echo "<pre>"; print_r($this->db->update('party_favourite_driver'));
					return $this->db->update('party_favourite_driver');
		    	}    	
    	}else{
    		return false;
    	}		
    }*/


}