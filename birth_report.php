<?php 
session_start();
include("oracle_to_php.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Birth Report</title>
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
<form action="birth_report.php" method="post">

<table width="60%" border="0" align="center" id="tblBirthDet" class="tableStyle">	
	  <tbody><tr height="40">
		<td colspan="8" class="title">B I R T H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D E T A I L S&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U P D A T I O N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F O R M</td>
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
    	<p><strong style="color:#FFF;">Birth Details</strong></p>
    </td>
</tr>
<tr>
	<td><strong>Reg.No</strong></td>
    <td><strong>Zone</strong></td>
    <td><strong>Ward</strong> </td>
    <td><strong>Reg.Date</strong></td>
    <td><strong>D.O.B</strong></td>
    <td><strong>Child Name</strong></td>
    <td><strong>Father Name</strong></td>
    <td><strong>Mother Name</strong></td>
    <td><strong>Place of Birth</strong></td>
    <td><strong>Address Of the <br />Parents At the Time <br /> of Birth of child</strong></td>
    <td><strong>Child Weight(Kgs)</strong></td> 
    <!--<td><strong>Edit</strong></td>--> 
</tr>

<?php 	
if($reg_year!='' && $reg_no!='' && $zone!='' && $ward!='')
{
	$query	= mysql_query("select BD_REGNO, BD_REGYR, ULB_NO, WD_CODE, BD_REGDT, BD_CHLDDOB, BD_CHLDNAME, BD_FATNAME, BD_MOTNAME,BD_CHLDPOB,BD_FATSTREET,BD_FATADD1, BD_FATADD2, BD_FATPIN,BD_INFNAME,BD_FATREL,BD_DELMETH, BD_CHLDWT from ".birth_table." where BD_REGNO='$reg_no' AND BD_REGYR='$reg_year' AND ULB_NO='$zone' AND WD_CODE='$ward' AND BD_ENTBY='".trim($_SESSION['username'])."'");
	//mysql_execute($query);
}
else
{
	$sel_birth	= mysql_query("SELECT COUNT(*) AS NUM_ROWS FROM ".birth_table." where BD_ENTBY='".trim($_SESSION['username'])."'");
	//mysql_execute($sel_birth);
	$row=mysql_fetch_array($sel_birth);
	$num_rows=$row['NUM_ROWS'];
	
	$query	= mysql_query("select BD_REGNO, BD_REGYR, ULB_NO, WD_CODE, BD_REGDT, BD_CHLDDOB, BD_CHLDNAME, BD_FATNAME, BD_MOTNAME,BD_CHLDPOB,BD_FATSTREET,BD_FATADD1, BD_FATADD2, BD_FATPIN,BD_INFNAME,BD_FATREL, BD_DELMETH, BD_CHLDWT FROM ".birth_table."
	where BD_ENTBY='".trim($_SESSION['username'])."'");
	
	/*$sel_birth	= mysql_query("SELECT COUNT(*) AS NUM_ROWS FROM ".birth_table." where BD_ENTBY='".trim($_SESSION['username'])."'");
	//mysql_execute($sel_birth);
	$row=mysql_fetch_array($sel_birth);
	$num_rows=$row['NUM_ROWS'];
	echo "select * from (select rownum r, BD_REGNO, BD_REGYR, ULB_NO, WD_CODE, BD_REGDT, BD_CHLDDOB, BD_CHLDNAME, BD_FATNAME, BD_MOTNAME,BD_CHLDPOB,BD_FATSTREET,BD_FATADD1, BD_FATADD2, BD_FATPIN,BD_INFNAME,BD_FATREL, BD_DELMETH, BD_CHLDWT FROM ".birth_table.")
	where BD_ENTBY='".trim($_SESSION['username'])."' AND r >(select max(rownum)-20 FROM ".birth_table.")";
	
	$query	= mysql_query("select * from (select rownum r, BD_REGNO, BD_REGYR, ULB_NO, WD_CODE, BD_REGDT, BD_CHLDDOB, BD_CHLDNAME, BD_FATNAME, BD_MOTNAME,BD_CHLDPOB,BD_FATSTREET,BD_FATADD1, BD_FATADD2, BD_FATPIN,BD_INFNAME,BD_FATREL, BD_DELMETH, BD_CHLDWT FROM ".birth_table.")
	where BD_ENTBY='".trim($_SESSION['username'])."' AND r >(select max(rownum)-20 FROM ".birth_table.")");*/
	
	
	//mysql_execute($query);
}
while($rows=mysql_fetch_array($query))
{ 
	/*$sel_fam_rel = mysql_query("SELECT DELMETH_CODE, DELMETH_DESC FROM ".delivery_table." WHERE DELMETH_STATUS='Y' AND DELMETH_CODE='".$rows['BD_DELMETH']."'");
	//mysql_execute($sel_fam_rel);		
	$row_del = mysql_fetch_array($sel_fam_rel);
	$method=$row_del['DELMETH_DESC'];*/
?>
<tr>
	<td><?php echo $rows['BD_REGNO'];?></td>
	<td><?php echo $rows['ULB_NO'];?></td>
	<td><?php echo $rows['WD_CODE'];?></td>
	<td><?php echo $rows['BD_REGDT'];?></td>
	<td><?php echo $rows['BD_CHLDDOB'];?></td>
	<td><?php echo $rows['BD_CHLDNAME'];?></td>
	<td><?php echo $rows['BD_FATNAME'];?></td>
	<td><?php echo $rows['BD_MOTNAME'];?></td>
	<td><?php echo $rows['BD_CHLDPOB'];?></td>
	<td><?php echo $rows['BD_FATSTREET'].",".$rows['BD_FATADD1'].",".$rows['BD_FATADD2'].",".$rows['BD_FATPIN'];?></td>
	<td><?php echo $rows['BD_CHLDWT']." kgs";?></td>
    <?php /*?><td><a href="edit_birthform.php?reg_no=<?php echo $rows['BD_REGNO']; ?>&regis_yr=<?php echo $rows['BD_REGYR']; ?>&zone=<?php echo $rows['ULB_NO'];?>&ward=<?php echo $rows['WD_CODE']; ?>">Edit</a></td><?php */?>
</tr>
<?php }?>
</table>
</div>
<br />
<br />

<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>

</body>
</html>