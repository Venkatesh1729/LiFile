<?php session_start();
include("oracle_to_php.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Death Report</title>
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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>   
</head>
<body>
<?php
include("home.php");
?>
<div style="width:100%;" align="center"><br />
<form action="death_report.php" method="post">

<table width="60%" border="0" align="center" id="tblBirthDet" class="tableStyle">	
	  <tbody><tr height="40">
		<td colspan="8" class="title">D E A T H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D E T A I L S&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U P D A T I O N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F O R M</td>
	  </tr>
	  <tr height="40">
		<td align="right" nowrap="" width="15%"><b>Registration Year</b>&nbsp;</td>
		<td width="10%" align="center">&nbsp;<input type="text" maxlength="4" size="7" required name="reg_yr"></td>
		<td align="right" nowrap="" width="15%"><b>Registration No</b>&nbsp;</td>
		<td align="center" width="15%"><input type="text" maxlength="10" size="15" required name="reg_no"></td>
		<td align="center" nowrap="" width="8%"><b>Zone</b></td>
		<td align="center" width="12%">
			<select name="zone" required id="zone" class="boxfields" onchange="getzone_id(this.value);" style="width:130px;">
            <option selected="" value="">---Select---</option>
            <?php 
			 	$sel_zone = mysql_query("SELECT ULB_NO, ULB_NAME FROM ".zone_table." ORDER BY ULB_NAME ASC");
				//mysql_execute($sel_zone);
				while($row_zone = mysql_fetch_array($sel_zone)) 
				{ ?>
            	<option value="<?php echo $row_zone['ULB_NO'];?>"><?php echo $row_zone['ULB_NAME'];?></option>
            <?php 
				} 
				?>
			</select>
		</td>
		<td align="center" nowrap="" width="8%"><b>Ward</b></td>
		<td align="center" width="12%">
			<select name="ward" id="ward" required>
				<option value="">--Select--</option>						
			</select>
		</td>
	  </tr>	  
	  <tr height="40">
		  <td colspan="8" align="center">
			<input type="submit" name="search" class="mainoption" value="  &nbsp;&nbsp;View&nbsp;&nbsp;  ">&nbsp;&nbsp;
			<input type="reset" class="mainoption" value="  Reset   ">
		</td>
	  </tr>	  
	</tbody></table>
</form>
<br />
<?php
if(isset($_POST['search']))
{
	$reg_year=$_POST['reg_yr'];
	$reg_no=$_POST['reg_no'];
	$zone=$_POST['zone'];
	$ward=$_POST['ward'];
}
?>
<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2" style="width:90%;">
<tr>
	<td height="35" colspan="35"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Death Details</strong></p>
    </td>
</tr>
<tr>
	<td><strong>Reg.No</strong></td>
    <td><strong>Zone</strong></td>
    <td><strong>Ward</strong> </td>
    <td><strong>Reg.Date</strong></td>
    <td><strong>Death Date</strong></td>
    <td><strong>Person Name</strong></td>
    <td><strong>Father Name</strong></td>
    <td><strong>Husband/Wife</strong></td>
    <td><strong>Place of Death</strong></td>
    <td><strong>Address of the Deceased <br />at the time of Death</strong></td>
    <td><strong>Death Cause</strong></td>
    <!--<td><strong>Edit</strong></td> -->
</tr>

<?php 	
if($reg_year!='' && $reg_no!='' && $zone!='' && $ward!='')
{
	$query	= mysql_query("select DD_REGNO, DD_REGYR, ULB_NO, WD_CODE, DD_REGDT, DD_DEATHDT, DD_PERNAME, DD_FATNAME, DD_HUSBANDNAMEORWIFE,DD_PLACE,DD_DURDEATHADD1,DD_DURDEATHADD2, DD_DURDEATHADD3, DD_DURDEATHADD4,DD_DEATHCAUSE from ".death_table." where DD_REGNO='$reg_no' AND DD_REGYR='$reg_year' AND ULB_NO='$zone' AND WD_CODE='$ward' AND DD_ENTBY='".trim($_SESSION['username'])."'");
	//mysql_execute($query);
	//echo "select DD_REGNO, DD_REGYR, ULB_NO, WD_CODE, DD_REGDT, DD_DEATHDT, DD_PERNAME, DD_FATNAME, DD_HUSBANDNAMEORWIFE,DD_PLACE,DD_DURDEATHADD1,DD_DURDEATHADD2, DD_DURDEATHADD3, DD_DURDEATHADD4,DD_DEATHCAUSE from ".death_table." where DD_REGNO='$reg_no' AND DD_REGYR='$reg_year' AND ULB_NO='$zone' AND WD_CODE='$ward' AND DD_ENTBY='".trim($_SESSION['username'])."'";
}
else
{
	$sel_birth	= mysql_query("SELECT COUNT(*) AS NUM_ROWS FROM ".death_table."");
	//mysql_execute($sel_birth);
	$row=mysql_fetch_array($sel_birth);
	$num_rows=$row['NUM_ROWS'];
	
	$query	= mysql_query("select DD_REGNO, DD_REGYR, ULB_NO, WD_CODE, DD_REGDT, DD_DEATHDT, DD_PERNAME, DD_FATNAME, DD_HUSBANDNAMEORWIFE,DD_PLACE,DD_DURDEATHADD1,DD_DURDEATHADD2, DD_DURDEATHADD3, DD_DURDEATHADD4,DD_DEATHCAUSE FROM ".death_table." where DD_ENTBY='".trim($_SESSION['username'])."'");
	
	
	/*$query	= mysql_query("select * from (select rownum r, DD_REGNO, DD_REGYR, ULB_NO, WD_CODE, DD_REGDT, DD_DEATHDT, DD_PERNAME, DD_FATNAME, DD_HUSBANDNAMEORWIFE,DD_PLACE,DD_DURDEATHADD1,DD_DURDEATHADD2, DD_DURDEATHADD3, DD_DURDEATHADD4,DD_DEATHCAUSE FROM ".death_table.")
	where r >(select max(rownum)-20 FROM ".death_table.")");*/
	//mysql_execute($query);
}
while($rows=mysql_fetch_array($query))
{ 
 	$dis_dtl = mysql_query("SELECT * FROM ".disease_table." WHERE DIS_CODE='".$rows['DD_DEATHCAUSE']."' ORDER BY DIS_CODE ASC");
	//mysql_execute($dis_dtl);
	$drows = mysql_fetch_array($dis_dtl); 
	$disease=$drows['DIS_DESC'];
?>

<tr>
	<td><?php echo $rows['DD_REGNO'];?></td>
	<td><?php echo $rows['ULB_NO'];?></td>
	<td><?php echo $rows['WD_CODE'];?></td>
	<td><?php echo $rows['DD_REGDT'];?></td>
	<td><?php echo $rows['DD_DEATHDT'];?></td>
	<td><?php echo $rows['DD_PERNAME'];?></td>
	<td><?php echo $rows['DD_FATNAME'];?></td>
	<td><?php echo $rows['DD_HUSBANDNAMEORWIFE'];?></td>
	<td><?php echo $rows['DD_PLACE'];?></td>
	<td><?php echo $rows['DD_DURDEATHADD1'].",".$rows['DD_DURDEATHADD2'].",".$rows['DD_DURDEATHADD3'].",".$rows['DD_DURDEATHADD4'];?></td>
	<td><?php echo $disease;?></td>
    <?php /*?><td><a href="edit_deathform.php?reg_no=<?php echo $rows['DD_REGNO']; ?>&regis_yr=<?php echo $rows['DD_REGYR']; ?>&zone=<?php echo $rows['ULB_NO'];?>&ward=<?php echo $rows['WD_CODE']; ?>">Edit</a></td><?php */?>
</tr>
<?php }?>
</table>
</div>
<br />
<br /><br />
<br /><br /><br />
<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>
</body>
</html>