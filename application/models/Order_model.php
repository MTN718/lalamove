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
	public function place_order($Description, $order_price, $party_id, $order_by, $deliveryDate, $orderName, $orderMobile, $itemType, $vehicleType,  $waypointsLatLng, $orderDuration, $orderDistance, $additionalServices, $final_rate_unchanged, $favorite_driver_first) {

		$data = array(
			'order_date'   			=> $deliveryDate,
			'order_by'      		=> $order_by,
			'order_price'			=> $order_price,
			'order_duration'		=> $orderDuration,
			'order_distance'		=> $orderDistance,
			'party_id'      		=> $party_id,
			'item_type_id'   		=> $itemType,
			'vehicle_type_id '      => $vehicleType,
			'description'      		=> $Description,
			'favorite_driver_first'	=> $favorite_driver_first,
			'order_status_id' 		=> "ACTIVE",
			'created_date'			=> date('Y-m-d H:i:s'),
			'last_modified_date' 	=> date('Y-m-d H:i:s')
		);
		$this->db->insert('order_move', $data);
		$ORDER_ID = $this->db->insert_id();

		/******************Update wallet Transactions******************/
			$walletTransaction = array(
					'party_id'		=>  $party_id,
					'order_id'		=>  $ORDER_ID,
					'original_rate' => 	$final_rate_unchanged,
					'discounted_rate' => $order_price
				);
			$this->db->insert('wallet_transaction', $walletTransaction);

		foreach ($waypointsLatLng as $key => $value) {
			$orderLocation = array(
					'order_id'		=>  $ORDER_ID,
					'location_type'	=>  $value['type'],
					'location_name'	=>  $value['name'],
					'location_lat'	=>  $value['lat'],
					'location_lng'	=>  $value['lng']				
				);
			$this->db->insert('order_location', $orderLocation);
			$ORDER_LOCATION_ID = $this->db->insert_id();	

			if(isset($value['contact']) AND !empty($value['contact']))
			{
					$orderDeliveryContact = array(
						'order_location_id'	=>  $ORDER_LOCATION_ID,
						'contact_name'		=>  $value['contact']['contact_name'],
						'contact_mobile'	=>  $value['contact']['contact_phone'],
						'contact_address'	=>  "add",
						'building_block'	=>  $value['contact']['contact_block'],			
						'floor'				=>  $value['contact']['contact_floor'],				
						'room'				=>  $value['contact']['contact_room']				
					);
					$this->db->insert('order_delivery_contact', $orderDeliveryContact);
			}
		}


		if(!empty($additionalServices)){
			
		foreach ($additionalServices as $key => $value) {
			$orderServices = array(
					'order_id'		=>  $ORDER_ID,
					'service_id'	=>  $value
				);
			$this->db->insert('order_services_conn', $orderServices);
			$ORDER_LOCATION_ID = $this->db->insert_id();	

		}
		}


		$orderContact = array(
						'order_id'					=>	$ORDER_ID,
						'order_contact_name'		=>	$orderName,
						'mobile_no'					=>	$orderMobile,
						'favorite_drivers_licence'	=> 	NULL
						);
		$this->db->insert('order_contact', $orderContact);
		$ORDER_CONTACT_ID = $this->db->insert_id();
		return $ORDER_ID;
		
	}

	/**
	 * updateWallete function.
	 * 
	 * @access public	 
	 *
	 **/
	public function updateWallete($party_id, $remainWalletAmount){
		$this->db->set('amount', $remainWalletAmount); //value that used to update column  
		$this->db->where('party_id', $party_id); //which row want to upgrade  
		return $this->db->update('wallet');
		

	}

	/**
	 * getItmeType function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function getItmeType(){
		$this->db->select('*');
		$this->db->from('item_type');		
		return $this->db->get()->result_array();
	}


	/**
	 * getAdditionalServices function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function getAdditionalServices(){
		$this->db->select('*');
		$this->db->from('order_additional_services');
		$this->db->where('status', 1);
		return $this->db->get()->result_array();	
	}

	/**
	 * getVehicleType function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function getVehicleType($country){
		$this->db->select('*');
		$this->db->from('vehicle_type');
		$this->db->where('working_region' , $country);
		$this->db->order_by('order_by','asc');
		return $this->db->get()->result_array();
	}

	/**
	 * check_promo function.
	 * 
	 * @access public
	 * @return price of promo type
	 *
	 **/
	public function check_promo($party_id, $promo_code){
		$party_id = $party_id;
		$promo_code = $promo_code;
		$array = array('party_id' => $party_id, 'promo_code' => $promo_code, 'is_expired' => 0);

		$this->db->select('*');
		$this->db->from('discount_promocode');
		$this->db->where($array);		
		$result = $this->db->get()->row();		
		if(empty($result)){		

			$array = array('promo_code' => $promo_code, 'for_all' => "YES", 'is_expired' => 0);
			
			$this->db->select('*');
			$this->db->from('discount_promocode');
			$this->db->where($array);		
			$result = $this->db->get()->row();
			if(!empty($result)){
				if(!empty($result->used_by_partyids)){
					$arr = explode(',', $result->used_by_partyids);					
					if (in_array($party_id, $arr)){					 	
						return false;
					}else{
						array_push($arr, $party_id);
						$insert_partyids = implode(',', $arr);
						$this->db->set('used_by_partyids', $insert_partyids); //value that used to update column  
						$this->db->where('promo_code', $promo_code); //which row want to upgrade  
						$this->db->update('discount_promocode');					  
					  	return $result;
					}		
				}else{
					$this->db->set('used_by_partyids', $party_id); //value that used to update column  
					$this->db->where('promo_code', $promo_code); //which row want to upgrade  
					$this->db->update('discount_promocode');		
					return $result;
				}
			}else{
				return false;
			}
		}else{
			$this->db->set('is_expired', 1); //value that used to update column  
			$this->db->where('party_id', $party_id); //which row want to upgrade  
			$this->db->update('discount_promocode');
			return $result;
		}
	}

	/**
	 * getVehicleName function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function getVehicleName($vehicle_type_id){
		$this->db->select('*');
		$this->db->from('vehicle_type');
		$this->db->where('vehicle_type_id' , $vehicle_type_id);		
		return $this->db->get()->row();
	}

	/**
	 * enableFavDriver function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function enableFavDriver($party_id){
		$this->db->select('*');
		$this->db->from('party_favourite_driver');
		$this->db->where('status' , 1);
		$this->db->where('party_customer_id' , $party_id);
		return $this->db->get()->row();
	}

}
