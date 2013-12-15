<?php 
session_start();
include("oracle_to_php.php");

if(isset($_POST['submit']))
{
	$diseases_name = $_POST['diseases_name'];
	$diseases_name_tamil = $_POST['diseases_name_tamil'];
		
	$entry_by=trim($_SESSION['username']);
	$dcode = $_POST['dcode'];
	
	$sql = "UPDATE ".diseasestype_table." SET DISEASE_NAME='$diseases_name',DISEASE_TAMIL_NAME='$diseases_name_tamil',ENTRY_BY='$entry_by' WHERE DISEASE_CODE='$dcode'";
	$compiled = oci_parse($conn, $sql);
	oci_execute($compiled);
	
	if($compiled==1)
	{
		echo "<strong style='color:#0F0;'>Record Saved Successfully..!</strong>";
		header("Location:disease_entry.php");
	}
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
$query	= oci_parse($conn,"SELECT * FROM ".diseasestype_table." where DISEASE_CODE='$_GET[dis_code]' AND DISEASE_NAME='$_GET[dis_name]'");
oci_execute($query);
$row=oci_fetch_array($query);
?>
<br />
<center>
	<form method="post" name="diseases" action="edit_diseaseform.php">
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
        
          <input type="hidden" name="dcode" id="dcode" value="<?php echo $row['DISEASE_CODE']; ?>" class="boxfields"/>
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Diseases Name&nbsp;:</strong>
            </td>
         	<td width="209" >
           		 <input type="text" name="diseases_name" id="diseases_name" value="<?php echo $row['DISEASE_NAME']; ?>" class="boxfields"/>
            </td>      
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3021;&#2965;&#2995;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;&nbsp;:</strong></td>
            <td width="259" >
          	  <input type="text" name="diseases_name_tamil" id="diseases_name_tamil" value="<?php echo $row['DISEASE_TAMIL_NAME']; ?>" class="boxfields"/>
            <a href="javascript:;" onClick="return popitup('keyboard.php','diseases_name_tamil');" > 
         	   <img src="keyboard.png" width="28" height="13"> 
            </a>
            </td>
        </tr>
        
        <tr>
        <tr>
            <td colspan="4" align="center">
                <input type="submit" name="submit" value="submit" id="submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
                <a href="disease_entry.php"><input type="button" name="Reset" value="Back" id="Reset" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;"  /></a>
            </td>
        </tr>  
        </table>
    </div>
    </form>
</center>
<br /><br /><br />
<br /><br /><br />
<br /><br /><br />
<br /><br />
<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>
</body>
</html>