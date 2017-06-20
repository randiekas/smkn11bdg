<?php
//CONCAT('".base_url()."/',icon) as icon
$this->db->select("id,parentid,label,value,CONCAT('".base_url("assets/jqwidgets/")."/',icon) as icon",FALSE);
$this->db->where("groupid","1");
$source = $this->db->get("uicomponents")->result_array();
?>
var data = <?=json_encode($source)?>;
  var source =
  {
      datatype: "json",
      datafields: [
          { name: 'id' },
          { name: 'parentid' },
          { name: 'label' },
          { name: 'value' },
          { name: 'icon' }

      ],
      id: 'id',
      localdata: data
  };
    var dataAdapter = new $.jqx.dataAdapter(source);
    // perform Data Binding.
    dataAdapter.dataBind();
    var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items',[{ name: 'value', map: 'value'}]);

    $('#ListOfUIComponentBootstrap').jqxTree({ source: records,allowDrag: false,allowDrop: false  });
