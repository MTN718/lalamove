<?php

Class Homemodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get login profile details
    public function getProfileInfo($model_data) {
        // $this->db->select('*');
        // $this->db->from('users');
        // $this->db->where('user_id', $model_data['user_id'] );
        // $query = $this->db->get();
        // if ( $query->num_rows() > 0 )
        // {
        //     $row = $query->row_array();
        //     return $row;
        // }
    }

}
