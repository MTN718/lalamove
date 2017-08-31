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
			'FIRST_NAME'   => $first_name,
			'LAST_NAME'   => $last_name,
			'EMAIL'      => $email,
			'MOBILE'      => $mobile,
			'PASSWORD'   => $this->hash_password($password),
			'PARTY_TYPE_ID'      => $user_type,
			'STATUS_ID' => 1,				
			'CREATED_DATE' => date('Y-m-d H:i:s'),
			'LAST_MODIFIED_DATE' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('PARTY', $data);
		
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
			'FIRST_NAME'   	=> $first_name,
			'LAST_NAME'   	=> $last_name,
			'EMAIL'      	=> $email,
			'MOBILE'      	=> $mobile,
			'PASSWORD'   	=> $this->hash_password($password),
			'COMPANY_NAME'  => $company_name,
			'INDUSTRY'      => $industry,
			'STAFF'      	=> $staff,			
			'PARTY_TYPE_ID'     => $user_type,
			'STATUS_ID' 		=> 1,				
			'CREATED_DATE' 	=> date('Y-m-d H:i:s'),
			'LAST_MODIFIED_DATE' 	=> date('Y-m-d H:i:s')
		);
				
		return $this->db->insert('PARTY', $data);
		
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
			'FIRST_NAME'   		=> $first_name,
			'EMAIL'      		=> $email,
			'MOBILE'      		=> $mobile,
			'PASSWORD'   		=> $this->hash_password($password),
			'VEHICLE_TYPE'  	=> $vehicle_type,
			'TRAINING_SESSION'  => $training_session,
			'PARTY_TYPE_ID'     	=> $user_type,
			'STATUS_ID' 			=> 0,				
			'CREATED_DATE' 		=> date('Y-m-d H:i:s'),
			'LAST_MODIFIED_DATE' 		=> date('Y-m-d H:i:s')
		);
				
		return $this->db->insert('PARTY', $data);
		
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
		$this->db->set('CURRENT_PASSWORD', $password);		
		$this->db->where('USER_LOGIN_ID', $email);
		return $this->db->update('USER_LOGIN');
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
		$this->db->set('CURRENT_PASSWORD', $password);		
		$this->db->where('PARTY_ID', $user_id);
		return $this->db->update('USER_LOGIN');
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
        'PARTY_ID' => $party_id,
        'EMAIL' => $email,
        'E_RECEIPT' => $e_receipt
		);

		$this->db->where('PARTY_ID', $party_id);
		return $this->db->update('BILLING_RECEIPT', $data);
		
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
		
		$this->db->select('CURRENT_PASSWORD');
		$this->db->from('USER_LOGIN');
		$this->db->where('USER_LOGIN_ID', $email);
		$hash = $this->db->get()->row('CURRENT_PASSWORD');
		
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
		
		$this->db->select('CURRENT_PASSWORD');
		$this->db->from('USER_LOGIN');
		$this->db->where('USER_MOBILE', $mobile);
		$hash = $this->db->get()->row('CURRENT_PASSWORD');
		
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
		
		$this->db->select('PARTY_ID');
		$this->db->from('USER_LOGIN');
		$this->db->where('USER_LOGIN_ID', $email);

		return $this->db->get()->row('PARTY_ID');
		
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
		$this->db->from('BILLING_RECEIPT');
		$this->db->where('PARTY_ID', $party_id);

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
		
		$this->db->select('PARTY_ID');
		$this->db->from('USER_LOGIN');
		$this->db->where('USER_MOBILE', $mobile);

		return $this->db->get()->row('PARTY_ID');
		
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
		$this->db->from('WALLET');
		$this->db->where('PARTY_ID', $user_id);		
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
		$this->db->from('USER_LOGIN');
		$this->db->join('PERSON', 'PERSON.PARTY_ID = USER_LOGIN.PARTY_ID');
		$this->db->join('PARTY', 'PARTY.PARTY_ID = USER_LOGIN.PARTY_ID');		
		$this->db->where('USER_LOGIN.PARTY_ID', $user_id);		
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
		
		$this->db->from('USER_LOGIN');
		$this->db->where('USER_LOGIN_ID', $email);
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
	
	/**
	 * walletTopUp function.
	 * 
	 * @access public
	 * @param mixed $party_id
	 * @return row
	 */
	public function walletTopUp($party_id) {
		
		$this->db->select('*');
		$this->db->from('WALLET');
		$this->db->where('PARTY_ID', $party_id);

		return $this->db->get()->row();
		
	}



	/**************************Add Party_type_id************************************/
	 // Add New Party
    public function addPartyId($PARTY_TYPE_ID,$email)
    {

		$data1 = array(
			'PARTY_TYPE_ID'	=> $PARTY_TYPE_ID
		);
		$this->db->insert('PARTY', $data1);
		$PARTY_ID = $this->db->insert_id();

        $data2 = array(
			'PARTY_ID'	=> $PARTY_ID,
			'USER_LOGIN_ID' => $email
		);
		$this->db->insert('USER_LOGIN', $data2);

		$data3 = array(
			'PARTY_ID'	=> $PARTY_ID,
			'LAST_UPDATED_STAMP' 		=> date('Y-m-d H:i:s'),
			'CREATED_STAMP' 		=> date('Y-m-d H:i:s')
		);
		$this->db->insert('PERSON', $data3);

        return $PARTY_ID;
    }

    // Add Pasword     
    public function addUserPassword($PARTY_ID,$email,$mobile,$password)
    {
        $PARTY_ID = $PARTY_ID;
        $USER_LOGIN_ID = $email;
        $CURRENT_PASSWORD = $this->hash_password($password);

    	$data = array(
			'USER_MOBILE'	=> $mobile,
			'CURRENT_PASSWORD'	=> $CURRENT_PASSWORD,					
		);
		$this->db->where('PARTY_ID', $PARTY_ID);
		$this->db->update('USER_LOGIN', $data);		
    }

    // Add Billing Email
    public function addBillingDetails($PARTY_ID,$email)
    {
       	$data = array(
			'PARTY_ID'	=> $PARTY_ID,
			'EMAIL'	=> $email,
			'E_RECEIPT'	=> "YES"			
		);
		$this->db->insert('BILLING_RECEIPT', $data);		
    }

    // Add Connect Mech Type Id
    public function addPartyContactMechId($PARTY_ID, $CONTACT_MECH_TYPE_ID)
    {
        $sql = "INSERT INTO `CONTACT_MECH`(`CONTACT_MECH_TYPE_ID`) VALUES('$CONTACT_MECH_TYPE_ID')";
        $this->db->query($sql);
        $CONTACT_MECH_ID = $this->db->insert_id();

        $sql2 = "INSERT INTO `PARTY_CONTACT_MECH`(`PARTY_ID`,`CONTACT_MECH_ID`) VALUES('$PARTY_ID','$CONTACT_MECH_ID')";
        $this->db->query($sql2);

        if ($CONTACT_MECH_TYPE_ID == 'TELECOM_NUMBER') {
            $sql3 = "INSERT INTO `TELECOM_NUMBER`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3);
        }

        if ($CONTACT_MECH_TYPE_ID == 'POSTAL_ADDRESS') {
            $sql3 = "INSERT INTO `POSTAL_ADDRESS`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3);
        }
        return $CONTACT_MECH_ID;
    }


    /*************************Update details************************/


     // Update User Basic Info
    public function updateUserBasicInfo($model_data)
    {

    	$data = array(
        'FIRST_NAME' => $model_data['FIRST_NAME'],
        'LAST_NAME' => $model_data['LAST_NAME'],
        'COMPANY_NAME' => $model_data['COMPANY_NAME'],
        'INDUSTRY' => $model_data['INDUSTRY'],
        'STAFF' => $model_data['STAFF'],
        'VEHICLE_TYPE' => $model_data['VEHICLE_TYPE'],
        'TRAINING_SESSION' => $model_data['TRAINING_SESSION'],		
        'LAST_UPDATED_STAMP' => date('Y-m-d H:i:s')
		);

		$this->db->where('PARTY_ID', $model_data['PARTY_ID']);
		$this->db->update('PERSON', $data);
      
    }


    // Update User Email Info
    public function updateUserEmailInfo($EMAIL_MECH_ID, $email)
    {
        $EMAIL_MECH_ID = $EMAIL_MECH_ID;
        $INFO_STRING = $email;

        $sql = "UPDATE `CONTACT_MECH` SET `INFO_STRING`= '$INFO_STRING' WHERE CONTACT_MECH_ID = '$EMAIL_MECH_ID'";
        $this->db->query($sql);
    }

      // Update User Contact Info
    public function updateUserContactInfo($TELECOM_MECH_ID, $mobile)
    {
        $TELECOM_MECH_ID = $TELECOM_MECH_ID;        
        $MOBILE_NUMBER = $mobile;        

        $sql = "UPDATE `TELECOM_NUMBER` SET `MOBILE_NUMBER` = '$MOBILE_NUMBER' WHERE CONTACT_MECH_ID = '$TELECOM_MECH_ID'";
        $this->db->query($sql);
    }

    // Update User Address Info
    public function updateUserAddressInfo($POSTAL_MECH_ID)
    {
        $POSTAL_MECH_ID = $POSTAL_MECH_ID;

        $sql = "UPDATE `POSTAL_ADDRESS` SET `TO_NAME` = '$TO_NAME', `ADDRESS1` = '$ADDRESS1', `ADDRESS2` = '$ADDRESS2', `CITY` = '$CITY', `STATE_PROVINCE_GEO_ID` = '$STATE', `POSTAL_CODE` = '$POSTAL_CODE' WHERE CONTACT_MECH_ID = '$POSTAL_MECH_ID'";
        $this->db->query($sql);
    }


}
