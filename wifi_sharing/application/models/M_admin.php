<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function save_edit_image()
    {
        $response = array();
        $config['file_name']          = $_POST["id"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/news/';
		 $config['allowed_types']        = 'gif|jpg|png|jpeg';
		 $config['max_size']             = 500;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;

		 $this->load->library('upload', $config);
		 if($_FILES["foto"]["name"]!="")
		 {
			 if ($this->upload->do_upload("foto"))
			 {
				 	$data = $this->upload->data();
				 	//$this->model->setImage();
					$response["status"] = "success";
					$response["message"] = "Change Image Successfully";
			 }
			 else
			 {
				 $response["status"] = "error";
				 $response["message"] = $this->upload->display_errors();
			 }
		}
        return $response;
    }
    public function save_edit_data()
    {
        $id = $this->input->post("id");
        $title = $this->input->post("title");
		$this->db->where("id",$id);
        $update["title_indonesia"] = $this->input->post("title_indonesia");
        $update["title_english"] = $this->input->post("title_english");
		$update["content_indonesia"] = str_replace("../assets/",'assets/',$this->input->post("mce_0"));
		$update["content_english"] = str_replace("../assets/",'assets/',$this->input->post("mce_35"));
		$this->db->update("news",$update);
    }
    public function add_data()
    {
        $data["id_nvigation"] = $this->uri->segment(3);
        $data["title_indonesia"] = "Isi judul disini !";
        $data["title_english"] = "Write title in here !";
        $data["content_indonesia"] = "Isi konten disini !";
        $data["content_english"] = "Write content in here !";
        $data["created"] = date("Y-m-d H:i:s");
        
        $this->db->insert("news",$data);
    }
    public function delete_data()
    {
        $this->db->where("id",$this->uri->segment(4));
        $this->db->delete("news");
    }
	public function get_visitors_month()
    {
        $row = $this->db->get("statistik_month")->result_array();
        $response = array();
        for($x=1;$x<=31;$x++)
        {
            $response[] = $this->finddata($row,"tgl",$x);
        }
        return $response;
    }
    public function get_visitors_year()
    {
        $row = $this->db->get("statistik_year")->result_array();
        $response = array();
        for($x=1;$x<=12;$x++)
        {
            $response[] = $this->finddata($row,"bulan",$x);
        }
        return $response;
    }
    public function get_visitors_register()
    {
        $row = $this->db->get("statistik_register")->result_array();
        $response = array();
        for($x=1;$x<=12;$x++)
        {
            $response[] = $this->finddata($row,"bulan",$x);
        }
        return $response;
    }
    public function get_visitors_menu()
    {
        $q = $this->db->get("statistik_month_menu")->result();
        $link = array();
        $jumlah = array();
        foreach($q as $row)
        {
            $link[] = $row->link;
            $jumlah[] = $row->jumlah;
        }
        $response["link"] = $link;
        $response["jumlah"] = $jumlah;
        return $response;
    }
    function finddata($products, $field, $value)
    {
       foreach($products as $key => $product)
       {
          if ( $product[$field] == $value )
             return $product["jumlah"];
       }
       return 0;
    }
}