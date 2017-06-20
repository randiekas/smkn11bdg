 // prepare the data
			var elementJqxGrid = $("#jqxGrid");
            var source =
            {
                dataType: "json",
                dataFields: [
									{ "name": "replid"},
									{ "name": "rootid"},
									{ "name": "jabatan"},
									{ "name": "singkatan"},
									{ "name": "satker"},
									{ "name": "eselon"},
									{ "name": "isdefault"}
                ],
                hierarchy:
                {
                    keyDataField: { name: 'replid' },
                    parentDataField: { name: 'rootid' }
                },
                id: 'replid',
                url: current_url()+"/grid_data/"
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            // create Tree Grid
            elementJqxGrid.jqxTreeGrid(
            {
				theme:themeWidget,
                width: "100%",
				height : $( window ).height()-110,
                source: dataAdapter,
                pageable: false,
				filterable: true,
				filterMode: 'simple',
                columnsResize: true,
				editable: false,
				columns: [
									{ text: "Singkatan", datafield: "singkatan",width: "20%" },
									{ text: "Jabatan", datafield: "jabatan",width: "50%" },
									{ text: "Satuan Kerja", datafield: "satker",width: "20%" },
									{ text: "Eselon", datafield: "eselon",width: "10%" }
                ]
            });
			elementJqxGrid.on("rowSelect",function(event){
				// event args.
				var args = event.args;
				// row data.
				var row = args.row;
				// row key.
				$("#form_coa input,#form_coa select,#form_coa textarea").each(function(){
					$(this).val(row[$(this).attr("name")]);
				});
				console.log(row.induk);
				$("#induk").val(row.induk);
				$("#editrowbutton").removeAttr("disabled");
				$("#deleterowbutton").removeAttr("disabled");
				$("#saverowbutton").removeAttr("disabled");
			});
			elementJqxGrid.on('bindingComplete', function (event) {
				elementJqxGrid.jqxTreeGrid('expandAll');
			});
