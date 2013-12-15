<?php
	$conn1 = mysql_connect("localhost","root","root") or die(mysql_error());
	mysql_select_db("ccmc", $conn1) or die(mysql_error());



/*$conn = oci_connect('ulbadminuat', 'ulbadmin', '220.225.213.211/CBEMAIN');
if (!$conn) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
	//$conn = oci_connect('ulbadmin', 'syseXcel2010', '172.10.10.15/cbemain');
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
*/
//$conn = oci_connect('ulbadmin', 'syseXcel2010', '172.10.10.15/cbemain');
/*$conn = oci_connect('ulbadminuat', 'ulbadmin', '220.225.213.211/CBEMAIN');
if (!$conn) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}*/
	//$conn = oci_connect('ulbadmin', 'syseXcel2010', '172.10.10.15/cbemain');
/*if (!$conn) {
   $m = oci_error();*/
   //echo $m['message'], "\n";
  /* exit;
}*/
define("zone_table",  "ulbdet"); // 1. refre table name 2. database table name
define("ward_table", "warddet")  ;
define("street_table", "streetdet");
define("district_table","tbmstdistrict");
define("town_table","tbmsttown");
define("occupation_table", "tbmstoccupation");
define("education_table", "tbmsteducation");
define("religion_table", "tbmstreligion");
define("delivery_table", "tbmstdeliverymethod");
define("delivery_attention_table", "tbmstdeliverytype");
define("hospital_table", "hospinf");
define("birth_table","brbirdet");
define("state_table","bdstatedet");
define("death_table","drdeadet");
define("disease_table","diseasedet");
define("user_table", "tbmstuser");
define("hospuser_table", "hospitalusers");
define("commdiseases_table", "commdiseases");
define("diseasestype_table", "commdiseasedet");
?>