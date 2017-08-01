<?php

Class Homemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get user Name details
    public function getPartyNameInfo($model_data) {
        $party_id = $model_data['party_id'];

        $this->db->select('*');
        $this->db->from('PARTY');
        $this->db->join('PERSON','PERSON.PARTY_ID = PARTY.PARTY_ID');
        $this->db->where('PARTY.PARTY_ID', $party_id);
        return $this->db->get()->row();
    }

    // get user contact details
    public function getPartyContactInfo($model_data, $contactInfoType="") {
        $party_id = $model_data['party_id'];

        if($contactInfoType == "EMAIL") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'EMAIL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $party_id);
            return $this->db->get()->row();
        }

        if($contactInfoType == "ADDRESS") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('POSTAL_ADDRESS','POSTAL_ADDRESS.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'POSTAL_ADDRESS');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $party_id);
            return $this->db->get()->row();
        }

        if($contactInfoType == "TELECOM") {
            $this->db->select('*');
            $this->db->from('PARTY_CONTACT_MECH');
            $this->db->join('CONTACT_MECH','CONTACT_MECH.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->join('TELECOM_NUMBER','TELECOM_NUMBER.CONTACT_MECH_ID = PARTY_CONTACT_MECH.CONTACT_MECH_ID');
            $this->db->where('CONTACT_MECH.CONTACT_MECH_TYPE_ID', 'TELECOM_NUMBER');
            $this->db->where('PARTY_CONTACT_MECH.PARTY_ID', $party_id);
            return $this->db->get()->row();
        }
    }

}