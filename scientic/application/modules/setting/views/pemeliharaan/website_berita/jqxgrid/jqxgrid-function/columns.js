[	
	{ text: "Kategori", datafield: "id_category_news",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pmb = getDataField("website_category_news","id","category")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$pmb?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
                                var selectedItem = htmlElement.jqxDropDownList('getSelectedItem');
                                if (!selectedItem)
                                    return "";

                                var value = selectedItem.value;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxDropDownList('clearSelection');
          },
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$pmb?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
				geteditorvalue: function (row, cellvalue, editor) {
								// return the editor's value.
								return editor.jqxDropDownList('getSelectedItem').value;
							}
	},
	{ text: "Judul", datafield: "title",width: "40%" },
	{ text: "Dibuat", datafield: "created",width: "15%",editable:'false',
	createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
							  var inputTag = $("<div style='border: none;margin:5px'>[Auto]</div>").appendTo(htmlElement);
							  
							  return inputTag;
						  }
	},
	{ text: "Pembuat", datafield: "author",width: "15%",editable:'false',
	createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
							  var inputTag = $("<div style='border: none;margin:5px'>[Auto]</div>").appendTo(htmlElement);
							  
							  return inputTag;
						  }
	},
	{ text: 'Ubah Konten', datafield: 'Edit Content', columntype: 'button',width:'15%',
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
							  var inputTag = $("<div style='border: none;margin:5px'>[Auto]</div>").appendTo(htmlElement);
							  
							  return inputTag;
						  },
		cellsrenderer: function () {
                     return "Ubah Konten";
                  }, buttonclick: function (row) {
                     // open the popup window when the user clicks a button.
                     editrow = row;
                     
                     
                     var dataRecord = $("#jqxGrid").jqxGrid('getrowdata', editrow);
					 location.href="form_edit/"+dataRecord.id;
                     
                 }
    }
]
