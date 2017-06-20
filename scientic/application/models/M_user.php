<?php
class m_user extends CI_Model{
  function signin($username,$password)
  {
    $result = array();
    $this->db->where("username",$username);
		$this->db->where("password",$password);

    $cek = $this->db->get("user");
    if($cek->num_rows()==0)
    {
      $result["status"] = "error";
      $result["message"] = "User not Found";
    }
    else{
      $result["status"] = "success";
      $result["message"] = "success";
      $user = $cek->last_row();
      $this->db->where("user_id",$user->id);
      $row = $this->db->get("user_level")->last_row();
      $result["level_id"] = $row->level_id;
	  $result["id"] = $user->id;
	  $result["entity_id"] = $user->entity_id;
    }
    return $result;
  }
}
