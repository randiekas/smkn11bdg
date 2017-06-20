var records = <?=$this->load->view("designer/ListOfModule.json")?>;
$('#ListOfPage').jqxTree({ source: records});
