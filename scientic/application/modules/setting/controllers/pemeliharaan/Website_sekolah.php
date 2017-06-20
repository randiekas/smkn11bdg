<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_sekolah extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pemeliharaan/website_sekolah/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pemeliharaan/website_sekolah/index";
		$this->load->view("parser_content",$data);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	public function grid_data()
	{

			$this->M_jqxgrid->read();
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
			//
			if(!is_numeric($_POST["aktif"]))
			{
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
			}
			$this->M_jqxgrid->update();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
			//
			$this->M_jqxgrid->delete();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		$this->M_jqxgrid->create();
	}
	public function form_edit()
	{
		$this->db->select("content");
		$this->db->where("id",$this->uri->segment(5));
		$row = $this->db->get("website_menu")->last_row();
		$data["content"] = $row->content;
		
		write_file("application/modules/setting/views/pemeliharaan/website_sekolah/rendered.php",$data["content"]);
		
		$this->load->view("pemeliharaan/website_sekolah/form_edit");
	}
	public function save_edit()
	{
		$data = $this->input->post("mce_0");
		write_file("application/modules/setting/views/pemeliharaan/website_sekolah/rendered.php",$data);
		
		$this->db->where("id",$this->uri->segment(5));
		$update["content"] = $data;
		$this->db->update("website_menu",$update);
		
		
		$this->db->select("link");
		$this->db->where("id",$this->uri->segment(5));
		$row = $this->db->get("website_menu")->last_row();
		
		$this->load->library("parser");
		
		$replace = array();
		foreach($this->db->get("website_widgets")->result() as $widget)
		{
			$replace[$widget->code] = $widget->content;
		}
		$string = $this->parser->parse('pemeliharaan/website_sekolah/rendered', $replace, TRUE);
		write_file("../sid/application/views/pages/".$row->link.".php",$string);
		redirect("setting/pemeliharaan/website_sekolah/form_edit/".$this->uri->segment(5));
	}
}
