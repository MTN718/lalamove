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
	public function place_order($Description, $order_price, $party_id, $order_by, $deliveryDate, $orderName, $orderMobile, $itemType, $vehicleType,  $waypointsLatLng, $orderDuration, $orderDistance, $additionalServices) {

		$data = array(
			'ORDER_DATE'   			=> $deliveryDate,
			'ORDER_BY'      		=> $order_by,
			'ORDER_PRICE'			=> $order_price,
			'ORDER_DURATION'		=> $orderDuration,
			'ORDER_DISTANCE'		=> $orderDistance,
			'PARTY_ID'      		=> $party_id,
			'ITEM_TYPE_ID'   		=> $itemType,
			'VEHICLE_TYPE_ID '      => $vehicleType,
			'DESCRIPTION'      		=> $Description,
			'ORDER_STATUS_ID' 		=> "ACTIVE",
			'CREATED_DATE'			=> date('Y-m-d H:i:s'),
			'LAST_MODIFIED_DATE' 	=> date('Y-m-d H:i:s')
		);
		$this->db->insert('ORDER', $data);
		$ORDER_ID = $this->db->insert_id();

		/******************Update wallet Transactions******************/
			$walletTransaction = array(
					'PARTY_ID'		=>  $party_id,
					'ORDER_ID'		=>  $ORDER_ID,
					'TRASACTION_DATE' => date('Y-m-d H:i:s')
				);
			$this->db->insert('WALLET_TRANSACTION', $walletTransaction);

		foreach ($waypointsLatLng as $key => $value) {
			$orderLocation = array(
					'ORDER_ID'		=>  $ORDER_ID,
					'LOCATION_TYPE'	=>  $value['type'],
					'LOCATION_NAME'	=>  $value['name'],
					'LOCATION_LAT'	=>  $value['lat'],
					'LOCATION_LNG'	=>  $value['lng']				
				);
			$this->db->insert('ORDER_LOCATION', $orderLocation);
			$ORDER_LOCATION_ID = $this->db->insert_id();	

			if(isset($value['contact']) AND !empty($value['contact']))
			{
					$orderDeliveryContact = array(
						'ORDER_LOCATION_ID'	=>  $ORDER_LOCATION_ID,
						'CONTACT_NAME'		=>  $value['contact']['contact_name'],
						'CONTACT_MOBILE'	=>  $value['contact']['contact_phone'],
						'CONTACT_ADDRESS'	=>  "add",
						'BUILDING_BLOCK'	=>  $value['contact']['contact_block'],			
						'FLOOR'				=>  $value['contact']['contact_floor'],				
						'ROOM'				=>  $value['contact']['contact_room']				
					);
					$this->db->insert('ORDER_DELIVERY_CONTACT', $orderDeliveryContact);
			}
		}


		foreach ($additionalServices as $key => $value) {
			$orderServices = array(
					'ORDER_ID'		=>  $ORDER_ID,
					'SERVICE_ID'	=>  $value
				);
			$this->db->insert('ORDER_SERVICES_CONN', $orderServices);
			$ORDER_LOCATION_ID = $this->db->insert_id();	

		}


		$orderContact = array(
						'ORDER_ID'					=>	$ORDER_ID,
						'ORDER_CONTACT_NAME'		=>	$orderName,
						'MOBILE_NO'					=>	$orderMobile,
						'FAVORITE_DRIVERS_LICENCE'	=> 	NULL
						);
		$this->db->insert('ORDER_CONTACT', $orderContact);
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
		$this->db->set('AMOUNT', $remainWalletAmount); //value that used to update column  
		$this->db->where('PARTY_ID', $party_id); //which row want to upgrade  
		return $this->db->update('WALLET');
		

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
		$this->db->from('ITEM_TYPE');		
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
		$this->db->from('ADDITIONAL_SERVICES');
		$this->db->where('STATUS', 1);
		return $this->db->get()->result_array();	
	}

	/**
	 * getVehicleType function.
	 * 
	 * @access public
	 * @return list of Item type
	 *
	 **/
	public function getVehicleType(){
		$this->db->select('*');
		$this->db->from('VEHICLE_TYPE');
		$this->db->order_by('ORDER_BY','asc');
		return $this->db->get()->result_array();
	}

	/**
	 * check_promo function.
	 * 
	 * @access public
	 * @return price of promo code
	 *
	 **/
	public function check_promo($party_id, $promo_code){
		$party_id = $party_id;
		$promo_code = $promo_code;
		$array = array('PARTY_ID' => $party_id, 'PROMO_CODE' => $promo_code, 'IS_EXPIRED' => 0);

		$this->db->select('*');
		$this->db->from('DISCOUNT_PROMOCODE');
		$this->db->where($array);		
		$result = $this->db->get()->row();		
		if(empty($result)){

			// $this->usedCoupon($promo_code,$party_id);

			$array = array('PROMO_CODE' => $promo_code, 'FOR_ALL' => "YES", 'IS_EXPIRED' => 0);
			
			$this->db->select('*');
			$this->db->from('DISCOUNT_PROMOCODE');
			$this->db->where($array);		
			$result = $this->db->get()->row();
			if(!empty($result)){
				if(!empty($result->USED_BY_PARTYIDS)){
					$arr = explode(',', $result->USED_BY_PARTYIDS);					
					if (in_array($party_id, $arr)){					 	
						return false;
					}else{
						array_push($arr, $party_id);
						$insert_partyids = implode(',', $arr);
						$this->db->set('USED_BY_PARTYIDS', $insert_partyids); //value that used to update column  
						$this->db->where('PROMO_CODE', $promo_code); //which row want to upgrade  
						$this->db->update('DISCOUNT_PROMOCODE');					  
					  	return $result;
					}		
				}else{
					$this->db->set('USED_BY_PARTYIDS', $party_id); //value that used to update column  
					$this->db->where('PROMO_CODE', $promo_code); //which row want to upgrade  
					$this->db->update('DISCOUNT_PROMOCODE');		
					return $result;
				}
			}else{
				return false;
			}
		}else{
			$this->db->set('IS_EXPIRED', 1); //value that used to update column  
			$this->db->where('PARTY_ID', $party_id); //which row want to upgrade  
			$this->db->update('DISCOUNT_PROMOCODE');
			return $result;
		}
	}
}
