<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends CI_Controller {

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

	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		if(!$_SESSION["level_id"])
		{
			$_SESSION["level_id"] = 1;
			redirect('engine/designer');
		}
		$data["content"] = "designer/index";
    $this->load->view("parser_content",$data);
	}
	public function openPage()
	{
		$url = $this->uri->segment("4");
		if($url)
		{
			$this->load->view($url);
		}
	}
	public function tes()
	{
		echo json_encode($this->db->get("status")->result_array());
	}
	public function save()
	{
		$rows = json_encode($_POST);
		write_file("application/modules/engine/views/designer/level/config.json",$rows);
	}
	public function getComponentSource()
	{
		if($this->input->post("id"))
		{
			$id = $this->input->post("id");
			$this->db->select("source");
			$this->db->where("id",$id);
			$result = $this->db->get("uicomponents")->last_row();
			echo $result->source;
		}
	}
	public function getUICode()
	{
		//$string = read_file('academic/dashboard/');
		//$string = read_file('application/modules/academic/views/dashboard/index.php');
		if($this->input->post("url"))
		{
			$slug = $this->input->post("url");
			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = implode("/",$file_name)."index.UID.php";
			$location = $folder."/views/".$file_name;
			//$string = $this->load->view($file,array(),TRUE);
			$string = read_file($location);
			$string = str_replace("{current_url}","<?=current_url()?>",$string);
			$string = str_replace("{site_url}","<?=site_url()?>",$string);
			$string = str_replace("{base_url}","<?=base_url()?>",$string);
			echo $string;
		}
	}
	public function getControllerCode()
	{
		if($this->input->post("url"))
		{
			$slug = $this->input->post("url");
			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = ucfirst($url[1]).".php";
			$location = $folder."/controllers/".$file_name;
			//$string = $this->load->view($file,array(),TRUE);
			$string = read_file($location);
			echo $string;
		}
	}
	public function getModelCode()
	{
		if($this->input->post("url"))
		{
			$slug = $this->input->post("url");
			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = "M_".ucfirst($url[1]).".php";
			$location = $folder."/models/".$file_name;
			//$string = $this->load->view($file,array(),TRUE);
			$string = read_file($location);
			echo $string;
		}
	}
	public function getUIDesigner()
	{
		//$slug = $this->input->post("url");
		//$slug = str_replace(site_url()."/","",$this->input->post("url"));
		$slug = $this->input->get("slug");
		$slug = str_replace(site_url()."/","",$slug);

		if($slug=="dashboard/signin")
		{
			$source = $this->load->view("signin",array(),TRUE);
		}
		else{
			$slug = $slug."index.UID.php";
			$data["content"] = $this->load->view($slug,array(),TRUE);
			$data["content"] = str_replace("<?=","<?=",$data["content"]);
			$source = $this->load->view("parser_content_temp",$data,TRUE);
		}

		echo $source;
	}
	public function saveUICode()
	{
		if($this->input->post("url"))
		{
			$source = $this->input->post("source");
			$slug = $this->input->post("url");

			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$newURL = $url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = implode("/",$file_name);
			$location = $folder."/views/".$file_name."index.UID.php";
			$location2 = $folder."/views/".$file_name."index.php";

			$source = str_replace(base_url()."/".$newURL,"<?=current_url()?>",$source);
			$source = str_replace(site_url(),"<?=site_url()?>",$source);
			$source = str_replace(base_url(),"<?=base_url()?>",$source);

			write_file($location,$source);
			write_file($location2,$source);
		}

	}
	public function saveControllerCode()
	{
		if($this->input->post("url"))
		{
			$source = $this->input->post("source");
			$slug = $this->input->post("url");
			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = ucfirst($url[1]).".php";
			$location = $folder."/controllers/".$file_name;
			write_file($location,$source);
		}

	}
	public function saveModelCode()
	{
		if($this->input->post("url"))
		{
			$source = $this->input->post("source");
			$slug = $this->input->post("url");
			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = "M_".ucfirst($url[1]).".php";
			$location = $folder."/models/".$file_name;
			write_file($location,$source);
		}

	}
	public function saveUIDesigner()
	{
		if($this->input->post("url"))
		{
			$source = $this->input->post("source");
			$slug = $this->input->post("url");

			$slug = str_replace(site_url()."/","",$slug);

			$this->db->select("url");
			$this->db->where("slug",$slug);
			$url = $this->db->get("module")->last_row();
			$module_url = $url = $url->url;
			$url = explode("/",$url);
			$folder = 'application/modules/'.$url[0];
			$file_name = array();
			for($x=1;$x<count($url);$x++)
			{
				$file_name[] = $url[$x];
			}
			$file_name = implode("/",$file_name);

			$location = $folder."/views/".$file_name."index.UID.php";
			$location2 = $folder."/views/".$file_name."index.php";
			write_file($location,$source);
			$parser["current_url"] = "<?=current_url()?>";
			$parser["base_url"] = "<?=base_url()?>";
			$parser["site_url"] = "<?=site_url()?>";
			$UID = $this->parser->parse($module_url."index.UID.php", $parser, TRUE);

			$UID = str_replace(base_url()."/".module_url,"<?=current_url()?>",$UID);
			$UID = str_replace(site_url(),"<?=site_url()?>",$UID);
			$UID = str_replace(base_url(),"<?=base_url()?>",$UID);
	   	write_file($location2,$UID);

		}
	}
}
