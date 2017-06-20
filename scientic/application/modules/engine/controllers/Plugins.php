<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();

	 }
	 public function addPlugins()
	 {
		 if($this->input->post("name"))
		 {
			 	$folder = $this->input->post("folder");
				$url = $this->input->post("url");
				$name = $this->input->post("name");

				
		 }

	 }

}
