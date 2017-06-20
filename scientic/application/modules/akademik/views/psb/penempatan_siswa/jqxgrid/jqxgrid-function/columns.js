[
	{ text: "Pilihan 1", datafield: "pilihanpertama",width: "100px",filtertype: 'checkedlist'},
	{ text: "Pilihan 2", datafield: "pilihankedua",width: "100px",filtertype: 'checkedlist'},
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
	{ text: "P.Pendaftaran", datafield: "sum1",width: "100px" },
	{ text: "UN B.IND", datafield: "ujian1",width: "100px" },
	{ text: "UN B.Ing", datafield: "ujian2",width: "100px" },
	{ text: "UN Mat", datafield: "ujian3",width: "100px" },
	{ text: "UN IPA", datafield: "ujian4",width: "100px" },
	{ text: "Total Nilai", datafield: "ujian5",width: "100px" },
	{ text: "Jarak", datafield: "jarak",width: "100px" }



]
