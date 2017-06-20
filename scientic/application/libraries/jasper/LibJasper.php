<?php
/*
 * FUNGSI JASPER
 * (c) 2015 @ randiekas@gmail.com
 *
 */
class LibJasper{
	function loadJasper($file,$params=array(),$type="",$file_name="file.xls")
	{
		include_once('class/tcpdf/tcpdf.php');
		include_once("class/PHPJasperXML.inc.php");
			include("application/config/database.php");
			$server=$db['default']["hostname"];
			$database=$db['default']["database"];
			$user=$db['default']["username"];
			$pass=$db['default']["password"];
			
			//$xml =  simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/academic/matakuliah/RP-MK-01.jrxml");
			$location = "report/".$file["location"];
			$params['SUBREPORT_DIR']=$location;
			
			$xml =  simplexml_load_file($location.$file["name"]);
			$PHPJasperXML = new PHPJasperXML();
			$PHPJasperXML->debugsql=false;
			$PHPJasperXML->arrayParameter=$params;
			$PHPJasperXML->xml_dismantle($xml);

			$PHPJasperXML->transferDBtoArray($server,$user,$pass,$database);
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		//include("report/report.php");
	}
}
?>