<?php

Class Homemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // ==============================================Get Data Methods==============================================

    // get user Name details
    public function getPartyUserNameInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];

        $this->db->select('*');
        $this->db->from('USER_LOGIN');
        $this->db->where('PARTY_ID', $PARTY_ID);
        return $this->db->get()->row();
    }

    // get user Name details
    public function getPartyNameInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];

        $this->db->select('*');
        $this->db->from('PARTY');
        $this->db->join('PERSON', 'PERSON.PARTY_ID = PARTY.PARTY_ID');
        $this->db->where('PARTY.PARTY_ID', $PARTY_ID);
        return $this->db->get()->row();
    }

    // get user contact details
    public function getPartyContactInfo($model_data, $contactInfoType = "")
    {
        $PARTY_ID = $model_data['PARTY_ID'];

        if ($contactInfoType == "EMAIL") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH', 'CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'EMAIL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }

        if ($contactInfoType == "ADDRESS") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH', 'CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('POSTAL_ADDRESS', 'POSTAL_ADDRESS.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'POSTAL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }

        if ($contactInfoType == "TELECOM") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH', 'CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('TELECOM_NUMBER', 'TELECOM_NUMBER.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'TELECOM_NUMBER');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }
        return false;
    }

    // get Customer List details
    public function getPartyList($party_type_id = "")
    {
        $this->db->select('*');
        $this->db->from('PARTY');
        $this->db->join('PERSON', 'PERSON.PARTY_ID = PARTY.PARTY_ID');
        $this->db->join('USER_LOGIN', 'USER_LOGIN.PARTY_ID = PARTY.PARTY_ID');
        $this->db->where('PARTY.PARTY_TYPE_ID', $party_type_id);
        return $this->db->get()->result();
    }

    // get WEb Abourt Us
    public function getAboutUs()
    {
        $this->db->select('*');
        $this->db->from('ABOUT_US');
        return $this->db->get()->row();
    }

    // get web Term and Condition
    public function getTermCondition()
    {
        $this->db->select('*');
        $this->db->from('TERM_CONDITION');
        return $this->db->get()->row();
    }

    // get web Privacy Policy
    public function getPrivacyPolicy()
    {
        $this->db->select('*');
        $this->db->from('PRIVACY_POLICY');
        return $this->db->get()->row();
    }

    // get web Faqs List
    public function getFaqsList()
    {
        $this->db->select('*');
        $this->db->from('FAQS');
        return $this->db->get()->result();
    }

    // get Faqs Data
    public function getFaqEditInfo($model_data)
    {
        $FAQ_ID = $model_data['FAQ_ID'];

        $this->db->select('*');
        $this->db->from('FAQS');
        $this->db->where('FAQ_ID', $FAQ_ID);
        return $this->db->get()->row();
    }

    // get vehicles list
    public function getVehicleList($driver_data="") {

        if(!empty($driver_data)) {
            $this->db->select('*');
            $this->db->from('VEHICLE');
            $this->db->where('IS_DELETED', 1);
            $this->db->where('PARTY_ID', $driver_data['PARTY_ID']);
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('VEHICLE');
            $this->db->where('IS_DELETED', 1);
            return $this->db->get()->result();
        }
    }

    // get vehicles list
    public function getVehicleTypeList() {
        $this->db->select('*');
        $this->db->from('VEHICLE_TYPE');
        return $this->db->get()->result();
    }

    // get vehicles list
    public function getOperationCityList() {
        $this->db->select('*');
        $this->db->from('OPERATIONAL_CITY');
        return $this->db->get()->result();
    }

    // get vehicles list
    public function getPartyBalanceInfo($party_data) {
        $this->db->select('*');
        $this->db->from('WALLET');
        $this->db->where('PARTY_ID',$party_data['PARTY_ID']);
        return $this->db->get()->row();
    }














    // ================================================ check Data Methods ==========================================

    // check vehicles list
    public function checkVehicleInfo($VEHICLE_ID) {
        $this->db->select('*');
        $this->db->from('VEHICLE');
        $this->db->where('VEHICLE_ID', $VEHICLE_ID);
        return $this->db->get()->num_rows();
    }

    // check vehicles list
    public function checkVehicleTypeInfo($VEHICLE_TYPE_ID) {
        $this->db->select('*');
        $this->db->from('VEHICLE_TYPE');
        $this->db->where('VEHICLE_TYPE_ID', $VEHICLE_TYPE_ID);
        return $this->db->get()->num_rows();
    }




































    // ================================================Add Data Methods================================================

    // Add New Party
    public function addPartyId($PARTY_TYPE_ID)
    {
        $sql = "INSERT INTO `PARTY`(`PARTY_TYPE_ID`) VALUES('$PARTY_TYPE_ID')";
        $this->db->query($sql);
        $PARTY_ID = $this->db->insert_id();

        $sql2 = "INSERT INTO `USER_LOGIN`(`PARTY_ID`,`USER_LOGIN_ID`) VALUES('$PARTY_ID','wait')";
        $this->db->query($sql2);

        $sql3 = "INSERT INTO `PERSON`(`PARTY_ID`) VALUES('$PARTY_ID')";
        $this->db->query($sql3);

        return $PARTY_ID;
    }


    // Add Connect Mech Type Id
    public function addPartyContactMechId($PARTY_ID, $CONTACT_MECH_TYPE_ID)
    {
        $sql = "INSERT INTO `CONTACT_MECH`(`CONTACT_MECH_TYPE_ID`) VALUES('$CONTACT_MECH_TYPE_ID')";
        $this->db->query($sql);
        $CONTACT_MECH_ID = $this->db->insert_id();

        $sql2 = "INSERT INTO `PARTY_CONTACT_MECH`(`PARTY_ID`,`CONTACT_MECH_ID`) VALUES('$PARTY_ID','$CONTACT_MECH_ID')";
        $this->db->query($sql2);

        if ($CONTACT_MECH_TYPE_ID == 'TELECOM_NUMBER') {
            $sql3 = "INSERT INTO `TELECOM_NUMBER`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3);
        }

        if ($CONTACT_MECH_TYPE_ID == 'POSTAL_ADDRESS') {
            $sql3 = "INSERT INTO `POSTAL_ADDRESS`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3);
        }
        return $CONTACT_MECH_ID;
    }


    // add vehicle
    public function addVehicleInfo($model_data) {
        $VEHICLE_ID = $model_data['VEHICLE_NO'];
        $VEHICLE_ID = strtoupper($VEHICLE_ID);
        $VEHICLE_ID = preg_replace('/[^A-Za-z0-9\-]/', '', $VEHICLE_ID);

        $VEHICLE_NO = $model_data['VEHICLE_NO'];
        $PARTY_ID = $model_data['PARTY_ID'];
        $VEHICLE_TYPE_ID = $model_data['VEHICLE_TYPE_ID'];
        $PERMIT = $model_data['PERMIT'];
        $REGISTRATION_NO = $model_data['REGISTRATION_NO'];

        $num_rows = $this->checkVehicleInfo($VEHICLE_ID);
        if($num_rows > 0)
            return false;

        $sql = "INSERT INTO `VEHICLE`(`VEHICLE_ID`,`VEHICLE_NO`,`PARTY_ID`,`VEHICLE_TYPE_ID`,`PERMIT`,`REGISTRATION_NO`) VALUES('$VEHICLE_ID','$VEHICLE_NO','$PARTY_ID','$VEHICLE_TYPE_ID','$PERMIT','$REGISTRATION_NO')";  
        $status = $this->db->query($sql); 

        return true;    
    }


    // add vehicle type
    public function addVehicleTypeInfo($model_data) {
        $VEHICLE_TYPE_ID = $model_data['VEHICLE_TYPE_NAME'];
        $VEHICLE_TYPE_ID = strtoupper($VEHICLE_TYPE_ID);
        $VEHICLE_TYPE_ID = preg_replace('/[^A-Za-z0-9\-]/', '', $VEHICLE_TYPE_ID);

        $VEHICLE_TYPE_NAME = $model_data['VEHICLE_TYPE_NAME'];
        $WORKING_REGION = $model_data['WORKING_REGION'];
        $MIN_WEIGHT_CAPACITY = $model_data['MIN_WEIGHT_CAPACITY'];
        $MAX_WEIGHT_CAPACITY = $model_data['MAX_WEIGHT_CAPACITY'];
        $ITEM_HEIGHT = $model_data['ITEM_HEIGHT'];
        $ITEM_WIDTH = $model_data['ITEM_WIDTH'];
        $ITEM_LENGTH = $model_data['ITEM_LENGTH'];
        $BASE_FARE = $model_data['BASE_FARE'];

        $num_rows = $this->checkVehicleTypeInfo($VEHICLE_TYPE_ID);
        if($num_rows > 0)
            return false;

        $sql = "INSERT INTO `VEHICLE_TYPE`(`VEHICLE_TYPE_ID`,`VEHICLE_TYPE_NAME`,`WORKING_REGION`,`MIN_WEIGHT_CAPACITY`,`MAX_WEIGHT_CAPACITY`,`ITEM_HEIGHT`,`ITEM_WIDTH`,`ITEM_LENGTH`,`BASE_FARE`) VALUES('$VEHICLE_TYPE_ID','$VEHICLE_TYPE_NAME','$WORKING_REGION','$MIN_WEIGHT_CAPACITY','$MAX_WEIGHT_CAPACITY','$ITEM_HEIGHT','$ITEM_WIDTH','$ITEM_LEGTH','$BASE_FARE')";
        $this->db->query($sql);
        return true;
    }

















    // =================================== Update Data Methods =========================================

    // Update UserName Info
    public function updateUserNameInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];
        $USER_LOGIN_ID = $model_data['USER_LOGIN_ID'];
        $CURRENT_PASSWORD = $model_data['CURRENT_PASSWORD'];
        $PASSWORD = password_hash($CURRENT_PASSWORD, PASSWORD_DEFAULT) . "\n";

        if (empty($CURRENT_PASSWORD))
            $sql = "UPDATE `USER_LOGIN` SET `USER_LOGIN_ID` = '$USER_LOGIN_ID' WHERE PARTY_ID = '$PARTY_ID'";
        else
            $sql = "UPDATE `USER_LOGIN` SET `USER_LOGIN_ID` = '$USER_LOGIN_ID', `CURRENT_PASSWORD` = '$PASSWORD' WHERE PARTY_ID = '$PARTY_ID'";

        $this->db->query($sql);
    }


    // Update User Basic Info
    public function updateUserBasicInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];
        $SALUTATION = $model_data['SALUTATION'];
        $FIRST_NAME = $model_data['FIRST_NAME'];
        $LAST_NAME = $model_data['LAST_NAME'];
        $GENDER = $model_data['GENDER'];
        $BIRTH_DATE = $model_data['BIRTH_DATE'];
        $OCCUPATION = $model_data['OCCUPATION'];

        //For Driver
        $LICENSE_NUMBER = $model_data['LICENSE_NUMBER'];
        $CRIMINAL_CASE_STATUS = $model_data['CRIMINAL_CASE_STATUS'];
        $CRIMINAL_CASE_CLEARANCE_NO = $model_data['CRIMINAL_CASE_CLEARANCE_NO'];

        $sql = "UPDATE `PERSON` SET `SALUTATION` = '$SALUTATION', `FIRST_NAME` = '$FIRST_NAME', `LAST_NAME` = '$LAST_NAME', `GENDER` = '$GENDER', `BIRTH_DATE` = '$BIRTH_DATE', `OCCUPATION` = '$OCCUPATION', `LICENSE_NUMBER` = '$LICENSE_NUMBER', `CRIMINAL_CASE_STATUS` = '$CRIMINAL_CASE_STATUS', `CRIMINAL_CASE_CLEARANCE_NO` = '$CRIMINAL_CASE_CLEARANCE_NO' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }


    // Update User Email Info
    public function updateUserEmailInfo($model_data)
    {
        $EMAIL_MECH_ID = $model_data['EMAIL_MECH_ID'];
        $INFO_STRING = $model_data['INFO_STRING'];

        $sql = "UPDATE `CONTACT_MECH` SET `INFO_STRING`= '$INFO_STRING' WHERE CONTACT_MECH_ID = '$EMAIL_MECH_ID'";
        $this->db->query($sql);
    }


    // Update User Contact Info
    public function updateUserContactInfo($model_data)
    {
        $TELECOM_MECH_ID = $model_data['TELECOM_MECH_ID'];
        $AREA_CODE = $model_data['AREA_CODE'];
        $CONTACT_NUMBER = $model_data['CONTACT_NUMBER'];
        $MOBILE_NUMBER = $model_data['MOBILE_NUMBER'];
        $ALT_MOBILE_NUMBER = $model_data['ALT_MOBILE_NUMBER'];

        $sql = "UPDATE `TELECOM_NUMBER` SET `AREA_CODE` = '$AREA_CODE', `CONTACT_NUMBER` = '$CONTACT_NUMBER', `MOBILE_NUMBER` = '$MOBILE_NUMBER', `ALT_MOBILE_NUMBER` = '$ALT_MOBILE_NUMBER' WHERE CONTACT_MECH_ID = '$TELECOM_MECH_ID'";
        $this->db->query($sql);
    }


    // Update User Address Info
    public function updateUserAddressInfo($model_data)
    {
        $POSTAL_MECH_ID = $model_data['POSTAL_MECH_ID'];
        $TO_NAME = $model_data['TO_NAME'];
        $ADDRESS1 = $model_data['ADDRESS1'];
        $ADDRESS2 = $model_data['ADDRESS2'];
        $CITY = $model_data['CITY'];
        $STATE = $model_data['STATE'];
        $POSTAL_CODE = $model_data['POSTAL_CODE'];

        $sql = "UPDATE `POSTAL_ADDRESS` SET `TO_NAME` = '$TO_NAME', `ADDRESS1` = '$ADDRESS1', `ADDRESS2` = '$ADDRESS2', `CITY` = '$CITY', `STATE_PROVINCE_GEO_ID` = '$STATE', `POSTAL_CODE` = '$POSTAL_CODE' WHERE CONTACT_MECH_ID = '$POSTAL_MECH_ID'";
        $this->db->query($sql);
    }


    // Update User password Info
    public function updateUserPasswordInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];
        $NEW_PASSWORD = $model_data['NEW_PASSWORD'];
        $PASSWORD = password_hash($NEW_PASSWORD, PASSWORD_DEFAULT) . "\n";

        $sql = "UPDATE `USER_LOGIN` SET `CURRENT_PASSWORD` = '$PASSWORD' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }


    // Update User Profile Picture Info
    public function updateUserPictureInfo($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];
        $PROFILE_IMG = $model_data['PROFILE_IMG'];

        $sql = "UPDATE `PERSON` SET `PERSON_IMAGE_URL` = '$PROFILE_IMG' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }


    // Update About Us 
    public function updateWebAboutUs($model_data)
    {
        $ABOUT_US_ID = $model_data['ID'];
        $TITLE = $model_data['TITLE'];
        $DESCRIPTION = $model_data['DESCRIPTION'];

        if (empty($ABOUT_US_ID))
            $sql = "INSERT INTO `ABOUT_US`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else
            $sql = "UPDATE `ABOUT_US` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE ABOUT_US_ID = '$ABOUT_US_ID'";

        $this->db->query($sql);
        return true;
    }


    // Update Privacy Policy
    public function updateWebPrivacyPolicy($model_data)
    {
        $PRIVACY_POLICY_ID = $model_data['ID'];
        $TITLE = $model_data['TITLE'];
        $DESCRIPTION = $model_data['DESCRIPTION'];

        if (empty($PRIVACY_POLICY_ID))
            $sql = "INSERT INTO `PRIVACY_POLICY`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else
            $sql = "UPDATE `PRIVACY_POLICY` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE PRIVACY_POLICY_ID = '$PRIVACY_POLICY_ID'";

        $this->db->query($sql);
        return true;
    }


    // Update Terms and conditions
    public function updateWebTermCondition($model_data)
    {
        $TERM_CONDITION_ID = $model_data['ID'];
        $TITLE = $model_data['TITLE'];
        $DESCRIPTION = $model_data['DESCRIPTION'];

        if (empty($TERM_CONDITION_ID))
            $sql = "INSERT INTO `TERM_CONDITION`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else
            $sql = "UPDATE `TERM_CONDITION` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE TERM_CONDITION_ID = '$TERM_CONDITION_ID'";

        $this->db->query($sql);
        return true;
    }

    // Update Faq's
    public function updateWebFaqs($model_data)
    {
        $FAQ_ID = $model_data['ID'];
        $QUESTION = $model_data['TITLE'];
        $ANSWER = $model_data['DESCRIPTION'];

        if (empty($FAQ_ID))
            $sql = "INSERT INTO `FAQS`(`QUESTION`,`ANSWER`) VALUES('$QUESTION','$ANSWER')";
        else
            $sql = "UPDATE `FAQS` SET `QUESTION` = '$QUESTION', `ANSWER` = '$ANSWER' WHERE FAQ_ID = '$FAQ_ID'";

        $this->db->query($sql);
        return true;
    }

    // Update Faq's Status
    public function updateFaqStatus($model_data, $status)
    {
        $FAQ_ID = $model_data['FAQ_ID'];

        if ($status == "Enable") {
            $sql = "UPDATE `FAQS` SET `STATUS` = '1' WHERE FAQ_ID = '$FAQ_ID'";
            $this->db->query($sql);
        }
        else {
            $sql = "UPDATE `FAQS` SET `STATUS` = '0' WHERE FAQ_ID = '$FAQ_ID'";
            $this->db->query($sql);
        }
        return true;
    }

    //vehicle type data inline editing
    public function updateVehicleTypeInline($model_data) {
        $columns = array(
            0 => 'VEHICLE_TYPE_NAME', 
            1 => 'MIN_WEIGHT_CAPACITY',
            2 => 'MAX_WEIGHT_CAPACITY',
            3 => 'ITEM_HEIGHT',
            4 => 'ITEM_WIDTH',
            5 => 'ITEM_LENGTH',
            6 => 'BASE_FARE',
            7 => 'WORKING_REGION',
            8 => 'LOAD_UNLOAD_OVERTIME_CHARGE',
            9 => 'LANDFILLS_CHARGE',
            10 => 'CONSTRUCTION_CHARGE',
            11 => 'NIGHT_CHARGE',
            12 => 'MIDNIGHT_FEE',
            13 => 'SUNDAY_PH_CHARGE',
            14 => 'OWNER_PAYABLE',
            15 => 'ONG_CHARGE',
            16 => 'OVERTIME_CHARGE',
            17 => 'PARKING_FEE'
        );

        $colVal = '';
        $colIndex = $rowId = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowId = $model_data['id'];
            }
          
            $sql = "UPDATE VEHICLE_TYPE SET ".$columns[$colIndex]." = '".$colVal."' WHERE VEHICLE_TYPE_ID='".$rowId."'";

            $this->db->query($sql);
            return true;
        }
        return false;
    }

    //vehicle data inline editing
    public function updateVehicleInline($model_data) {
        $columns = array(
            0 => 'PARTY_ID', 
            1 => 'VEHICLE_TYPE_ID',
            2 => 'REGISTRATION_NO',
            3 => 'PERMIT',
            4 => 'VEHICLE_STATUS',
            5 => 'IS_DELETED',
        );

        $colVal = '';
        $colIndex = $rowId = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowId = $model_data['id'];
            }

            $sql = "UPDATE VEHICLE SET ".$columns[$colIndex]." = '".$colVal."' WHERE VEHICLE_ID='".$rowId."'";

            $this->db->query($sql);
            return true;
        }
        return false;
    }

    //Driver data inline editing
    public function updateDriverInline($model_data) {
        $columns = array(
            4 => 'STATUS_ID',
            5 => 'IS_DELETED',
        );

        $colVal = '';
        $colIndex = $rowId = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal = $model_data['val'];
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowId = $model_data['id'];
            }

            $sql = "UPDATE PARTY SET ".$columns[$colIndex]." = '".$colVal."' WHERE PARTY_ID='".$rowId."'";

            $this->db->query($sql);
            return true;
        }
        return false;
    }


















    // =============================== Delete Party Methods ===============================

    // Delete Party Info
    public function partyDelete($model_data)
    {
        $PARTY_ID = $model_data['PARTY_ID'];

        $partyEmailMechId = $this->getPartyContactInfo($model_data, 'EMAIL')->CONTACT_MECH_ID;
        if (!empty($partyEmailMechId)) {
            $sql1 = "DELETE FROM CONTACT_MECH WHERE CONTACT_MECH_ID = $partyEmailMechId";
            $this->db->query($sql1);
        }

        $partyTelecomMechId = $this->getPartyContactInfo($model_data, 'TELECOM')->CONTACT_MECH_ID;
        if (!empty($partyTelecomMechId)) {
            $sql2 = "DELETE FROM TELECOM_NUMBER WHERE CONTACT_MECH_ID = $partyTelecomMechId";
            $this->db->query($sql2);
        }

        $partyAddressMechId = $this->getPartyContactInfo($model_data, 'ADDRESS')->CONTACT_MECH_ID;
        if (!empty($partyAddressMechId)) {
            $sql3 = "DELETE FROM POSTAL_ADDRESS WHERE CONTACT_MECH_ID = $partyAddressMechId";
            $this->db->query($sql3);
        }

        $sql = "DELETE FROM PARTY_CONTACT_MECH WHERE PARTY_ID = $PARTY_ID";
        $this->db->query($sql);

        $sql = "DELETE FROM USER_LOGIN WHERE PARTY_ID = $PARTY_ID";
        $this->db->query($sql);

        $sql = "DELETE FROM PARTY WHERE PARTY_ID = $PARTY_ID";
        $this->db->query($sql);
    }

    // Delete Faq Info
    public function faqDelete($model_data)
    {
        $FAQ_ID = $model_data['FAQ_ID'];

        $sql = "DELETE FROM FAQS WHERE FAQ_ID = $FAQ_ID";
        $this->db->query($sql);
    }


}