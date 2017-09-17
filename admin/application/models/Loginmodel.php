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
        $this->db->from('user_login');
        $this->db->join('party', 'party.party_id = user_login.party_id');
        $this->db->where('user_login_id', $username);
        $result = $this->db->get();

        $numrows = $result->num_rows();

        if ($numrows == 1) {
            $row = $result->row();
            if (password_verify($password, $row->current_password)) {
                return $row;
            } else {
                return 0;
            }
        } else {
            return "NO_USER_FOUND";
        }
    }

}
