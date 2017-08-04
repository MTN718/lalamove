<?php defined('BASEPATH') OR exit('No direct script access allowed');

//we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

  function __construct()
  {
   parent::__construct();
 }

 function index() {
   $data['pageName'] = "HOME";
   $this->load->view('common/content_handler', $data);
 }

 function business() {
   $data['pageName'] = "BUSINESS";
   $this->load->view('common/content_handler', $data);
 }

 function driver() {
   $data['pageName'] = "DRIVER";
   $this->load->view('common/content_handler', $data);
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
