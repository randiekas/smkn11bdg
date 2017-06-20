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
  url: "http://localhost/erp_campus/index.php/engine/Widget_jqxtree/tree_data",
  async: false,
  id: 'id'
};


  var dataAdapter = new $.jqx.dataAdapter(source);
  // perform Data Binding.
  dataAdapter.dataBind();
  var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items',[{ name: 'slug', map: 'value'}]);
  $('#jqxTreeUserLevelModule').jqxTree({ source: records,hasThreeStates: true, checkboxes: true,height:'100%'});
