[
	{ text: "Satuan Kerja", datafield: "satker",width: "30%" },
	{ text: "Nama", datafield: "nama",width: "60%" },
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
