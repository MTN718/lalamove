<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Order class.
 * 
 * @extends CI_Controller
 */

class Order extends CI_Controller
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
		$this->load->model('order_model');
	}
	
	function index()
	{
		// create the data object
		$data = new stdClass();
		

        $this->load->view('order/map_header');
        $this->load->view('order/index');
        $this->load->view('order/map_footer');			
	}

	public function placeOrder(){
		
		// create the data object
		$data = new stdClass();
		$waypointsLatLng='';
		$waypointsLatLngimplode='';
		$start_name = $this->input->post('start_name');
		$stop_name = $this->input->post('stop_name');
		$startLat = $this->input->post('startLat');
		$startLng = $this->input->post('startLng');
		$endLat = $this->input->post('endLat');
		$endLng = $this->input->post('endLng');
		$Description = $this->input->post('Description');
		$order_price = $this->input->post('order_price');
		$party_id = $this->input->post('party_id');
		$order_by = $this->input->post('order_by');
		$deliveryDate = $this->input->post('deliveryDate');
		$orderName = $this->input->post('orderName');
		$orderMobile = $this->input->post('orderMobile');
		$itemType = $this->input->post('itemType');
		$vehicleType = $this->input->post('vehicleType');
		$waypointsLatLng = $this->input->post('waypointsLatLng');
		if(!empty($waypointsLatLng)){
		$waypointsLatLngimplode = implode('&', $waypointsLatLng);
	}
		
		if ($this->order_model->place_order($start_name, $stop_name, $startLat, $startLng, $endLat, $endLng, $Description, $order_price, $party_id, $order_by, $deliveryDate, $orderName, $orderMobile, $itemType, $vehicleType,  $waypointsLatLngimplode)) {
			$data = array("status"=>"success", 'message' => "<p>Order Placed!</p>");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
		// echo $start_name;die;
	}
}