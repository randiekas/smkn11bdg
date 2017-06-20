<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		 $this->clear_cache();
	 }
	 /**
		* get setting table from json
		*
		*
		*
		* @return Response Json
		*/
	function clear_cache()
    {
		
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
		
    }
	public function index()
 	{
		if($this->session->userdata("level_id"))
		{
			$this->load->view("dashboard");
		}
		else{
			redirect("dashboard/signin");
		}
 	}
	public function welcome()
	{
		if($this->session->userdata("level_id"))
		{
			$data["content"] = "welcome";
			$this->load->view("parser_content",$data);
		}
		else{
			redirect("dashboard/signin");
		}
	}
	public function signin()
	{
		$this->load->view("signin");
	}
	public function signout()
	{
		$this->clear_cache();
		session_destroy();
		unset($_SESSION['level_id']);
		$this->session->sess_destroy();
		redirect("dashboard/signin");
	}
	public function setting()
	{
		$data["content"] = "setting";
		$this->load->view("parser_content",$data);
	}
	public function getProfile()
	{
		$this->db->where("id",$this->session->userdata("entity_id"));
		$response = $this->db->get("dosen")->last_row();
        $this->M_API->JSON($response);
	}
	public function saveProfile()
	{
		$response["status"] = "success";
		$response["message"] = "Save Successfully";
		$update = array();
		  foreach($_POST as $key=>$val)
		  {
			$update[$key] = $this->input->post($key);
		  }

		  if($_POST["id"]!="")
		  {
			$this->db->where("id",$_POST["id"]);
			$this->db->update("dosen",$update);
		  }
		  $this->M_API->JSON($response);
	}
	public function getKota()
	{
		if($this->input->post("kode_propinsi"))
		{
			$kode_kota = ($this->input->post("kode_kota"))?$this->input->post("kode_kota"):"00";
			$this->db->select("lokasi_kabupatenkota,lokasi_nama");
			$this->db->where("lokasi_propinsi",$this->input->post("kode_propinsi"));
			$this->db->where("lokasi_kecamatan","00");
			foreach($this->db->get("inf_lokasi")->result() as $row)
			{
				?>
				<option value="<?=$row->lokasi_kabupatenkota?>" <?=($row->lokasi_kabupatenkota==$kode_kota)?"selected":""?>><?=$row->lokasi_nama?></option>
				<?php
			}

		}
	}
	public function saveImageProfile()
	{
		$response["status"] = "success";
		$response["message"] = "Save Successfully";

		 $config['file_name']          = $_POST["nip"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/dosen/';
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 100;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;

		 $this->load->library('upload', $config);
		 if($_FILES["Image"]["name"]!="")
		 {
			 if ($this->upload->do_upload("Image"))
			 {
				 	$data = $this->upload->data();
				 	//$this->model->setImage();
					$response["status"] = "success";
					$response["message"] = "Change Image Successfully";
			 }
			 else
			 {
				 $response["status"] = "error";
				 $response["message"] = $this->upload->display_errors();
			 }
			}
		$this->M_API->JSON($response);
	}
	public function saveChangePassword()
	{
		$this->db->where("id",$this->session->userdata("id"));
		$this->db->update("user",array("password"=>md5($this->input->post("newPassword"))));
		$response["status"] = "success";
		$response["message"] = "Password  telah berhasil diubah";
		$this->M_API->JSON($response);
	}
	public function proccess_signin()
	{

		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));

		$this->load->model("m_user");
		$result = $this->m_user->signin($username,$password);
		if($result["status"]=="success")
		{
			$session["username"] = $username;
			$session["level_id"] = $result["level_id"];
			$session["entity_id"] = $result["entity_id"];
			$session["id"] = $result["id"];
			$session["password"] = $this->input->post("password");
			$this->session->set_userdata($session);
		}
		$this->M_API->JSON($result);
	}
  public function list_module()
  {
	  if($this->session->userdata("level_id"))
		{
			$data["content"] = "dashboard_list_module";
			$this->load->view("parser_content",$data);
		}
  }
	function openTransaction()
	{
		$this->db->where("sort_number",$this->input->post("transaction_codes"));
		$this->db->select("slug");
		$response = $this->db->get("module")->last_row();
		$this->M_API->JSON($response);
        //$this->output->set_content_type('application/json');
	}
}
