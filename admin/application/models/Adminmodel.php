<?php

Class Adminmodel extends CI_Model
{   
    public $userInfo = null;
    public $login_party_id = null;

    function __construct()
    {
        parent::__construct();
        $this->userInfo = $this->session->login_data;
        $this->login_party_id = $this->userInfo->party_id;
    }

    // ==============================================Get Data Methods==============================================

    // get user Name details
    public function getpartyUserNameInfo($model_data)
    {
        $party_id = $model_data['party_id'];

        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('party_id', $party_id);
        return $this->db->get()->row();
    }

    // get user Name details
    public function getpartyNameInfo($model_data)
    {
        $party_id = $model_data['party_id'];

        $this->db->select('*');
        $this->db->from('party');
        $this->db->join('person', 'person.party_id = party.party_id');
        $this->db->where('party.party_id', $party_id);
        $this->db->where('party.status_id !=', 'Delete');
        return $this->db->get()->row();
    }

    //get Timeline notification info
    public function getTimelineInfo($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->join('person', 'person.party_id = party_notification.from_party');
        $this->db->where('from_party', $model_data['party_id'] );
        $this->db->where('status', 3 );
        $this->db->order_by("datetime", "desc");
        return $this->db->get()->result();
    }

    //get notification list
    public function getNotificationList($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->join('person', 'person.party_id = party_notification.from_party');
        $this->db->where('to_party', $model_data['party_id'] );
        $this->db->where('admin_status', 1 );
        $this->db->order_by("datetime", "desc");
        $this->db->limit(50);
        return $this->db->get()->result();
    }

    //get sent notification list
    public function getSentNotificationList($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->join('person', 'person.party_id = party_notification.from_party');
        $this->db->where('from_party', $model_data['party_id'] );
        $this->db->where('admin_status', 1 );
        $this->db->where('to_party !=', 0 );
        $this->db->order_by("datetime", "desc");
        $this->db->limit(50);
        return $this->db->get()->result();
    }

    //get trash notification list
    public function getTrashNotificationList($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->join('person', 'person.party_id = party_notification.from_party');
        $this->db->where('admin_status', 0 );
        $this->db->order_by("datetime", "desc");
        $this->db->limit(50);
        return $this->db->get()->result();
    }

    //get notification count
    public function getNotificationcount($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->where('to_party', $model_data['party_id'] );
        $this->db->where('admin_status', 1 );
        $this->db->where('to_party !=', 0 );
        return $this->db->get()->num_rows();
    }

    //get sent notification count
    public function getSentNotificationcount($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->where('from_party', $model_data['party_id'] );
        $this->db->where('admin_status', 1 );
        $this->db->where('to_party !=', 0 );
        return $this->db->get()->num_rows();
    }

    //get trash notification count
    public function getTrashNotificationcount($model_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->where('admin_status', 0 );
        $this->db->where('to_party !=', 0 );
        return $this->db->get()->num_rows();
    }

    //get Notification info
    public function getNotificationInfo($mail_data="") {
        $this->db->select('*');
        $this->db->from('party_notification');
        $this->db->join('person', 'person.party_id = party_notification.to_party');
        $this->db->where('notification_id', $mail_data['mail_id'] );
        return $this->db->get()->row();
    }

    // get user contact details
    public function getpartyContactInfo($model_data, $contactInfoType = "")
    {
        $party_id = $model_data['party_id'];

        if ($contactInfoType == "email") {
            $this->db->select('*');
            $this->db->from('party_contact_mech');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->where('contact_mech.contact_mech_type_id', 'email_address');
            $this->db->where('party_contact_mech.party_id', $party_id);
            return $this->db->get()->row();
        }

        if ($contactInfoType == "address") {
            $this->db->select('*');
            $this->db->from('party_contact_mech');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->join('postal_address', 'postal_address.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->where('contact_mech.contact_mech_type_id', 'postal_address');
            $this->db->where('party_contact_mech.party_id', $party_id);
            return $this->db->get()->row();
        }

        if ($contactInfoType == "telecom") {
            $this->db->select('*');
            $this->db->from('party_contact_mech');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->join('telecom_number', 'telecom_number.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->where('contact_mech.contact_mech_type_id', 'telecom_number');
            $this->db->where('party_contact_mech.party_id', $party_id);
            return $this->db->get()->row();
        }
        return false;
    }

    // get Customer List details
    public function getpartyList($party_type_id="",$owner_data="")
    {
        if (!empty($owner_data)) {
            $this->db->select('*');
            $this->db->from('party');
            $this->db->join('person', 'person.party_id = party.party_id');
            $this->db->join('user_login', 'user_login.party_id = party.party_id');
            $this->db->join('party_contact_mech', 'party_contact_mech.party_id = party.party_id');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->join('telecom_number', 'telecom_number.contact_mech_id = party_contact_mech.contact_mech_id','left');
            $this->db->where('contact_mech.contact_mech_type_id', 'telecom_number');
            $this->db->where('party.party_type_id', $party_type_id);
            $this->db->where('party.external_id', $owner_data['party_id']);
            $this->db->where('party.status_id !=', 'Delete');
            return $this->db->get()->result();
        } else if(!empty($party_type_id)) {
            $this->db->select('*');
            $this->db->from('party');
            $this->db->join('person', 'person.party_id = party.party_id');
            $this->db->join('user_login', 'user_login.party_id = party.party_id');
            $this->db->join('party_contact_mech', 'party_contact_mech.party_id = party.party_id');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->join('telecom_number', 'telecom_number.contact_mech_id = party_contact_mech.contact_mech_id','left');
            $this->db->where('contact_mech.contact_mech_type_id', 'telecom_number');
            $this->db->where('party.party_type_id', $party_type_id);
            $this->db->where('party.status_id !=', 'Delete');
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('party');
            $this->db->join('person', 'person.party_id = party.party_id');
            $this->db->join('user_login', 'user_login.party_id = party.party_id');
            $this->db->join('party_contact_mech', 'party_contact_mech.party_id = party.party_id');
            $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->join('telecom_number', 'telecom_number.contact_mech_id = party_contact_mech.contact_mech_id');
            $this->db->where('contact_mech.contact_mech_type_id', 'telecom_number');
            $this->db->where('party.status_id !=', 'Delete');
            return $this->db->get()->result();
        }
    }

    // get Favourite Driver List details
    public function getFavouriteDriverList($party_type_id="",$customer_data="")
    {
        $this->db->select('*');
        $this->db->from('party');
        $this->db->join('party_favourite_driver', 'party_favourite_driver.party_driver_id = party.party_id');
        $this->db->join('person', 'person.party_id = party.party_id');
        $this->db->join('user_login', 'user_login.party_id = party.party_id');
        $this->db->join('party_contact_mech', 'party_contact_mech.party_id = party.party_id');
        $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
        $this->db->join('telecom_number', 'telecom_number.contact_mech_id = party_contact_mech.contact_mech_id');
        $this->db->where('contact_mech.contact_mech_type_id', 'telecom_number');
        $this->db->where('party.status_id !=', 'Delete');
        $this->db->where('party.party_type_id', $party_type_id);
        $this->db->where('party_favourite_driver.party_customer_id', $customer_data['party_id']);
        return $this->db->get()->result();
    }


    // get party email id
    public function getPartyEmailAddress($party_id="")
    {
        $this->db->select('*');
        $this->db->from('party');
        $this->db->join('party_contact_mech', 'party_contact_mech.party_id = party.party_id');
        $this->db->join('contact_mech', 'contact_mech.contact_mech_id = party_contact_mech.contact_mech_id');
        $this->db->where('contact_mech.contact_mech_type_id', 'email_address');
        $this->db->where('party.status_id !=', 'Delete');
        $this->db->where('party.party_id', $party_id);
        return $this->db->get()->row();
    }

    // get party wallet
    public function getPartyWallet($party_id="")
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('party_id', $party_id);
        return $this->db->get()->row();
    }

    // get Customer Total Order
    public function getCustomerTotalOrder($party_id="")
    {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('party_id', $party_id);
        return $this->db->get()->num_rows();
    }

    // get Business Total Order
    public function getBusinessTotalOrder($party_id="")
    {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('party', 'party.party_id = order_move.driver_id');
        $this->db->where('party.external_id', $party_id);
        return $this->db->get()->num_rows();
    }
    
    // get Driver Total Order
    public function getDriverTotalOrder($driver_id="",$type="")
    {
        $this->db->select('*');
        $this->db->from('order_move');

        if(!empty($type)){
            $this->db->where('driver_id', $driver_id);
            $this->db->where('order_status_id', 'complete');
        } else {
            $this->db->where('driver_id', $driver_id);
            $this->db->where('order_status_id !=', 'complete');
        }

        return $this->db->get()->num_rows();
    }

    // get Driver vehicle info
    public function getDriverVehicleNo($driver_id="")
    {
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
        $this->db->where('driver_id', $driver_id);
        return $this->db->get()->row();
    }

    // get Business vehicle info
    public function getBusinessVehicleNo($party_id="")
    {
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
        $this->db->where('party_id', $party_id);
        return $this->db->get()->result();
    }

    // get WEb Abourt Us
    public function getAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        return $this->db->get()->row();
    }

    // get web Term and Condition
    public function getTermCondition()
    {
        $this->db->select('*');
        $this->db->from('term_condition');
        return $this->db->get()->row();
    }

    // get web Privacy Policy
    public function getPrivacyPolicy()
    {
        $this->db->select('*');
        $this->db->from('privacy_policy');
        return $this->db->get()->row();
    }

    // get web faqs List
    public function getfaqsList()
    {
        $this->db->select('*');
        $this->db->from('faqs');
        return $this->db->get()->result();
    }

    // get faqs Data
    public function getFaqEditInfo($model_data)
    {
        $faq_id = $model_data['faq_id'];

        $this->db->select('*');
        $this->db->from('faqs');
        $this->db->where('faq_id', $faq_id);
        return $this->db->get()->row();
    }

    // get vehicles list
    public function getvehicleList($driver_data="",$owner_data="") {

        if(!empty($driver_data)) {
            $this->db->select('*');
            $this->db->from('vehicle');
            $this->db->join('person', 'person.party_id = vehicle.party_id');
            $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
            $this->db->where('driver_id', $driver_data['party_id']);
            $this->db->where('is_deleted', 0);
            return $this->db->get()->result();
        } else if(!empty($owner_data)) {
            $this->db->select('*');
            $this->db->from('vehicle');
            $this->db->join('person', 'person.party_id = vehicle.party_id');
            $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
            $this->db->where('vehicle.party_id', $owner_data['party_id']);
            $this->db->where('is_deleted', 0);
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('vehicle');
            $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
            $this->db->join('person', 'person.party_id = vehicle.party_id');
            $this->db->where('is_deleted', 0);
            return $this->db->get()->result();
        }
    }

    // get vehicles data
    public function getvehicleData($driver_data="") {
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = vehicle.vehicle_type_id');
        $this->db->where('vehicle.driver_id', $driver_data['party_id']);
        return $this->db->get()->row();
    }

    // get vehicles list
    public function getvehicleTypeList() {
        $this->db->select('*');
        $this->db->from('vehicle_type');
        return $this->db->get()->result();
    }

    // get vehicles list
    public function getOperationcityList() {
        $this->db->select('*');
        $this->db->from('operational_city');
        return $this->db->get()->result();
    }

    // get vehicles list
    public function getpartyBalanceInfo($party_data) {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('party_id',$party_data['party_id']);
        return $this->db->get()->row();
    }

    // get order list
    public function getorderList($customer_data="",$driver_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('person', 'person.party_id = order_move.party_id');
        if(!empty($customer_data['party_id']))
            $this->db->where('order_move.party_id',$customer_data['party_id']);
        if(!empty($driver_data['party_id']))
            $this->db->where('order_move.driver_id',$driver_data['party_id']);
        return $this->db->get()->result();
    }

    // get invoice list
    public function getorderinvoiceList($customer_data="",$driver_data="") {
        $this->db->select('*');
        $this->db->from('order_invoice');
        $this->db->join('person', 'person.party_id = order_invoice.party_id');

        if(!empty($customer_data['party_id']))
            $this->db->where('order_invoice.party_id',$customer_data['party_id']);
        if(!empty($driver_data['party_id']))
            $this->db->where('order_invoice.driver_id',$driver_data['party_id']);

        return $this->db->get()->result();
    }

    // get order list for business lister
    public function getorderListOfBusinessLister($business_data="") {

        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('party', 'party.party_id = order_move.party_id');
        $this->db->join('person', 'person.party_id = order_move.party_id');
        $this->db->where('order_move.business_id', $business_data['party_id']);
        return $this->db->get()->result();
    }

    // get order location Info
    public function getorderLocationInfo($order_data="") {
        $this->db->select('*');
        $this->db->from('order_location');
        $this->db->join('order_delivery_contact', 'order_delivery_contact.order_location_id = order_location.order_location_id', 'left');
        $this->db->where('order_location.order_id',$order_data['order_id']);
        return $this->db->get()->result();
    }

    // get Selected order Info
    public function getorderInfo($order_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = order_move.vehicle_type_id');
        $this->db->join('discount_promocode', 'discount_promocode.discount_promocode_id = order_move.discount_promocode_id','left');
        $this->db->where('order_id',$order_data['order_id']);
        return $this->db->get()->row();
    }

    // get Selected Invoice Info
    public function getorderInfoForInvoice($order_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('order_id',$order_data['order_id']);
        return $this->db->get()->row();
    }

    // get Customer id by order
    public function getCustomeridByorder($order_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('order_id', $order_data['order_id']);
        return $this->db->get()->row()->party_id;
    }

    // get Driver id by order
    public function getDriveridByorder($order_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('order_id', $order_data['order_id']);
        return $this->db->get()->row()->driver_id;
    }

    // get Driver id by order
    public function getBusinessidByorder($order_data="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('order_id', $order_data['order_id']);
        return $this->db->get()->row()->business_id;
    }

    // get Selected order vehicle type Info for ajax
    public function getorderLocationInfoByLocation($order_location_id="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('order_location', 'order_location.order_id = order_move.order_id');
        $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = order_move.vehicle_type_id');
        $this->db->where('order_location_id',$order_location_id);
        return $this->db->get()->row();
    }

    // get Available Driver List According to vehicle type
    public function getAvailableDriverList($business_data="") {

        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('vehicle', 'vehicle.vehicle_type_id = order_move.vehicle_type_id');
        $this->db->join('person', 'person.party_id = vehicle.driver_id');
        $this->db->join('party', 'party.party_id = vehicle.driver_id');
        $this->db->where('party.status_id ', 'Active');
        $this->db->where('vehicle.vehicle_status', '1');
        $this->db->where('party.external_id',$business_data['party_id']);
        $this->db->where('order_move.order_id',$business_data['order_id']);
        return $this->db->get()->result();
    }

    // get order Service List
    public function getorderServiceList() {
        $this->db->select('*');
        $this->db->from('order_additional_services');
        return $this->db->get()->result();
    }

    // get order Service List
    public function getselectedServiceList($order_data="") {
        $this->db->select('*');
        $this->db->from('order_services_conn');
        $this->db->join('order_additional_services', 'order_services_conn.service_id = order_additional_services.service_id');
        $this->db->where('order_services_conn.order_id',$order_data['order_id']);
        return $this->db->get()->result();
    }

    // get order discount promocode list
    public function getDiscountPromoCode($customer_data="") {
        $this->db->select('*');
        $this->db->from('discount_promocode');
        $this->db->where('discount_promocode.party_id',$customer_data['party_id']);
        $this->db->or_where('discount_promocode.for_all','yes');
        return $this->db->get()->result();
    }

    // get order discount promocode list
    public function getSelectedDiscountPromoCode($order_data="") {
        $this->db->select('*');
        $this->db->from('discount_promocode');
        $this->db->join('order_move', 'order_move.discount_promocode_id = discount_promocode.discount_promocode_id');
        $this->db->where('order_move.order_id',$order_data['order_id']);
        return $this->db->get()->row();
    }

    // get order additional services list
    public function getorderAdditionaServicesList() {
        $this->db->select('*');
        $this->db->from('order_additional_services');
        return $this->db->get()->result();
    }

    // get discount & promocode list
    public function getDiscountPromocodeList() {
        $this->db->select('*');
        $this->db->from('discount_promocode');
        $this->db->join('person', 'discount_promocode.party_id = person.party_id','left');
        return $this->db->get()->result();
    }

    // get Vehicle type info by type_id
    public function getVehicleTypeInfo($vehicle_type_id="") {
        $this->db->select('*');
        $this->db->from('vehicle_type');
        $this->db->where('vehicle_type_id',$vehicle_type_id);
        return $this->db->get()->row();
    }

    // get Vehicle info by id
    public function getVehicleInfo($no="") {
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->where('no',$no);
        return $this->db->get()->row();
    }

    // get user Name details by Party_id
    public function getpartyNameInfoByParty($party_id="") {
        $this->db->select('*');
        $this->db->from('party');
        $this->db->join('person', 'person.party_id = party.party_id');
        $this->db->where('party.party_id', $party_id);
        return $this->db->get()->row();
    }

    // get order additional info
    public function getorderadditionalservicesdata($service_id="") {
        $this->db->select('*');
        $this->db->from('order_additional_services');
        $this->db->where('service_id', $service_id);
        return $this->db->get()->row();
    }

    // get order additional info
    public function getDiscountPromocodeData($discount_promocode_id="") {
        $this->db->select('*');
        $this->db->from('discount_promocode');
        $this->db->where('discount_promocode_id', $discount_promocode_id);
        return $this->db->get()->row();
    }

    // get order additional info
    public function getorderInfoFormLocation($order_location_id="") {
        $this->db->select('*');
        $this->db->from('order_location');
        $this->db->where('order_location_id', $order_location_id);
        return $this->db->get()->row();
    }





















    // ================================================ check Data Methods ==========================================

    // check order status for party
    public function checkPartyOrder($party_id="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('party_id', $party_id);
        $this->db->or_where('driver_id', $party_id);
        $this->db->or_where('business_id', $party_id);
        $this->db->where('order_status_id !=', 'complete');
        return $this->db->get()->num_rows();
    }

    // check order status for vehicle
    public function checkVehicleOrder($no="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('no', $no);
        $this->db->where('order_status_id !=', 'complete');
        return $this->db->get()->num_rows();
    }

    // check order service
    public function checkServiceOrder($service_id="") {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->join('order_services_conn', 'order_services_conn.order_id = order_move.order_id');
        $this->db->where('order_services_conn.service_id', $service_id);
        $this->db->where('order_move.order_status_id !=', 'complete');
        return $this->db->get()->num_rows();
    }

    // check discount_promocode in order
    public function checkDiscountOrder($discount_promocode_id) {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('discount_promocode_id', $discount_promocode_id);
        $this->db->where('order_status_id !=', 'complete');
        return $this->db->get()->num_rows();
    }

    // check vehicles list
    public function checkvehicleInfo($no) {
        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->where('no', $no);
        return $this->db->get()->num_rows();
    }

    // check vehicles list
    public function checkvehicleTypeInfo($vehicle_type_id) {
        $this->db->select('*');
        $this->db->from('vehicle_type');
        $this->db->where('vehicle_type_id', $vehicle_type_id);
        return $this->db->get()->num_rows();
    }

    // check vehicles list
    public function checkUserNameInfo($model_data) {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->join('party', 'party.party_id = user_login.party_id');
        $this->db->where('user_login.user_login_id', $model_data['user_login_id']);
        $this->db->where('party.status_id !=', 'Delete');
        return $this->db->get()->num_rows();
    }





























    // ================================================Add Data Methods================================================

    // Add New party
    public function addpartyid($party_type_id,$external_id)
    {
        $sql = "INSERT INTO `party`(`party_type_id`,`external_id`) VALUES('$party_type_id','$external_id')";
        $this->db->query($sql);
        $party_id = $this->db->insert_id();

        $sql2 = "INSERT INTO `user_login`(`party_id`,`user_login_id`) VALUES('$party_id','wait')";
        $this->db->query($sql2);

        $sql3 = "INSERT INTO `person`(`party_id`) VALUES('$party_id')";
        $this->db->query($sql3);

        $sql4 = "INSERT INTO `wallet`(`party_id`,`amount`) VALUES('$party_id','0')";
        $this->db->query($sql4);

        return $party_id;
    }


    // Add Connect Mech Type id
    public function addpartyContactMechid($party_id, $contact_mech_type_id)
    {
        $sql = "INSERT INTO `contact_mech`(`contact_mech_type_id`) VALUES('$contact_mech_type_id')";
        $this->db->query($sql);
        $contact_mech_id = $this->db->insert_id();

        $sql2 = "INSERT INTO `party_contact_mech`(`party_id`,`contact_mech_id`) VALUES('$party_id','$contact_mech_id')";
        $this->db->query($sql2);

        if ($contact_mech_type_id == 'telecom_number') {
            $sql3 = "INSERT INTO `telecom_number`(`contact_mech_id`) VALUES('$contact_mech_id')";
            $this->db->query($sql3);
        }

        if ($contact_mech_type_id == 'postal_address') {
            $sql3 = "INSERT INTO `postal_address`(`contact_mech_id`) VALUES('$contact_mech_id')";
            $this->db->query($sql3);
        }
        return $contact_mech_id;
    }


    // add vehicle
    public function addvehicleInfo($model_data) {
        $no = $model_data['vehicle_no'];
        $no = strtoupper($no);
        $no = preg_replace('/[^A-Za-z0-9\-]/', '', $no);

        $vehicle_no = $model_data['vehicle_no'];
        $party_id = $model_data['party_id'];
        $driver_id = $model_data['driver_id'];
        $vehicle_type_id = $model_data['vehicle_type_id'];
        $permit = $model_data['permit'];
        $registration_no = $model_data['registration_no'];

        $num_rows = $this->checkvehicleInfo($no);
        if($num_rows > 0)
            return false;

        $sql = "INSERT INTO `vehicle`(`vehicle_no`,`party_id`,`driver_id`,`vehicle_type_id`,`PERMIT`,`registration_no`) VALUES('$vehicle_no','$party_id','$driver_id','$vehicle_type_id','$permit','$registration_no')";  
        $this->db->query($sql); 

        //for notification and mail
        $vehicle_type_info = $this->getVehicleTypeInfo($vehicle_type_id);
        $party_name = $this->getpartyNameInfoByParty($party_id);
        $driver_name = $this->getpartyNameInfoByParty($driver_id);

        $this->addPartyMail($this->login_party_id, $driver_id, "New Vehicle ".$vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] Added", "New Vehicle ".$vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." assigned you");

        $this->addPartyMail($this->login_party_id, $party_id, "New Vehicle ".$vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] Added", "New Vehicle ".$vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." info added");

        $this->addpartynNotification($this->login_party_id, "vehicle", "New Vehicle ".$vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." info added");
        return true;    
    }


    // add vehicle type
    public function addvehicleTypeInfo($model_data) {
        $vehicle_type_id = $model_data['vehicle_type_name'];

        $vehicle_type_name = $model_data['vehicle_type_name'];
        $working_region = $model_data['working_region'];
        $min_weight_capacity = $model_data['min_weight_capacity'];
        $max_weight_capacity = $model_data['max_weight_capacity'];
        $item_height = $model_data['item_height'];
        $item_width = $model_data['item_width'];
        $item_length = $model_data['item_length'];
        $base_fare = $model_data['base_fare'];
        $base_fare_limit = $model_data['base_fare_limit'];
        $rent_per_km = $model_data['rent_per_km'];

        $sql = "INSERT INTO `vehicle_type`(`vehicle_type_name`,`working_region`,`min_weight_capacity`,`max_weight_capacity`,`item_height`,`item_width`,`item_length`,`base_fare`,`base_fare_limit`,`rent_per_km`) VALUES('$vehicle_type_name','$working_region','$min_weight_capacity','$max_weight_capacity','$item_height','$item_width','$ITEM_LEGTH','$base_fare','$base_fare_limit','$rent_per_km')";
        $this->db->query($sql);

        //for notification and mail
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "vehicletype", "New Vehicle type " .$vehicle_type_name." added in system by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }


    // add order additional services info
    public function addOrderAdditionalServicesInfo($model_data) {
        $services_title = $model_data['services_title'];
        $price = $model_data['price'];
        $parent_services_id = $model_data['parent_services_id'];
        $description = $model_data['description'];

        $sql = "INSERT INTO `order_additional_services`(`services_title`,`price`,`parent_services_id`,`description`) VALUES('$services_title','$price','$parent_services_id','$description')";  
        $this->db->query($sql); 

        //for notification and mail
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "service", "Order additional service " .$services_title." added in system by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;    
    }


    // add discount promocode info
    public function addDiscountPromocodeInfo($model_data) {
        $promo_code = $model_data['promo_code'];
        $party_id = $model_data['party_id'];
        $price = $model_data['price'];
        $for_all = $model_data['for_all'];
        $is_expired = $model_data['is_expired'];

        $sql = "INSERT INTO `discount_promocode`(`promo_code`,`party_id`,`price`,`for_all`,`is_expired`) VALUES('$promo_code','$party_id','$price','$for_all','$is_expired')";  
        $this->db->query($sql); 

        //for notification and mail
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "discount", "Discount Promocode " .$promo_code." added in system by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;    
    }

    // Send Mail
    public function sendMail($model_data) {

        $login_party_id = $model_data['login_party_id'];
        $to = $model_data['to'];
        $subject = $model_data['subject'];
        $message = $model_data['message'];

        $sql = "INSERT INTO party_notification(`from_party`,`to_party`,`subject`,`message`) 
            VALUES('$login_party_id','$to','$subject','$message')";
        $result = $this->db->query($sql);
        return true;    
    }























    // =================================== Add notification and mail function =========================================

    // add Notificatio Info
    public function addPartyMail($from_party="", $to_party="", $subject="", $message="") {

        $sql = "INSERT INTO `party_notification`(`from_party`,`to_party`,`subject`,`message`) VALUES('$from_party','$to_party','$subject','$message')";  
        $status = $this->db->query($sql); 
    }

    public function addpartynNotification($from_party="",$for="", $subject="", $status="3") {
        
        $sql = "INSERT INTO party_notification(`from_party`,`notification_for`,`subject`,`status`) VALUES('$from_party','$for','$subject','$status')";
        $this->db->query($sql);
    }

























    // =================================== Update Data Methods =========================================

    // Update UserName Info
    public function updateUserNameInfo($model_data)
    {
        $party_id = $model_data['party_id'];
        $external_id = $model_data['external_id'];

        $sql = "UPDATE `party` SET `external_id` = '$external_id' WHERE party_id = '$party_id'";
        $this->db->query($sql);
    }

    // Update User party Info
    public function updateUserpartyInfo($model_data)
    {
        $party_id = $model_data['party_id'];        
        $mobile_number = $model_data['mobile_number'];
        $user_login_id = $model_data['user_login_id'];
        $current_password = $model_data['current_password'];
        $PASSWORD = password_hash($current_password, PASSWORD_DEFAULT) . "\n";

        if (empty($current_password))
            $sql = "UPDATE `user_login` SET `user_login_id` = '$user_login_id', `mobile_number` = '$mobile_number' WHERE party_id = '$party_id'";
        else
            $sql = "UPDATE `user_login` SET `user_login_id` = '$user_login_id', `mobile_number` = '$mobile_number', `current_password` = '$PASSWORD' WHERE party_id = '$party_id'";

        $this->db->query($sql);
    }

    // Update User party password
    public function updateUserpartyPasswoed($model_data)
    {
        $party_id = $model_data['party_id'];
        $current_password = $model_data['current_password'];
        $PASSWORD = password_hash($current_password, PASSWORD_DEFAULT) . "\n";

        $sql = "UPDATE `user_login` SET `current_password` = '$PASSWORD' WHERE party_id = '$party_id'";

        $this->db->query($sql);
    }

    // Update User Basic Info
    public function updateUserBasicInfo($model_data)
    {
        $party_id = $model_data['party_id'];
        $salutation = $model_data['salutation'];
        $first_name = $model_data['first_name'];
        $last_name = $model_data['last_name'];
        $gender = $model_data['gender'];
        $birth_date = $model_data['birth_date'];
        $occupation = $model_data['occupation'];

        $info_string = $model_data['info_string'];
        $mobile_number = $model_data['mobile_number'];

        //For Driver
        $license_number = $model_data['license_number'];
        $criminal_case_status = $model_data['criminal_case_status'];
        $criminal_case_clearance_no = $model_data['criminal_case_clearance_no'];

        $sql = "UPDATE `person` SET `salutation` = '$salutation', `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$info_string', `mobile` = '$mobile_number', `gender` = '$gender', `birth_date` = '$birth_date', `occupation` = '$occupation', `license_number` = '$license_number', `criminal_case_status` = '$criminal_case_status', `criminal_case_clearance_no` = '$criminal_case_clearance_no' WHERE party_id = '$party_id'";
        $this->db->query($sql);
    }


    // Update User Email Info
    public function updateUserEmailInfo($model_data)
    {
        $email_mech_id = $model_data['email_mech_id'];
        $info_string = $model_data['info_string'];

        $sql = "UPDATE `contact_mech` SET `info_string`= '$info_string' WHERE contact_mech_id = '$email_mech_id'";
        $this->db->query($sql);
    }


    // Update User Contact Info
    public function updateUserContactInfo($model_data)
    {
        $telecom_mech_id = $model_data['telecom_mech_id'];
        $area_code = $model_data['area_code'];
        $contact_number = $model_data['contact_number'];
        $mobile_number = $model_data['mobile_number'];
        $alt_mobile_number = $model_data['alt_mobile_number'];

        $sql = "UPDATE `telecom_number` SET `area_code` = '$area_code', `contact_number` = '$contact_number', `mobile_number` = '$mobile_number', `alt_mobile_number` = '$alt_mobile_number' WHERE contact_mech_id = '$telecom_mech_id'";
        $this->db->query($sql);
    }


    // Update User Address Info
    public function updateUserAddressInfo($model_data)
    {
        $postal_mech_id = $model_data['postal_mech_id'];
        $to_name = $model_data['to_name'];
        $address1 = $model_data['address1'];
        $address2 = $model_data['address2'];
        $city = $model_data['city'];
        $state = $model_data['state'];
        $postal_code = $model_data['postal_code'];

        $sql = "UPDATE `postal_address` SET `to_name` = '$to_name', `address1` = '$address1', `address2` = '$address2', `city` = '$city', `state_province_geo_id` = '$state', `postal_code` = '$postal_code' WHERE contact_mech_id = '$postal_mech_id'";
        $this->db->query($sql);
    }


    // Update User password Info
    public function updateUserPasswordInfo($model_data)
    {
        $party_id = $model_data['party_id'];
        $new_password = $model_data['new_password'];
        $PASSWORD = password_hash($new_password, PASSWORD_DEFAULT) . "\n";

        $sql = "UPDATE `user_login` SET `current_password` = '$PASSWORD' WHERE party_id = '$party_id'";
        $this->db->query($sql);

        //for notification and mail
        $party_name = $this->getpartyNameInfoByParty($party_id);
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);




        $this->addPartyMail($this->login_party_id, $party_id, "Password info of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated", "Password info of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated by ".$login_party_name->first_name." ".$login_party_name->last_name);

        $this->addpartynNotification($this->login_party_id, "password", "Password info of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
    }


    // Update User Profile Picture Info
    public function updateUserPictureInfo($model_data)
    {
        $party_id = $model_data['party_id'];
        $PROFILE_IMG = $model_data['PROFILE_IMG'];

        $sql = "UPDATE `person` SET `person_image_url` = '$PROFILE_IMG' WHERE party_id = '$party_id'";
        $this->db->query($sql);

        //for notification and mail
        $party_name = $this->getpartyNameInfoByParty($party_id);
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);


        $this->addPartyMail($this->login_party_id, $party_id, "Profile Picture of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated", "Profile Picture of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated by ".$login_party_name->first_name." ".$login_party_name->last_name);

        $this->addpartynNotification($this->login_party_id, "profile", "Profile Picture of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." Updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
    }


    // Update About Us 
    public function updateWebAboutUs($model_data)
    {
        $about_us_id = $model_data['id'];
        $title = $model_data['title'];
        $description = $model_data['description'];

        if (empty($about_us_id))
            $sql = "INSERT INTO `about_us`(`title`,`description`) VALUES('$title','$description')";
        else
            $sql = "UPDATE `about_us` SET `title` = '$title', `description` = '$description' WHERE about_us_id = '$about_us_id'";

        $this->db->query($sql);

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "setting", "About us of system updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }


    // Update Privacy Policy
    public function updateWebPrivacyPolicy($model_data)
    {
        $privacy_policy_id = $model_data['id'];
        $title = $model_data['title'];
        $description = $model_data['description'];

        if (empty($privacy_policy_id))
            $sql = "INSERT INTO `privacy_policy`(`title`,`description`) VALUES('$title','$description')";
        else
            $sql = "UPDATE `privacy_policy` SET `title` = '$title', `description` = '$description' WHERE privacy_policy_id = '$privacy_policy_id'";

        $this->db->query($sql);

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "policy", "Privacy policy of system updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }


    // Update Terms and conditions
    public function updateWebTermCondition($model_data)
    {
        $term_condition_id = $model_data['id'];
        $title = $model_data['title'];
        $description = $model_data['description'];

        if (empty($term_condition_id))
            $sql = "INSERT INTO `term_condition`(`title`,`description`) VALUES('$title','$description')";
        else
            $sql = "UPDATE `term_condition` SET `title` = '$title', `description` = '$description' WHERE term_condition_id = '$term_condition_id'";

        $this->db->query($sql);

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "termcondition", "Term and Condition of system updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }

    // Update Faq's
    public function updateWebfaqs($model_data)
    {
        $faq_id = $model_data['id'];
        $question = $model_data['title'];
        $answer = $model_data['description'];

        if (empty($faq_id))
            $sql = "INSERT INTO `faqs`(`question`,`answer`) VALUES('$question','$answer')";
        else
            $sql = "UPDATE `faqs` SET `question` = '$question', `answer` = '$answer' WHERE faq_id = '$faq_id'";

        $this->db->query($sql);

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "faqs", "Faq's of system updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }

    // Update Faq's status
    public function updatefaqstatus($model_data, $status)
    {
        $faq_id = $model_data['faq_id'];

        if ($status == "Enable") {
            $sql = "UPDATE `faqs` SET `status` = '1' WHERE faq_id = '$faq_id'";
            $this->db->query($sql);
        }
        else {
            $sql = "UPDATE `faqs` SET `status` = '0' WHERE faq_id = '$faq_id'";
            $this->db->query($sql);
        }

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "faqs", "Faq's status changed to ".$status." by ".$login_party_name->first_name." ".$login_party_name->last_name);
        return true;
    }

    // order allocation using bid
    public function orderAllocation($model_data="")
    {
        $order_id = $model_data['order_id'];

        $this->db->select('*');
        $this->db->from('order_bidding');
        $this->db->where('order_id', $model_data['order_id']);
        $this->db->order_by("bid_amount", "asc");
        $this->db->limit(1);
        $party_data = $this->db->get()->row();

        if(!empty($party_data)) {
            $sql = "UPDATE `order_move` SET `business_id` = '$party_data->party_id', `bid_amount` = '$party_data->bid_amount', `order_status_id` = 'confirm' WHERE order_id = '$order_id'";
            $this->db->query($sql);
     
            $party_name = $this->getpartyNameInfoByParty($party_data->party_id);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

            $this->addPartyMail($this->login_party_id, $party_data->party_id, "New Order #00".$order_id." assigned", "New Order #00".$order_id." assigned to business owner ".$party_name->first_name." ".$party_name->last_name." by ".$login_party_name->first_name." ".$login_party_name->last_name);
            $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_id." assigned to business owner ".$party_name->first_name." ".$party_name->last_name);
            return true;
        } 
        return false;
    }

















    // =============================== Delete party Methods ===============================

    // Delete party Info
    public function partyDelete($model_data)
    {
        $party_id = $model_data['party_id'];

        // $partyEmailMechid = $this->getpartyContactInfo($model_data, 'email')->contact_mech_id;
        // if (!empty($partyEmailMechid)) {
        //     $sql1 = "DELETE FROM contact_mech WHERE contact_mech_id = $partyEmailMechid";
        //     $this->db->query($sql1);
        // }

        // $partyTelecomMechid = $this->getpartyContactInfo($model_data, 'telecom')->contact_mech_id;
        // if (!empty($partyTelecomMechid)) {
        //     $sql2 = "DELETE FROM telecom_number WHERE contact_mech_id = $partyTelecomMechid";
        //     $this->db->query($sql2);
        // }

        // $partyAddressMechid = $this->getpartyContactInfo($model_data, 'address')->contact_mech_id;
        // if (!empty($partyAddressMechid)) {
        //     $sql3 = "DELETE FROM postal_address WHERE contact_mech_id = $partyAddressMechid";
        //     $this->db->query($sql3);
        // }

        // $sql = "DELETE FROM party_contact_mech WHERE party_id = $party_id";
        // $this->db->query($sql);

        // $sql = "DELETE FROM user_login WHERE party_id = $party_id";
        // $this->db->query($sql);

        // $sql = "DELETE FROM party WHERE party_id = $party_id";
        // $this->db->query($sql);
        $status = $this->checkPartyOrder($party_id);
        if($status > 0)
            return false;

        $sql1 = "UPDATE `user_login` SET `enabled` = '0' WHERE party_id = '$party_id'";
        $this->db->query($sql1);

        $sql1 = "UPDATE `vehicle` SET `driver_id` = 'NULL' WHERE driver_id = '$party_id'";
        $this->db->query($sql1);

        $sql2 = "UPDATE `party` SET `status_id` = 'Delete' WHERE party_id = '$party_id'";
        $this->db->query($sql2);

        //for notification and mail
        $party_name = $this->getpartyNameInfoByParty($party_id);
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

        $this->addpartynNotification($this->login_party_id, "delete", "Info of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." deleted by ".$login_party_name->first_name." ".$login_party_name->last_name);

        return true;
    }

    // Delete Faq Info
    public function faqDelete($model_data)
    {
        $faq_id = $model_data['faq_id'];

        $sql = "DELETE FROM faqs WHERE faq_id = $faq_id";
        $this->db->query($sql);

        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
        $this->addpartynNotification($this->login_party_id, "delete", "Faq's info deleted by ".$login_party_name->first_name." ".$login_party_name->last_name);
    }

    //move to trash Notification
    public function deleteMail($model_data="") 
    {
        if(isset($model_data['mails']) and $model_data['mails'] != NULL) {
            foreach ($model_data['mails'] as $mail) { 
                $data['admin_status'] = 0; 
                $this->db->where('notification_id', $mail);
                $this->db->update('party_notification',$data);
            }
        }
    }   

    //Delete mail from trash
    public function perDeleteMail($model_data="") 
    {
        if(isset($model_data['mails']) and $model_data['mails'] != NULL) {
            foreach ($model_data['mails'] as $mail) { 
                $data['admin_status'] = 2; 
                $this->db->where('notification_id', $mail);
                $this->db->update('party_notification',$data);
            }
        }
    }

    // Delete read mail
    public function deleteReadMail($model_data="")
    {
        $mail_id = $model_data['mail_id'];

        $this->db->select('*');
        $this->db->from('party_notification'); 
        $this->db->where('notification_id',$mail_id);
        $this->db->where('admin_status', 0);
        $noofrows = $this->db->get()->num_rows();
        if($noofrows > 0) {
            $data['admin_status'] = 2; 
            $this->db->where('notification_id',$mail_id);
            $this->db->update('party_notification',$data);
        } else {
            $data['admin_status'] = 0; 
            $this->db->where('notification_id',$mail_id);
            $this->db->update('party_notification',$data);
        }
    }





















    //================================== ajax model ================================

    //vehicle type data inline editing
    public function updatevehicleTypeInline($model_data) {
        $columns = array(
            0 => 'vehicle_type_name', 
            1 => 'min_weight_capacity',
            2 => 'max_weight_capacity',
            3 => 'item_height',
            4 => 'item_width',
            5 => 'item_length',
            6 => 'base_fare',
            7 => 'working_region',
            8 => 'load_unload_overtime_charge',
            9 => 'landfills_charge',
            10 => 'construction_charge',
            11 => 'night_charge',
            12 => 'midnight_fee',
            13 => 'sunday_ph_charge',
            14 => 'owner_payable',
            15 => 'ong_charge',
            16 => 'load_unload_max_time',
            17 => 'parking_fee',
            18 => 'rent_per_km',
            19 => 'base_fare_limit'
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }
          
            $sql = "UPDATE vehicle_type SET ".$columns[$colIndex]." = '".$colVal."' WHERE vehicle_type_id='".$rowid."'";
            $this->db->query($sql);



            //for notification and mail
            $vehicle_type_info = $this->getVehicleTypeInfo($rowid);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);
            $this->addpartynNotification($this->login_party_id, "vehicletype", "Vehicle type " .$vehicle_type_info->vehicle_type_name." Updated in system by ".$login_party_name->first_name." ".$login_party_name->last_name);


            return true;
        }
        return false;
    }

    //vehicle data inline editing
    public function updatevehicleInline($model_data) {
        $columns = array(
            0 => 'driver_id', 
            1 => 'vehicle_type_id',
            2 => 'registration_no',
            3 => 'permit',
            4 => 'vehicle_status',
            5 => 'is_deleted',
            6 => 'driver_id',
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            if($colIndex == '4' OR $colIndex == '5') {
                $status = $this->checkVehicleOrder($rowid);
                if($status > 0)
                    return false;
            }

            if($colIndex == '6' && $colVal != '') {
                $this->db->select('*');
                $this->db->from('vehicle');
                $this->db->where('driver_id', $colVal);
                $number = $this->db->get()->num_rows();
                if($number > 0 )
                    return false;
            }

            $sql = "UPDATE vehicle SET ".$columns[$colIndex]." = '".$colVal."' WHERE no='".$rowid."'";
            $this->db->query($sql);


            //for notification and mail
            $vehicle_info = $this->getVehicleInfo($rowid);
            $vehicle_type_info = $this->getVehicleTypeInfo($vehicle_info->vehicle_type_id);
            $party_name = $this->getpartyNameInfoByParty($vehicle_info->party_id);
            $driver_name = $this->getpartyNameInfoByParty($vehicle_info->driver_id);

            $this->addPartyMail($this->login_party_id, $vehicle_info->driver_id, "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] updated", "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." info updated");

            $this->addPartyMail($this->login_party_id, $vehicle_info->party_id, "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] updated", "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." info updated");

            if($colIndex == '6' && $colVal != '') {
                $this->addpartynNotification($this->login_party_id, "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] assigned to Driver ".$driver_name->first_name." ".$driver_name->last_name);
            }

            $this->addpartynNotification($this->login_party_id, "Vehicle ".$vehicle_info->vehicle_no." of type [".$vehicle_type_info->vehicle_type_name."] of Owner ".$party_name->first_name." ".$party_name->last_name." info updated");



            return true;
        }
        return false;
    }

    //Driver data inline editing
    public function updateDriverInline($model_data) {
        $columns = array(
            4 => 'status_id',
            5 => 'is_deleted',
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            $status = $this->checkPartyOrder($rowid);
            if($status > 0)
                return false;

            if($colIndex == 5) {
                

                $sql1 = "UPDATE `user_login` SET `enabled` = '0' WHERE party_id = '$rowid'";
                $this->db->query($sql1);

                $sql1 = "UPDATE `vehicle` SET `driver_id` = 'NULL' WHERE driver_id = '$rowid'";
                $this->db->query($sql1);

                $sql2 = "UPDATE `party` SET `status_id` = 'Delete' WHERE party_id = '$rowid'";
                $this->db->query($sql2);

                //for notification and mail
                $party_name = $this->getpartyNameInfoByParty($rowid);
                $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

                $this->addpartynNotification($this->login_party_id, "delete", "Info of ".$party_name->party_type_id." ".$party_name->first_name." ".$party_name->last_name." deleted by ".$login_party_name->first_name." ".$login_party_name->last_name);


            } else {


                $sql = "UPDATE party SET ".$columns[$colIndex]." = '".$colVal."' WHERE party_id='".$rowid."'";
                $this->db->query($sql);

                //for notification and mail
                $driver_name = $this->getpartyNameInfoByParty($rowid);
                $party_name = $this->getpartyNameInfoByParty($driver_name->external_id);
                $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

                $this->addPartyMail($this->login_party_id, $rowid, "Your basic info updated successfully", "Basic info of ".$driver_name->party_type_id." ".$driver_name->first_name." ".$driver_name->last_name."updated successfully");
                if(!empty($driver_name->external_id)) {
                    $this->addPartyMail($this->login_party_id, $driver_name->external_id, "basic info of driver ".$driver_name->party_type_id." ".$driver_name->first_name." updated successfully", "Basic info of driver ".$driver_name->party_type_id." ".$driver_name->first_name." updated successfully by ".$login_party_name->first_name." ".$login_party_name->last_name);
                }
                $this->addpartynNotification($this->login_party_id, "party", "Basic info of ".$driver_name->party_type_id." ".$driver_name->first_name." ".$driver_name->last_name." updated successfully");
            }

            return true;
        }
        return false;
    }

    //order inline Update
    public function orderInlineUpdate($model_data) {
        $columns = array( 
            1 => 'contact_address',
            2 => 'contact_name',
            3 => 'contact_mobile',
            4 => 'stop_time', 
            5 => 'room', 
            6 => 'floor', 
            7 => 'building_block', 
            8 => 'driver_id', 
            9 => 'description', 
            10 => 'order_distance', 
            11 => 'discount_promocode_id', 
            12 => 'order_status_id',
            13 => 'business_id', 
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){




            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                if($colIndex == 4) {
                    $colVal =  preg_replace('/[^a-zA-Z0-9-_\.]/','', $model_data['val']);
                } else {
                    $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
                }
            }
            if(isset($model_data['id']) && $model_data['id'] > 0) {
              $rowid = $model_data['id'];
            }



            //for notification and mail
            if($colIndex < 8) {
                $order_location_data = $this->getorderInfoFormLocation($rowid);
                $order_data1 = array(
                    'order_id' => $order_location_data->order_id,
                );
            } else {
                $order_data1 = array(
                    'order_id' => $rowid,
                );
            }

            
            $order_data = $this->getorderInfoForInvoice($order_data1);
            $party_name = $this->getpartyNameInfoByParty($order_data->party_id);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);




            if($colIndex == 12) {

                $order_data1 = array(
                    'order_id' => $rowid,
                );
                $order_data = $this->getorderInfoForInvoice($order_data1);

                $sql1 = "INSERT INTO `order_invoice`(`order_id`,`order_date`,`order_email`,`order_price`,`order_duration`,`order_distance`,`party_id`,`item_type_id`,`vehicle_type_id`,`no`,`driver_id`,`discount_promocode_id`,`description`,`order_status_id`) VALUES('$order_data->order_id','$order_data->order_date','$order_data->order_by','$order_data->order_price','$order_data->order_duration','$order_data->order_distance','$order_data->party_id','$order_data->item_type_id','$order_data->vehicle_type_id','$order_data->no','$order_data->driver_id','$order_data->discount_promocode_id','$order_data->description','$order_data->order_status_id')";
                $this->db->query($sql1);

                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."' WHERE order_id='".$rowid."'";

            }
            else if($colIndex == 13 && $colVal == '') {
                $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." Business Owner removed");
                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."', no = '', driver_id = '', order_status_id = 'active' WHERE order_id='".$rowid."'";
            }
            else if( $colIndex == 13 ) {
                $business_name = $this->getpartyNameInfoByParty($colVal);
                $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." allocated Business Owner ".$business_name->first_name." ".$business_name->last_name);

                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."', order_status_id = 'confirm' WHERE order_id='".$rowid."'";

            }
            else if( $colIndex == 9 || $colIndex == 10 || $colIndex == 11 || $colIndex == 0 ) {
                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."' WHERE order_id='".$rowid."'";

            }
            else if($colIndex == 8 && $colVal == '') {
                $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." driver removed");
                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."', no = '', order_status_id = 'confirm' WHERE order_id='".$rowid."'";
            }
            else if($colIndex == 8) {
                $driver_name = $this->getpartyNameInfoByParty($colVal);
                $driver_data = array(
                    'party_id' => $colVal,
                );
                $vehicle_data = $this->getvehicleData($driver_data);
                $no = $vehicle_data->no;

                $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." allocated driver ".$driver_name->first_name." ".$driver_name->last_name." and vehicle ".$vehicle_data->vehicle_no);

                $sql = "UPDATE `order_move` SET ".$columns[$colIndex]." = '".$colVal."', no = '".$no."', order_status_id = 'matched' WHERE order_id='".$rowid."'";
            }
            else if($colIndex == 4) {
                $extraCharge = 0;
                $locationdata = $this->getorderLocationInfoByLocation($rowid);
                $load_unload_max_time = $locationdata->load_unload_max_time;
                if($colVal > $load_unload_max_time) {
                    $extraTime = $colVal-($locationdata->load_unload_max_time);                    
                    $extraCharge = $extraTime*($locationdata->load_unload_overtime_charge);                    
                }
                $sql = "UPDATE `order_location` SET ".$columns[$colIndex]." = '".$colVal."', stop_time_charge = '".$extraCharge."' WHERE order_location_id='".$rowid."'";
            }
            else {
                $sql = "UPDATE `order_delivery_contact` SET ".$columns[$colIndex]." = '".$colVal."' WHERE order_location_id='".$rowid."'";
            }
            $this->db->query($sql);


            $this->addPartyMail($this->login_party_id, $order_data->party_id, "Order #00".$order_data->order_id." info updated successfully", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." info updated successfully by" .$login_party_name->first_name." ".$login_party_name->last_name); 

            $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." updated successfully");


            return true;
        }
        return false;
    }


    //order service inline update
    public function orderServiceInlineUpdate($model_data) {
        $orderServices = $model_data['vals'];
        $order_id = $model_data['id'];
                     
        $this->db->where('order_id', $order_id);
        $this->db->delete('order_services_conn');

        if(isset($orderServices) and $orderServices != NULL) {
            foreach ($orderServices as $orderService) { 
                $sql = "INSERT INTO order_services_conn(`order_id`,`service_id`) 
                VALUES('$order_id','$orderService')";
                $this->db->query($sql);
            }
        }


        //for notification and mail
        $order_data = array(
            'order_id' => $order_id,
        );
        $order_data = $this->getorderInfoForInvoice($order_data);
        $party_name = $this->getpartyNameInfoByParty($order_data->party_id);
        $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);


        $this->addPartyMail($this->login_party_id, $order_data->party_id, "Order #00".$order_data->order_id." service info updated successfully", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." service info updated successfully by " .$login_party_name->first_name." ".$login_party_name->last_name);

        $this->addpartynNotification($this->login_party_id, "order", "order #00".$order_data->order_id." of customer ".$party_name->first_name." ".$party_name->last_name." service info updated successfully");


        return true;
    }

    //Order Additional service data inline editing
    public function updateOrderServiceInline($model_data) {
        $columns = array(
            1 => 'services_title',
            2 => 'price',
            3 => 'description',
            4 => 'parent_services_id', 
            5 => 'status', 
            6 => 'delete', 
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            $order_additional_servicesdata = $this->getorderadditionalservicesdata($rowid);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

            if($colIndex == '5' OR $colIndex == '6') {
                $status = $this->checkServiceOrder($rowid);
                if($status > 0)
                    return false;
            }

            if($colIndex == 6)
                $sql = "DELETE FROM order_additional_services WHERE service_id='".$rowid."'";
            else
                $sql = "UPDATE order_additional_services SET ".$columns[$colIndex]." = '".$colVal."' WHERE service_id='".$rowid."'";

            $this->db->query($sql);

            $this->addpartynNotification($this->login_party_id, "order", "Order additional service " .$order_additional_servicesdata->services_title." updated in system by ".$login_party_name->first_name." ".$login_party_name->last_name);

            return true;
        }
        return false;
    }

    //Discount Promocode inline editing
    public function updateDiscountPromocodeInline($model_data) {
        $columns = array(
            1 => 'promo_code',
            2 => 'for_all',
            3 => 'price', 
            4 => 'is_expired', 
            5 => 'Promocode_status', 
            6 => 'delete', 
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            $discount_promocode_data = $this->getDiscountPromocodeData($rowid);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

            if($colIndex == '5' OR $colIndex == '6') {
                $status = $this->checkDiscountOrder($rowid);
                if($status > 0)
                    return false;
            }

            if($colIndex == 6){

                $this->addpartynNotification($this->login_party_id, "order", "Order additional service " .$discount_promocode_data->promo_code." Deleted by ".$login_party_name->first_name." ".$login_party_name->last_name);
                $sql = "DELETE FROM discount_promocode WHERE discount_promocode_id='".$rowid."'";
            }
            else{

                $this->addpartynNotification($this->login_party_id, "order", "Order additional service " .$discount_promocode_data->promo_code." updated by ".$login_party_name->first_name." ".$login_party_name->last_name);
                $sql = "UPDATE discount_promocode SET ".$columns[$colIndex]." = '".$colVal."' WHERE discount_promocode_id='".$rowid."'";
            }

            $this->db->query($sql);


            return true;
        }
        return false;
    }

    //Wallet inline editing
    public function updateWalletInline($model_data) {
        $columns = array(
            1 => 'amount',
        );

        $colVal = '';
        $colIndex = $rowid = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            $sql = "UPDATE wallet SET ".$columns[$colIndex]." = '".$colVal."' WHERE party_id='".$rowid."'";

            $this->db->query($sql);



            //for notification and mail
            $party_name = $this->getpartyNameInfoByParty($rowid);
            $login_party_name = $this->getpartyNameInfoByParty($this->login_party_id);

            $this->addPartyMail($this->login_party_id, $rowid, "Wallet info of customer ".$party_name->first_name." ".$party_name->last_name." updated", "Wallet info of customer ".$party_name->first_name." ".$party_name->last_name." updated by ".$login_party_name->first_name." ".$login_party_name->last_name);

            $this->addpartynNotification($this->login_party_id, "wallet", "Wallet info of customer ".$party_name->first_name." ".$party_name->last_name." updated");



            return true;
        }
        return false;
    }


}
