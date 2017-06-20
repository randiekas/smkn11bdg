jqxGridJurnalDetail = $("#jqxGridJurnalDetail");
jqxGridJurnalDetailDataFields = [
	{ "name": "replid"},
	{ "name": "idjurnal"},
	{ "name": "koderek"},
	{ "name": "debet",'type':'number'},
	{ "name": "kredit",'type':'number'}
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridJurnalDetailDataFields,
	  url: current_url()+"/grid_jurnal_detail/",
		data: {
					idjurnal:''
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridJurnalDetail.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-($( window ).height()*0.6),
   autoheight: false,
   showstatusbar: true,
   showaggregates: true,
   pageable: false,
   showfilterrow: false,
   filterable: false,
   sortable: true,
   columnsResize: true,
   altrows: true,
   showeverpresentrow: false,
   everpresentrowposition: "top",
   everpresentrowactions: "addBottom reset",
   editable:true,
   //editmode:'dblclick',
   editmode:'click',
   selectionmode:'multiplecellsadvanced',
   groupable: false,
   showtoolbar:true,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before"},
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="simpanJurnalDetail" type="button" value="Simpan Perubahan" />');
						$("#simpanJurnalDetail").jqxButton();
						
						// create new row.
						
						$("#simpanJurnalDetail").on('click', function () {
								// jqxGridJurnalDetail.jqxGrid({showeverpresentrow:true});
								var dataPost= new Object();
								dataPost.detail = jqxGridJurnalDetail.jqxGrid('getrows');
								
								dataPost.idjurnal = dataJurnal.replid;
								
								var sumDebet = jqxGridJurnalDetail.jqxGrid('getcolumnaggregateddata', 'debet', ['sum']);
								var sumKredit = jqxGridJurnalDetail.jqxGrid('getcolumnaggregateddata', 'kredit', ['sum']);
								if(sumDebet.sum==sumKredit.sum)
								{
								jqxGridJurnalDetail.jqxGrid('showloadelement');
								$.ajax({
									 dataType: 'json',
									 url: '<?=current_url()?>/save_jurnal_detail',
									 type:'post',
									 data:dataPost,
									 success: function (data, status, xhr) {
											Notification.open(data.message,"success");
											Notification.open(data.message,"success");
											
											jqxGridJurnalDetail.jqxGrid('updatebounddata');
											jqxGridJurnalDetail.jqxGrid('hideloadelement');
									},
									 error: function (data,status) {
										 Notification.open("Detail Jurnal gagal disimpan,coba lagi atau cek koneksi internet anda","error");
										 jqxGridJurnalDetail.jqxGrid('hideloadelement');
									 }
								 });
								 
								}else{
									alert.alert("Gagal Menyimpan","Jumlah Debet harus sama dengan jumlah Kredit",function(){})
									
									
								}
								
						});
						
		},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
		 }},
		{ text: "Kode Akun", datafield: "koderek",width: "45%",
			columntype: 'combobox',
		createeditor: function (row, column, editor) {
			// assign a new data source to the ComboBox.
			var source =
			{
				datatype: "json",
				localdata: <?=$wali = getDataField("v_simple_rekakun","kode","nama")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxComboBox
			editor.jqxComboBox({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$wali?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxComboBox
              inputTag.jqxComboBox({source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
              $(document).on('keydown.productname', function (event) {
                  if (event.keyCode == 13) {
                      if (event.target === inputTag[0]) {
                          addCallback();
                      }
                      else if ($(event.target).ischildof(inputTag)) {
                          addCallback();
                      }
                  }
              });
              return inputTag;
          },
          getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                var selectedItem = htmlElement.jqxComboBox('getSelectedItem');
                                if (!selectedItem)
                                    return "";

                                var value = selectedItem.value;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxComboBox('clearSelection');
          },
		   initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxComboBox('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$wali?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
				geteditorvalue: function (row, cellvalue, editor) {
								// return the editor's value.
								if(editor.jqxComboBox('getSelectedItem'))
								{
									return editor.jqxComboBox('getSelectedItem').value;
								}
								
							}
		},
		{ text: "Debet", datafield: "debet",width: "25%",aggregates: ['sum'],cellsformat:'c2'},
		{ text: "Kredit", datafield: "kredit",width: "25%",aggregates: ['sum'],cellsformat:'c2'},
    ]
});
jqxGridJurnalDetail.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataJurnalDetail  = row;
	 
});

            