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
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Dashboard';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('dashboard');
	}

	public function account() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('accounts');
	}

	public function notifications() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('notificationss');
	}

	public function invoices() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('invoicess');
	}

	public function payments() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('paymentss');
	}

	public function orders() {
		$model_data = array(
	      	'login_id' => $this->session->login_data,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);

		$this->render('orderss');
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
