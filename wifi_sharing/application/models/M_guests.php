<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guests extends CI_Model {
	public function check()
	{
		if(!$this->session->userdata("username"))
        {
            if(!$this->session->userdata("admin"))
            {
                
                exit();
            }else{
            }
            
        }else{
            if(!$this->session->userdata("admin"))
            {
                $data["id_guest"] = $this->session->userdata("id_guest");
                $data["link"] = str_replace(site_url()."/","",str_replace("undefined","",current_url()));
                $data["created"] = date("Y-m-d H:i:s");
                $this->db->insert("visitors",$data);
            }
        }
	}
    
}