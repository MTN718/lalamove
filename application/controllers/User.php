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
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[USER_LOGIN.USER_LOGIN_ID]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[8]|is_unique[USER_LOGIN.USER_MOBILE]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if ($this->form_validation->run() === false) {
			
				// validation not ok, send validation errors to the view
				$data = array('first_name' => form_error('first_name'), 'last_name' => form_error('last_name'), 'email' => form_error('email'), 'mobile' => form_error('mobile')
					, 'password' => form_error('password'), 'password_confirm' => form_error('password_confirm'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($data));				
			
			} else {
				$PARTY_TYPE_ID = 'CUSTOMER';
				 $modal_data = array(
	              'FIRST_NAME' => $this->input->post('first_name'),
	              'LAST_NAME'    => $this->input->post('last_name'),
	              'COMPANY_NAME' => NULL,
	              'INDUSTRY' => NULL,
	              'STAFF' => NULL,
	              'VEHICLE_TYPE' => NULL,
	              'TRAINING_SESSION' => NULL
	            );
				
				$password = $this->input->post('password');
				$email    = $this->input->post('email');
				$mobile    = $this->input->post('mobile');				
				$user_type = 'CUSTOMER';

				$modal_data['PARTY_ID'] = $this->user_model->addPartyId($PARTY_TYPE_ID,$email);
				$PARTY_ID = $modal_data['PARTY_ID'];
            	
            	$this->user_model->addBillingDetails($PARTY_ID,$email);
            	$this->user_model->addUserPassword($PARTY_ID,$email,$mobile,$password);
            	$this->user_model->updateUserBasicInfo($modal_data);

            	$EMAIL_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
            	$this->user_model->updateUserEmailInfo($EMAIL_MECH_ID, $email);

            	$TELECOM_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
            	$this->user_model->updateUserContactInfo($TELECOM_MECH_ID, $mobile);

            	$POSTAL_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
            	// $this->user_model->updateUserAddressInfo($POSTAL_MECH_ID);
				// set variables from the form
									
			if ($PARTY_ID) {
				
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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[USER_LOGIN.USER_LOGIN_ID]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[8]|is_unique[USER_LOGIN.USER_MOBILE]');
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
			$PARTY_TYPE_ID = 'PARTY_GROUP';
			$industry = implode(',',$this->input->post('industry'));
			$staff = implode(',',$this->input->post('staff'));
			$modal_data = array(
	              'FIRST_NAME' => $this->input->post('first_name'),
	              'LAST_NAME'    => $this->input->post('last_name'),
	              'COMPANY_NAME' => $this->input->post('company_name'),
	              'INDUSTRY' => $industry,
	              'STAFF' => $staff,
	              'VEHICLE_TYPE' => NULL,
	              'TRAINING_SESSION' => NULL
	            );
			// set variables from the form
			$email    = $this->input->post('email');
			$mobile    = $this->input->post('mobile');
			$password = $this->input->post('password');
			
			$user_type = 'PARTY_GROUP';

			$modal_data['PARTY_ID'] = $this->user_model->addPartyId($PARTY_TYPE_ID,$email);
			$PARTY_ID = $modal_data['PARTY_ID'];
			
			$this->user_model->addBillingDetails($PARTY_ID,$email);            	
        	$this->user_model->addUserPassword($PARTY_ID,$email,$mobile,$password);
        	$this->user_model->updateUserBasicInfo($modal_data);

        	$EMAIL_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
        	$this->user_model->updateUserEmailInfo($EMAIL_MECH_ID, $email);

        	$TELECOM_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
        	$this->user_model->updateUserContactInfo($TELECOM_MECH_ID, $mobile);

        	$POSTAL_MECH_ID = $this->user_model->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
			
			if ($PARTY_ID) {
				
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
	 * driver register function.
	 * 
	 * @access public
	 * @return void
	 */
	// public function driver() {

	// 	// create the data object
	// 	$data = new stdClass();		

	// 	// load form helper and validation library
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');

	// 	// set validation rules
	// 	$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|min_length[2]|max_length[30]');
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[PARTY.EMAIL]');
	// 	$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[8]');
	// 	$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
	// 	$this->form_validation->set_rules('training_session', 'Training Session', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	// 	$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
	// 	if ($this->form_validation->run() === false) {
			
	// 		// validation not ok, send validation errors to the view
	// 		$this->load->view('common/header');
	// 		$this->load->view('user/driver/driver', $data);
	// 		$this->load->view('common/footer');
			
	// 	} else {
			
	// 		// set variables from the form
	// 		$first_name = $this->input->post('first_name');
	// 		$email    = $this->input->post('email');
	// 		$mobile    = $this->input->post('mobile');
	// 		$vehicle_type = $this->input->post('vehicle_type');
	// 		$training_session = $this->input->post('training_session');
	// 		$password = $this->input->post('password');
	// 		$user_type = "DRIVER";
			
	// 		if ($this->user_model->create_driver($first_name, $email, $mobile, $vehicle_type, $training_session, $password, $user_type)) {
				
	// 			// user creation ok
	// 			unset($_POST['password_confirm']);
	// 			$this->load->view('common/header');
	// 			$this->load->view('user/driver/driver_success', $data);
	// 			$this->load->view('common/footer');
				
	// 		} else {
				
	// 			// user creation failed, this should never happen
	// 			$data->error = 'There was a problem creating your new account. Please try again.';
				
	// 			// send error to the view
	// 			$this->load->view('common/header');
	// 			$this->load->view('user/driver/driver', $data);
	// 			$this->load->view('common/footer');
				
	// 		}
			
	// 	}


	// }
		
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
				$wallet    = $this->user_model->get_user_wallet($user_id);
				if(!empty($wallet)){ 
					$amount = $wallet->AMOUNT;
				}else{ 
					$amount = 0;
				}
				// set session user datas				
				$sess_array = array(
					'user_id' 	=> $user->PARTY_ID,
					'email' 	=> $user->USER_LOGIN_ID,
					'user_type'	=> $user->PARTY_TYPE_ID,
					'name'		=> $user->FIRST_NAME,
					'mobile'	=> $user->USER_MOBILE,
					'walletAmount' => $amount,
					'logged_in'	=> (bool)true,					
					 );
				$CI->session->set_userdata($sess_array);
				// user login ok
				if($user->PARTY_TYPE_ID=="CUSTOMER"){								
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID, 'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));				
				}elseif($user->PARTY_TYPE_ID=="PARTY_GROUP") {					
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID,'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->PARTY_TYPE_ID=="DRIVER"){					
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID,'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
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
			
			if ($this->user_model->resolve_user_login_mobile($mobile, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_mobile($mobile);
				$user    = $this->user_model->get_user($user_id);
				$wallet  = $this->user_model->get_user_wallet($user_id);
				if(!empty($wallet)){ 
					$amount = $wallet->AMOUNT;
				}else{ 
					$amount = 0;
				}
				
				// set session user datas				
				$sess_array = array(
					'user_id' 	=> $user->PARTY_ID,
					'email' 	=> $user->USER_LOGIN_ID,
					'user_type'	=> $user->PARTY_TYPE_ID,
					'name'		=> $user->FIRST_NAME,
					'mobile'	=> $user->USER_MOBILE,
					'walletAmount' => $amount,
					'logged_in'	=> (bool)true,					
					 );
				$CI->session->set_userdata($sess_array);
				
				// user login ok
				if($user->PARTY_TYPE_ID=="CUSTOMER"){					
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID,'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->PARTY_TYPE_ID=="PARTY_GROUP") {					
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID,'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}elseif($user->PARTY_TYPE_ID=="DRIVER"){					
					$data = array("status"=>"success", 'user_id' => $user->PARTY_ID, 'email' => $user->USER_LOGIN_ID, 'user_type' => $user->PARTY_TYPE_ID, 'name' => $user->FIRST_NAME, 'mobile' => $user->USER_MOBILE, 'walletAmount' => $amount, 'message' => "<p>Login success!</p>");
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


        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('user/login/forgot_password');
                $this->load->view('footer');
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->get_user_by_email($clean);
                
                if(!$userInfo){                	
                    $this->session->set_flashdata('error', 'We cant find your email address');
                    redirect(site_url().'/user/forgot_password');
                }   
                
                //build token 
				
                $token = $this->user_model->insertToken($userInfo->PARTY_ID);                        
                $qstring = $this->base64url_encode($token);                  
                $url = site_url() . '/user/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;             

                echo $message; //send this through mail
                $to = $userInfo->USER_LOGIN_ID;
                $subject = "test";
                $result = $this->email
				        ->from('easyweb444@gmail.com')
				        ->to($to)
				        ->subject($subject)
				        ->message($message)
				        ->send();

	                var_dump($result);
echo '<br />';
echo $this->email->print_debugger();

                exit;
                
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
            // echo "<pre>";print_r($user_info);echo "</pre>";die;
            
            if(!$user_info){
                $this->session->set_flashdata('error', 'Link is invalid or expired');
                redirect(site_url().'/user/login');
            }            
            $data = array(
                'firstName'=> $user_info->FIRST_NAME, 
                'email'=>$user_info->USER_LOGIN_ID,
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('user/login/reset_password', $data);
                $this->load->view('footer');
            }else{          	
                                
                $password = $this->input->post('password');
                $user_id  = $user_info->PARTY_ID;
                unset($_POST['passconf']);
                if($this->user_model->update_password_userid($user_id, $password)){
                	$this->user_model->deleteToken($user_id);
                	$this->session->set_flashdata('success', 'Your password has been updated. You may now login');
                }else{
                	$this->session->set_flashdata('error', 'There was a problem updating your password');
                }
               	redirect(site_url().'/user/login'); 
                
            }
        }


    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }    


    /*public function sendMail($subject,$message,$to)
		{
		    $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'easyweb444@gmail.com', // change it to yours
		  'smtp_pass' => '@Flip7411wtfcnn', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

    	
    	$this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('easyweb444@gmail.com'); // change it to yours
	    $this->email->to($to);// change it to yours
	    $this->email->subject($subject);
	    $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}*/

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
		if(!empty($data->USER_LOGIN_ID)){
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
		
		if(!empty($data->EMAIL)){
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
				if(!empty($result->AMOUNT)){					
					$data = array('status' => 'success', 'amount' => $result->AMOUNT, 'party_id' => $result->PARTY_ID, 'message'=>'Password Changed Successfully');
	        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				}else{
					$data = array('status' => 'error', 'amount' => $result->AMOUNT, 'party_id' => $result->PARTY_ID, 'message'=>'You dont have enough balance please contact to admin to recharge your wallet account');
	        		$this->output->set_content_type('application/json')->set_output(json_encode($data));		
				}
				// $this->load->view('user/profile/changePassword');
			
			
		}else{
			$this->load->view('user/profile/changePassword');
		}
	}
}