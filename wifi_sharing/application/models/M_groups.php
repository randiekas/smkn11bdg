<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_groups extends CI_Model {
	public function myGroups()
	{
		$this->db->where("id_profile",$this->session->userdata('id'));
		return $this->db->get("v_groups_members");
	}
}