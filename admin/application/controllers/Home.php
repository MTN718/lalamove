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
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Dashboard';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'DASHBOARD',
		);
		$this->render('dashboard');
	}

	public function account($active="setting") {
        $userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Account';
		$this->mViewData['data'] = array(
	      	'partyId' => $userInfo->PARTY_ID,
			'partyUserNameInfo' => $this->Homemodel->getPartyUserNameInfo($model_data),
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
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
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Notification';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
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
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Sent Notification';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
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
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Trash Notification';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
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
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Invoices';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'INVOICES',
		);

		$this->render('invoices');
	}

	public function payments() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Payments';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'PAYMENTS',
		);

		$this->render('payments');
	}

	public function orders() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Orders';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'pageName'=> 'ORDERS',
		);

		$this->render('orders');
	}

	// public function vehicle() {
	// 	$model_data = array(
	//       	'login_id' => $this->session->login_data,
	//     );
	// 	$this->mPageTitle = 'Add Customer';
	// 	$this->mViewData['data'] = array(
	// 		'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
	// 		'pageName'=> 'DASHBOARD',
	// 	);

	// 	$this->render('vehicles');
	// }

	// Customer Bussiness List
	public function customers() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Customers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyCustomerList' => $this->Homemodel->getPartyList('CUSTOMER'),
			'pageName'=> 'CUSTOMERS',
		);

		$this->render('customers');
	}

	// Driver Bussiness List
	public function drivers() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Drivers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyDriverList' => $this->Homemodel->getPartyList('DRIVER'),
			'pageName'=> 'DRIVERS',
		);

		$this->render('drivers');
	}

	// Bussiness Lister list
	public function bussiness() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Bussiness';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyBussinessList' => $this->Homemodel->getPartyList('BUSSINESS'),
			'pageName'=> 'BUSSINESSLISTER',
		);

		$this->render('bussinesslister');
	}

	public function settings($active="about_us") {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Bussiness';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'webAboutUs' => $this->Homemodel->getAboutUs(),
			'webTermCondtion' => $this->Homemodel->getTermCondition(),
			'webPrivacyPolicy' => $this->Homemodel->getPrivacyPolicy(),
			'webFaqs' => $this->Homemodel->getFaqsList(),
			'active' => $active,
			'pageName'=> 'SETTINGS',
		);

		$this->render('settings');
	}

	// public function discounts() {
	// 	$model_data = array(
	//       	'login_id' => $this->session->login_data,
	//     );
	// 	$this->mPageTitle = 'Add Customer';
	// 	$this->mViewData['data'] = array(
	// 		'profileInfo'=> $this->Homemodel->getProfileInfo($model_data),
	// 		'pageName'=> 'DASHBOARD',
	// 	);

	// 	$this->render('discountss');
	// }






























	// =================================== overview Controller ================================================

	// Customer Overview
	public function customerOverview() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$customer_data = array(
	      	'PARTY_ID' => $this->input->get('PARTY_ID'),
	    );
		$this->mPageTitle = 'Customers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyUserNameInfo' => $this->Homemodel->getPartyUserNameInfo($customer_data),
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($customer_data),
			'partyEmailInfo'=> $this->Homemodel->getPartyContactInfo($customer_data,'EMAIL'),
			'partyAddressInfo'=> $this->Homemodel->getPartyContactInfo($customer_data,'ADDRESS'),
			'partyTelecomInfo'=> $this->Homemodel->getPartyContactInfo($customer_data,'TELECOM'),
			'pageName'=> 'CUSTOMERS',
		);

		$this->render('customerOverview');
	}

	// Driver Overview
	public function driverOverview() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$driver_data = array(
	      	'PARTY_ID' => $this->input->get('PARTY_ID'),
	    );
		$this->mPageTitle = 'Customers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyUserNameInfo' => $this->Homemodel->getPartyUserNameInfo($driver_data),
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($driver_data),
			'partyEmailInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'EMAIL'),
			'partyAddressInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'ADDRESS'),
			'partyTelecomInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'TELECOM'),
			'pageName'=> 'DRIVERS',
		);

		$this->render('driverOverview');
	}

	// Bussiness Lister Overview
	public function bussinessOverview() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$bussiness_data = array(
	      	'PARTY_ID' => $this->input->get('PARTY_ID'),
	    );
		$this->mPageTitle = 'Customers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyUserNameInfo' => $this->Homemodel->getPartyUserNameInfo($bussiness_data),
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($bussiness_data),
			'partyEmailInfo'=> $this->Homemodel->getPartyContactInfo($bussiness_data,'EMAIL'),
			'partyAddressInfo'=> $this->Homemodel->getPartyContactInfo($bussiness_data,'ADDRESS'),
			'partyTelecomInfo'=> $this->Homemodel->getPartyContactInfo($bussiness_data,'TELECOM'),
			'pageName'=> 'BUSSINESSLISTER',
		);

		$this->render('bussinesslisterOverview');
	}

	// Driver Overview
	public function partyBasicInfoEdit() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$driver_data = array(
	      	'PARTY_ID' => $this->input->get('PARTY_ID'),
	    );
		$this->mPageTitle = 'Customers';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyUserNameInfo' => $this->Homemodel->getPartyUserNameInfo($driver_data),
			'partyNameInfo'=> $this->Homemodel->getPartyNameInfo($driver_data),
			'partyEmailInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'EMAIL'),
			'partyAddressInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'ADDRESS'),
			'partyTelecomInfo'=> $this->Homemodel->getPartyContactInfo($driver_data,'TELECOM'),
			'pageName'=> 'DRIVERS',
		);

		$this->render('partyBasicInfoEdit');
	}



































	// ==================================== Add Controller Request ==============================================

	// Add Party Customer
	public function addPartyCustomer() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyTypeInfo'=> 'CUSTOMER',
			'pageName'=> 'CUSTOMERS',
		);

		$this->render('partyBasicInfoEdit');
	} 

	// Add Party Driver
	public function addPartyDriver() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyTypeInfo'=> 'DRIVER',
			'pageName'=> 'DRIVERS',
		);

		$this->render('partyBasicInfoEdit');
	}

	// Add Party Bussiness Lister
	public function addPartyBussiness() {
		$userInfo = $this->session->login_data;
		$model_data = array(
	      	'PARTY_ID' => $userInfo->PARTY_ID,
	    );
		$this->mPageTitle = 'Add Customer';
		$this->mViewData['data'] = array(
			'adminNameInfo'=> $this->Homemodel->getPartyNameInfo($model_data),
			'partyTypeInfo'=> 'BUSSINESS',
			'pageName'=> 'BUSSINESSLISTER',
		);

		$this->render('partyBasicInfoEdit');
	}

	// Update Basic Info of User 
 	public function addUserInfo() {
		$PARTY_ID 				= $this->input->post('PARTY_ID');
		$PARTY_TYPE_ID 			= $this->input->post('PARTY_TYPE_ID');
		$model_data = array(			
	      	'PARTY_ID' 			=> $PARTY_ID,
			'EMAIL_MECH_ID' 	=> $this->input->post('EMAIL_MECH_ID'),
			'TELECOM_MECH_ID' 	=> $this->input->post('TELECOM_MECH_ID'),
			'POSTAL_MECH_ID' 	=> $this->input->post('POSTAL_MECH_ID'),
			'USER_LOGIN_ID' 	=> $this->input->post('USER_LOGIN_ID'),
			'CURRENT_PASSWORD' 	=> $this->input->post('PASSWORD'),
			'SALUTATION' 		=> $this->input->post('SALUTATION'),
			'FIRST_NAME' 		=> $this->input->post('FIRST_NAME'),
			'LAST_NAME' 		=> $this->input->post('LAST_NAME'),
			'GENDER' 			=> $this->input->post('GENDER'),
			'BIRTH_DATE' 		=> $this->input->post('BIRTH_DATE'),
			'OCCUPATION' 		=> $this->input->post('OCCUPATION'),
			'INFO_STRING' 		=> $this->input->post('INFO_STRING'),
			'AREA_CODE' 		=> $this->input->post('AREA_CODE'),
			'CONTACT_NUMBER' 	=> $this->input->post('CONTACT_NUMBER'),
			'MOBILE_NUMBER' 	=> $this->input->post('MOBILE_NUMBER'),
			'ALT_MOBILE_NUMBER' => $this->input->post('ALT_MOBILE_NUMBER'),
			'TO_NAME' 			=> $this->input->post('TO_NAME'),
			'ADDRESS1' 			=> $this->input->post('ADDRESS1'),
			'ADDRESS2' 			=> $this->input->post('ADDRESS2'),
			'CITY' 				=> $this->input->post('CITY'),
			'STATE' 			=> $this->input->post('STATE'),
			'POSTAL_CODE' 		=> $this->input->post('POSTAL_CODE'),
		);
		
		$this->updatePartyPicture();

		if(empty($model_data['PARTY_ID'])) {
			$model_data['PARTY_ID'] = $this->Homemodel->addPartyId($PARTY_TYPE_ID);
			$PARTY_ID = $model_data['PARTY_ID'];
		}			

		$this->Homemodel->updateUserNameInfo($model_data);
		$this->Homemodel->updateUserBasicInfo($model_data);

		if(empty($model_data['EMAIL_MECH_ID'])) {
			$model_data['EMAIL_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
			$this->Homemodel->updateUserEmailInfo($model_data);
		} else 
			$this->Homemodel->updateUserEmailInfo($model_data);

		if(empty($model_data['TELECOM_MECH_ID'])) {
			$model_data['TELECOM_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
			$this->Homemodel->updateUserContactInfo($model_data);
		} else
			$this->Homemodel->updateUserContactInfo($model_data);

		if(empty($model_data['POSTAL_MECH_ID'])) {
			$model_data['POSTAL_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
			$this->Homemodel->updateUserAddressInfo($model_data);
		} else
			$this->Homemodel->updateUserAddressInfo($model_data);

        if($PARTY_TYPE_ID == "CUSTOMER") {
        	$this->session->set_flashdata('success_msg', 'New Customer Added Successfully...');
			redirect('home/customers');
		} else if ($PARTY_TYPE_ID == "DRIVER") {
        	$this->session->set_flashdata('success_msg', 'New Driver Added Successfully...');
			redirect('home/drivers');
		} else if ($PARTY_TYPE_ID == "BUSSINESS") {
        	$this->session->set_flashdata('success_msg', 'New Bussiness Lister Added Successfully...');
			redirect('home/bussiness');
		} else {
        	$this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
			redirect('home/account');
		}
	}



























	// ============================== Update Controller Request ==================================
 

 	// Update Basic Info of User 
 	public function updateUserInfo() {
		$PARTY_ID 				= $this->input->post('PARTY_ID');
		$PARTY_TYPE_ID 			= $this->input->post('PARTY_TYPE_ID');
		$model_data = array(			
	      	'PARTY_ID' 			=> $PARTY_ID,
			'EMAIL_MECH_ID' 	=> $this->input->post('EMAIL_MECH_ID'),
			'TELECOM_MECH_ID' 	=> $this->input->post('TELECOM_MECH_ID'),
			'POSTAL_MECH_ID' 	=> $this->input->post('POSTAL_MECH_ID'),
			'USER_LOGIN_ID' 	=> $this->input->post('USER_LOGIN_ID'),
			'CURRENT_PASSWORD' 	=> $this->input->post('PASSWORD'),
			'SALUTATION' 		=> $this->input->post('SALUTATION'),
			'FIRST_NAME' 		=> $this->input->post('FIRST_NAME'),
			'LAST_NAME' 		=> $this->input->post('LAST_NAME'),
			'GENDER' 			=> $this->input->post('GENDER'),
			'BIRTH_DATE' 		=> $this->input->post('BIRTH_DATE'),
			'OCCUPATION' 		=> $this->input->post('OCCUPATION'),
			'INFO_STRING' 		=> $this->input->post('INFO_STRING'),
			'AREA_CODE' 		=> $this->input->post('AREA_CODE'),
			'CONTACT_NUMBER' 	=> $this->input->post('CONTACT_NUMBER'),
			'MOBILE_NUMBER' 	=> $this->input->post('MOBILE_NUMBER'),
			'ALT_MOBILE_NUMBER' => $this->input->post('ALT_MOBILE_NUMBER'),
			'TO_NAME' 			=> $this->input->post('TO_NAME'),
			'ADDRESS1' 			=> $this->input->post('ADDRESS1'),
			'ADDRESS2' 			=> $this->input->post('ADDRESS2'),
			'CITY' 				=> $this->input->post('CITY'),
			'STATE' 			=> $this->input->post('STATE'),
			'POSTAL_CODE' 		=> $this->input->post('POSTAL_CODE'),
		);
		
		$this->updatePartyPicture();
		$this->Homemodel->updateUserNameInfo($model_data);
		$this->Homemodel->updateUserBasicInfo($model_data);

		if(empty($model_data['EMAIL_MECH_ID'])) {
			$model_data['EMAIL_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'EMAIL_ADDRESS');
			$this->Homemodel->updateUserEmailInfo($model_data);
		} else 
			$this->Homemodel->updateUserEmailInfo($model_data);

		if(empty($model_data['TELECOM_MECH_ID'])) {
			$model_data['TELECOM_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'TELECOM_NUMBER');
			$this->Homemodel->updateUserContactInfo($model_data);
		} else
			$this->Homemodel->updateUserContactInfo($model_data);

		if(empty($model_data['POSTAL_MECH_ID'])) {
			$model_data['POSTAL_MECH_ID'] = $this->Homemodel->addPartyContactMechId($PARTY_ID, 'POSTAL_ADDRESS');
			$this->Homemodel->updateUserAddressInfo($model_data);
		} else
			$this->Homemodel->updateUserAddressInfo($model_data);

        if($PARTY_TYPE_ID == "CUSTOMER") {
        	$this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
			redirect('home/customerOverview?PARTY_ID='.$PARTY_ID);
		} else if ($PARTY_TYPE_ID == "DRIVER") {
        	$this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
			redirect('home/driverOverview?PARTY_ID='.$PARTY_ID);
		} else if ($PARTY_TYPE_ID == "BUSSINESS") {
        	$this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
			redirect('home/bussinessOverview?PARTY_ID='.$PARTY_ID);
		} else {
        	$this->session->set_flashdata('success_msg', 'Basic Info Updated Successfully...');
			redirect('home/account');
		}
	}


	// Update User Password
	public function updateUserPasswordInfo() {
		$PARTY_ID 				= $this->input->post('PARTY_ID');
		$model_data = array(			
	      	'PARTY_ID' 			=> $PARTY_ID,
			'NEW_PASSWORD' 		=> $this->input->post('NEW_PASSWORD'),
			'CON_NEW_PASSWORD' 	=> $this->input->post('CON_NEW_PASSWORD'),
		);
		if($model_data['NEW_PASSWORD'] == $model_data['CON_NEW_PASSWORD']) {
			$this->Homemodel->updateUserPasswordInfo($model_data);
			$this->session->set_flashdata('success_msg', 'Password Updated Successfully...');
		} else {
			$this->session->set_flashdata('error_msg', 'Pasword Not Match...');
		}
		redirect('home/account/password');
	}


	// Update User Profile Picture
	public function updateUserPictureInfo() {
		
		$status = $this->updatePartyPicture();

  		if($status == true) {
			$this->session->set_flashdata('success_msg', 'Profile Picture Change Successfully...');
		} else {
			$this->session->set_flashdata('error_msg', 'Profile Picture Not Change...');
		}        
		redirect('home/account/profilepicture');
	}


	// Update User Profile Picture
	public function updatePartyPicture() {
		$PARTY_ID 				= $this->input->post('PARTY_ID');

		$config['upload_path']  = './images/';
  		$config['allowed_types']= 'gif|jpg|png';
  		$config['max_size']     = 0;
  		$config['max_width']   	= 0;
  		$config['max_height']   = 0;
  		$this->load->library('upload');
  		$this->upload->initialize($config);

  		if ( $this->upload->do_upload('image')) {
    		$data1 = array('upload_data' => $this->upload->data());
    		$model_data = array(			
	      		'PARTY_ID' 			=> $PARTY_ID,
	      		'PROFILE_IMG' 	=> $data1['upload_data']['file_name'],z
	      	);
			$this->Homemodel->updateUserPictureInfo($model_data);
			return true;
		}
		return false;
	}


	// Update About Us
	public function updateWebAboutUs() {
		$model_data = array(			
	      	'ABOUT_US_ID' 			=> $this->input->post('ABOUT_US_ID'),
			'TITLE' 				=> $this->input->post('TITLE'),
			'DESCRIPTION' 			=> $this->input->post('DESCRIPTION'),
		);
		$status = $this->Homemodel->updateWebAboutUs($model_data);

		if($status == "true") {
		$this->session->set_flashdata('success_msg', 'About Us Updated Successfully...');
		} else {
		$this->session->set_flashdata('error_msg', 'About Us not Updated Successfully...');
		}
		redirect('home/settings/about_us');
	}

	// Update Privacy Policy
	public function updateWebPrivacyPolicy() {
		$model_data = array(			
	      	'PRIVACY_POLiCY_ID' 	=> $this->input->post('PRIVACY_POLiCY_ID'),
			'TITLE' 				=> $this->input->post('TITLE'),
			'DESCRIPTION' 			=> $this->input->post('DESCRIPTION'),
		);
		$status = $this->Homemodel->updateWebPrivacyPolicy($model_data);

		if($status == "true") {
		$this->session->set_flashdata('success_msg', 'Privacy Policy Updated Successfully...');
		} else {
		$this->session->set_flashdata('error_msg', 'Privacy Policy not Updated Successfully...');
		}
		redirect('home/settings/privacy_policy');
	}













	//================================== Delete Controller Request =======================================

	// Driver Bussiness List
	public function partyDelete() {
		$model_data = array(
	      	'PARTY_ID' => $this->input->get('PARTY_ID'),
	    );

		$PARTY_TYPE_ID = $this->Homemodel->getPartyNameInfo($model_data)->PARTY_TYPE_ID;
		$this->Homemodel->partyDelete($model_data);

		if($PARTY_TYPE_ID == "CUSTOMER") {
        	$this->session->set_flashdata('success_msg', 'Customer Deleted Successfully...');
			redirect('home/customers');
		} else if ($PARTY_TYPE_ID == "DRIVER") {
        	$this->session->set_flashdata('success_msg', 'Driver Deleted Successfully...');
			redirect('home/drivers');
		} else if ($PARTY_TYPE_ID == "BUSSINESS") {
        	$this->session->set_flashdata('success_msg', 'Bussiness Lister Deleted Successfully...');
			redirect('home/bussiness');
		} 
	}



}
?>





