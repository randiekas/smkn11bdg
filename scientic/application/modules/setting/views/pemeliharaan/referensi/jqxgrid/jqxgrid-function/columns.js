[
    { text: "Group", datafield: "ref_grup",filtertype: 'input', columntype:"textbox",width: "10%",filtertype:'checkedlist'},
	{ text: "Kode", datafield: "ref_kode",filtertype: 'input', columntype:"textbox",width: "10%"},
	{ text: "Nama", datafield: "ref_nama",filtertype: 'input', columntype:"textbox",width: "15%" },
    { text: "Keterangan", datafield: "ref_ket",filtertype: 'input', columntype:"textbox",width: "55%",filtertype:'checkedlist'},
    { text: "Status", datafield: "na",filtertype: 'input',width: "10%",filtertype:'bool',
      columntype:"checkbox",
      createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
			var inputTag = $("<div style ='border: none;margin-left:42%;margin-top:5px'> </ div>").appendTo(htmlElement);
			inputTag.jqxCheckBox({ width: 10, height: 10 });
			return inputTag;
		},
		getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                return htmlElement.jqxCheckBox('val');
                                
                            }
    }
]
