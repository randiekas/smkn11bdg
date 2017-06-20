[
	{ text: "Kode", datafield: "koderpp",width: "15%" },
	{ text: "Materi", datafield: "rpp",width: "40%" },
	{ text: "Deskripsi", datafield: "deskripsi",width: "35%" },
	{ text: "aktif", datafield: "aktif",
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
