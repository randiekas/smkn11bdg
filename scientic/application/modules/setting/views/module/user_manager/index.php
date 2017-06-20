<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable">
		<div id="popupWindowLevel">
            <div>Tambah Level</div>
            <div style="overflow: hidden;" class="form-horizontal">
				<div class="form-group form-group-sm">
					<label for="level_code" class="control-label col-sm-4">Code</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="level_code" placeholder="" name="level_code">
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label for="level_name" class="control-label col-sm-4">Level</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="level_name" placeholder="" name="level_name">
					</div>
				</div>
                <input style="margin-right: 5px;" type="button" id="SaveLevel" value="Simpan" /><input id="CancelLevel" type="button" value="Batal dan Tutup" />
            </div>
       </div>
	   
	   <div id="popupWindowUser">
            <div>Tambah User</div>
            <div style="overflow: hidden;" class="form-horizontal">
				<div class="form-group form-group-sm">
					<label for="user_username" class="control-label col-sm-4">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="user_username" placeholder="" name="user_username">
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label for="user_password" class="control-label col-sm-4">Password</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="user_password" placeholder="" name="user_password">
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label for="user_password" class="control-label col-sm-4">Pegawai</label>
					<div class="col-sm-8">
						<select class="form-control" id="entity_id" placeholder="" name="entity_id">
							
						</select>
					</div>
				</div>
                <input style="margin-right: 5px;" type="button" id="SaveUser" value="Simpan" /><input id="CancelUser" type="button" value="Batal dan Tutup" />
            </div>
       </div>
        
			<div id='jqxWidget' style="float: left;width:30%;height:100%">
				<div id='jqxExpanderLevel'>
					<div>Level User</div>
					<div>
						<div id="jqwidgetsLevel"></div>
					</div>
				</div>
			</div>
			
			<div id='jqxWidget' style="float: left;width:40%;height:100%">
				<div id='jqxExpanderModule'>
					<div>Module Access</div>
					<div>
						<div id="jqwidgetsModule"></div>
					</div>
				</div>
			</div>
			<div id='jqxWidget' style="float: left;width:30%;height:100%">
				<div id='jqxExpanderUser'>
					<div>Account User</div>
					<div>
						<div id="jqwidgetsUser"></div>
					</div>
				</div>
			</div>
			
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
        $(document).ready(function () {
            // Create jqxExpander
            $("#jqxExpanderLevel").jqxExpander({ width: '100%',height:"100%",
				initContent: function (){
					<?=$this->load->view("jqxgridLevel.js",array(),TRUE)?>
					<?=$this->load->view("jqxgridModule.js",array(),TRUE)?>
					<?=$this->load->view("jqxgridUser.js",array(),TRUE)?>
				}
			});
			$("#jqxExpanderModule").jqxExpander({ width: '100%',height:"100%",
				initContent: function (){
					
				}
			});
            $("#jqxExpanderUser").jqxExpander({ width: '100%',height:"100%"});
			
			
        });
		function updateModule(mode)
			{
				var selection = elementJqxGrid.jqxTreeGrid('getSelection');
				postData = new Object();
				for (var i = 0; i < selection.length; i++) {
					// get a selected row.
					rowData = selection[i];
					if(mode=="view")
					{
						var view = (rowData.view=='1')?'0':'1';
						rowData.view=view;
					}
					else if(mode=="update"){
						var update = (rowData.update=='1')?'0':'1';
						rowData.update=update;
					}
					row = jqwidgetsLevel.jqxGrid("getrowdata",jqwidgetsLevel.jqxGrid("getselectedrowindex"));
					
					postData.module_level_id = rowData.module_level_id;
					postData.level_id = row.id;
					postData.id  = rowData.id;
					postData.update = rowData.update;
					postData.view = rowData.view;
					
					 
				}
				
				$.ajax({
						 dataType: 'json',
						 url: current_url()+"/updateModule",
						 data: postData,
						 type:'post',
						 success: function (data, status, xhr) {
							 // update command is executed.
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 
						 },
						 error: function (data,status) {
							 Notification.open(Notification.textFailedUpdate(),"error");
						}
					 });
				//console.log("sdf");
			}
    </script>
