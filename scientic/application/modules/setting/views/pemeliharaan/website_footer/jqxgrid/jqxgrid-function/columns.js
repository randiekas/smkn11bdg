[	
	{ text: "nama_module", datafield: "nama_module",width: "45%" },
	{ text: "link", datafield: "link",width: "30%" },
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
	},{ text: 'Edit', datafield: 'Edit', columntype: 'button',width:'15%',
		cellsrenderer: function () {
                     return "Edit";
                  }, buttonclick: function (row) {
                     // open the popup window when the user clicks a button.
                     editrow = row;
                     
                     
                     var dataRecord = $("#jqxGrid").jqxGrid('getrowdata', editrow);
					 window.open("form_edit/"+dataRecord.id,"_blank");
                     
                 }
    }
]
