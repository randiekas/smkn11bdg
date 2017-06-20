[
	{ text: "Depertemen", datafield: "departemen",width: "10%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$departemen = getDataField("departemen","departemen","departemen")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$departemen?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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

                                var value = selectedItem.label;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxDropDownList('clearSelection');
          }
	},
	{ text: "Kategori", datafield: "idkategori",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$kategori = getDataField("kategoripenerimaan","kode","kategori")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "value", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$kategori?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
					initeditor:function (row, cellValue, editor, cellText, width, height) {
				 		editor.jqxDropDownList('selectItem', cellValue);
			 		},
					cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
			            var items = <?=$kategori?>;
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
	{ text: "Nama", datafield: "nama",width: "15%" },
	{ text: "KAS", datafield: "rekkas",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$kas = $this->model->get_kas_kategori("HARTA")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$kas?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
					initeditor:function (row, cellValue, editor, cellText, width, height) {
				 		editor.jqxDropDownList('selectItem', cellValue);

			 		},
					cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
			            var items = <?=$kas?>;
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
	{ text: "Pendapatan", datafield: "rekpendapatan",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pendapatan = $this->model->get_kas_kategori("PENDAPATAN")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$pendapatan?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
					initeditor:function (row, cellValue, editor, cellText, width, height) {
				 		editor.jqxDropDownList('selectItem', cellValue);
			 		},
					cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
			            var items = <?=$pendapatan?>;
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
	{ text: "Piutang", datafield: "rekpiutang",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$piutang = $this->model->get_kas_kategori("PIUTANG")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$piutang?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
					initeditor:function (row, cellValue, editor, cellText, width, height) {
				 		editor.jqxDropDownList('selectItem', cellValue);
			 		},
					cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
			            var items = <?=$piutang?>;
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
	{ text: "Diskon", datafield: "info1",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pendapatan?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
							var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
							var source =
							{
									datatype: "json",
									localdata: <?=$pendapatan?>,
									datafields: [
											{ name: 'value' },
											{ name: 'label' }
									],
							};
							var dataAdapter = new $.jqx.dataAdapter(source);

							// Create a jqxDropDownList
							inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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
					initeditor:function (row, cellValue, editor, cellText, width, height) {
						editor.jqxDropDownList('selectItem', cellValue);
					},
					cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
									var items = <?=$pendapatan?>;
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
	{ text: "Keterangan", datafield: "keterangan",width: "30%" },
	{ text: "Aktif ?", datafield: "aktif",
		columntype:"checkbox",width: "10%",
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
			var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
			inputTag.jqxCheckBox({ width: 10, height: 10 });
			return inputTag;
		},
		getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                return htmlElement.jqxCheckBox('val');

                            }
	}
]
