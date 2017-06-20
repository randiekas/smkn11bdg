<section class="hbox stretch">
  <section>
    <section class="vbox">
		<header class="header bg-white b-b b-light">
			<p class="groupAction">
			  <!--
			  <button type="button" class="btn btn-s-md btn-primary btn-sm" id="saverowbutton" disabled>Simpan</button>
			  !-->
			<button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
			<button type="button" class="btn btn-s-md btn-info btn-sm" id="editrowbutton" disabled>Ubah</button>
			<button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled="">Hapus</button>
			<button type="button" class="btn btn-s-md btn-info btn-sm" id="saverowbutton" disabled="">Simpan</button>
			  <i class="fa fa-spin fa-spinner hide" id="spin"></i>
			</p>
      </header>
      <section class="scrollable padder">

        <div class="row">
			<div id="jqxTabs" aria-disabled="false" class="jqx-tabs">
				  <ul>
					  <li role="tab">List COA</li>
					  <li role="tab">Detail</li>
				  </ul>
				  <div role="tabpanel">
						<div id="jqxGrid"></div>
				  </div>
				  <div>

						<!-- form coa !-->
		<form id="form_coa" action="<?=current_url()?>/save" method="post" class="form-horizontal">
		<input type="hidden" name="replid" id="replid">
		<hr/>
		<div class="col-sm-12">
      <div class="form-group">
      <div class="col-md-4">
          <label class="pull-right" for="kode_akun">Parent</label>
        </div>
        <div class="col-md-8">
          <select id="rootid" name="rootid" class="form-control">
            <?php
            $this->db->select("replid,jabatan,isdefault");
            foreach($this->db->get("jabatan")->result() as $row)
            {
              echo "<option value='{$row->replid}' {($row->isdefault==1)?'selected':''}>{$row->jabatan}</option>";
            }
            ?>
          </select>
        </div>
      </div>
			<div class="form-group">
			<div class="col-md-4">
					<label class="pull-right" for="kode_akun">Singkatan</label>
				</div>
				<div class="col-md-8">
					<input name="singkatan" id="singkatan" value="" class="form-control" type="text">
				</div>
			</div>
      <div class="form-group">
			<div class="col-md-4">
					<label class="pull-right" for="kode_akun">Jabatan</label>
				</div>
				<div class="col-md-8">
					<input name="jabatan" id="jabatan" value="" class="form-control" type="text">
				</div>
			</div>
      <div class="form-group">
			<div class="col-md-4">
					<label class="pull-right" for="kode_akun">Satuan Kerja</label>
				</div>
				<div class="col-md-8">
          <select id="satker" name="satker" class="form-control">
            <?php
            foreach($this->db->get("satker")->result() as $row)
            {
              echo "<option value='{$row->satker}' {($row->isdefault==1)?'selected':''}>{$row->nama}</option>";
            }
            ?>
					</select>
				</div>
			</div>
      <div class="form-group">
			<div class="col-md-4">
					<label class="pull-right" for="kode_akun">Eselon</label>
				</div>
				<div class="col-md-8">
          <select id="eselon" name="eselon" class="form-control">
            <?php
            $this->db->order_by("urutan","ASC");
            foreach($this->db->get("eselon")->result() as $row)
            {
              echo "<option value='{$row->eselon}' {($row->isdefault==1)?'selected':''}>{$row->eselon}</option>";
            }
            ?>
					</select>
				</div>
			</div>

				<input style="display:none;" type="submit">
				<input style="display:none;" type="reset" class="reset">
			</div>
		</form>
						<!-- close form coa !-->
				  </div>
			</div>
        </div>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
  var items = new Object();
  $(document).ready(function(){

    <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
    $("#addrowbutton").click(function(){
		  $("#saverowbutton").removeAttr("disabled");
		  $("[name=replid]").val('');
      var rootid = $("#rootid").val();
		  $(".reset").click();
      $("#rootid").val(rootid);
		  $('#jqxTabs').jqxTabs('select', 1);
		  elementJqxGrid.jqxTreeGrid('clearSelection');
    });
	$("#editrowbutton").click(function(){

		  $('#jqxTabs').jqxTabs('select', 1);

    });
	$("#saverowbutton").click(function(){
		  $("#form_coa").submit();
    });
	$("#deleterowbutton").click(function(){
    var replid = Object();
    replid[0] = $("[name=replid]").val();
		$.ajax({
			   dataType: 'json',
			   url: current_url()+"/destroy",
			   data: {replid:replid},
			   type:'post',
			   success: function (data, status, xhr) {
				   // update command is executed.
				   if(data.status=="success")
				   {
					   $("[name=replid]").val('');
					   $("#form_coa [type=reset]").click();
					   Notification.open("Jabatan telah berhasil dihpus","success");
					   elementJqxGrid.jqxTreeGrid('updateBoundData');

					}
				   else{
					   Notification.open(data.message,"error");
				   }
				},
			   error: function (data,status) {
				   Notification.open(Notification.textFailedUpdate(),"error");
			   }
		   });
    });
	$('#jqxTabs').on('tabclick', function (event)
	{

		var clickedItem = event.args.item;

		if(clickedItem=="0")
		{
			setTimeout(function(){
				console.log(clickedItem);
				elementJqxGrid.jqxTreeGrid('refresh');

			},100);
		}
	});
	$('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});
	$("#form_coa").submit(function(){
		$.ajax({
			   dataType: 'json',
			   url: current_url()+"/save",
			   data: $(this).serialize(),
			   type:'post',
			   success: function (data, status, xhr) {
				   // update command is executed.
				   if(data.status=="success")
				   {
					   if($("[name=replid]").val()=="")
					   {
							Notification.open("Struktur telah berhasil ditambahkan","success");
							elementJqxGrid.jqxTreeGrid('updateBoundData');
							$("[name=replid]").val('');
              var rootid = $("#rootid").val();
        		  $(".reset").click();
              $("#rootid").val(rootid);
						}
					else{
						Notification.open("Jabatan berhasil diubah","success");
						elementJqxGrid.jqxTreeGrid('updateBoundData');
					}
				   }
				   else{
					   Notification.open(data.message,"error");
				   }
				},
			   error: function (data,status) {
				   Notification.open(Notification.textFailedUpdate(),"error");
			   }
		   });
		return false;
	})
  });
</script>
