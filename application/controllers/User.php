<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->helper(array('common_super'));
		$this->load->model('user_model');		
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		$user_type = $this->input->post('user_type');
		// echo "<pre>";print_r($_POST);die;
		
		if($user_type==1){
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_login.user_login_id]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[8]|is_unique[user_login.mobile_number]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if ($this->form_validation->run() === false) {
			
				// validation not ok, send validation errors to the view
				$data = array('first_name' => form_error('first_name'), 'last_name' => form_error('last_name'), 'email' => form_error('email'), 'mobile' => form_error('mobile')
					, 'password' => form_error('password'), 'password_confirm' => form_error('password_confirm'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));				
			
			} else {
				$party_type_id = 'CUSTOMER';
				 $modal_data = array(
	              'first_name' => $this->input->post('first_name'),
	              'last_name'    => $this->input->post('last_name'),
	              'company_name' => NULL,
	              'industry' => NULL,
	              'staff' => NULL,
	              'vehicle_type' => NULL,
	              'training_session' => NULL
	            );
				
				$password = $this->input->post('password');
				$email    = $this->input->post('email');
				$mobile    = $this->input->post('mobile');
				$mobile_code    = $this->input->post('mobile_code');
				$user_type = 'CUSTOMER';

				$modal_data['party_id'] = $this->user_model->addPartyId($party_type_id,$email);
				$party_id = $modal_data['party_id'];
            	
            	$this->user_model->addBillingDetails($party_id,$email);
            	$this->user_model->addUserPassword($party_id, $email, $mobile_code, $mobile, $password);
            	$this->user_model->updateUserBasicInfo($modal_data);

            	$EMAIL_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'EMAIL_ADDRESS');
            	$this->user_model->updateUserEmailInfo($EMAIL_MECH_ID, $email);

            	$TELECOM_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'TELECOM_NUMBER');
            	$this->user_model->updateUserContactInfo($TELECOM_MECH_ID, $mobile, $mobile_code);

            	$POSTAL_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'POSTAL_ADDRESS');
            	// $this->user_model->updateUserAddressInfo($POSTAL_MECH_ID);
				// set variables from the form
									
			if ($party_id) {
				
				// user creation ok				
				$data = array("status"=>"success", 'message' => "Thank you for registering your new account!");
				$this->session->set_flashdata("success","Thank you for registering your new account! Please login to update your profile");
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
			} else {
				
				// user creation failed, this should never happen				
				$this->session->set_flashdata("error","There was a problem creating your new account. Please try again.");
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
			}
			
		}

		}elseif($user_type==2) {
			// set validation rules
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_login.user_login_id]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[8]|is_unique[user_login.mobile_number]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('industry[]', 'Industry', 'required');
		$this->form_validation->set_rules('staff[]', 'Staff', 'required');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$data = array(
    			'company' => 1,   
			);
			$data = array('first_name' => form_error('first_name'), 'last_name' => form_error('last_name'), 'email' => form_error('email'), 'mobile' => form_error('mobile')
					, 'password' => form_error('password'), 'password_confirm' => form_error('password_confirm'), 'company_name' => form_error('company_name'), 'industry' =>
					form_error('industry[]'), 'staff'=>form_error('staff[]'));
        	$this->output->set_content_type('application/json')->set_output(json_encode($data));
			
		} else {
			$party_type_id = 'BUSINESS';
			$industry = implode(',',$this->input->post('industry'));
			$staff = implode(',',$this->input->post('staff'));
			$modal_data = array(
	              'first_name' => $this->input->post('first_name'),
	              'last_name'    => $this->input->post('last_name'),
	              'company_name' => $this->input->post('company_name'),
	              'industry' => $industry,
	              'staff' => $staff,
	              'vehicle_type' => NULL,
	              'training_session' => NULL
	            );
			// set variables from the form
			$email    = $this->input->post('email');
			$mobile    = $this->input->post('mobile');
			$password = $this->input->post('password');
			$mobile_code    = $this->input->post('mobile_code');
			
			$user_type = 'BUSINESS';

			$modal_data['party_id'] = $this->user_model->addPartyId($party_type_id,$email);
			$party_id = $modal_data['party_id'];
            
            $this->user_model->addBillingDetails($party_id,$email);
        	$this->user_model->addUserPassword($party_id,$email,$mobile_code,$mobile,$password);
        	$this->user_model->updateUserBasicInfo($modal_data);

        	$EMAIL_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'EMAIL_ADDRESS');
        	$this->user_model->updateUserEmailInfo($EMAIL_MECH_ID, $email);

        	$TELECOM_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'TELECOM_NUMBER');
        	$this->user_model->updateUserContactInfo($TELECOM_MECH_ID, $mobile, $mobile_code);

        	$POSTAL_MECH_ID = $this->user_model->addPartyContactMechId($party_id, 'POSTAL_ADDRESS');
			
			if ($party_id) {
				
				// user creation ok				
				$data = array("status"=>"success", 'message' => "Thank you for registering your new account!");
				$this->session->set_flashdata("success","Thank you for registering your new account! Please login to update your profile");
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
			} else {
				
				// user creation failed, this should never happen
				$this->session->set_flashdata("error","There was a problem creating your new account. Please try again.");
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
			}
			
		}
		}else{
			$this->load->view('user/register/register');
		}
	}

	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {		
		
		$CI = & get_instance();
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$login_type = $this->input->post('login_type');
		
		if($login_type==1){
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');			
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == false) {			 
			
				// validation not ok, send validation errors to the view
				$data = array('email_error_message' => form_error('email'), 'pass_error_message' => form_error('password'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));
			} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->user_model->resolve_user_login_email($email, $password)) {
				// echo "string";die;
				$user_id = $this->user_model->get_user_id_from_email($email);
				$user    = $this->user_model->get_user($user_id);
				$wallet  = $this->user_model->get_user_wallet($user_id);
				if(!empty($wallet)){ 
					$amount = $wallet->amount;
				}else{ 
					$amount = 0;
				}
				// set session user datas				
				$sess_array = array(
					'user_id' 	=> $user->party_id,
					'email' 	=> $user->user_login_id,
					'user_type'	=> $user->party_type_id,
					'name'		=> $user->first_name,
					'mobile'	=> $user->mobile_number,
					'walletAmount' => $amount,
					'logged_in'	=> (bool)true,					
					 );
				$CI->session->set_userdata($sess_array);
				// user login ok
				if($user->party_type_id=="CUSTOMER"){								
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id, 'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount,  'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));				
				}elseif($user->party_type_id=="BUSINESS") {					
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id,'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount,  'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->party_type_id=="DRIVER"){					
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id,'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount,  'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}else{					
					$data = array('error' => "<p>Database error please log in again</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}
				
			} else {				
				$data = array('error' => '<p>Wrong email or password.</p>');
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}


		
		}
	}elseif($login_type==2){

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[8]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == false) {
			
				// validation not ok, send validation errors to the view
				$data = array('email_error_message' => form_error('mobile'), 'pass_error_message' => form_error('password'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));				
			
			} else {
			
			// set variables from the form
			$mobile = $this->input->post('mobile');
			$password = $this->input->post('password');
			$mobile_code = $this->input->post('mobile_code');
			
			if ($this->user_model->resolve_user_login_mobile($mobile_code, $mobile, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_mobile($mobile);
				$user    = $this->user_model->get_user($user_id);
				$wallet  = $this->user_model->get_user_wallet($user_id);
				if(!empty($wallet)){ 
					$amount = $wallet->amount;
				}else{ 
					$amount = 0;
				}
				// set session user datas				
				$sess_array = array(
					'user_id' 	=> $user->party_id,
					'email' 	=> $user->user_login_id,
					'user_type'	=> $user->party_type_id,
					'name'		=> $user->first_name,
					'mobile'	=> $user->mobile_number,
					'walletAmount' => $amount,
					'logged_in'	=> (bool)true,					
					 );
				$CI->session->set_userdata($sess_array);
				
				// user login ok
				if($user->party_type_id=="CUSTOMER"){					
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id,'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->party_type_id=="BUSINESS") {					
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id,'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->party_type_id=="DRIVER"){					
					$data = array("status"=>"success", 'user_id' => $user->party_id, 'email' => $user->user_login_id, 'user_type' => $user->party_type_id, 'name' => $user->first_name, 'mobile' => $user->mobile_number, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}else{
					$data = array('error' => "<p>Database error please log in again</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}				
				
			} else {
				
				// login failed
				$data = array('error' => '<p>Wrong mobile or password.</p>');
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));
				
			}


		
		}
	}else{
			$this->load->view('user/login/login');

		}
	}	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok			
			$this->session->set_flashdata("success","You have successfully logged out");            
   			redirect('/home');			
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/home');
			
		}
		
	}

	/**
     * forgot_password function.
	 * 
	 * @access public
	 * @return void
     * @work   : Load forget password form and reset password
     */

    public function forgot_password()
        {

        	// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('email');
		
        $forgot_email = $this->input->post('forgot_email');
		if(!empty($forgot_email) AND ($forgot_email==1)){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                $data = array('status' => 'error', 'message' => form_error('email'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));
            }else{
                $email = $this->input->post('email');
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->get_user_by_email($clean);
                
                if(!$userInfo){
                	$data = array('status' => 'error', 'message' => 'We cant find your email address');
        			$this->output->set_content_type('application/json')->set_output(json_encode($data));
                }else{                
                //build token 
				
                $token = $this->user_model->insertToken($userInfo->party_id);                        
                $qstring = $this->base64url_encode($token);                  
                $url = site_url() . 'user/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;             

                //echo $message; //send this through mail
                $to = $userInfo->user_login_id;
                $subject = "test";
                $result =  $this->sendEmail($to,$subject,$message);
                /*$this->email
				        ->from('easyweb444@gmail.com')
				        ->to($to)
				        ->subject($subject)
				        ->message($message)
				        ->send();*/

                $data = array('status' => 'success', 'message' => 'Password reset mail is sent to your email. Please check.');
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));
                }
            }
        }else{
            $this->load->view('user/login/forgot_password');
        }
    }

       public function reset_password()
        {
        // create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

            $token = $this->base64url_decode($this->uri->segment(4));                  
            $cleanToken = $this->security->xss_clean($token);
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();
            if(!$user_info){
                $this->session->set_flashdata('error', 'Link is invalid or expired');
                redirect(site_url().'home/');
            }            
            $data = array(
            	'firstName' => $user_info->first_name,
                'email'=>$user_info->user_login_id,
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/header');
                $this->load->view('user/login/reset_password', $data);
                $this->load->view('user/footer');
            }else{
                $password = $this->input->post('password');
                $user_id  = $user_info->party_id;
                unset($_POST['passconf']);
                if($this->user_model->update_password_userid($user_id, $password)){
                	$this->user_model->deleteToken($user_id);
                	$this->session->set_flashdata('success', 'Your password has been updated. You may now login');
                }else{
                	$this->session->set_flashdata('error', 'There was a problem updating your password');
                }
               	redirect(site_url().'home');
            }
        }


    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }    

    public function sendEmail($to,$subject,$message){

		$this->load->library('email');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'easyweb444@gmail.com';
        $config['smtp_pass'] = '@Flip7411wtfcnn';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config); 
        //print_r($this->email);die;
        $this->email->from('easyweb444@gmail.com', 'Vishal');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()){
            echo json_encode(array("sent"=>TRUE));
        }else{
            echo json_encode(array("sent"=>FALSE));
        }		
	}

  
	/**
	 * account function.
	 * 
	 * @access public
	 * @return void
	 */
	public function account() {
		
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$party_id = $this->input->post('party_id');		
		$data = $this->user_model->get_user($party_id);
		// echo "<pre>";print_r($data);
		if(!empty($data->user_login_id)){
			$this->load->view('user/profile/account',$data);
		}else{
			$this->load->view('user/profile/account');			
		}
	}

	/**
	 * billing function.
	 * 
	 * @access public
	 * @return void
	 */
	public function billing() {
		
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$party_id = $this->input->post('party_id');		
		$data = $this->user_model->get_email_bill($party_id);
		
		if(!empty($data->email)){
			$this->load->view('user/profile/settings',$data);
		}else{
			$this->load->view('user/profile/settings');
		}
	}

	/**
	 * updateReceiptEmail function.
	 * 
	 * @access public
	 * @return void
	 */
	public function updateReceiptEmail() {
		
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$party_id = $this->input->post('party_id');		
		$data = $this->user_model->get_user($party_id);
		// echo "<pre>";print_r($data);
		if(!empty($party_id)){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if ($this->form_validation->run() === false) {
				$data = array('email' => form_error('email'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{				
				$email = $this->input->post('email');
				$e_receipt = $this->input->post('e_receipt');
				
				$result = $this->user_model->updateEreceipt($party_id, $email, $e_receipt);
				// echo "<pre>";print_r($result);die;
				$data = array('status' => 'success', 'message'=>'Youre settings are updated');
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				// $this->load->view('user/profile/changePassword');
			}
		}else{
			$this->load->view('user/profile/settings');
		}
	}



	/**
	 * changePassword function.
	 * 
	 * @access public
	 * @return void
	 */
	public function changePassword() {
		
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$party_id = $this->input->post('party_id');		
		if (!empty($party_id)) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if ($this->form_validation->run() === false) {
				// echo "string";
				// $this->load->view('user/profile/changePassword',$data);
				$data = array('password' => form_error('password'), 'password_confirm' => form_error('password_confirm'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{				
				$password = $this->input->post('password');
				$result = $this->user_model->update_password_userid($party_id, $password);
				// echo "<pre>";print_r($result);die;
				$data = array('status' => 'success', 'message'=>'Password Changed Successfully');
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				// $this->load->view('user/profile/changePassword');
			}
			
		}else{
			$this->load->view('user/profile/changePassword');
		}
	}

	/**
	 * walletRecharge function.
	 * 
	 * @access public
	 * @return void
	 */
	public function walletRecharge() {
		
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$party_id = $this->input->post('party_id');
		if (!empty($party_id)) {				
				
				$result = $this->user_model->walletTopUp($party_id);
				if(!empty($result->amount)){					
					$data = array('status' => 'success', 'amount' => $result->amount, 'party_id' => $result->party_id, 'message'=>'Password Changed Successfully');
	        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				}else{
					$data = array('status' => 'error', 'message'=>'You dont have enough balance please contact to admin to recharge your wallet account');
	        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				}
				// $this->load->view('user/profile/changePassword');
			
			
		}else{
			$this->load->view('user/profile/changePassword');
		}
	}


	/**
	 * cancelOrder function.
	 * 
	 * @access public
	 * @return void
	 */
	public function cancelOrder() {
		
		// create the data object
		$data = new stdClass();
		$order_id = $this->input->post('order_id');
		if(!empty($order_id)){
			$result = $this->user_model->cancelOrder($order_id);
			if(!empty($result)){
				$data = array('status' => 'success', 'message'=>'Order cancelled successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{
				$data = array('status' => 'error', 'message'=>'Order not cancelled successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}
		}

	}

	/**
	 * favoriteDriver function.
	 * 
	 * @access public
	 * @return void
	 */
	public function favoriteDriver() {
		
		// create the data object
		$data = new stdClass();
		$order_id = $this->input->post('order_id');
		$no = $this->input->post('no');
		$party_id = $this->input->post('party_id');
		$driver_id = $this->input->post('driver_id');
		if(!empty($order_id) AND !empty($no) AND !empty($party_id) AND !empty($driver_id)){
			$result = $this->user_model->favoriteDriver($order_id,$no);
			$addDriver = $this->user_model->addFavoriteDriver($party_id,$driver_id);			
			if(!empty($addDriver)){
				$data = array('status' => 'success', 'message'=>'Favorite Driver added successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{
				$data = array('status' => 'error', 'message'=>'Can not add as favorite driver! check My drivers');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}
		}

	}

	/**
	 * getFavoriteDriver function.
	 * 
	 * @access public
	 * @return void
	 */
	public function getFavoriteDriver() {
		
		// create the data object
		$data = new stdClass();
		$party_id = $this->input->post('party_id');		
		if(!empty($party_id)){
			$getDriver = $this->user_model->getFavoriteDriver($party_id);
			// echo "<pre>";print_r($getDriver);die;
			if(!empty($getDriver)){
				$data = array('status' => 'success', 'getDriver'=> $getDriver, 'message'=>'Favorite Driver added successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{
				$data = array('status' => 'error', 'message'=>'Can not add as favorite driver! check My drivers');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}
		}

	}

	/**
	 * removeFavoriteDriver function.
	 * 
	 * @access public
	 * @return void
	 */
	public function removeFavoriteDriver() {
		
		// create the data object
		$data = new stdClass();
		$party_driver_id = $this->input->post('party_driver_id');
		$party_customer_id = $this->input->post('party_customer_id');
		if(!empty($party_driver_id) AND !empty($party_customer_id)){
			$removedDriver = $this->user_model->removeFavDriver($party_driver_id, $party_customer_id);
			// echo "<pre>";print_r($removedDriver);die;
			if(!empty($removedDriver)){
				$data = array('status' => 'success', 'message'=>'Favorite Driver removed successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{
				$data = array('status' => 'error', 'message'=>'Can not removed favorite driver!');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}
		}

	}

	/**
	 * addFavoriteDriver function.
	 * 
	 * @access public
	 * @return void
	 */
	public function addFavoriteDriverUser() {
		
		// create the data object
		$data = new stdClass();
		$party_driver_id = $this->input->post('party_driver_id');
		$party_customer_id = $this->input->post('party_customer_id');
		if(!empty($party_driver_id) AND !empty($party_customer_id)){
			$addedDriver = $this->user_model->addFavoriteDriver($party_customer_id,$party_driver_id);
			// echo "<pre>";print_r($addedDriver);die;
			if(!empty($addedDriver)){
				$data = array('status' => 'success', 'message'=>'Favorite Driver removed successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}else{
				$data = array('status' => 'error', 'message'=>'Can not removed favorite driver!');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));		
			}
		}

	}

	/**
	 * addDriverLicense function.
	 * 
	 * @access public
	 * @return void
	 */
	/*public function addDriverLicense() {
		
		// create the data object
		$data = new stdClass();
		$party_id = $this->input->post('party_id');
		$license_no = $this->input->post('license_no');
		if(!empty($party_id) AND !empty($license_no)){
			$addedDriver = $this->user_model->addDriverLicense($party_id,$license_no);
			if(!empty($addedDriver)){
				$data = array('status' => 'success', 'message'=>'Favorite Driver addded successfully');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}else{
				$data = array('status' => 'error', 'message'=>'License number not found!');
	        	$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}

	}*/
}