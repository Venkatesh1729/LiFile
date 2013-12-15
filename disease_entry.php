<?php 
session_start();
include("oracle_to_php.php");

if(isset($_POST['submit']))
{
	$diseases_name = $_POST['diseases_name'];
	$diseases_name_tamil = $_POST['diseases_name_tamil'];
	$ent_date="select to_date(to_char(sysdate,'dd/mm/yyyy HH:MI:SS'),'dd/mm/yyyy HH:MI:SS') from dual";
	$compiled1 = oci_parse($conn, $ent_date);
	oci_execute($compiled1);
	$row_date = oci_fetch_array($compiled1);
	$entry_date=$row_date[0];
	$entry_by=trim($_SESSION['username']);
	$dcode = $_POST['dcode'];
	
	$sql = "INSERT INTO ".diseasestype_table."(DISEASE_CODE,DISEASE_NAME,DISEASE_TAMIL_NAME,ENTRY_BY,ENTRY_DATE)VALUES('$dcode', '$diseases_name', '$diseases_name_tamil', '$entry_by', '$entry_date')";
	$compiled = oci_parse($conn, $sql);
	oci_execute($compiled);
	
	if($compiled==1)
	{
		echo "<strong style='color:#0F0;'>Record Saved Successfully..!</strong>";
	}
}
if($_GET['dis_code']!='' && $_GET['dis_name']!='')
{
	$dcode = $_GET['dis_code'];
	$dis_name=$_GET['dis_name'];
	
	$sql1 = "DELETE FROM ".diseasestype_table." WHERE DISEASE_CODE='$dcode' AND DISEASE_NAME='$dis_name'";
	$compiled1 = oci_parse($conn, $sql1);
	oci_execute($compiled1);
	header("Location:disease_entry.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ta" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC</title>
<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>  
<script language="javascript" type="text/javascript" src="js/validate.js"></script>
<script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script> 
    <script type="text/javascript">
      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
          sourceLanguage: 'en', // or google.elements.transliteration.LanguageCode.ENGLISH,
          destinationLanguage: ['ta'], // or [google.elements.transliteration.LanguageCode.HINDI],
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true
        };
        // Create an instance on TransliterationControl with the 
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        // Enable transliteration in the textfields with the given ids.
        var ids = [ "diseases_name_tamil"];
		//alert(ids);
        control.makeTransliteratable(ids);
        control.showControl('translControl');
      }
      google.setOnLoadCallback(onLoad);
	  function popitup(url,id) 
	  {
		 // alert(id);
		var url = "keyboard.php?tamil_id="+id ;
		newwindow=window.open(url,'name','height=220,width=310,scrollbar=no');
		if (window.focus) {newwindow.focus()}
		return false;
	  }
      </script>

</head>
<body>
<?php
include("home.php");
?>
<br />
<center>
	<form method="post" name="diseases" action="disease_entry.php">
    	<div style="width:990px;" align="center">
    	<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
        <tr>
            <td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
                <p><strong style="color:#FFF;">Communicable Diseases Entry</strong></p>
            </td>
        </tr>
        <tr>
        	<td colspan="4"><strong>&nbsp;DISEASES MASTER</strong></td>
        </tr>
        <?php 
			$discod_query	= oci_parse($conn,"SELECT MAX(DISEASE_CODE) AS dcode FROM ".diseasestype_table." ");
			oci_execute($discod_query);
			$discod=oci_fetch_array($discod_query);
			$dcode =  $discod['DCODE']+1;
		?>
         <input type="hidden" name="dcode" id="dcode" value="<?php echo $dcode; ?>" class="boxfields"/>
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Diseases Name&nbsp;:</strong>
            </td>
            <td width="209" >
            <input type="text" name="diseases_name" id="diseases_name" value="" class="boxfields"/>
            </td>      
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3021;&#2965;&#2995;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;&nbsp;:</strong></td>
            <td width="259" >
            <input type="text" name="diseases_name_tamil" id="diseases_name_tamil" value="" class="boxfields"/>
            <a href="javascript:;" onClick="return popitup('keyboard.php','diseases_name_tamil');" > 
            <img src="keyboard.png" width="28" height="13"> 
            </a>
            </td>
        </tr>
        
        <tr>
        <tr>
            <td colspan="4" align="center">
                <input type="submit" name="submit" value="submit" id="submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
                <input type="reset" name="Reset" value="Reset" id="Reset" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;"  />
            </td>
        </tr>  
        </table>
    </div>
    </form>
    <br /><br />
<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2" style="width:60%;">
<tr>
	<td height="35" colspan="35"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Disease Details</strong></p>
    </td>
</tr>
<tr>
	<td><strong>Disease Code</strong></td>
    <td><strong>Disease Name</strong></td>
    <td><strong>Disease Tamil Name</strong> </td>
    <td><strong>Action</strong></td>
</tr>
<?php
$dquery	= oci_parse($conn,"SELECT * FROM ".diseasestype_table." ORDER BY DISEASE_CODE ASC");
oci_execute($dquery);
while($rows=oci_fetch_array($dquery))
{ 
?>
<tr>
	<td><?php echo $rows['DISEASE_CODE'];?></td>
	<td><?php echo $rows['DISEASE_NAME'];?></td>
	<td><?php echo $rows['DISEASE_TAMIL_NAME'];?></td>
    <td><a href="edit_diseaseform.php?dis_code=<?php echo $rows['DISEASE_CODE']; ?>&dis_name=<?php echo $rows['DISEASE_NAME']; ?>">Edit</a> / 
	    <a onclick="return confirm('Are you sure you want to delete?');" href="disease_entry.php?dis_code=<?php echo $rows['DISEASE_CODE']; ?>&dis_name=<?php echo $rows['DISEASE_NAME']; ?>">Delete</a> </td>
</tr>
<?php }?>
</table>
</center>
<br /><br /><br />
<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>
</body>
</html>