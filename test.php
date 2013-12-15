<?php include("oracle_to_php.php");

$sel_birth	= oci_parse($conn,"SELECT PATIENT_CODE, PATIENT_NAME, PATIENT_TAMIL_NAME, 
   PAT_ADDR1, PAT_ADDR1T, PAT_ADDR2, 
   PAT_ADDR2T, PAT_ADDR3, PAT_ADDR3T, 
   PAT_ADDR4, PAT_ADDR4T, CONTACT_NO, 
   SEX, AGE, DATE_OF_REPORTING, 
   DISEASE_TYPE, ENTRY_BY, ENTRY_DATE, 
   SEXT, DISEASE_TYPE_TAMIL, PATIENT_TYPE, 
   PATIENT_TYPE_TAMIL
FROM ".commdiseases_table." ");
oci_execute($sel_birth);
while($row=oci_fetch_array($sel_birth))
{
	$DISEASE_TYPE_TAMIL = $row['DISEASE_TYPE_TAMIL'];
	$PATIENT_TYPE = $row['PATIENT_TYPE'];
	$PATIENT_TYPE_TAMIL = $row['PATIENT_TYPE_TAMIL'];
	$PATIENT_CODE = $row['PATIENT_CODE'];
	$PATIENT_NAME = $row['PATIENT_NAME'];
	$PATIENT_TAMIL_NAME = $row['PATIENT_TAMIL_NAME'];
	$PAT_ADDR1 = $row['PAT_ADDR1'];
	$ENTRY_DATE = date('Y-m-d', strtotime($row['ENTRY_DATE']));
	$PAT_ADDR1T = $row['PAT_ADDR1T'];
	$PAT_ADDR2 = $row['PAT_ADDR2'];	
	$PAT_ADDR2T = $row['PAT_ADDR2T'];
	$PAT_ADDR3 = $row['PAT_ADDR3'];
	$PAT_ADDR3T = $row['PAT_ADDR3T'];
	$PAT_ADDR4 = $row['PAT_ADDR4'];
	$PAT_ADDR4T = $row['PAT_ADDR4T'];
	$CONTACT_NO = $row['CONTACT_NO'];
	$DATE_OF_REPORTING = date('Y-m-d', strtotime($row['DATE_OF_REPORTING']));
	$SEX = $row['SEX'];
	$AGE = $row['AGE'];	
	$DATE_OF_REPORTING = $row['DATE_OF_REPORTING'];
	$DISEASE_TYPE = $row['DISEASE_TYPE'];
	$ENTRY_BY = $row['ENTRY_BY'];
	$SEXT = $row['SEXT'];
	$conn1 = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("ccmc", $conn1) or die(mysql_error());
	
	$sql = " INSERT INTO commdiseases (PATIENT_CODE, PATIENT_NAME, PATIENT_TAMIL_NAME, 
   PAT_ADDR1, PAT_ADDR1T, PAT_ADDR2, 
   PAT_ADDR2T, PAT_ADDR3, PAT_ADDR3T, 
   PAT_ADDR4, PAT_ADDR4T, CONTACT_NO, 
   SEX, AGE, DATE_OF_REPORTING, 
   DISEASE_TYPE, ENTRY_BY, ENTRY_DATE, 
   SEXT, DISEASE_TYPE_TAMIL, PATIENT_TYPE, 
   PATIENT_TYPE_TAMIL) 
	VALUES('$PATIENT_CODE', '$PATIENT_NAME', '$PATIENT_TAMIL_NAME', '$PAT_ADDR1', '$PAT_ADDR1T', '$PAT_ADDR2', '$PAT_ADDR2T', '$PAT_ADDR3', '$PAT_ADDR3T', '$PAT_ADDR4', '$PAT_ADDR4T', '$CONTACT_NO', '$SEX', '$AGE', '$DATE_OF_REPORTING', '$DISEASE_TYPE', '$ENTRY_BY', '$ENTRY_DATE', '$SEXT', '$DISEASE_TYPE_TAMIL', '$PATIENT_TYPE', '$PATIENT_TYPE_TAMIL')";
	mysql_query($sql);
}




//echo oci_field_name($sel_birth);exit;

/*$ncols = oci_num_fields($sel_birth);

for ($i = 1; $i <= $ncols; $i++) {
	echo $column_name  = oci_field_name($sel_birth, $i);
	$r = 0;
	while($row=oci_fetch_array($sel_birth))
	{
	echo	$row[$r];
		$r++;
	}

}
	
	
exit;*/
?>