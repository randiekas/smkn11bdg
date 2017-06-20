[
	{
	  text: '#', sortable: false, filterable: false, editable: false,pinned: true,
	  groupable: false, draggable: false, resizable: false,
	  datafield: '', columntype: 'number', width: 30,
	  cellsrenderer: function (row, column, value) {
		  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
	  }
	},
	{ text: "*angkatan", datafield: "idangkatan",width: "150px",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$angkatan = getDataField("angkatan","replid","angkatan")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$angkatan?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "*nis", datafield: "nis",width: "150px" },
	{ text: "nisn", datafield: "nisn",width: "150px" },
	{ text: "nik", datafield: "nik",width: "150px" },
	{ text: "noun", datafield: "noun",width: "150px" },
	{ text: "*nama", datafield: "nama",width: "150px" },
	{ text: "panggilan", datafield: "panggilan",width: "150px" },
	{ text: "*tahun masuk", datafield: "tahunmasuk",width: "150px" },
	{ text: "suku", datafield: "suku",width: "150px" },
	{ text: "agama", datafield: "agama",width: "150px",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$agama = getDataField("referensi","ref_kode","ref_nama","ref_grup","51")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$agama?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "kondisi", datafield: "kondisi",width: "150px",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$kondisi = getDataField("referensi","ref_kode","ref_nama","ref_grup","75")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$kondisi?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "kelamin", datafield: "kelamin",width: "150px",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$kondisi = getDataField("referensi","ref_kode","ref_nama","ref_grup","08")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$kondisi?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "tmplahir", datafield: "tmplahir",width: "150px" },
	{ text: "tgllahir", datafield: "tgllahir",width: "150px" ,
		columntype:"datetimeinput",
        createeditor: function (row, column, editor) {
            editor.jqxDateTimeInput({formatString: 'yyyy-MM-dd', showCalendarButton: true});
        },
        geteditorvalue:function (row, cellValue, editor) {
			return editor.jqxDateTimeInput("val").split("/").reverse().join("-");
        }
	},
	{ text: "warga", datafield: "warga",width: "150px" },
	{ text: "anakke", datafield: "anakke",width: "150px" },
	{ text: "jsaudara", datafield: "jsaudara",width: "150px" },
	{ text: "statusanak", datafield: "statusanak",width: "150px" },
	{ text: "jkandung", datafield: "jkandung",width: "150px" },
	{ text: "jtiri", datafield: "jtiri",width: "150px" },
	{ text: "bahasa", datafield: "bahasa",width: "150px" },
	{ text: "berat", datafield: "berat",width: "150px" },
	{ text: "tinggi", datafield: "tinggi",width: "150px" },
	{ text: "darah", datafield: "darah",width: "150px" },
	{ text: "foto", datafield: "foto",width: "150px" },
	{ text: "alamatsiswa", datafield: "alamatsiswa",width: "150px" },
	{ text: "jarak", datafield: "jarak",width: "150px" },
	{ text: "kodepossiswa", datafield: "kodepossiswa",width: "150px" },
	{ text: "telponsiswa", datafield: "telponsiswa",width: "150px" },
	{ text: "hpsiswa", datafield: "hpsiswa",width: "150px" },
	{ text: "emailsiswa", datafield: "emailsiswa",width: "150px" },
	{ text: "kesehatan", datafield: "kesehatan",width: "150px" },
	{ text: "asalsekolah", datafield: "asalsekolah",width: "150px" },
	{ text: "noijasah", datafield: "noijasah",width: "150px" },
	{ text: "tglijasah", datafield: "tglijasah",width: "150px" },
	{ text: "ketsekolah", datafield: "ketsekolah",width: "150px" },
	{ text: "namaayah", datafield: "namaayah",width: "150px" },
	{ text: "namaibu", datafield: "namaibu",width: "150px" },
	{ text: "statusayah", datafield: "statusayah",width: "150px" },
	{ text: "statusibu", datafield: "statusibu",width: "150px" },
	{ text: "tmplahirayah", datafield: "tmplahirayah",width: "150px" },
	{ text: "tmplahiribu", datafield: "tmplahiribu",width: "150px" },
	{ text: "tgllahirayah", datafield: "tgllahirayah",width: "150px" },
	{ text: "tgllahiribu", datafield: "tgllahiribu",width: "150px" },
	{ text: "almayah", datafield: "almayah",width: "150px" },
	{ text: "almibu", datafield: "almibu",width: "150px" },
	{ text: "pendidikanayah", datafield: "pendidikanayah",width: "150px",
		// assign a new data source to the dropdownlist.
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pendidikan = getDataField("referensi","ref_kode","ref_nama","ref_grup","77")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$pendidikan?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "pendidikanibu", datafield: "pendidikanibu",width: "150px",
		// assign a new data source to the dropdownlist.
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pendidikan?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$pendidikan?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "pekerjaanayah", datafield: "pekerjaanayah",width: "150px",
		// assign a new data source to the dropdownlist.
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pekerjaan = getDataField("referensi","ref_kode","ref_nama","ref_grup","55")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$pekerjaan?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "pekerjaanibu", datafield: "pekerjaanibu",width: "150px",
		// assign a new data source to the dropdownlist.
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pekerjaan?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$pekerjaan?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "wali", datafield: "wali",width: "150px" },
	{ text: "penghasilanayah", datafield: "penghasilanayah",width: "150px" },
	{ text: "penghasilanibu", datafield: "penghasilanibu",width: "150px" },
	{ text: "alamatortu", datafield: "alamatortu",width: "150px" },
	{ text: "telponortu", datafield: "telponortu",width: "150px" },
	{ text: "hportu", datafield: "hportu",width: "150px" },
	{ text: "emailayah", datafield: "emailayah",width: "150px" },
	{ text: "alamatsurat", datafield: "alamatsurat",width: "150px" },
	{ text: "keterangan", datafield: "keterangan",width: "150px" },
	{ text: "hobi", datafield: "hobi",width: "150px" },
	{ text: "statusmutasi", datafield: "statusmutasi",width: "150px",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$mutasi = getDataField("jenismutasi","replid","jenismutasi")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		initeditor:function (row, cellValue, editor, cellText, width, height) {
				editor.jqxDropDownList('selectItem', cellValue);
			},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$mutasi?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					}
	},
	{ text: "alumni", datafield: "alumni",width: "150px"},
	{ text: "emailibu", datafield: "emailibu",width: "150px" }
]
