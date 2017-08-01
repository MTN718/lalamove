<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required

class Login extends MY_Controller {

	public function index() {
		$this->load->model('loginmodel');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//	echo password_hash($password, PASSWORD_DEFAULT)."\n";

		$result = $this->loginmodel->verify_login($username,$password);

		if($result == '0')  {
			echo "Incorrect credentials";
		} else if($result == 'NO_USER_FOUND') {
			echo "USER NOT FOUND";
		} else {
			$sess_array = array(
         		'user_login_id' => $result->USER_LOGIN_ID,
       		);
       		$this->session->set_userdata('login_data', $result);
			redirect('home');
		}
	}

	// Logout function
	public function logout() {
		$this->session->unset_userdata('login_data');
	  	redirect('login/loginPage');
	}

	/* function for opening login page
	used by logout function of login controller and
	MY_CONTROLLER is_logged_in method
	*/
	public function loginPage() {
		$this->mViewData['data'] = array (
			'pageName' => "LOGIN",
		);
		$this->render('common/login');
	}

}
?>
