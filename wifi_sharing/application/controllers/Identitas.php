<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {
	public function index()
	{
		$response = $this->db->get("sync_identitas")->last_row();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
}
