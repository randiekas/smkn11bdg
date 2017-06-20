<?php
require(APPPATH.'/libraries/api/REST_Controller.php');
class Absensi extends REST_Controller {
	/*
    function user_get()
    {
        $data = array('returned: ada'. $this->get('id')." s ".$this->get('ids'));
        $this->response($data);
    }
    */ 
    function input_post()
    {       
		$result = $this->db->query("call mobile_absensi('".$this->post('token')."','".$this->post('tipe')."')")->last_row();
		$this->response($result);
    }	
	
}