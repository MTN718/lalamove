<?php

Class Businessmodel extends CI_Model
{   
    public $userInfo = null;
    public $login_party_id = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->userInfo = $this->session->login_data;
        $this->login_party_id = $this->userInfo->party_id;
    }

    // ==============================================Get Data Methods==============================================

    // get bidding order list 
    public function getBiddingOrderList() {
        $this->db->select('*');
        $this->db->from('order_move');
        $this->db->where('order_status_id', 'bidding');
        return $this->db->get()->result();
    }

    // get bidding order list 
    public function getBiddingOrderData($order_id="") {
        $this->db->select('*');
        $this->db->from('order_bidding');
        $this->db->where('order_id', $order_id);
        return $this->db->get()->row();
    }


    //order inline Update
    public function orderBiddingUpdate($model_data="") {
        $columns = array(
            0 => 'promo_code',
        );

        $colVal = '';
        $colIndex = $rowid = $party_id = 0;
         
        if(isset($model_data)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['party_id']) && $model_data['party_id'] >= 0) {
              $party_id = $model_data['party_id'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            $order_data1 = array(
                'order_id' => $rowid,
            );            
            $order_data = $this->adminmodel->getorderInfoForInvoice($order_data1);
            $party_name = $this->adminmodel->getpartyNameInfoByParty($party_id);


            $this->adminmodel->addpartynNotification($this->login_party_id, "order", "Apply for order #00" .$order_data->order_id);

            $this->adminmodel->addPartyMail($party_name->party_id, '1', "Applyed bid for order #00".$order_data->order_id." by Business owner ".$party_name->first_name." ".$party_name->last_name);

            $sql = "INSERT INTO `order_bidding`(`order_id`,`party_id`,`bid_amount`) VALUES('$rowid','$party_id','$colVal')";
            $this->db->query($sql);


            return true;
        }
        return false;
    }





}