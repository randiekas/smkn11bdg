[
	{ text: "Jam Ke", datafield: "jamke",width: "70x" },
	{ text: "Jam", datafield: "jam",width: "200px" },
	<?php
	$this->db->where("ref_grup","54");
	foreach($this->db->get("referensi")->result() as $row)
	{
	?>
	{ text: "<?=$row->ref_nama?>", datafield: "<?=$row->ref_nama?>",width: "200px" },
	<?php
	}
	?>
]
