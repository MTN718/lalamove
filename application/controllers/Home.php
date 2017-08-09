<?php defined('BASEPATH') OR exit('No direct script access allowed');

//we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

   /**
   * __construct function.
   * 
   * @access public
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
    // $this->load->library(array('session'));
    $this->load->helper(array('url'));
    $this->load->model('user_model');
    $this->load->model('order_model');
 }

 function index() {
   $data['pageName'] = "HOME";
   $this->load->view('common/content_handler', $data);
 }

 function business() {
   $data['pageName'] = "BUSINESS";
   $this->load->view('common/content_handler', $data);
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
        $this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
        $this->form_validation->set_rules('training_session', 'Training Session', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

        if ($this->form_validation->run() === false) {
      
          // validation not ok, send validation errors to the view
          $this->load->view('common/header');
          $this->load->view('home/driver/driver', $data);
          $this->load->view('common/footer');
          
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
            $this->load->view('common/header');
            $this->load->view('home/driver/driver_success', $data);
            $this->load->view('common/footer');
            
          } else {
            
            // user creation failed, this should never happen
            $data->error = 'There was a problem creating your new account. Please try again.';
            
            // send error to the view
            $this->load->view('common/header');
            $this->load->view('home/driver/driver', $data);
            $this->load->view('common/footer');
            
          }
          
        }
   }

 function how_it_work() {
   $data['pageName'] = "HIW";
   $this->load->view('common/content_handler', $data);
 }

 function pricing() {
   $data['pageName'] = "PRICING";
   $this->load->view('common/content_handler', $data);
 }

 function bangkok() {
   $data['pageName'] = "BANGKOK";
   $this->load->view('common/content_handler', $data);
 }

  function bangkokdrop() {
   $data['pageName'] = "BANGKOKDROP";
   $this->load->view('common/content_handler', $data);
 }

  function hongkong() {
   $data['pageName'] = "HONGKONG";
   $this->load->view('common/content_handler', $data);
 }

  function manila() {
   $data['pageName'] = "MANILA";
   $this->load->view('common/content_handler', $data);
 }

  function singapore() {
   $data['pageName'] = "SINGAPORE";
   $this->load->view('common/content_handler', $data);
 }

  public function instantquote() { 

    // create the data object
    $data = new stdClass();

    $this->load->view('order/map_header');
    $this->load->view('order/index');
    $this->load->view('order/map_footer');
   /*$data['pageName'] = "INSTANTQUOTE";
   $this->load->view('common/content_handler', $data);*/
 }

}
?>
