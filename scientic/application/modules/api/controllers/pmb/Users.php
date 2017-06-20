<?php
require(APPPATH.'/libraries/api/REST_Controller.php');
 
class Users extends REST_Controller {
 
 
	/*
    function user_get()
    {
        $data = array('returned: ada'. $this->get('id')." s ".$this->get('ids'));
        $this->response($data);
    }
    */ 
    function login_post()
    {       
		$username = $this->post("username");
		$password = $this->post("password");
		$result=  $this->db->query("CALL `check_userpmb`('".$username."','".$password."')")->last_row();
        $this->response($result);
    }
	function detailregistrasi_post()
    {       
		$no_formulir = $this->post("no_formulir");
		$result=  $this->db->query("CALL `v_registrasipmb`('".$no_formulir."')")->last_row();
        $this->response($result);
    }
	function register_post()
    {       
		$data = array();
		$data[] = "'".$this->post("d_nama")."'";
		$data[]= "'".$this->post("d_alamat_t")."'";
		$data[] = "'".$this->post("d_rt")."'";
		$data[] = "'".$this->post("d_rw")."'";
		$data[] = "'".$this->post("d_kd_kota")."'";
		$data[] = "'".$this->post("d_kodepos")."'";
		$data[] = "'".$this->post("d_kd_propinsi")."'";
		$data[] = "'".$this->post("d_email")."'";
		$data[] = "'".$this->post("d_tmplahir")."'";
		$data[] = "'".$this->post("d_tgllahir")."'";
		$data[] = "'".$this->post("d_agama")."'";
		$data[] = "'".$this->post("d_jk")."'";
		$data[] = "'".$this->post("d_warganegara")."'";
		$data[] = "'".$this->post("d_goldarah")."'";
		$data[] = "'".$this->post("d_alamat_l")."'";
		$data[] = "'".$this->post("d_tempat_t")."'";
		$data[] = "'".$this->post("d_stat_sipil")."'";
		$data[] = "'".$this->post("d_nama_ot")."'";
		$data[] = "'".$this->post("d_alamat_ot")."'";
		$data[] = "'".$this->post("d_kota_ot")."'";
		$data[] = "'".$this->post("d_kodepos_ot")."'";
		$data[] = "'".$this->post("d_provinsi_ot")."'";
		$data[] = "'".$this->post("d_email_ot")."'";
		$data[] = "'".$this->post("d_tmplahir_ot")."'";
		$data[] = "'".$this->post("d_tgllahir_ot")."'";
		$data[] = "'".$this->post("d_agama_ot")."'";
		$data[] = "'".$this->post("d_pendidikan_ot")."'";
		$data[] = "'".$this->post("d_pekerjaan_ot")."'";
		$data[] = "'".$this->post("d_namainstansi_ot")."'";
		$data[] = "'".$this->post("d_alamatinstansi_ot")."'";
		$data[] = "'".$this->post("d_penghasilan_ot")."'";
		$data[] = "'".$this->post("d_nama_ibu_ot")."'";
		$data[] = "'".$this->post("d_nama_skl")."'";
		$data[] = "'".$this->post("d_kategori_skl")."'";
		$data[] = "'".$this->post("d_fakultas")."'";
		$data[] = "'".$this->post("d_prodi")."'";
		$data[] = "'".$this->post("d_alamat_skl")."'";
		$data[] = "'".$this->post("d_kota_skl")."'";
		$data[] = "'".$this->post("d_kodepos_skl")."'";
		$data[] = "'".$this->post("d_provinsi_skl")."'";
		$data[] = "'".$this->post("d_thn_lulus_skl")."'";
		$data[] = "'".$this->post("d_pilihanprg")."'";
		$data[] = "'".$this->post("d_nim")."'";
		$data[] = "'".$this->post("d_ijazah")."'";
		$data[] = "'".$this->post("d_tglijazah")."'";
		$data[] = "'".$this->post("d_nilaiuan")."'";
		$data[] = "'".$this->post("d_sks")."'";
		$data[] = "'".$this->post("d_namapt")."'";
		$data[] = "'".$this->post("d_pilihan1")."'";
		$data[] = "'".$this->post("d_pilihan2")."'";
		$data[] = "'".$this->post("d_pilihan3")."'";
		$data[] = "'".$this->post("d_stat_masuk")."'";
		$data[] = "'".$this->post("d_telepon_ot")."'";
		$data[] = "'".$this->post("d_tel_cell_ot")."'";
		$data[] = "'".$this->post("d_pass")."'";
		$data[] = "'".$this->post("d_jalur")."'";
		$data[] = "'".$this->post("d_pendidikan_akhir")."'";
		$data[] = "'".$this->post("d_telp_selular")."'";
		$data[] = "'".$this->post("d_telp_rumah")."'";
		$data[] = "'".$this->post("d_program")."'";
		
		$insert = implode(",",$data);
		$result=  $this->db->query("CALL `ins_registrasipmb`(".$insert.")")->last_row();
        $this->response($result);
    }
    function user_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
 
    function user_delete()
    {
        $data = array('returned: '. $this->delete('id'));
        $this->response($data);
    }
}