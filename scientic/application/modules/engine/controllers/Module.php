<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("M_Module","model");
	 }



	public function create_key_module()
  {
    $this->model->createKeyJson();
  }

	public function set_key()
	{
		$this->session->set_userdata(array("level_id"=>1));
	}
	public function createFolder()
	{
		$folder_name = str_replace(" ","_",$this->input->post("moduleFolder"));
		$url = strtolower($this->input->post("url"));
		$sub = $new = explode("/",$url);
		$folder = 'application/modules/'.$sub[0];


			$insert["parent_id"] = $this->input->post("parent_id");
			$insert["sort_number"] = 1;
			$insert["name"] = $this->input->post("moduleFolder");
			$insert["url"] = strtolower($this->input->post("url"));
			$insert["slug"] = strtolower($this->input->post("slug"));
			$insert["folder"] = $folder_name;
			$insert["user"] = $insert["author"] = $this->session->userdata("username");
			$insert["icon"] = $this->input->post("icon");
			$insert["na"] = ($this->input->post("na"))?"A":"N";
			$insert["module_type"] = $this->input->post("module_type");
			$insert["create_date"] = date("Y-m-d H:i:s");
			if($this->input->post("id"))
			{
				$id = $this->input->post("id");
				$this->db->select("folder");
				$this->db->where("id",$id);
				$module = $this->db->get("module")->last_row();
				if(isset($sub[2]))
				$old_folder = 'application/modules/'.$module->folder;
				rename($old_folder,$folder);
				$this->db->where("id",$id);
				$this->db->update("module",$insert);
			}
			else{


					if(isset($sub[2]))
					{

						$sub_folder = array();
						if($insert["module_type"]=="folder")
						{
							for($x=1;$x<count($sub)-1;$x++)
							{
								$sub_folder[] = $sub[$x];
							}
							$sub_folder = implode("_",$sub_folder);
							mkdir($folder."/controllers/".$sub_folder, 0777, TRUE);
							mkdir($folder."/models/".$sub_folder, 0777, TRUE);
							mkdir($folder."/views/".$sub_folder, 0777, TRUE);
						}
						else{
							for($x=1;$x<count($sub)-2;$x++)
							{
								$sub_folder[] = $sub[$x];
							}
							$sub_folder = implode("_",$sub_folder);
							$this->load->library('parser');
							$data = array(
					        'open_tag_php' => '<?php',
					        'controller_name' => ucfirst($sub[count($sub)-2]),
									'model_name' => "M_".ucfirst($sub[count($sub)-2]),
									'sub_folder' => $sub_folder,
									'module_name' => $insert["name"]

							);


							$source_controller = $this->parser->parse("module/source_controller", $data,TRUE);
							write_file($folder."/controllers/".$sub_folder."/".ucfirst($sub[count($sub)-2]).".php",$source_controller);

							$source_model = $this->parser->parse("module/source_model", $data,TRUE);
							write_file($folder."/models/".$sub_folder."/M_".ucfirst($sub[count($sub)-2]).".php",$source_model);
							mkdir($folder."/views/".$sub_folder."/".$sub[count($sub)-2], 0777, TRUE);

							$source_view = $this->parser->parse("module/source_view", $data,TRUE);
							write_file($folder."/views/".$sub_folder."/".$sub[count($sub)-2]."/index.php",$source_view);
							write_file($folder."/views/".$sub_folder."/".$sub[count($sub)-2]."/index.UID.php",$source_view);
						}
						$this->db->insert("module",$insert);
						$id = $this->db->insert_id();
						$level["level_id"] = $this->session->userdata("level_id");
						$level["module_id"] = $id;
						$level["na"] = "A";
						$level["create_date"] = date("Y-m-d");
						$level["user"] = "admin";


						$this->db->insert("module_level",$level);
					}
					else{
						if (!is_dir($folder))
						{
							mkdir($folder, 0777, TRUE);
							mkdir($folder."/controllers", 0777, TRUE);
							mkdir($folder."/models", 0777, TRUE);
							mkdir($folder."/views", 0777, TRUE);
							$this->db->insert("module",$insert);
							$id = $this->db->insert_id();
							$level["level_id"] = $this->session->userdata("level_id");
							$level["module_id"] = $id;
							$level["na"] = "A";
							$level["create_date"] = date("Y-m-d");
							$level["user"] = "admin";


							$this->db->insert("module_level",$level);
						}
						else{
							$response["status"] = "error";
							$response["message"] = "Nama Module ini sudah ada, silahkan ganti dengan nama lain";
						}
					}





			}
			$this->model->createKeyJson();

			$response["status"] = "success";
			$response["message"] = "success";





		$this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($response));

	}
	public function removeFolder()
	{
		$this->db->where("id",$this->input->post("id"));
		$module = $this->db->get("module")->last_row();

		$url = $module->url;
		$sub = $new = explode("/",$url);
		$folder = 'application/modules/'.$sub[0];


		if(isset($sub[2]))
		{
			$sub_folder = array();
			if($module->module_type=="folder")
			{
			for($x=1;$x<count($sub)-1;$x++)
			{
				$sub_folder[] = $sub[$x];
			}
			$sub_folder = implode("_",$sub_folder);

			delete_files($folder."/controllers/".$sub_folder, true);
			rmdir($folder."/controllers/".$sub_folder);
			delete_files($folder."/models/".$sub_folder, true);
			rmdir($folder."/models/".$sub_folder);
			delete_files($folder."/views/".$sub_folder, true);
			rmdir($folder."/views/".$sub_folder);
			}
			else{
				for($x=1;$x<count($sub)-2;$x++)
				{
					$sub_folder[] = $sub[$x];
				}
				$sub_folder = implode("_",$sub_folder);

				unlink($folder."/controllers/".$sub_folder."/".ucfirst($sub[count($sub)-2]).".php");
				unlink($folder."/models/".$sub_folder."/M_".ucfirst($sub[count($sub)-2]).".php");

				unlink($folder."/views/".$sub_folder."/".$sub[count($sub)-2]."/index.php");
				delete_files($folder."/views/".$sub_folder."/".$sub[count($sub)-2], true);
				rmdir($folder."/views/".$sub_folder."/".$sub[count($sub)-2]);

			}
		}
		else{
			delete_files($folder, true);
			rmdir($folder);
		}

		$this->db->where("id",$module->id);
		$this->db->delete("module");

		$this->db->where("parent_id",$module->id);
		$this->db->delete("module");

		$this->db->where("module_id",$module->id);
		$this->db->delete("module_level");

		$this->db->where("parent_id",$module->id);
		$parent = $this->db->get("module");

		foreach($parent->result() as $row)
		{
			$this->db->where("module_id",$row->id);
			$this->db->delete("module_level");
		}


		$response["status"] = "success";
		$response["message"] = "success";


		$this->model->createKeyJson();


		$this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($response));
	}
	public function getDataEdit()
	{

		if($this->input->post("id"))
		{
			$id = $this->input->post("id");
			$this->db->where("id",$id);
			$row = $this->db->get("module")->last_row();
			$data["id"] = $row->id;
			$data["parent_id"] = $row->parent_id;
			$data["name"] = $row->name;
			$data["url"] = $row->url;
			$data["slug"] = $row->slug;
			$data["folder"] = $row->folder;
			$data["na"] = $row->na;
			$data["module_type"] = $row->module_type;
			$response["status"] = "success";
			$response["message"] = $data;
		}
		else{
			$response["status"] = "erros";
			$response["message"] = "Module Not Found";
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}

	public function getParent()
	{

		if($this->input->post("id"))
		{
			$id = $this->input->post("id");
			$this->db->where("id",$id);
			$row = $this->db->get("module")->last_row();
			$data["id"] = $row->id;
			$data["parent_id"] = $row->parent_id;
			$data["name"] = $row->name;
			$data["url"] = $row->url;
			$data["slug"] = $row->slug;
			$data["folder"] = $row->folder;
			$data["na"] = $row->na;
			$data["module_type"] = $row->module_type;
			$response["status"] = "success";
			$response["message"] = $data;
		}
		else{
			$response["status"] = "erros";
			$response["message"] = "Module Not Found";
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
	public function tes($table)
	{
		$Q = $this->db->query("desc ".$table);
		foreach($Q->result() as $row)
		{
			echo '{ "name": "'.$row->Field.'"},<br>';
		}
	}
	public function tes2($table)
	{
		$Q = $this->db->query("desc ".$table);
		foreach($Q->result() as $row)
		{
			echo '{ text: "'.$row->Field.'", datafield: "'.$row->Field.'",width: "50px" },<br>';
		}

	}
    public function tes3($table)
	{
		$Q = $this->db->query("desc ".$table);
		foreach($Q->result() as $row)
		{
			echo '{ label: "'.$row->Field.'", value: "'.$row->Field.'", checked: false },<br>';
			
		}

	}
}
