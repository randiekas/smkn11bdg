<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cmz extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('site_lang',"indonesia");
        $this->load->model("m_admin");
    }
	public function index()
	{
        if($this->session->userdata("admin"))
        {
            $this->load->view("admin/index");
        }else{
            $this->load->view("admin/login");
        }
		
	}
	public function signin()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        
        if($this->db->get("admin")->num_rows()==0)
        {
            
        }else{
            $this->session->set_userdata(array("admin"=>$username));
            
        }
        redirect("admin_cmz");
    }
    public function save_edit_image()
	{
		$response = $this->m_admin->save_edit_image();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
	}
    public function save()
    {
        $id = $this->input->post("id");
        $this->m_admin->save_edit_data();
		redirect("admin_cmz#berita_sekolah/detail/".$id);
    }
    public function save_singlepage()
    {
        $data = $this->input->post("mce_0");
        $id = $this->input->post("id");
        $link = $this->input->post("link");
        $update["content"] = str_replace("../assets/",'assets/',$data);
        
        $this->db->where("id",$id);
        $this->db->update("navigations",$update);
        redirect("admin_cmz#/".$link);
    }
    public function add_article()
    {
        $this->m_admin->add_data();
		redirect("admin_cmz#berita_sekolah/detail/".$this->db->insert_id());
    }
    public function delete_article()
    {
        $this->m_admin->delete_data();
        redirect("admin_cmz#berita_sekolah/".$this->uri->segment(3));
    }
	public function top_news()
	{
        $result = array();
        $result["top_news"] = $this->db->get("top_v_news",9,0)->result();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
	}
    public function statistics()
    {
        
        $result = array();
        $result["visitors_month"] = $this->m_admin->get_visitors_month();
        $result["visitors_year"] = $this->m_admin->get_visitors_year();
        $result["visitors_register"] = $this->m_admin->get_visitors_register();
        $result["get_visitors_menu"] = $this->m_admin->get_visitors_menu();
        $this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
    }
    
    public function signout()
    {
        $this->session->sess_destroy();
        redirect("admin_cmz");
    }
    public function list_kritik()
	{
        $response = array();
        $link = $this->uri->segment(3);
        
        $this->db->select("id");
        $total = $this->db->get("kritik_saran")->num_rows();
		
		$this->load->library('pagination');
		$config['base_url'] = base_url()."index.php/admin_cmz#/kritik_saran/";
		//$config['base_url'] = base_url().'api/index.php/news/berita/';
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$config["num_tag_open"] = '<li class="waves-effect">';
		$config["num_tag_close"] = '</li>';
		$config["cur_tag_open"] = '<li class="active">';
		$config["cur_tag_close"] = '</li>';
		$this->pagination->initialize($config);
		$response["link"] = $this->pagination->create_links();
        
		$response["list"] = $this->db->get("kritik_saran",$config['per_page'],$from)->result();
		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
		
	}
}
