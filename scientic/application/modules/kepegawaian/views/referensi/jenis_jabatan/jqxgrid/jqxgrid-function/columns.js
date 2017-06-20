[
	{ text: "Urutan", datafield: "urutan",width: "10%" },
	{ text: "Jenis", datafield: "jenis",width: "20%" },
	{ text: "Jabatan", datafield: "jabatan",width: "30%" },
	{ text: "Keterangan", datafield: "keterangan",width: "30%" },
	{ text: "Default ?", datafield: "isdefault",
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
