<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 */
class Home extends Main_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel');
    }

    // Dashboard page
    public function index()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Dashboard';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'pageName' => 'DASHBOARD',
        );
        $this->render('dashboard');
    }

    // Account Page
    public function account($active = "setting")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Account';
        $this->mViewData['data'] = array(
            'partyId' => $userInfo->PARTY_ID,
            'partyUserNameInfo' => $this->homemodel->getPartyUserNameInfo($model_data),
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyEmailInfo' => $this->homemodel->getPartyContactInfo($model_data, 'EMAIL'),
            'partyAddressInfo' => $this->homemodel->getPartyContactInfo($model_data, 'ADDRESS'),
            'partyTelecomInfo' => $this->homemodel->getPartyContactInfo($model_data, 'TELECOM'),
            'noOfCustomer' => 0,
            'noOfDriver' => 0,
            'noOfBusinessLister' => 0,
            'active' => $active,
            'pageName' => 'ACCOUNT',
        );
        $this->render('account');
    }

    // Notification Page
    public function notifications()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'notificationCount' => 0,
            'sentNotificationCount' => 0,
            'trashNotificationCount' => 0,
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('notifications');
    }

    // Sent Notification Page
    public function sentNotifications()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Sent Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'notificationCount' => 0,
            'sentNotificationCount' => 0,
            'trashNotificationCount' => 0,
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('sentnotifications');
    }

    // TrashNotification Page
    public function trashNotifications()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Trash Notification';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'notificationCount' => 0,
            'sentNotificationCount' => 0,
            'trashNotificationCount' => 0,
            'pageName' => 'NOTIFICATIONS',
        );

        $this->render('trashnotifications');
    }

    // Invoice Page
    public function invoices()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Invoices';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'pageName' => 'INVOICES',
        );

        $this->render('invoices');
    }

    // Payment Page
    public function payments()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Payments';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'pageName' => 'PAYMENTS',
        );

        $this->render('payments');
    }

    // Order Page
    public function orders()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Orders';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'pageName' => 'ORDERS',
        );

        $this->render('orders');
    }

    // Vehicle Page
    public function vehicle()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'vehiclesList' => $this->homemodel->getVehicleList(),
            'vehicleTypeList' => $this->homemodel->getVehicleTypeList(),
            'partyDriverList' => $this->homemodel->getPartyList('DRIVER'),
            'pageName' => 'VEHICLES',
        );

        $this->render('vehicles');
    }

    // Vehicle Type Page
    public function vehicleType()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'vehicleTypeList' => $this->homemodel->getVehicleTypeList(),
            'pageName' => 'VEHICLESTYPE',
        );

        $this->render('vehicleType');
    }

    // Customer Business List Page
    public function customers()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyCustomerList' => $this->homemodel->getPartyList('CUSTOMER'),
            'pageName' => 'CUSTOMERS',
        );

        $this->render('customers');
    }

    // Driver Business List Page
    public function drivers()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Drivers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyDriverList' => $this->homemodel->getPartyList('DRIVER'),
            'pageName' => 'DRIVERS',
        );

        $this->render('drivers');
    }

    // Business Lister list Page
    public function businesslisters()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyBusinessList' => $this->homemodel->getPartyList('BUSINESS'),
            'pageName' => 'BUSINESSLISTERS',
        );

        $this->render('businesslister');
    }

    // Web Setting Page
    public function settings($active = "about_us")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'webAboutUs' => $this->homemodel->getAboutUs(),
            'webTermCondtion' => $this->homemodel->getTermCondition(),
            'webPrivacyPolicy' => $this->homemodel->getPrivacyPolicy(),
            'webFaqs' => $this->homemodel->getFaqsList(),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('settings');
    }

    // Discount Page
    public function discounts()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'pageName' => 'DISCOUNTS',
        );
        $this->render('discounts');
    }






























    // =================================== overview Controller ================================================

    // Customer Overview
    public function customerOverview()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $customer_data = array(
            'PARTY_ID' => $this->input->get('PARTY_ID'),
        );
        $this->mPageTitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyUserNameInfo' => $this->homemodel->getPartyUserNameInfo($customer_data),
            'partyNameInfo' => $this->homemodel->getPartyNameInfo($customer_data),
            'partyEmailInfo' => $this->homemodel->getPartyContactInfo($customer_data, 'EMAIL'),
            'partyAddressInfo' => $this->homemodel->getPartyContactInfo($customer_data, 'ADDRESS'),
            'partyTelecomInfo' => $this->homemodel->getPartyContactInfo($customer_data, 'TELECOM'),
            'pageName' => 'CUSTOMERS',
        );

        $this->render('customerOverview');
    }

    // Driver Overview
    public function driverOverview()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $driver_data = array(
            'PARTY_ID' => $this->input->get('PARTY_ID'),
        );
        $this->mPageTitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyUserNameInfo' => $this->homemodel->getPartyUserNameInfo($driver_data),
            'partyNameInfo' => $this->homemodel->getPartyNameInfo($driver_data),
            'partyEmailInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'EMAIL'),
            'partyAddressInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'ADDRESS'),
            'partyTelecomInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'TELECOM'),
            'pageName' => 'DRIVERS',
        );

        $this->render('driverOverview');
    }

    // Business Lister Overview
    public function businessOverview()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $business_data = array(
            'PARTY_ID' => $this->input->get('PARTY_ID'),
        );
        $this->mPageTitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyUserNameInfo' => $this->homemodel->getPartyUserNameInfo($business_data),
            'partyNameInfo' => $this->homemodel->getPartyNameInfo($business_data),
            'partyEmailInfo' => $this->homemodel->getPartyContactInfo($business_data, 'EMAIL'),
            'partyAddressInfo' => $this->homemodel->getPartyContactInfo($business_data, 'ADDRESS'),
            'partyTelecomInfo' => $this->homemodel->getPartyContactInfo($business_data, 'TELECOM'),
            'pageName' => 'BUSINESSLISTER',
        );

        $this->render('businesslisterOverview');
    }

    // Driver Overview
    public function partyBasicInfoEdit()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $driver_data = array(
            'PARTY_ID' => $this->input->get('PARTY_ID'),
        );
        $this->mPageTitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyUserNameInfo' => $this->homemodel->getPartyUserNameInfo($driver_data),
            'partyNameInfo' => $this->homemodel->getPartyNameInfo($driver_data),
            'partyEmailInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'EMAIL'),
            'partyAddressInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'ADDRESS'),
            'partyTelecomInfo' => $this->homemodel->getPartyContactInfo($driver_data, 'TELECOM'),
            'pageName' => 'DRIVERS',
        );

        $this->render('partyBasicInfoEdit');
    }

    // Faq Edit page
    public function webFaqsEdit($active = "faqs_update")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $faq_data = array(
            'FAQ_ID' => $this->input->get('FAQ_ID'),
        );
        $this->mPageTitle = 'Faqs';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'webAboutUs' => $this->homemodel->getAboutUs(),
            'webTermCondtion' => $this->homemodel->getTermCondition(),
            'webPrivacyPolicy' => $this->homemodel->getPrivacyPolicy(),
            'webFaqs' => $this->homemodel->getFaqsList(),
            'webFaqsedit' => $this->homemodel->getFaqEditInfo($faq_data),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('settings');
    }

    // Faq Edit page
    public function faqs_status($task = "")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $faq_data = array(
            'FAQ_ID' => $this->input->get('FAQ_ID'),
        );
        if ($task == "Enable")
            $this->homemodel->updateFaqStatus($faq_data, "Enable");
        else if ($task == "Disable")
            $this->homemodel->updateFaqStatus($faq_data, "Disable");
        else if ($task == "Delete")
            $this->homemodel->faqDelete($faq_data);

        $this->mPageTitle = 'Faqs';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'webAboutUs' => $this->homemodel->getAboutUs(),
            'webTermCondtion' => $this->homemodel->getTermCondition(),
            'webPrivacyPolicy' => $this->homemodel->getPrivacyPolicy(),
            'webFaqs' => $this->homemodel->getFaqsList(),
            'active' => 'faqs',
            'pageName' => 'SETTINGS',
        );

        $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        $this->render('settings');
    }



































    // ==================================== Add Controller Request ==============================================

    // Add Party Customer
    public function addPartyCustomer()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyTypeInfo' => 'CUSTOMER',
            'pageName' => 'CUSTOMERS',
        );

        $this->render('partyBasicInfoEdit');
    }

    // Add Party Driver
    public function addPartyDriver()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyTypeInfo' => 'DRIVER',
            'pageName' => 'DRIVERS',
        );

        $this->render('partyBasicInfoEdit');
    }

    // Add Party Business Lister
    public function addPartyBusiness()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'PARTY_ID' => $userInfo->PARTY_ID,
        );
        $this->mPageTitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->homemodel->getPartyNameInfo($model_data),
            'partyTypeInfo' => 'BUSINESS',
            'pageName' => 'BUSINESSLISTER',
        );

        $this->render('partyBasicInfoEdit');
    }

    // Update Basic Info of User
    public function addUserInfo()
    {
        $PARTY_ID = $this->input->post('PARTY_ID');
        $PARTY_TYPE_ID = $this->input->post('PARTY_TYPE_ID');
        $model_data = array(
            'PARTY_ID' => $PARTY_ID,
            'EMAIL_MECH_ID' => $this->input->post('EMAIL_MECH_ID'),
            'TELECOM_MECH_ID' => $this->input->post('TELECOM_MECH_ID'),
            'POSTAL_MECH_ID' => $this->input->post('POSTAL_MECH_ID'),
            'USER_LOGIN_ID' => $this->input->post('USER_LOGIN_ID'),
            'CURRENT_PASSWORD' => $this->input->post('PASSWORD'),
            'SALUTATION' => $this->input->post('SALUTATION'),
            'FIRST_NAME' => $this->input->post('FIRST_NAME'),
            'LAST_NAME' => $this->input->post('LAST_NAME'),
            'GENDER' => $this->input->post('GENDER'),
            'BIRTH_DATE' => $this->input->post('BIRTH_DATE'),
            'OCCUPATION' => $this->input->post('OCCUPATION'),
            'INFO_STRING' => $this->input->post('INFO_STRING'),
            'AREA_CODE' => $this->input->post('AREA_CODE'),
            'CONTACT_NUMBER' => $this->input->post('CONTACT_NUMBER'),
            'MOBILE_NUMBER' => $this->input->post('MOBILE_NUMBER'),
            'ALT_MOBILE_NUMBER' => $this->input->post('ALT_MOBILE_NUMBER'),
            'TO_NAME' => $this->input->post('TO_NAME'),
            'ADDRESS1' => $this->input->post('ADDRESS1'),
            'ADDRESS2' => $this->input->post('ADDRESS2'),
            'CITY' => $this->input->post('CITY'),
            'STATE' => $this->input->post('STATE'),
            'POSTAL_CODE' => $this->input->post('POSTAL_CODE'),
        );

        $this->updatePartyPicture();

        if (empty($model_data['PARTY_ID'])) {
            $model_data['PARTY_ID'] = $this->homemodel->addPartyId($PARTY_TYPE_ID);
            $PARTY_ID = $model_data['PARTY_ID'];
        }

        $this->homemodel->updateUserNameInfo($model_data);
        $this->homemodel->updateUserBasicInfo($model_data);

        if (empty($model_data['EMAIL_MECH_ID'])) {
            $model_data['EMAIL_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
            $this->homemodel->updateUserEmailInfo($model_data);
        } else
            $this->homemodel->updateUserEmailInfo($model_data);

        if (empty($model_data['TELECOM_MECH_ID'])) {
            $model_data['TELECOM_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
            $this->homemodel->updateUserContactInfo($model_data);
        } else
            $this->homemodel->updateUserContactInfo($model_data);

        if (empty($model_data['POSTAL_MECH_ID'])) {
            $model_data['POSTAL_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
            $this->homemodel->updateUserAddressInfo($model_data);
        } else
            $this->homemodel->updateUserAddressInfo($model_data);

        if ($PARTY_TYPE_ID == "CUSTOMER") {
            $this->session->set_flashdata('success_msg', 'New Customer Added Successfully...');
            redirect('home/customers');
        } else if ($PARTY_TYPE_ID == "DRIVER") {
            $this->session->set_flashdata('success_msg', 'New Driver Added Successfully...');
            redirect('home/drivers');
        } else if ($PARTY_TYPE_ID == "BUSINESS") {
            $this->session->set_flashdata('success_msg', 'New Business Lister Added Successfully...');
            redirect('home/business');
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('home/account');
        }
    }


    // add vehicle type
    public function addVehicleInfo() {
        $model_data = array(
           'VEHICLE_ID' => $this->input->post('VEHICLE_ID'),
           'PARTY_ID' => $this->input->post('PARTY_ID'),
           'VEHICLE_TYPE_ID' => $this->input->post('VEHICLE_TYPE_ID'),
           'PERMIT' => $this->input->post('PERMIT'),
           'REGISTRATION_NO' => $this->input->post('REGISTRATION_NO')
        );

        $status = $this->homemodel->addVehicleInfo($model_data);

        print_r($status);
        exit();
        //if($status)
            
        //redirect('home/vehicle');
    }


    // add vehicle type
    public function addVehicleTypeInfo() {
        $model_data = array(
           'VEHICLE_TYPE_NAME' => $this->input->post('VEHICLE_TYPE_NAME'),
           'VEHICLE_WEIGHT_CAPACITY' => $this->input->post('VEHICLE_WEIGHT_CAPACITY'),
           'ITEM_HEIGHT' => $this->input->post('ITEM_HEIGHT'),
           'ITEM_WIDTH' => $this->input->post('ITEM_WIDTH'),
           'ITEM_LENGTH' => $this->input->post('ITEM_LENGTH'),
           'BASE_FARE' => $this->input->post('BASE_FARE'),
        );

        $status = $this->homemodel->addVehicleTypeI($model_data);
        if($status) {
            redirect('home/vehicleType');
        }
    }



























    // ============================== Update Controller Request ==================================


    // Update Basic Info of User
    public function updateUserInfo()
    {
        $PARTY_ID = $this->input->post('PARTY_ID');
        $PARTY_TYPE_ID = $this->input->post('PARTY_TYPE_ID');
        $model_data = array(
            'PARTY_ID' => $PARTY_ID,
            'EMAIL_MECH_ID' => $this->input->post('EMAIL_MECH_ID'),
            'TELECOM_MECH_ID' => $this->input->post('TELECOM_MECH_ID'),
            'POSTAL_MECH_ID' => $this->input->post('POSTAL_MECH_ID'),
            'USER_LOGIN_ID' => $this->input->post('USER_LOGIN_ID'),
            'CURRENT_PASSWORD' => $this->input->post('PASSWORD'),
            'SALUTATION' => $this->input->post('SALUTATION'),
            'FIRST_NAME' => $this->input->post('FIRST_NAME'),
            'LAST_NAME' => $this->input->post('LAST_NAME'),
            'GENDER' => $this->input->post('GENDER'),
            'BIRTH_DATE' => $this->input->post('BIRTH_DATE'),
            'OCCUPATION' => $this->input->post('OCCUPATION'),
            'INFO_STRING' => $this->input->post('INFO_STRING'),
            'AREA_CODE' => $this->input->post('AREA_CODE'),
            'CONTACT_NUMBER' => $this->input->post('CONTACT_NUMBER'),
            'MOBILE_NUMBER' => $this->input->post('MOBILE_NUMBER'),
            'ALT_MOBILE_NUMBER' => $this->input->post('ALT_MOBILE_NUMBER'),
            'TO_NAME' => $this->input->post('TO_NAME'),
            'ADDRESS1' => $this->input->post('ADDRESS1'),
            'ADDRESS2' => $this->input->post('ADDRESS2'),
            'CITY' => $this->input->post('CITY'),
            'STATE' => $this->input->post('STATE'),
            'POSTAL_CODE' => $this->input->post('POSTAL_CODE'),
        );

        $this->updatePartyPicture();
        $this->homemodel->updateUserNameInfo($model_data);
        $this->homemodel->updateUserBasicInfo($model_data);

        if (empty($model_data['EMAIL_MECH_ID'])) {
            $model_data['EMAIL_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
            $this->homemodel->updateUserEmailInfo($model_data);
        } else
            $this->homemodel->updateUserEmailInfo($model_data);

        if (empty($model_data['TELECOM_MECH_ID'])) {
            $model_data['TELECOM_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
            $this->homemodel->updateUserContactInfo($model_data);
        } else
            $this->homemodel->updateUserContactInfo($model_data);

        if (empty($model_data['POSTAL_MECH_ID'])) {
            $model_data['POSTAL_MECH_ID'] = $this->homemodel->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
            $this->homemodel->updateUserAddressInfo($model_data);
        } else
            $this->homemodel->updateUserAddressInfo($model_data);

        if ($PARTY_TYPE_ID == "CUSTOMER") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('home/customerOverview?PARTY_ID=' . $PARTY_ID);
        } else if ($PARTY_TYPE_ID == "DRIVER") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('home/driverOverview?PARTY_ID=' . $PARTY_ID);
        } else if ($PARTY_TYPE_ID == "BUSINESS") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('home/businessOverview?PARTY_ID=' . $PARTY_ID);
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('home/account');
        }
    }


    // Update User Password
    public function updateUserPasswordInfo()
    {
        $PARTY_ID = $this->input->post('PARTY_ID');
        $model_data = array(
            'PARTY_ID' => $PARTY_ID,
            'NEW_PASSWORD' => $this->input->post('NEW_PASSWORD'),
            'CON_NEW_PASSWORD' => $this->input->post('CON_NEW_PASSWORD'),
        );
        if ($model_data['NEW_PASSWORD'] == $model_data['CON_NEW_PASSWORD']) {
            $this->homemodel->updateUserPasswordInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Password Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Pasword Not Match...');
        }
        redirect('home/account/password');
    }


    // Update User Profile Picture
    public function updateUserPictureInfo()
    {

        $status = $this->updatePartyPicture();

        if ($status == true) {
            $this->session->set_flashdata('success_msg', 'Profile Picture Change Successfully...');
        } else {
            $this->session->set_flashdata('warning_msg', 'Error changing profile picture');
        }
        redirect('home/account/profilepicture');
    }


    // Update User Profile Picture
    public function updatePartyPicture()
    {
        $PARTY_ID = $this->input->post('PARTY_ID');

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
                'PARTY_ID' => $PARTY_ID,
                'PROFILE_IMG' => $data1['upload_data']['file_name'], z
            );
            $this->homemodel->updateUserPictureInfo($model_data);
            return true;
        }
        return false;
    }


    // Update web setting
    public function updateWebSettings()
    {
        $model_data = array(
            'ID' => $this->input->post('ID'),
            'VALUE_TYPE' => $this->input->post('VALUR_TYPE'),
            'TITLE' => $this->input->post('TITLE'),
            'DESCRIPTION' => $this->input->post('DESCRIPTION'),
        );

        if ($model_data['VALUE_TYPE'] == "ABOUT_US")
            $status = $this->homemodel->updateWebAboutUs($model_data);
        else if ($model_data['VALUE_TYPE'] == "PRIVACY_POLICY")
            $status = $this->homemodel->updateWebPrivacyPolicy($model_data);
        else if ($model_data['VALUE_TYPE'] == "TERM_CONDITION")
            $status = $this->homemodel->updateWebTermCondition($model_data);
        else if ($model_data['VALUE_TYPE'] == "FAQS")
            $status = $this->homemodel->updateWebFaqs($model_data);

        if ($status == "true") {
            $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Info not Updated Successfully...');
        }

        if ($model_data['VALUE_TYPE'] == "ABOUT_US")
            redirect('home/settings/about_us');
        else if ($model_data['VALUE_TYPE'] == "PRIVACY_POLICY")
            redirect('home/settings/privacy_policy');
        else if ($model_data['VALUE_TYPE'] == "TERM_CONDITION")
            redirect('home/settings/term_condition');
        else if ($model_data['VALUE_TYPE'] == "FAQS")
            redirect('home/settings/faqs');
    }


    // Vehicle type inline updation
    public function updateInline($task="")
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        if($task == "vehicle")
            $status = $this->homemodel->updateVehicleInline($model_data);
        if($task == "vehicleType")
            $status = $this->homemodel->updateVehicleTypeInline($model_data);

        if ($status == true) {
            $msg = array('msg' => 'Success! updation');
        }
        echo json_encode($msg);
    }





























    //================================== Delete Controller Request =======================================

    // Driver Business List
    public function partyDelete()
    {
        $model_data = array(
            'PARTY_ID' => $this->input->get('PARTY_ID'),
        );

        $PARTY_TYPE_ID = $this->homemodel->getPartyNameInfo($model_data)->PARTY_TYPE_ID;
        $this->homemodel->partyDelete($model_data);

        if ($PARTY_TYPE_ID == "CUSTOMER") {
            $this->session->set_flashdata('success_msg', 'Customer Deleted Successfully...');
            redirect('home/customers');
        } else if ($PARTY_TYPE_ID == "DRIVER") {
            $this->session->set_flashdata('success_msg', 'Driver Deleted Successfully...');
            redirect('home/drivers');
        } else if ($PARTY_TYPE_ID == "BUSINESS") {
            $this->session->set_flashdata('success_msg', 'Business Lister Deleted Successfully...');
            redirect('home/business');
        }
    }


}