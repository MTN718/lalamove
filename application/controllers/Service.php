<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//we need to call PHP's session object to access it through CI
/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Service extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->connectDB();
        $this->load->library('utils');
        $this->load->library('sqllibs');
    }

    public function connectDB() {
        $this->database = $this->load->database();
    }

    public function register() {
        $postVars = $this->utils->inflatePost(array('fname', 'lname', 'mobile', 'email', 'password', 'register_type', 'user_type', 'device_type'));
        $hashPassword = $postVars['password'];
        if ($postVars['register_type'] == 0) { //email
            $hashPassword = $postVars['password'];
        } else if ($postVars['register_type'] == 1) { //facebook
        } else if ($postVars['register_type'] == 2) { //google
        }
        if ($this->sqllibs->isExist($this->db, 'user_login', array("USER_LOGIN_ID" => $postVars['email'], "REGISTER_TYPE" => $postVars['register_type']))) {
            if ($postVars['register_type'] == 0) {
                $result['result'] = 400;
                $result['message'] = "Email already registered";
                echo json_encode($result);
                return;
            }
            //Facebook or Google
            $loginData = $this->sqllibs->getOneRow($this->db, 'user_login', array("USER_LOGIN_ID" => $postVars['email'], "REGISTER_TYPE" => $postVars['register_type']));
            $userData = $this->sqllibs->getOneRow($this->db, 'person', array("PARTY_ID" => $loginData->PARTY_ID));
            $result = array();
            $result['result'] = 200;
            $result['user'] = $userData;
            echo json_encode($result);
            return;
        }
        //Insert        
        $role = $this->utils->getRole($postVars['user_type']);
        $partyId = $this->sqllibs->insertRow($this->db, 'party', array(
            'PARTY_TYPE_ID' => strtolower($role),
        ));

        $this->sqllibs->insertRow($this->db, 'person', array(
            'PARTY_ID' => $partyId,
            'FIRST_NAME' => $postVars['fname'],
            'LAST_NAME' => $postVars['lname'],
            'MOBILE' => $postVars['mobile'],
            'EMAIL' => $postVars['email'],
        ));

        $this->sqllibs->insertRow($this->db, 'user_login', array(
            'USER_LOGIN_ID' => $postVars['email'],
            'CURRENT_PASSWORD' => $hashPassword,
            'PARTY_ID' => $partyId,
            'REGISTER_TYPE' => $postVars['register_type'],
            'MOBILE_NUMBER' => $postVars['mobile'],
        ));
        
        
        
        

        $postal_contact_mech_id = $this->sqllibs->insertRow($this->db, 'contact_mech', array(
            'contact_mech_type_id' => 'postal_address',
        ));

        $this->sqllibs->insertRow($this->db, 'party_contact_mech', array(
            'party_id' => $partyId,
            'contact_mech_id' => $postal_contact_mech_id,
        ));

        $this->sqllibs->insertRow($this->db, 'postal_address', array(
            'contact_mech_id' => $postal_contact_mech_id,
        ));
        
        
        
        
        

        $telecom_contact_mech_id = $this->sqllibs->insertRow($this->db, 'contact_mech', array(
            'contact_mech_type_id' => 'telecom_number',
        ));

        $this->sqllibs->insertRow($this->db, 'party_contact_mech', array(
            'party_id' => $partyId,
            'contact_mech_id' => $telecom_contact_mech_id,
        ));

        $this->sqllibs->insertRow($this->db, 'telecom_number', array(
            'contact_mech_id' => $telecom_contact_mech_id,
            'mobile_number' => $postVars['mobile'],
        ));
        
        
        
        
        

        $email_contact_mech_id = $this->sqllibs->insertRow($this->db, 'contact_mech', array(
            'contact_mech_type_id' => 'email_address',
            'info_string' => $postVars['email'],
        ));

        $this->sqllibs->insertRow($this->db, 'party_contact_mech', array(
            'party_id' => $partyId,
            'contact_mech_id' => $email_contact_mech_id,
        ));
        
        
        
        
        
        
        

        $userData = $this->sqllibs->getOneRow($this->db, 'person', array(
            "PARTY_ID" => $partyId,
        ));
        $result = array();
        $result['user'] = $userData;
        $result['result'] = 200;
        echo json_encode($result);
    }

    public function login() {

        $postVars = $this->utils->inflatePost(array('email', 'password'));
        if ($this->sqllibs->isExist($this->db, 'user_login', array("USER_LOGIN_ID" => $postVars['email'], "REGISTER_TYPE" => 0))) {
            $hashPassword = $postVars['password'];
            $loginData = $this->sqllibs->getOneRow($this->db, 'user_login', array("USER_LOGIN_ID" => $postVars['email'], "CURRENT_PASSWORD" => $hashPassword));
            if ($loginData == null)
            {
            	$result['result'] = 400;
	        $result['message'] = "No registered";
	        echo json_encode($result);
	        return;
            }
            $userData = $this->sqllibs->getOneRow($this->db, 'person', array("PARTY_ID" => $loginData->party_id));

            $result = array();
            if ($this->sqllibs->isExist($this->db, 'vehicle', array("PARTY_ID" => $loginData->party_id)))
                $result['hasCar'] = true;
            else
                $result['hasCar'] = false;
            $result['result'] = 200;
            $result['user'] = $userData;

            echo json_encode($result);
            return;
        }
        $result['result'] = 400;
        $result['message'] = "No registered";
        echo json_encode($result);
        return;
    }

    public function loginWithMobile() {
        $postVars = $this->utils->inflatePost(array('mobile', 'password'));
        if ($this->sqllibs->isExist($this->db, 'user_login', array("MOBILE_NUMBER" => $postVars['mobile'], "REGISTER_TYPE" => 0))) {
            $hashPassword = $postVars['password'];
            $loginData = $this->sqllibs->getOneRow($this->db, 'user_login', array("MOBILE_NUMBER" => $postVars['mobile'], "CURRENT_PASSWORD" => $hashPassword));
            $userData = $this->sqllibs->getOneRow($this->db, 'person', array("PARTY_ID" => $loginData->PARTY_ID));
            $result = array();
            $result['result'] = 200;
            $result['user'] = $userData;
            echo json_encode($result);
            return;
        }
        $result['result'] = 400;
        $result['message'] = "No registered";
        echo json_encode($result);
        return;
    }

    public function getAdditionalServices() {
        $services = $this->sqllibs->selectAllRows($this->db, 'order_additional_services');
        $result = array();
        $result['result'] = 200;
        $result['services'] = $services;
        echo json_encode($result);
    }

    public function makeOrder() {
        $postVars = $this->utils->inflatePost(array('orderDate', 'partyId', 'vehicleType', 'commentOrder', 'stopArray', 'price', 'driver_type', 'additional_service'));
        $dateTime = new DateTime();
        $role = $this->utils->getRole($postVars['driver_type']);
        $status = $this->utils->getStatus('0');
        $orderId = $this->sqllibs->insertRow($this->db, 'order_move', array(
            'ORDER_DATE' => $postVars['orderDate'],
            'ORDER_BY' => 'customer',
            'ORDER_PRICE' => $postVars['price'],
            'PARTY_ID' => $postVars['partyId'],
            'VEHICLE_TYPE_ID' => $postVars['vehicleType'],
            'DESCRIPTION' => $postVars['commentOrder'],
            'CREATED_DATE' => $dateTime->format('Y-m-d h:m:s'),
            'DRIVER_TYPE' => strtolower($role),
            'ORDER_STATUS_ID' => $status,
        ));

        //Save Stops Location        
        $jsonStops = json_decode($postVars['stopArray']);
        foreach ($jsonStops as $stopInfo) {
            $locationId = $this->sqllibs->insertRow($this->db, 'order_location', array(
                'ORDER_ID' => $orderId,
                'LOCATION_TYPE' => $stopInfo->type,
                'LOCATION_NAME' => $stopInfo->location,
                'LOCATION_LAT' => $stopInfo->lat,
                'LOCATION_LNG' => $stopInfo->lng,
            ));

            $contactId = $this->sqllibs->insertRow($this->db, 'order_delivery_contact', array(
                'ORDER_LOCATION_ID' => $locationId,
                'CONTACT_NAME' => $stopInfo->name,
                'CONTACT_MOBILE' => $stopInfo->phone,
                'BUILDING_BLOCK' => $stopInfo->building,
                'FLOOR' => $stopInfo->floor,
                'ROOM' => $stopInfo->room,
            ));
        }
        //Add Additional Service
        $arrAddService = explode(",", $postVars['additional_service']);
        foreach ($arrAddService as $addServiceId) {
            $locationId = $this->sqllibs->insertRow($this->db, 'order_services_conn', array(
                'ORDER_ID' => $orderId,
                'SERVICE_ID' => $addServiceId,
            ));
        }
        $result = array();
        $result['result'] = 200;
        echo json_encode($result);
    }

    public function getOrdersByRole() {
        $postVars = $this->utils->inflatePost(array('partyId', 'driver_type'));
        $role = $this->utils->getRole($postVars['driver_type']);
        $exOrders = array();
        if ($role == "CUSTOMER") {
            $sql = "select * from order_move where PARTY_ID='" . $postVars['partyId'] . "'";
            $orders = $this->db->query($sql)->result_array();
            $exOrders = $this->getExOrders($orders);
        }
        if ($role == "DRIVER") {
            $sql = "select * from order_move where DRIVER_TYPE='" . $role . "'";
            $orders = $this->db->query($sql)->result_array();
            $exOrders = $this->getExOrders($orders, $postVars['partyId']);
        } else if ($role == "BUSINESS") {
            $sql = "select * from order_move";
            $orders = $this->db->query($sql)->result_array();
            $exOrders = $this->getExOrders($orders, $postVars['partyId']);
        }
        $result = array();
        $result['orders'] = $exOrders;
        echo json_encode($result);
    }

    public function getVehicleTypes() {
        $sql = "select * from vehicle_type";
        $vehicles = $this->db->query($sql)->result_array();
        $result = array();
        $result['vehicles'] = $vehicles;
        echo json_encode($result);
    }

    public function getPriceAccordingDistance() {
        $postVars = $this->utils->inflatePost(array('vehicleType', 'stopArray'));
        $jsonStops = json_decode($postVars['stopArray']);
        $countStops = count($jsonStops);
        $distance = 0;
        $price = 0;
        if ($countStops > 0) {
            $basePos = $jsonStops[0];
            for ($i = 1; $i < $countStops; $i++) {
                $distance = $distance + $this->utils->getDrivingDistance($basePos->lat, $basePos->lng, $jsonStops[$i]->lat, $jsonStops[$i]->lng);
                $basePos = $jsonStops[$i];
            }
        }
        $sql = "select * from vehicle_type where no='" . $postVars['vehicleType'] . "'";
        $settingInfos = $this->db->query($sql)->result_array();
        //var_dump($settingInfos);
        $price = $distance * $settingInfos[0]['landfills_charge'];
        $result = array();
        $result['price'] = $price;
        echo json_encode($result);
    }

    public function getExOrders($orders, $partyId = -1) {
        $exOrders = array();
        foreach ($orders as $order) {
            $orderId = $order['order_id'];

            $isBid = 0;
            if ($partyId != -1) {
                if ($this->sqllibs->isExist($this->db, 'order_bid', array("ORDER_ID" => $orderId,"PARTY_ID" => $partyId))) {
                    $isBid = 1;
                }
            }

            $sqlService = "select * from order_services_conn as A left join order_additional_services as B on A.SERVICE_ID=B.SERVICE_ID where A.ORDER_ID='" . $orderId . "'";
            $serviceResult = $this->db->query($sqlService)->result_array();

            $stops = "select * from order_location as A left join order_delivery_contact as B on A.ORDER_LOCATION_ID=B.ORDER_LOCATION_ID where A.ORDER_ID='" . $orderId . "'";
            $stopInfos = $this->db->query($stops)->result_array();
            $exOrder = array_merge((array) $order, array('services' => $serviceResult, 'stops' => $stopInfos,'isBid' => $isBid));
            $exOrders[] = $exOrder;
        }
        return $exOrders;
    }

    public function addVehicle() {
        $postVars = $this->utils->inflatePost(array('vehicleNo', 'partyId', 'vehicleType', 'regNo', 'permit'));
        if ($this->sqllibs->isExist($this->db, 'vehicle', array("VEHICLE_NO" => $postVars['vehicleNo']))) {
            $result['result'] = 400;
            $result['message'] = "Vehicle already registered";
            echo json_encode($result);
            return;
        }
        $this->sqllibs->insertRow($this->db, 'vehicle', array(
            'VEHICLE_NO' => $postVars['vehicleNo'],
            'PARTY_ID' => $postVars['partyId'],
            'VEHICLE_TYPE_ID' => $postVars['vehicleType'],
            'REGISTRATION_NO' => $postVars['regNo'],
            'PERMIT' => $postVars['permit'],
        ));
        $result['result'] = 200;
        echo json_encode($result);
        return;
    }

    public function getVehicles() {
        $postVars = $this->utils->inflatePost(array('partyId'));
        $vehicles = $this->sqllibs->selectAllRows($this->db, 'vehicle', array('PARTY_ID' => $postVars['partyId']));
        $result = array();
        $result['vehicles'] = $vehicles;
        $result['result'] = 200;
        echo json_encode($result);
        return;
    }

    public function acceptOrder() {
        $postVars = $this->utils->inflatePost(array('partyId', 'bidId'));

        $bidInfo = $this->sqllibs->getOneRow($this->db, 'order_bid', array("NO" => $postVars['bidId']));
        $vehicleInfo = $this->sqllibs->getOneRow($this->db, 'vehicle', array("NO" => $bidInfo->no));
        $this->sqllibs->updateRow($this->db, "order_move", array(
            "VEHICLE_TYPE_ID" => $vehicleInfo->VEHICLE_TYPE_ID,
            "no" => $vehicleInfo->NO,
            "DRIVER_ID" => $vehicleInfo->PARTY_ID,
            "ORDER_STATUS_ID" => "PickedUp",
                ), array('ORDER_ID' => $bidInfo->ORDER_ID));

        $result['result'] = 200;
        echo json_encode($result);
        return;
    }

    public function bidOrder() {
        $postVars = $this->utils->inflatePost(array('orderId', 'partyId', 'vehicleId'));
        if ($this->sqllibs->isExist($this->db, 'order_bid', array("ORDER_ID" => $postVars['orderId'], "PARTY_ID" => $postVars['partyId'], "no" => $postVars['vehicleId']))) {
            $result['result'] = 400;
            echo json_encode($result);
            return;
        }
        $this->sqllibs->insertRow($this->db, 'order_bid', array(
            'ORDER_ID' => $postVars['orderId'],
            'PARTY_ID' => $postVars['partyId'],
            'no' => $postVars['vehicleId'],
        ));
        $result['result'] = 200;
        echo json_encode($result);
        return;
    }

    public function getOrderDetails() {
        $postVars = $this->utils->inflatePost(array('orderId'));
        $sql = "select * from order_move where ORDER_ID='" . $postVars['orderId'] . "'";
        $orderInfos = $this->db->query($sql)->result_array();
        $orderInfo = $orderInfos[0];
        $sql = "select * from order_bid as A left join person as B on A.PARTY_ID=B.PARTY_ID where A.ORDER_ID='" . $postVars['orderId'] . "'";
        $bidders = $this->db->query($sql)->result_array();
        $exOrder = array_merge((array) $orderInfo, array('bidders' => $bidders));
        $result['order'] = $exOrder;
        $result['result'] = 200;
        echo json_encode($result);
        return;
    }

    public function cancelOrder() {
        
    }

}

?>
