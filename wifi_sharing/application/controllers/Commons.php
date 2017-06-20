<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commons extends CI_Controller {

	public function navigations()
	{
		$result = array();
		$result = $this->db->get("v_navigations")->result_array();
        $respons = array();
        foreach($result as $row)
        {
            $response = $row;
            $response["name"] = $row["title_".$this->session->userdata("site_lang")];
            $respons[] = $response;
        }
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($respons));
	}

}
