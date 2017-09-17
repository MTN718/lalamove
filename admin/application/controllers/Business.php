<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 */
class Business extends Main_Controller
{
    public $userInfo = null;
    public $login_party_id = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('businessmodel');
        $this->userInfo = $this->session->login_data;
        $this->login_party_id = $this->userInfo->party_id;
        $this->checkAuthrntication();
    }

    // check for authrnticate user
    public function checkAuthrntication() 
    {
        if($this->userInfo->party_type_id != "business")
            redirect($this->userInfo->party_type_id);
    }

    // Dashboard page
    public function index()
    {

        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Dashboard';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'pageName' => 'DASHBOARD',
        );
        $this->render('business/dashboard');
    }

    // Account Page
    public function account($active = "time")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Account';
        $this->mViewData['data'] = array(
            'partyid' => $this->userInfo->party_id,
            'partyUserNameInfo' => $this->adminmodel->getpartyUserNameInfo($model_data),
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyEmailInfo' => $this->adminmodel->getpartyContactInfo($model_data, 'email'),
            'partyAddressInfo' => $this->adminmodel->getpartyContactInfo($model_data, 'address'),
            'partyTelecomInfo' => $this->adminmodel->getpartyContactInfo($model_data, 'telecom'),
            'timeLineInfo' => $this->adminmodel->getTimelineInfo($model_data),
            'noOfVehicle' => 0,
            'noOfDriver' => 0,
            'active' => $active,
            'pageName' => 'ACCOUNT',
        );-
        $this->render('business/account');
    }

    // Notification Page
    public function notifications()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'notificationInfo' => $this->adminmodel->getNotificationList($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('business/notifications');
    }

    // Sent Notification Page
    public function sentNotifications()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Sent Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'sentNotificationInfo' => $this->adminmodel->getSentNotificationList($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('business/sentnotifications');
    }

    // TrashNotification Page
    public function trashNotifications()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Trash Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'trashNotificationInfo' => $this->adminmodel->getTrashNotificationList($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('business/trashnotifications');
    }

    // order Page
    public function orders()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'orders';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'orderList' => $this->adminmodel->getorderListOfBusinessLister($model_data),
            'pageName' => 'ORDERS',
        );

        $this->render('business/orders');
    }

    // vehicle Page
    public function vehicles($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'vehiclesList' => $this->adminmodel->getvehicleList("",$model_data),
            'partyDriverList' => $this->adminmodel->getpartyList('driver',$model_data),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'status' => $status,
            'pageName' => 'VEHICLES',
        );

        $this->render('business/vehicles');
    }

    // Driver Business List Page
    public function drivers()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Drivers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyDriverList' => $this->adminmodel->getpartyList('driver',$model_data),
            'pageName' => 'DRIVERS',
        );

        $this->render('business/drivers');
    }

    // Driver Business List Page
    public function bidding()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Bidding Panel';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'biddingOrderList' => $this->businessmodel->getBiddingOrderList(),
            'pageName' => 'BIDDINGPANEL',
        );

        $this->render('business/bidding_panel');
    }























    // =================================== overview Controller ================================================

    // Driver Overview
    public function driverOverview($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $driver_data = array(
            'party_id' => $this->input->get('party_id'),
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyUserNameInfo' => $this->adminmodel->getpartyUserNameInfo($driver_data),
            'partyNameInfo' => $this->adminmodel->getpartyNameInfo($driver_data),
            'partyEmailInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'email'),
            'partyAddressInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'address'),
            'partyTelecomInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'telecom'),
            'vehiclesList' => $this->adminmodel->getvehicleList($driver_data),
            'orderList' => $this->adminmodel->getorderList("",$driver_data),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'status' => $status,
            'pageName' => 'DRIVERS',
        );

        $this->render('business/driverOverview');
    }

    // Driver Overview
    public function partyBasicInfoEdit($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $party_data = array(
            'party_id' => $this->input->get('party_id'),
        );
        $party_NAME = $this->adminmodel->getpartyNameInfo($party_data);
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyUserNameInfo' => $this->adminmodel->getpartyUserNameInfo($party_data),
            'partyNameInfo' => $party_NAME,
            'partyEmailInfo' => $this->adminmodel->getpartyContactInfo($party_data, 'email'),
            'partyAddressInfo' => $this->adminmodel->getpartyContactInfo($party_data, 'address'),
            'partyTelecomInfo' => $this->adminmodel->getpartyContactInfo($party_data, 'telecom'),
            'partyBusinessList' => $this->adminmodel->getpartyList('business'),
            'status' => $status,
            'partyTypeInfo' => $party_NAME->party_type_id,
            'pageName' => $party_NAME->party_type_id."S",
        );

        $this->render('business/partyBasicInfoEdit');
    }

    // order Overview
    public function orderInfoEdit()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $order_data = array(
            'order_id' => $this->input->get('order_id'),
        );        
        $customer_data = array(
            'party_id' => $this->adminmodel->getCustomeridByorder($order_data),
        );       
        $driver_data = array(
            'party_id' => $this->adminmodel->getDriveridByorder($order_data),
        );     
        $business_data = array(
            'party_id' => $this->userInfo->party_id,
            'order_id' => $this->input->get('order_id'),
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'customerNameInfo' => $this->adminmodel->getpartyNameInfo($customer_data),
            'customerEmailInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'email'),
            'customerAddressInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'address'),
            'customerTelecomInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'telecom'),
            'driverNameInfo' => $this->adminmodel->getpartyNameInfo($driver_data),
            'driverEmailInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'email'),
            'driverAddressInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'address'),
            'driverTelecomInfo' => $this->adminmodel->getpartyContactInfo($driver_data, 'telecom'),
            'orderInfo' => $this->adminmodel->getorderInfo($order_data),
            'orderLocationInfo' => $this->adminmodel->getorderLocationInfo($order_data),



            'availablepartyDriverList' => $this->adminmodel->getAvailableDriverList($business_data),




            'vehicleData' => $this->adminmodel->getvehicleData($driver_data),
            'discountPromoCode' => $this->adminmodel->getDiscountPromoCode($customer_data),
            'selectedDiscountPromoCode' => $this->adminmodel->getSelectedDiscountPromoCode($order_data),
            'selectedServiceList' => $this->adminmodel->getselectedServiceList($order_data), 
            'orderServiceList' => $this->adminmodel->getorderServiceList(),
            'pageName' => "orders",
        );
            $this->render('business/orderInfoEdit');
    }

    // mail overview
    public function readMail()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $mail_data = array(
            'mail_id' => $this->input->get('mail_id'),
        );
        $this->mPagetitle = 'Mail Overview';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'notificationInfo' => $this->adminmodel->getNotificationInfo($mail_data),
            'pageName' => 'NOTIFICATIONS',
        );
        $this->render('business/notification_overview');
    }

    // mail compose
    public function composeMail()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $mail_data = array(
            'mail_id' => $this->input->get('mail_id'),
        );
        $this->mPagetitle = 'Mail Overview';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'notificationInfo' => $this->adminmodel->getNotificationInfo($mail_data),
            'partyList' => $this->adminmodel->getpartyList(),
            'pageName' => 'NOTIFICATIONS',
        );
        $this->render('business/composeMail');
    }
































    // ==================================== Add Controller Request ==============================================

    // Add party Driver
    public function addpartyDriver($status="",$id="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyBusinessList' => $this->adminmodel->getpartyList('business'),
            'status' => $status,
            'owner_id' => $id,
            'partyTypeInfo' => 'driver',
            'pageName' => 'DRIVERS',
        );

        $this->render('business/partyBasicInfoEdit');
    }

    // Add Basic Info of User
    public function addUserInfo($task="")
    {
        $party_id = $this->input->post('party_id');
        $party_type_id = $this->input->post('party_type_id');
        $external_id = $this->input->post('external_id');

        $model_data = array(

            //For All party Type
            'party_id' => $party_id,
            'email_mech_id' => $this->input->post('email_mech_id'),
            'telecom_mech_id' => $this->input->post('telecom_mech_id'),
            'postal_mech_id' => $this->input->post('postal_mech_id'),
            'user_login_id' => $this->input->post('user_login_id'),
            'current_password' => $this->input->post('PASSWORD'),
            'salutation' => $this->input->post('salutation'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'gender' => $this->input->post('gender'),
            'birth_date' => $this->input->post('birth_date'),
            'occupation' => $this->input->post('occupation'),
            'info_string' => $this->input->post('info_string'),
            'area_code' => $this->input->post('area_code'),
            'contact_number' => $this->input->post('contact_number'),
            'mobile_number' => $this->input->post('mobile_number'),
            'alt_mobile_number' => $this->input->post('alt_mobile_number'),
            'to_name' => $this->input->post('to_name'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'postal_code' => $this->input->post('postal_code'),

            //For Driver Type
            'external_id' => $this->input->post('external_id'),
            'license_number' => $this->input->post('license_number'),
            'criminal_case_status' => $this->input->post('criminal_case_status'),
            'criminal_case_clearance_no' => $this->input->post('criminal_case_clearance_no'),
        );

        $this->updatepartyPicture();

        if (empty($model_data['party_id'])) {
            $status = $this->adminmodel->checkUserNameInfo($model_data);
            if($status > 0) { 
                $this->session->set_flashdata('error_msg', 'User Name is Already Present...');
                if ($party_type_id == "customer") {
                    redirect('business/addpartyCustomer/'.$status);
                } else if ($party_type_id == "driver") {
                    redirect('business/addpartyDriver/'.$status);
                } else {
                    redirect('business/addpartyBusiness/'.$status);
                }
            }
            $model_data['party_id'] = $this->adminmodel->addpartyid($party_type_id,$external_id);
            $party_id = $model_data['party_id'];
        }

        $this->adminmodel->updateUserNameInfo($model_data);
        $this->adminmodel->updateUserpartyInfo($model_data);
        $this->adminmodel->updateUserBasicInfo($model_data);

        if (empty($model_data['email_mech_id'])) {
            $model_data['email_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'email_address');
            $this->adminmodel->updateUserEmailInfo($model_data);
        } else
            $this->adminmodel->updateUserEmailInfo($model_data);

        if (empty($model_data['telecom_mech_id'])) {
            $model_data['telecom_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'telecom_number');
            $this->adminmodel->updateUserContactInfo($model_data);
        } else
            $this->adminmodel->updateUserContactInfo($model_data);

        if (empty($model_data['postal_mech_id'])) {
            $model_data['postal_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'postal_address');
            $this->adminmodel->updateUserAddressInfo($model_data);
        } else
            $this->adminmodel->updateUserAddressInfo($model_data);




        $this->adminmodel->addPartyMail($this->login_party_id, $model_data['party_id'], "Welcome, Your registration info added successfully", "Welcome, <br>Your registration info added successfully for ".$party_type_id);

        if(!empty($external_id)) {
            $this->adminmodel->addPartyMail($this->login_party_id, $external_id, "basic info of driver ".$model_data['first_name']." ".$model_data['last_name']."updated successfully", "Basic info of driver ".$model_data['first_name']." ".$model_data['last_name']." updated successfully");
        }

        $this->adminmodel->addpartynNotification($this->login_party_id, "party", "New ".$party_type_id." info with name ".$model_data['first_name']." ".$model_data['last_name']."added successfully");


      


        if($task == "business" AND !empty($task)) {
            $this->session->set_flashdata('success_msg', 'New Driver Added Successfully...');
            redirect('business/businessOverview?party_id='.$external_id);
        }
        if ($party_type_id == "customer") {
            $this->session->set_flashdata('success_msg', 'New Customer Added Successfully...');
            redirect('business/customers');
        } else if ($party_type_id == "driver") {
            $this->session->set_flashdata('success_msg', 'New Driver Added Successfully...');
            redirect('business/drivers');
        } else if ($party_type_id == "business") {
            $this->session->set_flashdata('success_msg', 'New Business Lister Added Successfully...');
            redirect('business/businesslisters');
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('business/account');
        }
    }

    // add vehicle type
    public function addvehicleInfo($task="") {
        $model_data = array(
           'vehicle_no' => $this->input->post('vehicle_no'),
           'party_id' => $this->input->post('party_id'),
           'driver_id' => $this->input->post('driver_id'),
           'vehicle_type_id' => $this->input->post('vehicle_type_id'),
           'permit' => $this->input->post('permit'),
           'registration_no' => $this->input->post('registration_no')
        );

        $status = $this->adminmodel->addvehicleInfo($model_data);
        if($status) {           
            $this->session->set_flashdata('success_msg', ' vehicle Info Added Successfully');
        }
        else
            $this->session->set_flashdata('error_msg', ' vehicle Info Already Exist');

        if($task == "business") {
            redirect('business/businessOverview?party_id='.$model_data['party_id']);
        } else {
            redirect('business/vehicles');
        }
    }     

    // function for send mail
    public function sendMail($active = "")
    {
        $model_data = array(
            'login_party_id' => $this->login_party_id,
            'to' => $this->input->post('to'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
        );
        $data['status'] = $this->adminmodel->sendMail($model_data);
        if ($data['status']) {
            $this->session->set_flashdata('success_msg', 'Mail Sent Successfully...');
        }
        redirect('business/sentnotifications', 'refresh');
    }




























    // ============================== Update Controller Request ==================================


    // Update Basic Info of User
    public function updateUserInfo()
    {
        $party_id = $this->input->post('party_id');
        $party_type_id = $this->input->post('party_type_id');
        $owner_case_status = $this->input->post('owner_case_status');
        if($owner_case_status == "No")
            $external_id = $this->input->post('external_id');
        else
            $external_id = "";
        $model_data = array(
            'party_id' => $party_id,
            'email_mech_id' => $this->input->post('email_mech_id'),
            'telecom_mech_id' => $this->input->post('telecom_mech_id'),
            'postal_mech_id' => $this->input->post('postal_mech_id'),
            'user_login_id' => $this->input->post('user_login_id'),
            'current_password' => $this->input->post('PASSWORD'),
            'salutation' => $this->input->post('salutation'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'gender' => $this->input->post('gender'),
            'birth_date' => $this->input->post('birth_date'),
            'occupation' => $this->input->post('occupation'),
            'info_string' => $this->input->post('info_string'),
            'area_code' => $this->input->post('area_code'),
            'contact_number' => $this->input->post('contact_number'),
            'mobile_number' => $this->input->post('mobile_number'),
            'alt_mobile_number' => $this->input->post('alt_mobile_number'),
            'to_name' => $this->input->post('to_name'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'postal_code' => $this->input->post('postal_code'),

            //For Driver Type
            'external_id' => $this->input->post('external_id'),
            'license_number' => $this->input->post('license_number'),
            'criminal_case_status' => $this->input->post('criminal_case_status'),
            'criminal_case_clearance_no' => $this->input->post('criminal_case_clearance_no'),
        );

        $this->updatepartyPicture();
        $this->adminmodel->updateUserpartyInfo($model_data);
        $this->adminmodel->updateUserNameInfo($model_data);
        $this->adminmodel->updateUserBasicInfo($model_data);

        if (empty($model_data['email_mech_id'])) {
            $model_data['email_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'email_address');
            $this->adminmodel->updateUserEmailInfo($model_data);
        } else
            $this->adminmodel->updateUserEmailInfo($model_data);

        if (empty($model_data['telecom_mech_id'])) {
            $model_data['telecom_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'telecom_number');
            $this->adminmodel->updateUserContactInfo($model_data);
        } else
            $this->adminmodel->updateUserContactInfo($model_data);

        if (empty($model_data['postal_mech_id'])) {
            $model_data['postal_mech_id'] = $this->adminmodel->addpartyContactMechid($party_id, 'postal_address');
            $this->adminmodel->updateUserAddressInfo($model_data);
        } else
            $this->adminmodel->updateUserAddressInfo($model_data);






        $this->adminmodel->addPartyMail($this->login_party_id, $model_data['party_id'], "Your basic info updated successfully", "Basic info of ".$party_type_id." ".$model_data['first_name']." ".$model_data['last_name']." updated successfully");
        if($owner_case_status == "No") {
            $this->adminmodel->addPartyMail($this->login_party_id, $external_id, "basic info of driver ".$model_data['first_name']." ".$model_data['last_name']."updated successfully", "Basic info of driver ".$model_data['first_name']." ".$model_data['last_name']." updated successfully");
        }
        $this->adminmodel->addpartynNotification($this->login_party_id, "party", "Basic info of ".$party_type_id." ".$model_data['first_name']." ".$model_data['last_name']." updated successfully");







        if ($party_type_id == "customer") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('business/customerOverview?party_id=' . $party_id);
        } else if ($party_type_id == "driver") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('business/driverOverview?party_id=' . $party_id);
        } else if ($party_type_id == "business") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('business/businessOverview?party_id=' . $party_id);
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('business/account/setting');
        }
    }


    // Update User Password
    public function updateUserPasswordInfo()
    {
        $party_id = $this->input->post('party_id');
        $model_data = array(
            'party_id' => $party_id,
            'new_password' => $this->input->post('new_password'),
            'con_new_password' => $this->input->post('con_new_password'),
        );
        if ($model_data['new_password'] == $model_data['con_new_password']) {
            $this->adminmodel->updateUserPasswordInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Password Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Pasword Not Match...');
        }
        redirect('business/account/password');
    }


    // Update User Profile Picture
    public function updateUserPictureInfo()
    {

        $status = $this->updatepartyPicture();

        if ($status == true) {
            $this->session->set_flashdata('success_msg', 'Profile Picture Change Successfully...');
        } else {
            $this->session->set_flashdata('warning_msg', 'Error changing profile picture');
        }
        redirect('business/account/profilepicture');
    }


    // Update Party Profile Picture
    public function updatepartyPicture()
    {
        $party_id = $this->input->post('party_id');

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
                'party_id' => $party_id,
                'PROFILE_IMG' => $data1['upload_data']['file_name'], z
            );
            $this->adminmodel->updateUserPictureInfo($model_data);
            return true;
        }
        return false;
    }





























    //================================== Delete Controller Request =======================================

    // Driver Business List
    public function partyDelete()
    {
        $model_data = array(
            'party_id' => $this->input->get('party_id'),
        );

        $party_type_id = $this->adminmodel->getpartyNameInfo($model_data)->party_type_id;
        $status = $this->adminmodel->partyDelete($model_data);

        if ($party_type_id == "customer") {
            if($status == true)
                $this->session->set_flashdata('success_msg', 'Customer Deleted Successfully...');
            else
                $this->session->set_flashdata('error_msg', 'Customer have incomplete order, Can not delete...');

            redirect('business/customers');
        } else if ($party_type_id == "driver") {
            if($status == true)
                $this->session->set_flashdata('success_msg', 'Driver Deleted Successfully...');
            else
                $this->session->set_flashdata('error_msg', 'Driver have incomplete order, Can not delete...');

            redirect('business/drivers');
        } else if ($party_type_id == "business") {
            if($status == true)
                $this->session->set_flashdata('success_msg', 'Business Deleted Successfully...');
            else
                $this->session->set_flashdata('error_msg', 'Business have incomplete order, Can not delete...');

            redirect('business/businesslisters');
        }



    }

    // move to trash notification mail
    public function deleteMail($task="")
    {   
        $model_data = array(
            'mails' =>  $this->input->post('mail[]'),
        );
        if(!empty($task))
            $this->adminmodel->perDeleteMail($model_data);
        else
            $this->adminmodel->deleteMail($model_data);
        redirect('business/trashNotifications', 'refresh');
    }

    // Delete notification mail
    public function deleteReadMail()
    {
        $model_data = array(
            'mail_id' => $this->input->get('mail_id'),
        );
        $this->adminmodel->deletereadmail($model_data);
        redirect('business/trashNotifications', 'refresh');
    }















    //=========================================== Ajax Request =====================================

    // order location Inline Update
    public function orderInlineUpdate()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
            );

        $status = $this->adminmodel->orderInlineUpdate($model_data);
        if ($status == true) {
            $msg = array('msg' => 'Success! updation');
        }
        echo json_encode($msg);
    }

    // order service Inline Update
    public function orderServiceInlineUpdate()
    {
        $model_data = array(
            'vals' => $_POST['vals'],
            'id' => $_POST['id'],
            );

        $status = $this->adminmodel->orderServiceInlineUpdate($model_data);
        if ($status == true) {
            $msg = array('msg' => 'Success! updation');
        }
        echo json_encode($msg);
    }

    // order total Inline Update
    public function orderTotalUpdate()
    {
        $order_id = $_POST["order_id"];
        $total = $_POST["total"];

        if(isset($total) && !empty($total)) {
            $total =  preg_replace('/[^a-zA-Z0-9-_\.]/','', $total);
        }

        $sql = "UPDATE `order_move` SET `order_price` = '$total' WHERE order_id = '$order_id'";
        $this->db->query($sql);
        echo json_encode($total);
    }

    // vehicle type inline updation
    public function updateInline($task="")
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        if($task == "vehicle")
            $status = $this->adminmodel->updatevehicleInline($model_data);
        if($task == "drivers")
            $status = $this->adminmodel->updateDriverInline($model_data);

        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }

    // order bidding Update
    public function orderBiddingUpdate()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
            'party_id' => $_POST['party_id'],
            );

        $status = $this->businessmodel->orderBiddingUpdate($model_data);
        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }











}