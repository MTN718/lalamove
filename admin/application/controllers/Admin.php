<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 */
class Admin extends Main_Controller
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
        if($this->userInfo->party_type_id != "admin")
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
        $this->render('admin/dashboard');
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
            'noOfCustomer' => 0,
            'noOfDriver' => 0,
            'noOfBusinessLister' => 0,
            'active' => $active,
            'pageName' => 'ACCOUNT',
        );-
        $this->render('admin/account');
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

        $this->render('admin/notifications');
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

        $this->render('admin/sentnotifications');
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

        $this->render('admin/trashnotifications');
    }

    // Invoice Page
    public function invoices()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Invoices';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'orderInvoiceList' => $this->adminmodel->getorderinvoiceList(),
            'pageName' => 'INVOICES',
        );

        $this->render('admin/invoices');
    }

    // Payment Page
    public function payments()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Payments';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'pageName' => 'PAYMENTS',
        );

        $this->render('admin/payments');
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
            'orderList' => $this->adminmodel->getorderList(),
            'pageName' => 'ORDERS',
        );

        $this->render('admin/orders');
    }

    // order additional services Page
    public function orderAdditionalServices()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'orders';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'orderAdditionaServicesList' => $this->adminmodel->getorderAdditionaServicesList(),
            'pageName' => 'ORDERSADDITIONALSERVICES',
        );

        $this->render('admin/orderAdditionalServices');
    }

    // vehicle Page
    public function vehicle($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'BUSINESS';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'vehiclesList' => $this->adminmodel->getvehicleList(),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'partyDriverList' => $this->adminmodel->getpartyList('driver'),
            'partyBusinessList' => $this->adminmodel->getpartyList('business'),
            'status' => $status,
            'pageName' => 'VEHICLES',
        );

        $this->render('admin/vehicles');
    }

    // vehicle Type Page
    public function vehicleType()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'operationalcityList' => $this->adminmodel->getOperationcityList(),
            'pageName' => 'VEHICLESTYPE',
        );

        $this->render('admin/vehicleType');
    }

    // vehicle Type Additional charges Page
    public function additionalServices($active="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Services';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'active' => $active,
            'pageName' => 'ADDITIONALSERVICES',
        );

        $this->render('admin/additionalServices');
    }

    // Customer Business List Page
    public function customers()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyCustomerList' => $this->adminmodel->getpartyList('customer'),
            'pageName' => 'CUSTOMERS',
        );

        $this->render('admin/customers');
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
            'partyDriverList' => $this->adminmodel->getpartyList('driver'),
            'pageName' => 'DRIVERS',
        );

        $this->render('admin/drivers');
    }

    // Business Lister list Page
    public function businesslisters()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyBusinessList' => $this->adminmodel->getpartyList('business'),
            'pageName' => 'BUSINESSLISTERS',
        );

        $this->render('admin/businesslister');
    }

    // Web Setting Page
    public function settings($active = "about_us")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('admin/settings');
    }

    // Discount Page
    public function discounts()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'business';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'discountList' => $this->adminmodel->getDiscountPromocodeList(),
            'partyCustomerList' => $this->adminmodel->getpartyList('customer'),
            'pageName' => 'DISCOUNTS',
        );
        $this->render('admin/discounts');
    }






























    // =================================== overview Controller ================================================

    // Customer Overview
    public function customerOverview()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $customer_data = array(
            'party_id' => $this->input->get('party_id'),
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyUserNameInfo' => $this->adminmodel->getpartyUserNameInfo($customer_data),
            'partyNameInfo' => $this->adminmodel->getpartyNameInfo($customer_data),
            'partyEmailInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'email'),
            'partyAddressInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'address'),
            'partyTelecomInfo' => $this->adminmodel->getpartyContactInfo($customer_data, 'telecom'),
            'partyBalance' => $this->adminmodel->getpartyBalanceInfo($customer_data),
            'orderList' => $this->adminmodel->getorderList($customer_data),
            'partyDriverList' => $this->adminmodel->getFavouriteDriverList('driver',$customer_data),
            'pageName' => 'CUSTOMERS',
        );

        $this->render('admin/customerOverview');
    }

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

        $this->render('admin/driverOverview');
    }

    // Business Lister Overview
    public function businessOverview()
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $business_data = array(
            'party_id' => $this->input->get('party_id'),
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'partyUserNameInfo' => $this->adminmodel->getpartyUserNameInfo($business_data),
            'partyNameInfo' => $this->adminmodel->getpartyNameInfo($business_data),
            'partyEmailInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'email'),
            'partyAddressInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'address'),
            'partyTelecomInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'telecom'),
            'partyDriverList' => $this->adminmodel->getpartyList('driver',$business_data),
            'vehiclesList' => $this->adminmodel->getvehicleList("",$business_data),
            'orderList' => $this->adminmodel->getorderListOfBusinessLister($business_data),
            'vehicleTypeList' => $this->adminmodel->getvehicleTypeList(),
            'pageName' => 'BUSINESSLISTERS',
        );

        $this->render('admin/businesslisterOverview');
    }

    // BAsic info edit page
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

        $this->render('admin/partyBasicInfoEdit');
    }

    // Faq Edit page
    public function webfaqsEdit($active = "faqs_update")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $faq_data = array(
            'faq_id' => $this->input->get('faq_id'),
        );
        $this->mPagetitle = 'faqs';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'webfaqsedit' => $this->adminmodel->getFaqEditInfo($faq_data),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('admin/settings');
    }

    // Faq Edit page
    public function faqs_status($task = "")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $faq_data = array(
            'faq_id' => $this->input->get('faq_id'),
        );
        if ($task == "Enable")
            $this->adminmodel->updatefaqstatus($faq_data, "Enable");
        else if ($task == "Disable")
            $this->adminmodel->updatefaqstatus($faq_data, "Disable");
        else if ($task == "Delete")
            $this->adminmodel->faqDelete($faq_data);

        $this->mPagetitle = 'faqs';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'active' => 'faqs',
            'pageName' => 'SETTINGS',
        );

        $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        $this->render('admin/settings');
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
            'party_id' => $this->adminmodel->getBusinessidByorder($order_data),
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

            'businessNameInfo' => $this->adminmodel->getpartyNameInfo($business_data),
            'businessEmailInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'email'),
            'businessAddressInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'address'),
            'businessTelecomInfo' => $this->adminmodel->getpartyContactInfo($business_data, 'telecom'),

            'orderInfo' => $this->adminmodel->getorderInfo($order_data),
            'orderLocationInfo' => $this->adminmodel->getorderLocationInfo($order_data),


            'availablepartyDriverList' => $this->adminmodel->getAvailableDriverList($business_data),



            'partyBusinessList' => $this->adminmodel->getpartyList('business'),


            'vehicleData' => $this->adminmodel->getvehicleData($driver_data),
            'discountPromoCode' => $this->adminmodel->getDiscountPromoCode($customer_data),
            'selectedDiscountPromoCode' => $this->adminmodel->getSelectedDiscountPromoCode($order_data),
            'selectedServiceList' => $this->adminmodel->getselectedServiceList($order_data), 
            'orderServiceList' => $this->adminmodel->getorderServiceList(),    
            'pageName' => "orders",
        );
        $this->render('admin/orderInfoEdit');
    }

    // order Overview
    public function invoiceOverview()
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
            'availablepartyDriverList' => $this->adminmodel->getAvailableDriverList($order_data),
            'vehicleData' => $this->adminmodel->getvehicleData($driver_data),
            'discountPromoCode' => $this->adminmodel->getDiscountPromoCode($customer_data),
            'selectedDiscountPromoCode' => $this->adminmodel->getSelectedDiscountPromoCode($order_data),
            'selectedServiceList' => $this->adminmodel->getselectedServiceList($order_data), 
            'orderServiceList' => $this->adminmodel->getorderServiceList(),



    
            'pageName' => "orders",
        );
        $this->render('admin/invoiceOverview');
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
        $this->render('admin/notification_overview');
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
        $this->render('admin/composeMail');
    }
































    // ==================================== Add Controller Request ==============================================

    // Add party Customer
    public function addpartyCustomer($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'status' => $status,
            'partyTypeInfo' => 'customer',
            'pageName' => 'CUSTOMERS',
        );

        $this->render('admin/partyBasicInfoEdit');
    }

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

        $this->render('admin/partyBasicInfoEdit');
    }

    // Add party Business Lister
    public function addpartyBusiness($status="")
    {
        $model_data = array(
            'party_id' => $this->userInfo->party_id,
        );
        $this->mPagetitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminNameInfo' => $this->adminmodel->getpartyNameInfo($model_data),
            'status' => $status,
            'partyTypeInfo' => 'business',
            'pageName' => 'BUSINESSLISTER',
        );

        $this->render('admin/partyBasicInfoEdit');
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
                    redirect('admin/addpartyCustomer/'.$status);
                } else if ($party_type_id == "driver") {
                    redirect('admin/addpartyDriver/'.$status);
                } else {
                    redirect('admin/addpartyBusiness/'.$status);
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
            redirect('admin/businessOverview?party_id='.$external_id);
        }
        if ($party_type_id == "customer") {
            $this->session->set_flashdata('success_msg', 'New Customer Added Successfully...');
            redirect('admin/customers');
        } else if ($party_type_id == "driver") {
            $this->session->set_flashdata('success_msg', 'New Driver Added Successfully...');
            redirect('admin/drivers');
        } else if ($party_type_id == "business") {
            $this->session->set_flashdata('success_msg', 'New Business Lister Added Successfully...');
            redirect('admin/businesslisters');
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('admin/account');
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
            redirect('admin/businessOverview?party_id='.$model_data['party_id']);
        } else {
            redirect('admin/vehicle');
        }
    }

    // add vehicle type
    public function addvehicleTypeInfo() {
        $model_data = array(
           'vehicle_type_name' => $this->input->post('vehicle_type_name'),
           'working_region' => $this->input->post('working_region'),
           'min_weight_capacity' => $this->input->post('min_weight_capacity'),
           'max_weight_capacity' => $this->input->post('max_weight_capacity'),
           'item_height' => $this->input->post('item_height'),
           'item_width' => $this->input->post('item_width'),
           'item_length' => $this->input->post('item_length'),
           'base_fare' => $this->input->post('base_fare'),
           'base_fare_limit' => $this->input->post('base_fare_limit'),
           'rent_per_km' => $this->input->post('rent_per_km'),
        );

        $status = $this->adminmodel->addvehicleTypeInfo($model_data);
        if($status)            
            $this->session->set_flashdata('success_msg', ' vehicle Info Added Successfully');
        else
            $this->session->set_flashdata('error_msg', ' vehicle Info Already Exist');

        redirect('admin/vehicleType');
    }

    // add order additional services
    public function addOrderAdditionalServicesInfo() {
        $model_data = array(
           'services_title' => $this->input->post('services_title'),
           'price' => $this->input->post('price'),
           'parent_services_id' => $this->input->post('parent_services_id'),
           'description' => $this->input->post('description'),
        );

        $status = $this->adminmodel->addOrderAdditionalServicesInfo($model_data);
        if($status)            
            $this->session->set_flashdata('success_msg', ' Order Services Info Added Successfully');
        else
            $this->session->set_flashdata('error_msg', ' Order Services Info Already Exist');

        redirect('admin/orderAdditionalServices');
    }

    // add Discount promocode info
    public function addDiscountPromocodeInfo() {
        $model_data = array(
           'promo_code' => $this->input->post('promo_code'),
           'party_id' => $this->input->post('party_id'),
           'price' => $this->input->post('price'),
           'for_all' => $this->input->post('for_all'),
           'is_expired' => $this->input->post('is_expired'),
        );

        $status = $this->adminmodel->addDiscountPromocodeInfo($model_data);
        if($status)            
            $this->session->set_flashdata('success_msg', ' Discount Promcode Info Added Successfully');
        else
            $this->session->set_flashdata('error_msg', ' Discount Promcode Info Already Exist');

        redirect('admin/discounts');
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
        redirect('admin/sentnotifications', 'refresh');
    }      

    // order allocation
    public function orderAllocation()
    {
        $model_data = array(
            'order_id' => $this->input->get('order_id'),
        );
        $data['status'] = $this->adminmodel->orderAllocation($model_data);
        if ($data['status']) {
            $this->session->set_flashdata('success_msg', 'Order Allocation Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Order Allocation failed...');
        }
        redirect('admin/orders');
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
            redirect('admin/customerOverview?party_id=' . $party_id);
        } else if ($party_type_id == "driver") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('admin/driverOverview?party_id=' . $party_id);
        } else if ($party_type_id == "business") {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('admin/businessOverview?party_id=' . $party_id);
        } else {
            $this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
            redirect('admin/account/setting');
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
        redirect('admin/account/password');
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
        redirect('admin/account/profilepicture');
    }


    // Update User Profile Picture
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


    // Update web setting
    public function updateWebSettings()
    {
        $model_data = array(
            'id' => $this->input->post('id'),
            'value_type' => $this->input->post('value_type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
        );

        if ($model_data['value_type'] == "about_us")
            $status = $this->adminmodel->updateWebAboutUs($model_data);
        else if ($model_data['value_type'] == "privacy_policy")
            $status = $this->adminmodel->updateWebPrivacyPolicy($model_data);
        else if ($model_data['value_type'] == "term_condition")
            $status = $this->adminmodel->updateWebTermCondition($model_data);
        else if ($model_data['value_type'] == "faqs")
            $status = $this->adminmodel->updateWebfaqs($model_data);

        if ($status == "true") {
            $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Info not Updated Successfully...');
        }

        if ($model_data['value_type'] == "about_us")
            redirect('admin/settings/about_us');
        else if ($model_data['value_type'] == "privacy_policy")
            redirect('admin/settings/privacy_policy');
        else if ($model_data['value_type'] == "term_condition")
            redirect('admin/settings/term_condition');
        else if ($model_data['value_type'] == "faqs")
            redirect('admin/settings/faqs');
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
        if($task == "vehicleType")
            $status = $this->adminmodel->updatevehicleTypeInline($model_data);
        if($task == "drivers")
            $status = $this->adminmodel->updateDriverInline($model_data);
        if($task == "services")
            $status = $this->adminmodel->updateOrderServiceInline($model_data);
        if($task == "promocode")
            $status = $this->adminmodel->updateDiscountPromocodeInline($model_data);
        if($task == "wallet")
            $status = $this->adminmodel->updateWalletInline($model_data);

        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }

    // Update party Password
    public function updatePartyPassword()
    {
        $party_id = $this->input->post('party_id');
        $party_type_id = $this->input->post('party_type_id');
        $newpwd = $this->input->post('newpwd');
        $confirmnewpwd = $this->input->post('confirmnewpwd');

        $model_data = array(
            'party_id' => $party_id,
            'current_password' => $this->input->post('new_password'),
        );

        if ($newpwd == $confirmnewpwd) {
            $this->adminmodel->updateUserpartyPasswoed($model_data);
            $this->session->set_flashdata('success_msg', 'Password Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Error changing Password');
        }

        if($party_type_id == "customer")
            redirect('business/customerOverview?party_id='.$party_id);
        if($party_type_id == "business")
            redirect('business/businessOverview?party_id='.$party_id);

        
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

            redirect('admin/customers');
        } else if ($party_type_id == "driver") {
            if($status == true)
                $this->session->set_flashdata('success_msg', 'Driver Deleted Successfully...');
            else
                $this->session->set_flashdata('error_msg', 'Driver have incomplete order, Can not delete...');

            redirect('admin/drivers');
        } else if ($party_type_id == "business") {
            if($status == true)
                $this->session->set_flashdata('success_msg', 'Business Deleted Successfully...');
            else
                $this->session->set_flashdata('error_msg', 'Business have incomplete order, Can not delete...');

            redirect('admin/businesslisters');
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
        redirect('admin/trashNotifications', 'refresh');
    }

    // Delete notification mail
    public function deleteReadMail()
    {
        $model_data = array(
            'mail_id' => $this->input->get('mail_id'),
        );
        $this->adminmodel->deletereadmail($model_data);
        redirect('admin/trashNotifications', 'refresh');
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

    // Driver List according to owner
    public function driverList()
    {
        $business_data = array(
            'party_id' => $_POST["val"],
            'order_id' => $_POST["id"],
        );
        $results = $this->adminmodel->getAvailableDriverList($business_data);

        if (isset($results) and $results != NULL) {
            echo '<option value="">Select Driver</option>';
            foreach ($results as $result) {
                echo '<option value="' . $result->party_id . '">' . $result->first_name, $result->last_name . '</option>';
            }
        } else {
            echo '<option value="">Driver Not Available</option>';
        }
    }

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











}