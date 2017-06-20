<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_footer extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pemeliharaan/website_footer/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = $this->load->view("pemeliharaan/website_footer/footer",array(),true);
		
		//write_file("application/modules/setting/views/pemeliharaan/website_sekolah/rendered.php",$data["content"]);
		$this->load->view("pemeliharaan/website_footer/form_edit");
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
	public function save_edit()
	{
		$data = $this->input->post("mce_0");
		write_file("application/modules/setting/views/pemeliharaan/website_footer/footer.php",$data);
		write_file("../sid/application/views/footer.php",$data);
		redirect("setting/pemeliharaan/website_footer");
	}
}
