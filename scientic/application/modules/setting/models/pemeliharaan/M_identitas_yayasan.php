<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Identitas_yayasan extends CI_Model{
  /**
	 * Get resource in storage.
	 *
	 * @return Response Json
	 */
   public $table = "yayasan";
   public function getIdentity()
   {
     $response = $this->db->get($this->table)->last_row();
     $this->M_API->JSON($response);
   }
   public function save()
   {
      $update = array();
   		foreach($_POST as $key=>$val)
   		{
   			$update[$key] = $this->input->post($key);
   		}
   		$this->db->update($this->table,$update);
   }
   public function setImage()
   {
     $update["logo"] = "logo.png";
     return $this->db->update($this->table,$update);
   }
}
