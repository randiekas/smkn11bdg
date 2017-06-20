[
	{ text: "No Pendaftaran", datafield: "nopendaftaran",width: "150px",
		cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
			
				if (elementJqxGridReligion.jqxGrid('getrowdata', row).siswa==0) {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+value+"</span>";
                }
                else {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';color:white; background:green">'+value+"</span>";
                }
            }   
	},
	{ text: "NISN", datafield: "nisn",width: "100px" },
	{ text: "Nama", datafield: "nama",width: "100px" },
	{ text: "Sumb. 1", datafield: "sum1",width: "100px" },
	{ text: "Sumb. 2", datafield: "sum2",width: "100px" },
	{ text: "Ujian 1", datafield: "ujian1",width: "100px" },
	{ text: "Ujian 2", datafield: "ujian2",width: "100px" },
	{ text: "Ujian 3", datafield: "ujian3",width: "100px" },
	{ text: "Ujian 4", datafield: "ujian4",width: "100px" },
	{ text: "Ujian 5", datafield: "ujian5",width: "100px" },
	{ text: "Ujian 6", datafield: "ujian6",width: "100px" },
	{ text: "Ujian 7", datafield: "ujian7",width: "100px" },
	{ text: "Ujian 8", datafield: "ujian8",width: "100px" },
	{ text: "Ujian 9", datafield: "ujian9",width: "100px" }
]
