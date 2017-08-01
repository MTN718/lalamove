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
		
		
		if($user_type==1){
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if ($this->form_validation->run() === false) {
			
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
			
			} else {
			
				// set variables from the form
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email    = $this->input->post('email');
				$mobile    = $this->input->post('mobile');
				$password = $this->input->post('password');
				$user_type = 1;
									
			if ($this->user_model->create_user($first_name, $last_name, $email, $mobile, $password, $user_type)) {
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}

		}elseif($user_type==2) {
			// set validation rules
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]');
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
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
					
			// set variables from the form
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email    = $this->input->post('email');
			$mobile    = $this->input->post('mobile');
			$password = $this->input->post('password');
			$company_name = $this->input->post('company_name');
			$industry = implode(',',$this->input->post('industry'));
			$staff = implode(',',$this->input->post('staff'));
			$user_type = 2;
			
			if ($this->user_model->create_company($first_name, $last_name, $email, $mobile, $password, $company_name, $industry, $staff, $user_type)) {
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		}else{
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
		}
		
		
		
	}


	/**
	 * driver register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function driver() {

		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
		$this->form_validation->set_rules('training_session', 'Training Session', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/driver/driver', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$first_name = $this->input->post('first_name');
			$email    = $this->input->post('email');
			$mobile    = $this->input->post('mobile');
			$vehicle_type = $this->input->post('vehicle_type');
			$training_session = $this->input->post('training_session');
			$password = $this->input->post('password');
			$user_type = 3;
			
			if ($this->user_model->create_driver($first_name, $email, $mobile, $vehicle_type, $training_session, $password, $user_type)) {
				
				// user creation ok
				unset($_POST['password_confirm']);
				$this->load->view('header');
				$this->load->view('user/driver/driver_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/driver/driver', $data);
				$this->load->view('footer');
				
			}
			
		}


	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
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
				$this->load->view('header');
				$this->load->view('user/login/login');
				$this->load->view('footer');
			
			} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login_email($email, $password)) {
				// echo "string";die;
				$user_id = $this->user_model->get_user_id_from_email($email);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['user_type']     = (int)$user->user_type;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['status'] = (bool)$user->status;
				
				// user login ok
				if($user->user_type==1){
					echo "Load Personal Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==2) {
					echo "Load Company Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==3){
					echo "Load Driver Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==4){
					echo "Show Error Page";
				}
				/*$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');*/
				
			} else {
				// echo "wrong";die;
				// login failed
				$data->error = 'Wrong username or password.';
				$this->session->set_flashdata('error', 'Wrong username or password.');
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}


		
		}
	}elseif($login_type==2){
			

			$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == false) {
			
				// validation not ok, send validation errors to the view
				$data = array(
    				'loginType' => 1,   
				);
				$this->load->view('header');
				$this->load->view('user/login/login',$data);
				$this->load->view('footer');
			
			} else {
			
			// set variables from the form
			$mobile = $this->input->post('mobile');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login_mobile($mobile, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_mobile($mobile);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['user_type']     = (int)$user->user_type;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['status'] = (bool)$user->status;
				
				// user login ok
				if($user->user_type==1){
					echo "Load Personal Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==2) {
					echo "Load Company Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==3){
					echo "Load Driver Dashboard";
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
				}elseif($user->user_type==4){
					echo "Show Error Page";
				}
				/*$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');*/
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}


		
		}
	}else{
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');

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
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
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
				
                $token = $this->user_model->insertToken($userInfo->id);                        
                $qstring = $this->base64url_encode($token);                  
                $url = site_url() . '/user/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;             

                echo $message; //send this through mail
                $to = $userInfo->email;
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
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email,
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
                $user_id  = $user_info->id;
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
	
}
