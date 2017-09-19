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
		
		$waypointsLatLngimplode='';
		$Description = $this->input->post('Description');
		$order_price = $this->input->post('order_price');
		$party_id = $this->input->post('party_id');
		$order_by = $this->input->post('order_by');
		$deliveryDate = $this->input->post('deliveryDate');
		$orderName = $this->input->post('orderName');
		$orderMobile = $this->input->post('orderMobile');
		$itemType = $this->input->post('itemType');
		$vehicleType = $this->input->post('vehicleType');
		$orderDuration = $this->input->post('finalduration');
		$orderDistance = $this->input->post('finaldistance');
		$waypointsLatLng = $this->input->post('waypointsLatLng');
		$additionalServices = $this->input->post('additionalServices');
		$remainWalletAmount = $this->input->post('remainWalletAmount');
		$final_rate_unchanged = $this->input->post('final_rate_unchanged');
		$favorite_driver_first = $this->input->post('favorite_driver_first');
		
		if ($this->order_model->place_order($Description, $order_price, $party_id, $order_by, $deliveryDate, $orderName, $orderMobile, $itemType, $vehicleType,  $waypointsLatLng, $orderDuration, $orderDistance, $additionalServices, $final_rate_unchanged, $favorite_driver_first)) {
			$this->order_model->updateWallete($party_id,$remainWalletAmount);
			$data = array("status"=>"success", 'message' => "<p>Order Placed!</p>");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
		// echo $start_name;die;
	}

	public function checkPromo(){
		$data = new stdClass();	
		
		$party_id = $this->input->post('party_id');
		$promo_code = $this->input->post('promo_code');

		$result = $this->order_model->check_promo($party_id,$promo_code);
		if(!empty($result)){			
			$data = array("status"=>"success", 'price' => $result->price, 'message'=>'Promo code applied successfully');
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else{
			$data = array("status"=>"false", 'error' => "promo code is not valid or expired");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}


	}

	public function enableFavDriver(){
		$data = new stdClass();	
		
		$party_id = $this->input->post('party_id');		

		$result = $this->order_model->enableFavDriver($party_id);
		if(!empty($result)){			
			$data = array("status"=>"success", 'message'=>'If the driver is available, Orders will be dispatched to your favorite drivers first');
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else{
			$data = array("status"=>"false", 'error' => "You have no favorite drivers available at the moment. Please go to records to add more drivers!");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}


	}
}