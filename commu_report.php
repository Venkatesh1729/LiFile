<?php session_start();
include("oracle_to_php.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Communicable Disease Report</title>
<style>
.tableStyle {
    background: none repeat scroll 0 0 #83AECE;
}
.tableStyle .title {
    background: none repeat scroll 0 0 #4282B2;
    color: #FFFFFF;
    font-weight: bold;
    text-align: center;
}
.tableStyle td {
    background: none repeat scroll 0 0 #FFFFFF;
    padding: 5px;
}
TD {
    color: #000000;
    font-size: 12px;
}
.mainoption {
    background: url("images/menu-bg-H.jpg") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
    border: 2px solid #4282B2;
    color: #000000;
    font-weight: normal;
    padding: 3px;
}
.mainoption {
    border-width: 1px;
    color: #000000;
    font-weight: bold;
}
INPUT {
    border-color: #000000;
    border-style: ridge;
    border-width: 1px;
    color: #000000;
    font: 12px Verdana,Arial,Helvetica,sans-serif;
}
</style>
<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>  
<script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script> 
</head>
<body>
<?php
include("home.php");
?>
<div style="width:100%;" align="center"><br />
<form action="commu_report.php" method="post">

<table width="60%" border="0" align="center" id="tblBirthDet" class="tableStyle">	
	  <tbody><tr height="40">
		<td colspan="8" class="title">C O M M U N I C A B L E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D I S E A S E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U P D A T I O N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F O R M</td>
	  </tr>
	  <tr height="40">
		<td align="right" nowrap="" width="15%"><b>From Date</b>&nbsp;</td>
		<td width="10%" align="center">&nbsp;<input type="text" maxlength="4" size="15" readonly="readonly" required name="from_date" id="from_date" value="<?php echo $_POST['from_date']; ?>">
        				<a href="javascript:NewCal('from_date','ddMMMyyyy',false,24)">
		    	            <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
	            		</a>
                	</td>
		<td align="right" nowrap="" width="15%"><b>To Date</b>&nbsp;</td>
		<td align="center" width="15%"><input type="text" maxlength="10" size="15" required name="to_date" readonly="readonly" id="to_date" value="<?php echo $_POST['to_date']; ?>"> 
        		<a href="javascript:NewCal('to_date','ddMMMyyyy',false,24)">
    	            <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
	            </a></td>
	  </tr>	  
	  <tr height="40">
		  <td colspan="8" align="center">
			<input type="submit" name="search" class="mainoption" value="&nbsp;&nbsp;View&nbsp;&nbsp;  ">&nbsp;&nbsp;
			<input type="reset" class="mainoption" name="Reset" value="Reset">
		</td>
	  </tr>	  
	</tbody></table>
</form>
<br />
<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2" style="width:90%;">
<tr>
	<td height="35" colspan="35"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Death Details</strong></p>
    </td>
</tr>
<tr>
	<td><strong>Patient Name</strong></td>
    <td><strong>Address</strong></td>
    <td><strong>Contact No</strong> </td>
    <td><strong>Sex</strong></td>
    <td><strong>Age</strong></td>
    <td><strong>Reported Date</strong></td>
    <td><strong>Disease Type</strong></td>
    <!--<td><strong>Edit</strong></td> -->
</tr>
<?php 	
if(isset($_POST['search']))
{
	$from_date = date('Y-m-d', strtotime($_POST['from_date']));
	$to_date = date('Y-m-d', strtotime($_POST['to_date']));
		$query	= mysql_query("select  PATIENT_CODE, PATIENT_NAME, PAT_ADDR1, PAT_ADDR1T, PAT_ADDR2, PAT_ADDR2T, PAT_ADDR3, PAT_ADDR3T, PAT_ADDR4, PAT_ADDR4T, CONTACT_NO, SEX, AGE, DATE_OF_REPORTING, DISEASE_TYPE FROM ".commdiseases_table." WHERE DATE_OF_REPORTING >= '".$from_date."' AND DATE_OF_REPORTING <='".$to_date."'");	
}
else
{
	$query	= mysql_query("select  PATIENT_CODE, PATIENT_NAME, PAT_ADDR1, PAT_ADDR1T, PAT_ADDR2, PAT_ADDR2T, PAT_ADDR3, PAT_ADDR3T, PAT_ADDR4, PAT_ADDR4T, CONTACT_NO, SEX, AGE, DATE_OF_REPORTING, DISEASE_TYPE FROM ".commdiseases_table." ");
}

	//mysql_execute($query);
while($rows=mysql_fetch_array($query))
{ 
 	$dis_dtl = mysql_query("SELECT * FROM ".diseasestype_table." WHERE DISEASE_CODE='".$rows['DISEASE_TYPE']."'");
	//mysql_execute($dis_dtl);
	$drows = mysql_fetch_array($dis_dtl); 
	$disease=$drows['DISEASE_NAME'];
	
	$sta_dtl = mysql_query("SELECT STATE_NAME FROM ".state_table." WHERE STATE_CODE='".$rows['PAT_ADDR3']."'");
	//mysql_execute($sta_dtl);
	$drows = mysql_fetch_array($sta_dtl); 
	$state=$drows['STATE_NAME'];
?>
<tr>
	<td><?php echo $rows['PATIENT_NAME'];?></td>
	<td><?php echo $rows['PAT_ADDR1'].", ".$rows['PAT_ADDR2'].", ".$state.", ".$rows['PAT_ADDR4'];?></td>
	<td><?php echo $rows['CONTACT_NO'];?></td>
	<td><?php echo $rows['SEX'];?></td>
	<td><?php echo $rows['AGE'];?></td>
	<td><?php echo $rows['DATE_OF_REPORTING'];?></td>
    <td><?php echo $disease;?></td>
    <?php /*?><td><a href="edit_commu_disentry.php?pat_code=<?php echo $rows['PATIENT_CODE']; ?>">Edit</a></td><?php */?>
</tr>
<?php }?>
</table>
</div>
<br />
<br /><br />
<br /><br />
<br /><br />
<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>
</body>
</html>