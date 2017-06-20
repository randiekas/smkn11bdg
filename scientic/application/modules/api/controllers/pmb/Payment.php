<?php
require(APPPATH.'/libraries/api/REST_Controller.php');
 
class Payment extends REST_Controller {
 
 
	function vBilling_post()
	{
		$d_stat_bayar = $this->input->post("d_stat_bayar");
		$result=  $this->db->query("CALL `v_billingpmb`(".$d_stat_bayar.")")->result();
		$this->response($result);
	}
	function vFormulirPMB_post()
	{
		$d_formulir = $this->input->post("d_formulir");
		$result=  $this->db->query("CALL `v_dataformulirpmb`(".$d_formulir.")")->result();
		$this->response($result);
	}
	function kesediaanPembayaran_post()
	{
		$d_formulir = $this->input->post("d_formulir"); 
		$d_sumbangan1 = $this->input->post("d_sumbangan1"); 
		$d_sumbangan2 = $this->input->post("d_sumbangan2"); 
		$d_sumbangan3 = $this->input->post("d_sumbangan3"); 
		
		$this->db->query("CALL `ins_kesediaanpembayaran`(".$d_formulir.",".$d_sumbangan1.",".$d_sumbangan2.",".$d_sumbangan3.")")->result();
		$result["status"] = "success";
		$result["message"] = "";
        $this->response($result);
		
	}
	function billing_post()
    {       
		$d_option = $this->input->post("d_option"); 
		$d_id = $this->input->post("d_id"); 
		$d_thsemester = $this->input->post("d_thsemester"); 
		$d_angkatan = $this->input->post("d_angkatan"); 
		$d_program = $this->input->post("d_program"); 
		$d_prodi = $this->input->post("d_prodi"); 
		$d_npm = $this->input->post("d_npm"); 
		$d_no_form = $this->input->post("d_no_form"); 
		$d_tgl_invoice = $this->input->post("d_tgl_invoice"); 
		$d_paytype = $this->input->post("d_paytype"); 
		$d_pendapatan = $this->input->post("d_pendapatan"); 
		$d_komp_pend = $this->input->post("d_komp_pend"); 
		$d_period_awal = $this->input->post("d_period_awal"); 
		$d_period_akhir = $this->input->post("d_period_akhir"); 
		$d_jatuh_tempo = $this->input->post("d_jatuh_tempo"); 
		$d_urutan_bayar = $this->input->post("d_urutan_bayar"); 
		$d_jumlah = $this->input->post("d_jumlah"); 
		$d_uang_muka = $this->input->post("d_uang_muka"); 
		$d_tenor = $this->input->post("d_tenor"); 
		$d_dibayar = $this->input->post("d_dibayar"); 
		$d_status = $this->input->post("d_status"); 
		$d_stat_kredit = $this->input->post("d_stat_kredit"); 
		$d_stat_pembayaran = $this->input->post("d_stat_pembayaran"); 
		$d_saldo = $this->input->post("d_saldo"); 
		$d_user = $this->input->post("d_user"); 
		$this->db->query("CALL `ins_billing`(".$d_option.",".$d_id.",".$d_thsemester.",".$d_angkatan.",".$d_program.",".$d_prodi.",".$d_npm.",".$d_no_form.",".$d_tgl_invoice.",".$d_paytype.",".$d_pendapatan.",".$d_komp_pend.",".$d_period_awal.",".$d_period_akhir.",".$d_jatuh_tempo.",".$d_urutan_bayar.",".$d_jumlah.",".$d_uang_muka.",".$d_tenor.",".$d_dibayar.",".$d_status.",".$d_stat_kredit.",".$d_stat_pembayaran.",".$d_saldo.",".$d_user.",@temp)")->last_row();
		$result["status"] = "success";
		$result["message"] = "";
        $this->response($result);
		
    }
	function generator_post()
	{
		//generator
		/*
		$Q = $this->db->query('SELECT  * FROM INFORMATION_SCHEMA.PARAMETERS WHERE specific_name = "ins_billing"');
		foreach($Q->result() as $row)
		{
			//echo '$'.$row->PARAMETER_NAME.' = $this->input->post("'.$row->PARAMETER_NAME.'"); <br>';
			echo '".$'.$row->PARAMETER_NAME.'.",';
		}
		*/
		//generator
		$Q = $this->db->query('SELECT  * FROM INFORMATION_SCHEMA.PARAMETERS WHERE specific_name = "ins_billing"');
		echo "<table>";
		foreach($Q->result() as $row)
		{
			echo '<tr><td>'.$row->PARAMETER_NAME.'</td></tr>';
		}
		echo "</table>";
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