// initialize a jqxTree inside the Solution Explorer Panel
var url ="";
var slug="";
var data = <?=json_encode(getAccessMenu())?>;
  var source =
  {
      datatype: "json",
      datafields: [
          { name: 'id' },
          { name: 'parentid' },
          { name: 'label' },
          { name: 'slug' },
          { name: 'icon' }

      ],
      id: 'id',
      localdata: data
  };


    var dataAdapter = new $.jqx.dataAdapter(source);
    // perform Data Binding.
    dataAdapter.dataBind();
    var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items',[{ name: 'slug', map: 'value'}]);
    $('#ListOfModule').jqxTree({ source: records,toggleMode:'click',allowDrag:false,allowDrop:false});
    $("#ListOfModule").jqxTree('selectItem', $("#ListOfModule").find('li:first')[0]);

    $('#ListOfModule').on('select', function (event) {
      var item = $(this).jqxTree('getItem', args.element);
      var slug = item.value;
          if(slug!="false")
          {

              $("#frameUIPreview").attr("src","<?=site_url()?>/"+slug);


          }
    });
    $('#ListOfPage').on('select', function (event) {
      var item = $(this).jqxTree('getItem', args.element);
      var url = item.value;
          if(url!="false")
          {
              $("#frameUIDesigner").attr("src","<?=site_url()?>/engine/designer/openPage/"+url);


          }
    });
    $("#ListOfModule").jqxTree('focus');
