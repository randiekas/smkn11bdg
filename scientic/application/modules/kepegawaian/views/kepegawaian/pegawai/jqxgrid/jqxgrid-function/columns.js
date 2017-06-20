[
  { text: "NIP", datafield: "nip",width: "15%" },
  { text: "NUPTK", datafield: "nuptk",width: "15%" },
  { text: "NRP", datafield: "nrp",width: "15%" },
  { text: "Nama", datafield: "nama",width: "30%" },
  { text: "Bagian", datafield: "bagian",width: "15%" },
  { text: "Status", datafield: "aktif",
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
