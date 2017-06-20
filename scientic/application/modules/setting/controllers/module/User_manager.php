<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manager extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("module/M_user_manager","model");
		 $this->load->model("module/M_module","module");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "module/user_manager/index";
    $this->load->view("parser_content",$data);
	}
	public function getLevel()
	{
		
		$result = $this->db->get("level")->result();
		$this->M_API->JSON($result);
	}
	public function deletelevel()
	{
		$this->db->where("id",$this->input->post("id"));
		$this->db->delete("level");
		$result["status"] = "success";
		$result["message"] = "Level telah berhasil dihapus";
		$this->M_API->JSON($result);
	}
	public function saveLevel()
	{
		$data["code"] = $this->input->post("code");
		$data["name"] = $this->input->post("name");
		$this->db->insert("level",$data);
		$result["status"] = "success";
		$result["message"] = "Level telah berhasil ditambahkan";
		$this->M_API->JSON($result);
	}
	public function updateLevel()
	{
		$data["code"] = $this->input->post("code");
		$data["name"] = $this->input->post("name");
		$data["na"] = $this->input->post("na");
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("level",$data);
		$result["status"] = "success";
		$result["message"] = "Level telah berhasil diupdate";
		$this->M_API->JSON($result);
	}
	//user
	public function deleteUser()
	{
		$this->db->where("id",$this->input->post("id"));
		$this->db->delete("user");
		
		$this->db->where("user_id",$this->input->post("id"));
		$this->db->delete("user_level");
		$result["status"] = "success";
		$result["message"] = "user telah berhasil dihapus";
		$this->M_API->JSON($result);
	}
	public function saveUser()
	{
		$data["username"] = $this->input->post("username");
		$data["password"] = md5($this->input->post("password"));
		$data["entity_id"] = $this->input->post("entity_id");
		$data["level"] = $this->input->post("level");
		$data["lock"] = 0;
		
		if($this->db->insert("user",$data))
		{
			$data2["level_id"] = $data["level"];
			$data2["user_id"] = $this->db->insert_id();
			$data2["na"] = "A";
			$this->db->insert("user_level",$data2);
		}
		
		$result["status"] = "success";
		$result["message"] = "Level telah berhasil ditambahkan";
		$this->M_API->JSON($result);
	}
	public function loadPegawai()
	{
		$this->db->where("id",null);
		foreach($this->db->get("v_pegawai")->result() as $row)
		{
		?>
		<option value="<?=$row->nip?>"><?=$row->nip." - ".$row->nama?></option>
		<?php
		}						
	}
	public function updateUser()
	{
		$data["username"] = $this->input->post("username");
		$data["password"] = $this->input->post("password");
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("user",$data);
		$result["status"] = "success";
		$result["message"] = "User telah berhasil diupdate";
		$this->M_API->JSON($result);
	}
	// end user
	public function getModule()
	{
		
		if($this->input->get("level_id")!="")
		{
			$level_id = $this->input->get("level_id");
			$result = $this->db->query("CALL module_previlages('".$level_id."')")->result();
		}else{
			$result = array();
		}
		$this->M_API->JSON($result);
	}
	public function getUser()
	{
		$level_id = $this->input->get("level_id");
		$this->db->where("level",$level_id);
		
		$result = $this->db->get("user")->result();
		$this->M_API->JSON($result);
	}
	public function updateModule()
	{
		$id = $this->input->post("module_level_id");
		$level = $this->input->post("level_id");
		$module_id = $this->input->post("id");
		$update = $this->input->post("update");
		$view = $this->input->post("view");
		$cek = $this->db->query("CALL `ins_module_level`(2,'".$id."','".$level."','".$module_id."',".$view.",".$update.",'A','".$this->session->userdata("user_id")."');");
		//echo "CALL `ins_module_level`(2,".$id.",".$level.",".$module_id.",".$view.",".$update.",'A','".$this->session->userdata("user_id")."');";
		
		
		$this->module->createKeyJson();
		$result["status"] = "success";
		$result["message"] = "success";
		$this->M_API->JSON($result);
		
	}
}
