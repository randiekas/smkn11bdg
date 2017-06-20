<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		* get setting table from json
		*
		*
		*
		* @return Response Json
		*/
	public function index()
 	{
		
		
 	}
	public function failed_othorization()
	{
		$response["status"] = "error";
		$response["message"] = "maaf, level anda tidak dizinkan untuk merubah data pada module ini.";
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
}
