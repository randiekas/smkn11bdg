<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_jqxtree extends CI_Controller {

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
		 $this->load->model("M_jqxtree","model");
		 if($this->uri->segment(4))
		 {
			$this->model->setPath("designer/".$this->uri->segment(4)."/datafields.json");
		 }
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{

	}
	/**
	 * Display Json Data in table customer
	 *
	 *
	 *
	 * @return Response Json
	 */
	public function tree_data()
	{
			echo json_encode(getAccessMenu($_SESSION["level_id"]));
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
			$this->model->update();
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
			$this->model->delete();

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
			// call create function from model to create new rows
			$this->model->create();
	}
}
