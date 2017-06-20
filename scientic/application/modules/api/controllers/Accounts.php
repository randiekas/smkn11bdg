<?php
require(APPPATH.'/libraries/api/REST_Controller.php');
class Accounts extends REST_Controller {
	/*
    function user_get()
    {
        $data = array('returned: ada'. $this->get('id')." s ".$this->get('ids'));
        $this->response($data);
    }
    */ 
    function signin_post()
    {       
		$result = $this->db->query("call mobile_accounts('".$this->post('nip')."','".$this->post('password')."','".$this->post('imei')."')")->last_row();
		$this->response($result);
    }	
}