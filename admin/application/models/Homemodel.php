<?php

Class Homemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // ==============================================get Data Methods==============================================

    // get user Name details
    public function getPartyUserNameInfo($model_data) {
        $PARTY_ID = $model_data['PARTY_ID'];

        $this->db->select('*');
        $this->db->from('USER_LOGIN');
        $this->db->where('PARTY_ID', $PARTY_ID);
        return $this->db->get()->row();
    }

    // get user Name details
    public function getPartyNameInfo($model_data) {
        $PARTY_ID = $model_data['PARTY_ID'];

        $this->db->select('*');
        $this->db->from('PARTY');
        $this->db->join('PERSON','PERSON.PARTY_ID = PARTY.PARTY_ID');
        $this->db->where('PARTY.PARTY_ID', $PARTY_ID);
        return $this->db->get()->row();
    }

    // get user contact details
    public function getPartyContactInfo($model_data, $contactInfoType="") {
        $PARTY_ID = $model_data['PARTY_ID'];

        if($contactInfoType == "EMAIL") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'EMAIL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }

        if($contactInfoType == "ADDRESS") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('POSTAL_ADDRESS','POSTAL_ADDRESS.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'POSTAL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }

        if($contactInfoType == "TELECOM") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('TELECOM_NUMBER','TELECOM_NUMBER.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'TELECOM_NUMBER');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $PARTY_ID);
            return $this->db->get()->row();
        }
    }

    // get Customer List details
    public function getPartyList($party_type_id="") {

        $this->db->select('*');
        $this->db->from('PARTY');
        $this->db->join('PERSON','PERSON.PARTY_ID = PARTY.PARTY_ID');
        $this->db->join('USER_LOGIN','USER_LOGIN.PARTY_ID = PARTY.PARTY_ID');
        $this->db->where('PARTY.PARTY_TYPE_ID', $party_type_id);
        return $this->db->get()->result();
    }

    // get WEb Abourt Us
    public function getAboutUs() {

        $this->db->select('*');
        $this->db->from('ABOUT_US');
        return $this->db->get()->row();
    }

    // get web Term and Condition
    public function getTermCondition() {

        $this->db->select('*');
        $this->db->from('TERM_CONDITION');
        return $this->db->get()->row();
    }

    // get web Privacy Policy
    public function getPrivacyPolicy() {

        $this->db->select('*');
        $this->db->from('PRIVACY_POLICY');
        return $this->db->get()->row();
    }

    // get web Faqs List
    public function getFaqsList() {

        $this->db->select('*');
        $this->db->from('FAQS');
        return $this->db->get()->result();
    }














    // ================================================Add Data Methods================================================

    // Add New Party
    public function addPartyId($PARTY_TYPE_ID) {
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
    public function addPartyContactMechId($PARTY_ID, $CONTACT_MECH_TYPE_ID) {
        $sql = "INSERT INTO `CONTACT_MECH`(`CONTACT_MECH_TYPE_ID`) VALUES('$CONTACT_MECH_TYPE_ID')";
        $this->db->query($sql);
        $CONTACT_MECH_ID = $this->db->insert_id();   

        $sql2 = "INSERT INTO `PARTY_CONTACT_MECH`(`PARTY_ID`,`CONTACT_MECH_ID`) VALUES('$PARTY_ID','$CONTACT_MECH_ID')";
        $this->db->query($sql2);  

        if($CONTACT_MECH_TYPE_ID == 'TELECOM_NUMBER') {            
            $sql3 = "INSERT INTO `TELECOM_NUMBER`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3); 
        }

        if($CONTACT_MECH_TYPE_ID == 'POSTAL_ADDRESS') {            
            $sql3 = "INSERT INTO `POSTAL_ADDRESS`(`CONTACT_MECH_ID`) VALUES('$CONTACT_MECH_ID')";
            $this->db->query($sql3); 
        }
        return $CONTACT_MECH_ID;
    }

















    // =================================== Update Data Methodsn =========================================

    // Update UserName Info
    public function updateUserNameInfo($model_data) {
        $PARTY_ID           = $model_data['PARTY_ID'];
        $USER_LOGIN_ID      = $model_data['USER_LOGIN_ID'];
        $CURRENT_PASSWORD   = $model_data['CURRENT_PASSWORD'];
        $PASSWORD           = password_hash($CURRENT_PASSWORD, PASSWORD_DEFAULT)."\n";

        if(empty($CURRENT_PASSWORD))
            $sql = "UPDATE `USER_LOGIN` SET `USER_LOGIN_ID` = '$USER_LOGIN_ID' WHERE PARTY_ID = '$PARTY_ID'";
        else
            $sql = "UPDATE `USER_LOGIN` SET `USER_LOGIN_ID` = '$USER_LOGIN_ID', `CURRENT_PASSWORD` = '$PASSWORD' WHERE PARTY_ID = '$PARTY_ID'";

        $this->db->query($sql);
    }

    // Update User Basic Info
    public function updateUserBasicInfo($model_data) {
        $PARTY_ID           = $model_data['PARTY_ID'];
        $SALUTATION         = $model_data['SALUTATION'];
        $FIRST_NAME         = $model_data['FIRST_NAME'];
        $LAST_NAME          = $model_data['LAST_NAME'];
        $GENDER             = $model_data['GENDER'];
        $BIRTH_DATE         = $model_data['BIRTH_DATE'];
        $OCCUPATION         = $model_data['OCCUPATION'];

        $sql = "UPDATE `PERSON` SET `SALUTATION` = '$SALUTATION', `FIRST_NAME` = '$FIRST_NAME', `LAST_NAME` = '$LAST_NAME', `GENDER` = '$GENDER', `BIRTH_DATE` = '$BIRTH_DATE', `OCCUPATION` = '$OCCUPATION' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }

    // Update User Email Info
    public function updateUserEmailInfo($model_data) {
        $EMAIL_MECH_ID      = $model_data['EMAIL_MECH_ID'];
        $INFO_STRING        = $model_data['INFO_STRING'];

        $sql = "UPDATE `CONTACT_MECH` SET `INFO_STRING`= '$INFO_STRING' WHERE CONTACT_MECH_ID = '$EMAIL_MECH_ID'";
        $this->db->query($sql);
    }

    // Update User Contact Info
    public function updateUserContactInfo($model_data) {
        $TELECOM_MECH_ID    = $model_data['TELECOM_MECH_ID'];
        $AREA_CODE          = $model_data['AREA_CODE'];
        $CONTACT_NUMBER     = $model_data['CONTACT_NUMBER'];
        $MOBILE_NUMBER      = $model_data['MOBILE_NUMBER'];
        $ALT_MOBILE_NUMBER  = $model_data['ALT_MOBILE_NUMBER'];

        $sql = "UPDATE `TELECOM_NUMBER` SET `AREA_CODE` = '$AREA_CODE', `CONTACT_NUMBER` = '$CONTACT_NUMBER', `MOBILE_NUMBER` = '$MOBILE_NUMBER', `ALT_MOBILE_NUMBER` = '$ALT_MOBILE_NUMBER' WHERE CONTACT_MECH_ID = '$TELECOM_MECH_ID'";
        $this->db->query($sql);
    }

    // Update User Address Info
    public function updateUserAddressInfo($model_data) {
        $POSTAL_MECH_ID     = $model_data['POSTAL_MECH_ID'];
        $TO_NAME            = $model_data['TO_NAME'];
        $ADDRESS1           = $model_data['ADDRESS1'];
        $ADDRESS2           = $model_data['ADDRESS2'];
        $CITY               = $model_data['CITY'];
        $STATE              = $model_data['STATE'];
        $POSTAL_CODE        = $model_data['POSTAL_CODE'];

        $sql = "UPDATE `POSTAL_ADDRESS` SET `TO_NAME` = '$TO_NAME', `ADDRESS1` = '$ADDRESS1', `ADDRESS2` = '$ADDRESS2', `CITY` = '$CITY', `STATE_PROVINCE_GEO_ID` = '$STATE', `POSTAL_CODE` = '$POSTAL_CODE' WHERE CONTACT_MECH_ID = '$POSTAL_MECH_ID'";
        $this->db->query($sql);
    }

    // Update User password Info
    public function updateUserPasswordInfo($model_data) {
        $PARTY_ID           = $model_data['PARTY_ID'];
        $NEW_PASSWORD       = $model_data['NEW_PASSWORD'];
        $PASSWORD           = password_hash($NEW_PASSWORD, PASSWORD_DEFAULT)."\n";

        $sql = "UPDATE `USER_LOGIN` SET `CURRENT_PASSWORD` = '$PASSWORD' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }

    // Update User Profile Picture Info
    public function updateUserPictureInfo($model_data) {
        $PARTY_ID           = $model_data['PARTY_ID'];
        $PROFILE_IMG        = $model_data['PROFILE_IMG'];

        $sql = "UPDATE `PERSON` SET `PERSON_IMAGE_URL` = '$PROFILE_IMG' WHERE PARTY_ID = '$PARTY_ID'";
        $this->db->query($sql);
    }

    // Update About Us 
    public function updateWebAboutUs($model_data) {
        $ABOUT_US_ID        = $model_data['ID'];
        $TITLE              = $model_data['TITLE'];
        $DESCRIPTION        = $model_data['DESCRIPTION'];

        if(empty($ABOUT_US_ID)) 
            $sql = "INSERT INTO `ABOUT_US`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else 
            $sql = "UPDATE `ABOUT_US` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE ABOUT_US_ID = '$ABOUT_US_ID'";

        $this->db->query($sql);
        return true;
    }

    // Update Privacy Policy
    public function updateWebPrivacyPolicy($model_data) {
        $PRIVACY_POLICY_ID  = $model_data['ID'];
        $TITLE              = $model_data['TITLE'];
        $DESCRIPTION        = $model_data['DESCRIPTION'];

        if(empty($PRIVACY_POLICY_ID)) 
            $sql = "INSERT INTO `PRIVACY_POLICY`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else 
            $sql = "UPDATE `PRIVACY_POLICY` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE PRIVACY_POLICY_ID = '$PRIVACY_POLICY_ID'";

        $this->db->query($sql);
        return true;
    }

    // Update Privacy Policy
    public function updateWebTermCondition($model_data) {
        $TERM_CONDITION_ID  = $model_data['ID'];
        $TITLE              = $model_data['TITLE'];
        $DESCRIPTION        = $model_data['DESCRIPTION'];

        if(empty($TERM_CONDITION_ID)) 
            $sql = "INSERT INTO `TERM_CONDITION`(`TITLE`,`DESCRIPTION`) VALUES('$TITLE','$DESCRIPTION')";
        else 
            $sql = "UPDATE `TERM_CONDITION` SET `TITLE` = '$TITLE', `DESCRIPTION` = '$DESCRIPTION' WHERE TERM_CONDITION_ID = '$TERM_CONDITION_ID'";

        $this->db->query($sql);
        return true;
    }

    // Update Faq's
    public function updateWebFaqs($model_data) {
        $FAQ_ID             = $model_data['ID'];
        $QUESTION           = $model_data['TITLE'];
        $ANSWER             = $model_data['DESCRIPTION'];

        if(empty($FAQ_ID)) 
            $sql = "INSERT INTO `FAQS`(`QUESTION`,`ANSWER`) VALUES('$QUESTION','$ANSWER')";
        else
            $sql = "UPDATE `FAQS` SET `QUESTION` = '$QUESTION', `ANSWER` = '$ANSWER' WHERE FAQ_ID = '$FAQ_ID'";

        $this->db->query($sql);
        return true;
    }














    // =============================== Delete Party Methods ===============================

    // Delete Party Info
    public function partyDelete($model_data) {
        $PARTY_ID           = $model_data['PARTY_ID'];

        $partyEmailMechId = $this->getPartyContactInfo($model_data, 'EMAIL')->CONTACT_MECH_ID;
        if(!empty($partyEmailMechId)) {
            $sql1 = "DELETE FROM CONTACT_MECH WHERE CONTACT_MECH_ID = $partyEmailMechId";
            $this->db->query($sql1);
        }

        $partyTelecomMechId = $this->getPartyContactInfo($model_data, 'TELECOM')->CONTACT_MECH_ID;
        if(!empty($partyTelecomMechId)) {
            $sql2 = "DELETE FROM TELECOM_NUMBER WHERE CONTACT_MECH_ID = $partyTelecomMechId";
            $this->db->query($sql2);
        }

        $partyAddressMechId = $this->getPartyContactInfo($model_data, 'ADDRESS')->CONTACT_MECH_ID;
        if(!empty($partyAddressMechId)) {
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








}