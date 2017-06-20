<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tes extends CI_Controller {

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
		echo "tes";
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
}
