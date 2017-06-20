<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_jqxgrid extends CI_Controller {

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
		 $this->load->model("M_jqxgrid","model");
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
	public function grid_data()
	{

			$this->model->read();
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
	public function get()
	{
		$result = $this->load->view("designer/".$this->input->post("path"),array(),true);
		echo $result;
	}
	public function getSave()
	{
		write_file("application/modules/engine/views/designer/".$this->input->post("path"),$this->input->post("source"));
	}
}
