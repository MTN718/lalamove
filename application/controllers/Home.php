<?php defined('BASEPATH') OR exit('No direct script access allowed');

//we need to call PHP's session object to access it through CI
/**
 * User class.
 * 
 * @extends CI_Controller
 */

class Home extends CI_Controller {

   /**
   * __construct function.
   * 
   * @access public
   * @return void
   */
    public function __construct(){
      parent::__construct();
      $this->load->library(array('session'));
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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[USER_LOGIN.USER_LOGIN_ID]');
        $this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[8]|is_unique[USER_LOGIN.USER_MOBILE]');
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
          $PARTY_TYPE_ID = 'DRIVER';
          // set variables from the form
          $modal_data = array(
              'FIRST_NAME' => $this->input->post('first_name'),
              'LAST_NAME' => NULL,
              'COMPANY_NAME' => NULL,
              'INDUSTRY' => NULL,
              'STAFF' => NULL,              
              'VEHICLE_TYPE'    => $this->input->post('vehicle_type'),
              'TRAINING_SESSION'  => $this->input->post('training_session')
            );
          $password = $this->input->post('password');
          $email    = $this->input->post('email');
          $mobile    = $this->input->post('mobile');
    
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

 public function bangkok() {
  $data = array(        
        'country' => "th",
        'country_name' => 'Bang Kok',
        'class_name' => 'bkk-link'
      );
    $this->load->view('order/map_header',$data);
    $this->load->view('order/index',$data);
    $this->load->view('order/map_footer');  
 }

  function bangkokdrop() {
   $data['pageName'] = "BANGKOKDROP";
   $this->load->view('common/content_handler', $data);
 }

  public function hongkong() {
    $data = array(        
        'country' => "hk",
        'country_name' => 'Hong Kong',
        'class_name' => 'hk-link'
      );

        $this->load->view('order/map_header',$data);
        $this->load->view('order/index',$data);
        $this->load->view('order/map_footer');
 }

  public function manila() {  
   $data = array(        
        'country' => "ph",
        'country_name' => 'Manila',
        'class_name' => 'ph-link'
      );
    $this->load->view('order/map_header',$data);
    $this->load->view('order/index',$data);
    $this->load->view('order/map_footer');
 }

  public function singapore() {
    $data = array(        
        'country' => "sg",
        'country_name' => 'Singapore',
        'class_name' => 'sg-link'
      );
    $this->load->view('order/map_header',$data);
    $this->load->view('order/index',$data);
    $this->load->view('order/map_footer');  
 }

 public function taipei() {
    $data = array(        
        'country' => "tw",
        'country_name' => 'Taipei',
        'class_name' => 'tp-link'
      );
    $this->load->view('order/map_header',$data);
    $this->load->view('order/index',$data);
    $this->load->view('order/map_footer');  
 }

  public function instantquote() { 

    // create the data object
    $data = new stdClass();

    $this->load->view('order/map_header');
    $this->load->view('order/index', $data);
    $this->load->view('order/map_footer');   
 }

}
?>
