<?php

Class Loginmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // function verify login credentials
    public function verify_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('USER_LOGIN');
        $this->db->where('USER_LOGIN_ID', $username);
        $result = $this->db->get();

        $numrows = $result->num_rows();

        if ($numrows == 1) {
            $row = $result->row();
            if (password_verify($password, $row->CURRENT_PASSWORD)) {
                return $row;
            } else {
                return 0;
            }
        } else {
            return "NO_USER_FOUND";
        }
    }

}
