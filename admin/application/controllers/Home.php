<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 */
class Home extends Main_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Homemodel');
    }

	public function index() {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Dashboard';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);
		$this->render('dashboard');
	}

	public function account($active="time") {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Account';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyEmailInfo'=> $this->Homemodel->getPartyContactInfo($model_data,'EMAIL'),
			'partyAddressInfo'=> $this->Homemodel->getPartyContactInfo($model_data,'ADDRESS'),
			'partyTelecomInfo'=> $this->Homemodel->getPartyContactInfo($model_data,'TELECOM'),
			'noOfCustomer' => 0,
			'noOfDriver' => 0,			
			'noOfBussinessLister' => 0,
			'active' => $active,			
			'pageName'=> 'ACCOUNT',
		);
		$this->render('account');
	}

	public function notifications() {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Notification';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'notificationCount' => 0,
			'sentNotificationCount' => 0,			
			'trashNotificationCount' => 0,
			'pageName'=> 'NOTIFICATIONS',
		);

		$this->render('notifications');
	}

	public function sentNotifications() {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Sent Notification';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'notificationCount' => 0,
			'sentNotificationCount' => 0,			
			'trashNotificationCount' => 0,
			'pageName'=> 'NOTIFICATIONS',
		);

		$this->render('sentnotifications');
	}

	public function trashNotifications() {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Trash Notification';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'notificationCount' => 0,
			'sentNotificationCount' => 0,			
			'trashNotificationCount' => 0,
			'pageName'=> 'NOTIFICATIONS',
		);

		$this->render('trashnotifications');
	}

	public function invoices() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Invoices';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'INVOICES',
		);

		$this->render('invoices');
	}

	public function payments() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Payments';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'PAYMENTS',
		);

		$this->render('payments');
	}

	public function orders() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'party_id' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Orders';
		$this->mViewData['data'] = array(
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'ORDERS',
		);

		$this->render('orders');
	}














	public function vehicle() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('vehicles');
	}

	public function customers() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('customerss');
	}

	public function drivers() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('driverss');
	}

	public function bussiness() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('bussinesss');
	}

	public function settings() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('settingss');
	}

	public function discounts() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('discountss');
	}
}
?>
