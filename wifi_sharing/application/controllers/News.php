<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_guests");
        $this->M_guests->check();
    }
    public function beranda()
	{
		//$this->db->where("");
		$result = array();
		$result["top_news"] = $this->top_news();
		$result["top_news_wilayah"] = $this->top_blog();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
	}
	public function render($result)
    {
        $respons = array();
        foreach($result as $row)
        {
            $response = $row;
            $response["title"] = $row["title_".$this->session->userdata("site_lang")];
            $response["content"] = $row["content_".$this->session->userdata("site_lang")];
            $respons[] = $response;
        }
		return $respons;
    }
	public function top_news()
	{
        $this->db->where("link","berita_sekolah");
		$result = $this->render($this->db->get("v_news",8,0)->result_array());
        return $result;
	}
	public function top_blog()
	{
		$this->db->where("link","berita_kewilayahan");
		$response = $this->render($this->db->get("v_news",8,0)->result_array());
        return $response;
	}
    public function berita()
	{
        $response = array();
        $link = $this->uri->segment(3);
        
        $this->db->where("link",$link);
        $response["current_page"] = $this->db->get("navigations")->row_array();
        $response["current_page"]["name"]=$response["current_page"]["title_".$this->session->userdata("site_lang")];
        $response["current_page"]["content"]=$response["current_page"]["content_".$this->session->userdata("site_lang")];
        
        $this->db->select("id");
        
        $this->db->where("link",$link);
		$total = $this->db->get("v_news")->num_rows();
		
		$this->load->library('pagination');
		if($this->input->get("from"))
		{
			$config['base_url'] = site_url('admin_cmz').'#/'.$link."/";
		}else{
			$config['base_url'] = base_url().'#/'.$link."/";
		}
		//$config['base_url'] = base_url().'api/index.php/news/berita/';
		$config['total_rows'] = $total;
		$config['per_page'] = 8;
		$from = $this->uri->segment(4);
		$config["num_tag_open"] = '<li class="waves-effect">';
		$config["num_tag_close"] = '</li>';
		
		$config["next_tag_open"] = '<li class="waves-effect">';
		$config["next_tag_close"] = '</li>';
		
		$config["prev_tag_open"] = '<li class="waves-effect">';
		$config["prev_tag_close"] = '</li>';
		
		$config["first_tag_open"] = '<li class="waves-effect">';
		$config["first_tag_close"] = '</li>';
		
		$config["last_tag_open"] = '<li class="waves-effect">';
		$config["last_tag_close"] = '</li>';
		
		$config["cur_tag_open"] = '<li class="active current"><a>';
		$config["cur_tag_close"] = '</a></li>';
		$config['first_link'] = '>>';
		$config['last_link'] = '>>';
		
		$this->pagination->initialize($config);
		$response["link"] = $this->pagination->create_links();
        $this->db->where("link",$link);
		$response["list"] = $this->render($this->db->get("v_news",$config['per_page'],$from)->result_array());
		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
		
	}
    public function search()
	{
        $response = array();
        $keywords = $this->uri->segment(3);
        $link = $this->uri->segment(4);
        
        $this->db->select("id");
        $this->db->like("title_".$this->session->userdata("site_lang"),$keywords);
        $this->db->or_like("content_".$this->session->userdata("site_lang"),$keywords);
        
		$total = $this->db->get("v_news")->num_rows();
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'#/'.$link."/";
		//$config['base_url'] = base_url().'api/index.php/news/berita/';
		$response["total_data"] = $config['total_rows'] = $total;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$config["num_tag_open"] = '<li class="waves-effect">';
		$config["num_tag_close"] = '</li>';
		$config["cur_tag_open"] = '<li class="active">';
		$config["cur_tag_close"] = '</li>';
		$this->pagination->initialize($config);
		$response["link"] = $this->pagination->create_links();
        
        $this->db->like("title_".$this->session->userdata("site_lang"),$keywords);
        $this->db->or_like("content_".$this->session->userdata("site_lang"),$keywords);
		$response["list"] = $this->render($this->db->get("v_news",$config['per_page'],$from)->result_array());
		
		$this->load->view("search_list",$response);
		
	}
    public function detail()
    {
        $response = array();
        $id = $this->uri->segment(3);
        
        $this->db->where("id",$id);
        $response["news"] = $this->db->get("v_news")->row_array();
        $response["news"]["title"] = $response["news"]["title_".$this->session->userdata("site_lang")];
        $response["news"]["content"] = $response["news"]["content_".$this->session->userdata("site_lang")];
        
        
        $this->db->where("id",$response["news"]["id_nvigation"]);
        $response["current_page"] = $this->db->get("navigations")->row_array();
        $response["current_page"]["name"]=$response["current_page"]["title_".$this->session->userdata("site_lang")];
        
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
    }
    public function detail_admin()
    {
        $response = array();
        $id = $this->uri->segment(3);
        
        $this->db->where("id",$id);
        $response["news"] = $this->db->get("v_news")->row_array();
        $response["news"]["content_indonesia"] = str_replace("assets/",'../assets/',$response["news"]["content_indonesia"]);
        $response["news"]["content_english"] = str_replace("assets/",'../assets/',$response["news"]["content_english"]);
        
        $this->db->where("id",$response["news"]["id_nvigation"]);
        $response["current_page"] = $this->db->get("navigations")->last_row();
        
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($response));
    }
}
