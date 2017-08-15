<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Order_model class.
 * 
 * @extends CI_Model
 */
class Order_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}


	/**
	 * place_order function.
	 * 
	 * @access public
	 * @param mixed $first_name
	 * @param mixed $last_name
	 * @param mixed $email
	 * @param mixed $mobile
	 * @param mixed $password
	 * @param mixed $user_type
	 * @return bool true on success, false on failure
	 */
	public function place_order($start_name, $stop_name, $startLat, $startLng, $endLat, $endLng, $Description, $order_price, $party_id, $order_by, $deliveryDate, $orderName, $orderMobile, $itemType, $vehicleType,  $waypointsLatLngimplode) {
		
		$data = array(
			'ORDER_DATE'   			=> $deliveryDate,
			'ITEM_TYPE_ID'   		=> $itemType,
			'ORDER_BY'      		=> $order_by,
			'PARTY_ID'      		=> $party_id,
			'VEHICLE_TYPE_ID '      => $vehicleType,
			'DESCRIPTION'      		=> $Description,
			'ORDER_STATUS_ID' 		=> 1,
			'CREATED_DATE'			=> date('Y-m-d H:i:s'),
			'LAST_MODIFIED_DATE' 	=> date('Y-m-d H:i:s')
		);
		$this->db->insert('ORDER', $data);
		$ORDER_ID = $this->db->insert_id();

		$orderStop = array(
				'START_NAME'			=>  $start_name,
				'STOP_NAME'				=>  $stop_name,
				'START_LAT'				=>  $startLat,
				'START_LNG'				=>  $startLng,
				'END_LAT'				=>  $endLat,
				'END_LNG'				=>  $endLng,
				'ORDER_PRICE'			=> 	$order_price,
				'WAYPOINTS'				=>	$waypointsLatLngimplode,
				'STATUS'				=> 	1,
				'ORDER_ID'				=>  $ORDER_ID,
				'CREATED_DATE'			=> date('Y-m-d H:i:s'),
				'LAST_MODIFIED_DATE' 	=> date('Y-m-d H:i:s')
			);
		$this->db->insert('ORDER_STOP', $orderStop);
		$ORDER_STOP_ID = $this->db->insert_id();

		$orderContact = array(
						'ORDER_STOP_ID'				=>	$ORDER_STOP_ID,
						'ORDER_CONTACT_NAME'		=>	$orderName,
						'MOBILE_NO'					=>	$orderMobile,
						'FAVORITE_DRIVERS_LICENCE'	=> 	NULL
						);
		$this->db->insert('ORDER_CONTACT', $orderContact);
		$ORDER_CONTACT_ID = $this->db->insert_id();
		return $ORDER_CONTACT_ID;
		
	}


	public function getItmeType(){
		$this->db->select('*');
		$this->db->from('ITEM_TYPE');		
		return $this->db->get()->result_array();
	}
	
	
	
}
