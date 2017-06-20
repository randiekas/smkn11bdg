 // prepare the data
			 elementJqxGrid = $("#jqwidgetsModule");
            elementJqxGridSource =
            {
                dataType: "json",
                dataFields: [
                 	{ "name": "id"},
					{ "name": "level_id"},
					{ "name": "module_level_id"},
					{ "name": "parent_id"},
					{ "name": "sort_number"},
					{ "name": "name"},
					{ "name": "url"},
					{ "name": "slug"},
					{ "name": "folder"},
					{ "name": "author"},
					{ "name": "icon"},
					{ "name": "bg"},
					{ "name": "na"},
					{ "name": "module_type"},
					{ "name": "tags"},
					{ "name": "update"},
					{ "name": "view"}
                ],
                hierarchy:
                {
                    keyDataField: { name: 'id' },
                    parentDataField: { name: 'parent_id' }
                },
                id: 'id',
                url: current_url()+"/getModule/",
				data:{
					level_id:""
				}
            };
            var dataAdapter = new $.jqx.dataAdapter(elementJqxGridSource);
            // create Tree Grid
            elementJqxGrid.jqxTreeGrid(
            {
				theme:themeWidget,
				//checkboxes: true,
				//hierarchicalCheckboxes: true,
                width: "100%",
				height : $( window ).height()-110,
                source: dataAdapter,
                pageable: false,
				filterable: true,
				filterMode: 'simple',
                columnsResize: true,
				editable: false,
				editSettings:{  editOnDoubleClick: true },
				columns: [
					{ text: "name", datafield: "name",width: "60%" },
					{ text: "view", datafield: "view",width: "20%",
						cellsRenderer: function (row, column, value, rowData) {
							if(value==1){
									var checkBox = "<input type='checkbox' checked onclick=updateModule('view')>";
							}
							 else{
								 var checkBox = "<input type='checkbox' onclick=updateModule('view')>";
							 }
							return checkBox;
						}
					},
					{ text: "update", datafield: "update",width: "20%",
						cellsRenderer: function (row, column, value, rowData) {
							if(value==1){
									var checkBox = "<input type='checkbox' checked onclick=updateModule('update')>";
							}
							 else{
								 var checkBox = "<input type='checkbox' onclick=updateModule('update')>";
							 }
							return checkBox;
						},
					}
                ]
            });
			elementJqxGrid.on('bindingComplete', function (event) { 
				elementJqxGrid.jqxTreeGrid('expandAll');
			}); 
			
			