<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
	public function open()
	{
		//$this->db->where("");
		$this->load->view("index",array("content"=>"pages/".$this->uri->segment(1)));
	}
	public function rendered()
	{
		foreach($this->db->get("sync_website_menu")->result() as $row)
		{
			write_file("application/views/pages/".$row->link.".php",$row->content);
		}
	}
	public function tes()
	{
		$this->load->library("parser");
		
		foreach($this->db->query("select * from ais_bapak_tester.website_widgets")->result() as $row)
		{
			$data[$row->code] = $row->content;
		}
		$this->parser->set_delimiters('{{', '}}');
		$string = $this->parser->parse('tes', $data, TRUE);
		write_file("application/views/tes.php",$string);
	}
}
