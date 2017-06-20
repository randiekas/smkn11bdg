[
  { text: "Kode Gedung", datafield: "kd_gedung",width: "15%" },
  { text: "Nama Gedung", datafield: "nama_gedung",width: "30%"},
  { text: "Lokasi", datafield: "lokasi",width: "15%" },
  { text: "UPB", datafield: "kd_upb",width: "30%",
    columntype: 'dropdownlist',
    createeditor: function (row, column, editor) {
        // assign a new data source to the dropdownlist.
        var source =
        {
            datatype: "json",
            localdata: <?=getDataField("upb","kd_upb","kd_upb")?>,
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
                  localdata: <?=getDataField("upb","kd_upb","kd_upb")?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
              $(document).on('keydown.productname', function (event) {
                  if (event.keyCode == 13) {
                      if (event.target === inputTag[0]) {
                          addCallback();
                      }
                      else if ($(event.target).ischildof(inputTag)) {
                          addCallback();
                      }
                  }
              });
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
	{ text: '', datafield: 'addButtonColumn', width: "5%" },
	{ text: '', datafield: 'resetButtonColumn', width: "5%" }
]
