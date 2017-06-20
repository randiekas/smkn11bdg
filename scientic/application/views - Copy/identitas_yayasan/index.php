<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p>
          <button type="button" class="btn btn-s-md btn-primary btn-sm btnSave" onclick="$('#formYayasan').submit()" data-toggle="class:show inline" data-target="#spin" data-loading-text="Menyimpan...">Simpan</button>
          <button type="button" class="btn btn-s-md btn-default btn-sm" onclick="$('#formYayasan .reset').click()">Reset</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">
          <form id="formYayasan" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            <input type="submit" style="display:none">
            <div class="col-top">
              <div id="jqxWidget">
                <div id="jqxTabs" aria-disabled="false" class="jqx-tabs">
                  <ul>
                  <li role="tab">Identitas Yayasan</li>
                  <li role="tab">Visi dan Misi</li>
                  </ul>
                  <div role="tabpanel">
                    <div class="container" style="width:1200px;">

                      <div class="gambarup" style="position:fixed;margin-left:750px;border-style: solid;border-color:#fff;border-width:px;"><img src="<?=base_url()?>assets/identitas_yayasan/logo.png" class="imgChangeImage">
                      </div>


                      <div class="form-group">						<hr>
                        <div class="col-sm-1 input-group-sm">
                          <label for="inputEmail3" class="control-label">Kode Yayasan</label>
                        </div>
                        <div class="col-sm-4 input-group-sm">
                          <input type="text" name="kode_yys" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-1 input-group-sm">
                          <label for="inputEmail3" class="control-label">Nama Yayasan</label>
                        </div>
                        <div class="col-sm-6 input-group-sm">
                          <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-1 input-group-sm">
                          <label for="inputEmail3" class="control-label">Singkatan</label>
                        </div>
                        <div class="col-sm-6 input-group-sm">
                          <input type="text" name="singkatan" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-1 input-group-sm">
                          <label for="inputEmail3" class="control-label">Tanggal Didirikan</label>
                        </div>
                        <div class="col-sm-2 input-group-sm">
                          <div name="tgl_berdiri" class="tgl_berdiri"></div>
                        </div>
                        <div class="col-sm-4 input-group-sm">
                          <label for="inputEmail3" class="control-label"></label>
                        </div>
                        <div class="col-sm-1 input-group-sm">
                          <input type="file" name="Logo">
                        </div>
                      </div>



                          <div class="form-group">
                            <div class="col-sm-1 input-group-sm">
                              <label for="inputEmail3" class="control-label">No.Akta</label>
                            </div>
                            <div class="col-sm-3 input-group-sm">
                              <input type="text" name="no_akta" class="form-control" id="inputEmail3" placeholder="" style="width:220px;">
                            </div>
                            <div class="col-sm-2 input-group-sm">
                              <label for="inputEmail3" class="control-label">Tanggal Akta</label>
                            </div>
                            <div class="col-sm-2 input-group-sm">
                              <div class="tgl_akta" name="tgl_akta"></div>
                            </div>
                          </div>



                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">No.PN</label>
                      </div>
                      <div class="col-sm-3 input-group-sm">
                        <input type="text" name="no_sah" class="form-control" id="inputEmail3" placeholder="" style="width:220px;">
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <label for="inputEmail3" class="control-label">Tanggal PN</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <div class="tgl_sah" name="tgl_sah"></div>
                      </div>
                    </div>

                    <hr>


                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Alamat</label>
                      </div>
                      <div class="col-sm-11 input-group-sm">
                        <input type="text" name="alamat1" class="form-control" id="inputEmail3" placeholder="" style="width:664px;">
                      </div>
                    </div>



                    <div class="form-group input-group-sm">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Provinsi</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <select class="form-control" name="kode_provinsi">
                          <option>Jawa Barat</option>
                          <option>Jawa Tengah</option>
                          <option>Sulawesi Selatan</option>
                          <option>Kalimantan Barat</option>
                        </select>
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Kota</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <select class="form-control" name="kode_kota">
                          <option>Bandung</option>
                          <option>Jakarta</option>
                          <option>Solo</option>
                          <option>Yogyakarta</option>
                        </select>
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Kode Pos</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="kode_pos" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Telefon</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="telepon" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Fax</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="fax" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">E-Mail</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Website</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="website" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Face Book</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="fb" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Twitter</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="twi" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">BBM</label>
                      </div>
                      <div class="col-sm-2 input-group-sm">
                        <input type="text" name="pinbb" class="form-control" id="inputEmail3" placeholder="">
                      </div>
                    </div>

                    </div>
                  </div>
                  <div role="tabpanel">
                    <div class="form-group">						<hr>
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Visi</label>
                      </div>
                      <div class="col-sm-6 input-group-sm">
                        <textarea style="width:100%" name="visi" id="editorVisi"></textarea>
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-sm-1 input-group-sm">
                        <label for="inputEmail3" class="control-label">Misi</label>
                      </div>
                      <div class="col-sm-6 input-group-sm">
                      <textarea style="width:100%" name="misi" id="editorMisi"></textarea>
                      </div>
                    </div>
                  </div>



              </div>
            </div>
            </div>
          <input type="reset" class="display-none reset" style="display:none">
          </form>
        </div>
    </section>
  </section>
</section>
</section>
<script>
$(document).ready(function (){
  //sett tanggal
  $(".tgl_akta").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
  $(".tgl_sah").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
  $(".tgl_berdiri").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
  $('#editorVisi').jqxEditor({
                height: 300,
                width: "100%",
                tools: 'bold italic underline | left center right'
            });
  $('#editorMisi').jqxEditor({
                height: 300,
                width: "100%",
                tools: 'bold italic underline | left center right'
            });
  //set province and city
  /*var url = "../sampledata/customers.txt";
  // prepare the data
  var source =
  {
      datatype: "json",
      datafields: [
          { name: 'CompanyName' },
          { name: 'ContactName' }
      ],
      url: url,
      async: false
  };
  var dataAdapter = new $.jqx.dataAdapter(source);

  // Create a jqxDropDownList
  $("#jqxWidget").jqxDropDownList({
      selectedIndex: 0, source: dataAdapter, displayMember: "ContactName", valueMember: "CompanyName", width: 200, height: 25
  });
  */
  $.ajax({
    url:"<?=current_url()?>/getIdentity",
    dataType:"json",
    type:"get",
    success:function(result){
      $("#formYayasan input,#formYayasan textarea").each(function(){
        if($(this).attr("name")=="tgl_akta")
        {
          $(".tgl_akta").jqxDateTimeInput("val",result[$(this).attr("name")]);
        }
        else if($(this).attr("name")=="tgl_sah")
        {
          $(".tgl_sah").jqxDateTimeInput("val",result[$(this).attr("name")]);
        }
        else if($(this).attr("name")=="tgl_berdiri")
        {
          $(".tgl_berdiri").jqxDateTimeInput("val",result[$(this).attr("name")]);
        }
        else if($(this).attr("name")=="visi")
        {
          $("#editorVisi").jqxEditor('val', result[$(this).attr("name")]);
        }
        else if($(this).attr("name")=="misi")
        {
          $("#editorMisi").jqxEditor('val',result[$(this).attr("name")]);
        }
        else{
            $(this).val(result[$(this).attr("name")]);
        }

      });
      $(".imgChangeImage").attr("src","<?=base_url()?>assets/identitas_yayasan/"+result["logo"]);
    }
  });
  $("#formYayasan").submit(function(){
    $("textarea[name=visi]").html($("#editorVisi").val())
    $("textarea[name=misi]").html($("#editorMisi").val());
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "<?=current_url()?>/save",
      data:formData,
      dataType:'json',
      cache:false,
      contentType: false,
      processData: false,
      success:function(result){
          if(result.status=="success")
          {
            $("#spin").removeClass("show");
            $("#spin").removeClass("inline");
            $(".btnSave").html("Save");
            $(".btnSave").removeClass("disabled");
            $(".btnSave").removeAttr("disabled");

            Notification.open(result.message,"success");
            $(".imgChangeImage").attr("src","<?=base_url()?>assets/identitas_yayasan/logo.png");
          }
          else{
            $("#spin").removeClass("show");
            $("#spin").removeClass("inline");
            $(".btnSave").html("Save");
            $(".btnSave").removeClass("disabled");
            $(".btnSave").removeAttr("disabled");

            Notification.open(result.message,"error");
          }
      },
      error:function(){
          $("#spin").removeClass("show");
          $("#spin").removeClass("inline");
          $(".btnSave").html("Simpan");
          $(".btnSave").removeClass("disabled");
          $(".btnSave").removeAttr("disabled");
          Notification.open("Connection lost, Check your Connection and try again !","error");
      }
      });
      return false;
  })

  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});
});
</script>
