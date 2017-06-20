<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
    public function __construct(){
        parent::__construct();
        if($this->session->userdata("site_lang"))
        {    
            $this->lang->load('common',$this->session->userdata("site_lang"));
        }else{
            $this->switch_language();
        }
        //echo $this->lang->line('welcome_message');
    }
    public function switch_language($language)
    {
        $language = ($language != "") ? $language : "indonesia";
        $this->session->set_userdata('site_lang', $language);
        redirect();
    }
    public function tes($language="")
    {
        
        
        
    }
	public function index()
	{
        if($this->session->userdata("username"))
        {
            $this->load->view("index");
        }else{
            $this->lang->load('form_login',$this->session->userdata("site_lang"));
            $this->load->view("login");
        }
		
	}
	public function guest()
    {
        $data["username"] = htmlentities($this->input->post("username"));
        $data["email"] = htmlentities($this->input->post("email"));
        $data["browser"] = $_SERVER['HTTP_USER_AGENT'];
        $data["ip"] = $_SERVER['REMOTE_ADDR'];
        $data["created"] = date("Y-m-d H:i:s");
        
        $this->db->insert("guests",$data);
        $id = $this->db->insert_id();
        
        $session["username"] = $data["username"];
        $session["id_guest"] = $id;
        $this->session->set_userdata($session);
        redirect("beranda/switch_language/".$this->input->post("language"));
    }
    public function save_saran()
    {
        $data["nama"] = $this->input->post("nama");
        $data["email"] = $this->input->post("email");
        $data["website"] = $this->input->post("website");
        $data["pesan"] = $this->input->post("pesan");
        $data = $this->security->xss_clean($data);
        $this->db->insert("kritik_saran",$data);
        echo "<script>alert('Pesan telah terkirim. :D');location.href='".base_url()."#/kritik_saran';</script>";
    }
}
