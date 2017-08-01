<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin class.
 * 
 * @extends CI_Controller
 */

class Admin extends CI_Controller
{
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));		
		$this->load->model('admin_model');
	}
	
	function index()
	{
		// create the data object
		$data = new stdClass();


			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/login');
                $this->load->view('admin/footer');
            }else{
                
               	// set variables from the form
				$email = $this->input->post('email');
				$password = $this->input->post('password');
                
                $userInfo = $this->admin_model->checkLogin($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                    redirect(site_url().'admin/');
                }                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'admin/');
            }
		}
}