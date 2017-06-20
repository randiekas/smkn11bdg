<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tutup Tahun</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
									<div id="popupWindow">
										<div>Tutup Tahun</div>
										
										<div style="overflow: hidden;" class="form-horizontal">
											<form class="formtutupbuku" method="post">
											<div class="form-group form-group-sm">
												<label for="mutasi_tglmutasi" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<select class="form-control" id="departemen" name="departemen" required>
														<?php
														foreach($this->db->get("departemen")->result() as $row)
														{
														?>
														<option value="<?=$row->departemen?>"><?=$row->departemen?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_tglmutasi" class="control-label col-sm-4">Tanggal Tutup Buku</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="tanggalselesai" id="tanggalselesai" value="<?=date("Y-m-d")?>" required>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_nis" class="control-label col-sm-4">Tahun Buku Baru</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="tahunbuku" id="tahunbuku" required>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_nis" class="control-label col-sm-4">Tanggal Mulai</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="tanggalmulai" id="tanggalmulai" value="<?=date("Y-m-d")?>" required>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_nama" class="control-label col-sm-4">Awalan Kuitansi</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="awalan" id="awalan" required>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_departemen" class="control-label col-sm-4">Laba Ditahan</label>
												<div class="col-sm-8">
													<select class="form-control" id="rekre" name="rekre" required>
														<?php
														$this->db->select("replid,kode,kategori,nama");
														$this->db->where("kategori","MODAL");
														foreach($this->db->get("rekakun")->result() as $row)
														{
														?>
														<option value="<?=$row->kode?>"><?=$row->kode?> - <?=$row->nama?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											
											 
											<div class="form-group form-group-sm">
												<label for="mutasi_keterangan" class="control-label col-sm-4">Keterangan</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="keterangan" id="keterangan"></textarea>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_keterangan" class="control-label col-sm-4"></label>
												<div class="col-sm-8">
													<button type="submit" class="btn btn-info btn-sm" id="mutasisavebutton">Simpan</button>
													<button type="button" class="btn btn-info btn-sm" id="Cancel">Batal</button>
													<input type="reset" class="resetButton" style="display:none">
												</div>
											</div>
											</form>
										</div>
										
								   </div>
								   
      <section class="scrollable padder">
        <div class="row">
          <div id="jqxGrid"></div>
        </div>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
  var items = new Object();
  $(document).ready(function(){
	$("#popupWindow").jqxWindow({ width: 400, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01 });
	  $(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
	
	});
    <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
    $("#addrowbutton").click(function(){
      $("#popupWindow").jqxWindow('show');
    });
	$(".formtutupbuku").submit(function(){
		$.ajax({
			url:current_url()+"/store/",
			data:$(this).serialize(),
			type:'post',
			dataType:'json',
			success:function(result){
				 if(result.status=="success")
						 {
							 Notification.open('Buku tahun telah berhasil setup',"success");
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 elementJqxGridReligion.jqxGrid('updatebounddata');
							 $(".resetButton").click();
							 $("#popupWindow").jqxWindow('hide');
						 }
						 else{
							 Notification.open(result.message,"error");
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 
						 }
			}
		});
		return false;
	})
  });
</script>
