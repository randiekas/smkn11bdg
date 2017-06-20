[
  { text: "Program", datafield: "kd_program",width: "10%",
    columntype: 'dropdownlist',
    createeditor: function (row, column, editor) {
        // assign a new data source to the dropdownlist.
        var source =
        {
            datatype: "json",
            localdata: <?=getDataField("referensi","ref_kode","ref_kode","ref_grup","64")?>,
            datafields: [
                { name: 'value' },
                { name: 'label' }
            ],
        };
        var dataAdapter = new $.jqx.dataAdapter(source);

        // Create a jqxDropDownList
        editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
    },
    createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=getDataField("referensi","ref_kode","ref_kode","ref_grup","64")?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});

              return inputTag;
          },
          getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                var selectedItem = htmlElement.jqxDropDownList('getSelectedItem');
                                if (!selectedItem)
                                    return "";

                                var value = selectedItem.label;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxDropDownList('clearSelection');
          }
  },
  { text: "Hari", datafield: "kd_hari",width: "30%",
  columntype: 'dropdownlist',
  createeditor: function (row, column, editor) {
      // assign a new data source to the dropdownlist.
      var source =
      {
          datatype: "json",
          localdata: <?=getDataField("referensi","ref_kode","ref_nama","ref_grup","54")?>
      };
      var dataAdapter = new $.jqx.dataAdapter(source);

      // Create a jqxDropDownList
      editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "value", valueMember: "value"});
  },
  initeditor:function (row, cellValue, editor, cellText, width, height) {
      editor.jqxDropDownList('selectItem', cellValue);
  },
  geteditorvalue:function (row, cellValue, editor) {
      return editor.jqxDropDownList('getSelectedItem').value;
  },

  createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
            var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
            var source =
            {
                datatype: "json",
                localdata: <?=getDataField("referensi","ref_kode","ref_nama","ref_grup","54")?>,
                datafields: [
                    { name: 'value' },
                    { name: 'label' }
                ],
            };
            var dataAdapter = new $.jqx.dataAdapter(source);

            // Create a jqxDropDownList
            inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});

            return inputTag;
        },
        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=getDataField("referensi","ref_kode","ref_nama","ref_grup","54")?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
        getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                              var selectedItem = htmlElement.jqxDropDownList('getSelectedItem');
                              if (!selectedItem)
                                  return "";

                              var value = selectedItem.value;
                              return value;
                          },
        resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
            htmlElement.jqxDropDownList('clearSelection');
        }
  },
  { text: "Sesi", datafield: "sesi",width: "10%%",
    columntype:"numberinput",
    createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
        var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
        inputTag.jqxNumberInput({ width: '100%',inputMode: 'simple',decimalDigits:0,spinButtons: true });
        return inputTag;
    },
    getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
        return htmlElement.jqxNumberInput("val");
    }
  },
  { text: "SKS", datafield: "sks",width: "10%",
    columntype:"numberinput",
    createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
        var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
        inputTag.jqxNumberInput({ width: '100%',inputMode: 'simple',decimalDigits:0,spinButtons: true });
        return inputTag;
    },
    getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
        return htmlElement.jqxNumberInput("val");
    }
  },
  { text: "Jam Mulai", datafield: "jam_mulai",width: "15%",
    columntype:"datetimeinput",
    createeditor: function (row, column, editor) {
        editor.jqxDateTimeInput({formatString: 'HH:mm:ss',showTimeButton: true, showCalendarButton: false});
    },
    geteditorvalue:function (row, cellValue, editor) {
        return editor.jqxDateTimeInput("val");
    },
    createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
        var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
        inputTag.jqxDateTimeInput({ width: '100%', formatString: 'HH:mm:ss',showTimeButton: true, showCalendarButton: false});
        return inputTag;
    },
    getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
        return htmlElement.jqxDateTimeInput("val");
    }
  },
  { text: "Jam Selesai", datafield: "jam_selesai",width: "15%",columntype:"datetimeinput",
    columntype:"datetimeinput",
    createeditor: function (row, column, editor) {
        editor.jqxDateTimeInput({formatString: 'HH:mm:ss',showTimeButton: true, showCalendarButton: false});
    },
    geteditorvalue:function (row, cellValue, editor) {
        return editor.jqxDateTimeInput("val");
    },
    createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
        var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
        inputTag.jqxDateTimeInput({ width: '100%', formatString: 'HH:mm:ss',showTimeButton: true, showCalendarButton: false});
        return inputTag;
    },
    getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
        return htmlElement.jqxDateTimeInput("val");
    }
  },
  { text: '', datafield: 'addButtonColumn', width: 50 },
	{ text: '', datafield: 'resetButtonColumn', width: 50 }
]
