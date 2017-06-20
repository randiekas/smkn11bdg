// renderer for grid cells.
             var numberrenderer = function (row, column, value) {
                 return '<div style="text-align: center; margin-top: 5px;">' + (1 + value) + '</div>';
             }

             // create Grid datafields and columns arrays.
             var datafields = [];
             var columns = [];
              

             var source =
            {
                unboundmode: true,
                totalrecords: 100,
                datafields: datafields,
                updaterow: function (rowid, rowdata) {
                    // synchronize with the server - send update command   
                }
            };

             var dataAdapter = new $.jqx.dataAdapter(source);

             // initialize jqxGrid
             $("#jqxGridImport").jqxGrid(
            {
                width: "99.80%",
                source: dataAdapter,
				editmode:'singleclick',
                editable: true,
                columnsresize: true,
                selectionmode: 'multiplecellsadvanced',
                columns: columns
            });
			/*
            $("#excelExport").jqxButton({ theme: theme });
            $("#excelExport").click(function () {
                $("#jqxGridImport").jqxGrid('exportdata', 'xls', 'jqxGrid', false);
            });
			*/
