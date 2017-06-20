[
	{ text: "Jam Ke", datafield: "jamke",width: "100px" },
	{ text: "Jam", datafield: "jam",width: "250px" },
	<?php
	foreach($this->db->get("ruang")->result() as $row)
	{
	?>
	{ text: "<?=$row->kd_ruang?>", datafield: "<?=$row->kd_ruang?>",width: "200px",
		cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
				newvalue = value.split('#');
                if (newvalue[1]) {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+newvalue[1]+"</span>";
                }
            }   
	},
	<?php
	}
	?>
]
