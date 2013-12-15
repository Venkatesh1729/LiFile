<?php 
session_start();
include("oracle_to_php.php");
if(isset($_POST['submit']))
{
	$diseases_type = $_POST['diseases_type'];
	$diseases_type_tamil = $_POST['diseases_type_tamil'];
	$patient_type = $_POST['patient_type'];
	$patient_type_tamil = $_POST['patient_type_tamil'];
	$patient_name = $_POST['patient_name'];
	$patient_name_tamil = $_POST['patient_name_tamil'];
	$patient_address1 = $_POST['patient_address1'];	
	$patient_address2 = $_POST['patient_address2'];
	$patient_address_state = $_POST['patient_address_state'];
	$patient_address3 = $_POST['patient_address3'];
	$patient_address_tamil1 = $_POST['patient_address_tamil1'];
	$patient_address_tamil2 = $_POST['patient_address_tamil2'];
	$patient_address_state_tamil = $_POST['patient_address_state_tamil'];
	$patient_address_tamil3 = $_POST['patient_address_tamil3'];	
	$contactno = $_POST['contactno'];
	$patient_gender = $_POST['patient_gender'];
	$patient_gendert = $_POST['patient_gendert'];
	$age = $_POST['age'];
	$reporting_date = $_POST['reporting_date'];
	$patient_address_state_tamil = $_POST['patient_address_state_tamil'];
	$patient_address_tamil3 = $_POST['patient_address_tamil3'];	
	$contactno = $_POST['contactno'];
	$pat_code =  $_POST['pcode'];	
	
	$entry_by=trim($_SESSION['username']);
  
   $sql = "UPDATE ".commdiseases_table." SET PATIENT_NAME='$patient_name',PATIENT_TAMIL_NAME='$patient_name_tamil',PAT_ADDR1='$patient_address1',PAT_ADDR1T='$patient_address_tamil1',PAT_ADDR2='$patient_address2',PAT_ADDR2T='$patient_address_tamil2',PAT_ADDR3='$patient_address_state',PAT_ADDR3T='$patient_address_state_tamil',PAT_ADDR4='$patient_address3',PAT_ADDR4T='$patient_address_tamil3',CONTACT_NO='$contactno', SEX='$patient_gender', SEXT='$patient_gendert',AGE='$age',DATE_OF_REPORTING='$reporting_date',DISEASE_TYPE='$diseases_type', DISEASE_TYPE_TAMIL='$diseases_type_tamil',PATIENT_TYPE='$patient_type',PATIENT_TYPE_TAMIL='$patient_type_tamil',ENTRY_BY='$entry_by' WHERE PATIENT_CODE='$pat_code'";

	$compiled = oci_parse($conn, $sql);
	$exect = oci_execute($compiled);
	if($exect==1)
	{
		$msg="Report has been saved successfully.!!";
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
        var ids = [ "patient_name_tamil", "patient_address_tamil1", "patient_address_tamil2", "patient_address_tamil3"];
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
	$dis_query	= oci_parse($conn,"SELECT * FROM ".commdiseases_table." WHERE PATIENT_CODE='$_GET[pat_code]' ");
	oci_execute($dis_query);
	$drow=oci_fetch_array($dis_query);
?>
<br />
<center>
	<form method="post" action="edit_commu_disentry.php" onsubmit="return validatecommform();">
    	<div style="width:990px;" align="center">
        <p align="center" style="font:Arial, Helvetica, sans-serif; font-size:14px; color:#F00;"><?php echo $msg; ?></p>
<br />
		<input type="hidden" name="pcode" value="<?php echo $_GET['pat_code']; ?>" />
    	<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
        <tr>
            <td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
                <p><strong style="color:#FFF;">Communicable Diseases Entry</strong></p>
            </td>
        </tr>
        <tr>
        	<td colspan="4"><strong>&nbsp;DISEASES INFORMATION</strong></td>
        </tr>
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Types Of Diseases&nbsp;:</strong>
            </td>
            <td width="209" >
            	<select name="diseases_type" id="diseases_type" class="boxfields">
                	<option value="">--- Select ---</option>
                    <?php 
					$discod_query	= oci_parse($conn,"SELECT DISEASE_CODE,DISEASE_NAME FROM ".diseasestype_table." ");
					oci_execute($discod_query);
					while($discod=oci_fetch_array($discod_query))
					{
					?>
                    <option value="<?php echo $discod['DISEASE_CODE'];?>" <?php if($discod['DISEASE_CODE']==$drow['DISEASE_TYPE']) echo "selected" ;?>><?php echo $discod['DISEASE_NAME'];?></option>
                    <?php } ?>
                </select>
            </td>
        
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3021;&#2965;&#2995;&#3021; &#2997;&#2965;&#3016;&#2965;&#2995;&#3021;&nbsp;:</strong></td>
            <td width="259" >
             <select name="diseases_type_tamil" id="diseases_type_tamil" class="boxfields">
                	<option value="">--- Select ---</option>
                    <?php 
					$discod_query	= oci_parse($conn,"SELECT DISEASE_CODE,DISEASE_TAMIL_NAME FROM ".diseasestype_table." ");
					oci_execute($discod_query);
					while($discod=oci_fetch_array($discod_query))
					{
					?>
                    <option value="<?php echo $discod['DISEASE_CODE'];?>" <?php if($discod['DISEASE_CODE']==$drow['DISEASE_TYPE_TAMIL']) echo "selected" ;?>><?php echo $discod['DISEASE_TAMIL_NAME'];?></option>
                    <?php } ?>
             </select>
            </td>
        </tr>
        
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Patient Type&nbsp;:</strong>
            </td>
            <td width="209" >
            	<select name="patient_type" id="patient_type" class="boxfields">
                	<option value="">--- Select ---</option>
					<option value="INPATIENT" <?php if($drow['PATIENT_TYPE']=='INPATIENT') echo "selected" ;?> >In Patient</option>
                    <option value="OUTPATIENT" <?php if($drow['PATIENT_TYPE']=='OUTPATIENT') echo "selected" ;?>  >Out Patient</option>                    
                </select>
            </td>
        
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007; &#2997;&#2965;&#3016;&nbsp;:</strong></td>
            <td width="259" >
             <select name="patient_type_tamil" id="patient_type_tamil" class="boxfields">
                	<option value="" >--- Select ---</option>
                    <option value="INPATIENT" <?php if($drow['PATIENT_TYPE_TAMIL']=='INPATIENT') echo "selected" ;?> >&#2953;&#2995;&#3021;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007;</option>
                    <option value="OUTPATIENT" <?php if($drow['PATIENT_TYPE_TAMIL']=='OUTPATIENT') echo "selected" ;?> >&#2986;&#3009;&#2993;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007;</option>
             </select>
            </td>
        </tr>
        <tr>
        	<td colspan="4"></td>
        </tr>
        <tr>
        	<td colspan="4"><strong>&nbsp;PATIENT INFORMATION</strong></td>
        </tr>
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Name&nbsp;:</strong>
            </td>
            <td width="209" ><input type="text" name="patient_name" id="patient_name" value="<?php echo $drow['PATIENT_NAME']; ?>" class="boxfields" /></td>      
            <td width="243" height="32" ><strong>&nbsp;&#2986;&#3014;&#2991;&#2992;&#3021;&nbsp;:</strong></td>
            <td width="259" ><input type="text" name="patient_name_tamil" id="patient_name_tamil" value="<?php echo $drow['PATIENT_TAMIL_NAME']; ?>" class="boxfields" />
            <a href="javascript:;" onClick="return popitup('keyboard.php','patient_name_tamil');" > 
            <img src="keyboard.png" width="28" height="13"> </a>
            </td>
        </tr>
        
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Patient Address&nbsp;:</strong>
            </td>
            <td width="209" >
            <input type="text" name="patient_address1" id="patient_address1" value="<?php echo $drow['PAT_ADDR1']; ?>" class="boxfields1" />
            <input type="text" name="patient_address2" id="patient_address2" value="<?php echo $drow['PAT_ADDR2']; ?>" class="boxfields1" />
            <select name="patient_address_state" id="patient_address_state"  class="boxfields1">
                <option value="">-Select State-</option>
                <?php 
                    $state_query2 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
                    $res_state2 = oci_parse($conn, $state_query2);
                    oci_execute($res_state2);
                    while($row_state2 = oci_fetch_array($res_state2, OCI_ASSOC+OCI_RETURN_NULLS))
                    {?>
                        <option value="<?php echo $row_state2['STATE_CODE']; ?>" <?php if($row_state2['STATE_CODE']==$drow['PAT_ADDR3']) echo "selected" ;?>><?php echo $row_state2['STATE_NAME']; ?></option>
                <?php 
                    }?>
            </select>
            <input type="text" name="patient_address3" id="patient_address3" value="<?php echo $drow['PAT_ADDR4']; ?>" class="boxfields1" />
            </td>
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
            <td width="259" >
         	   <input type="text" name="patient_address_tamil1" id="patient_address_tamil1" value="<?php echo $drow['PAT_ADDR1T']; ?>" class="boxfields1" />
            <a href="javascript:;" onClick="return popitup('keyboard.php','patient_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
       	 	    <input type="text" name="patient_address_tamil2" id="patient_address_tamil2" value="<?php echo $drow['PAT_ADDR2T']; ?>" class="boxfields1" />
            <a href="javascript:;" onClick="return popitup('keyboard.php','patient_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       		     <select name="patient_address_state_tamil" id="patient_address_state_tamil"  class="boxfields1">
                <option value="">-Select State-</option>
                <?php 
                    $state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
                    $res_state1 = oci_parse($conn, $state_query1);
                    oci_execute($res_state1);
                    while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
                    {?>
                        <option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$drow['PAT_ADDR3T']) echo "selected" ;?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
                <?php 
                    }?>
            </select>
            <input type="text" name="patient_address_tamil3" id="patient_address_tamil3" value="<?php echo $drow['PAT_ADDR4T']; ?>" class="boxfields1" />
            </td>
        </tr>
        
        <tr>
        	<td width="243" height="32" >
            <strong>&nbsp;Contact No&nbsp;(&#2980;&#3014;&#3006;&#2975;&#2992;&#3021;&#2986;&#3009; &#2958;&#2979;&#3021;)&nbsp;:</strong>
            </td>
            <td><input type="text" name="contactno" id="contactno" value="<?php echo $drow['CONTACT_NO']; ?>"  class="boxfields1" pattern="[0-9]{0,12}"/></td>
        </tr>       
        
        <tr>
            <td height="28" ><strong>&nbsp;Sex&nbsp;: </strong></td>
            <td >
            <select name="patient_gender" id="patient_gender" class="boxfields" >
                    <option value="" >---Select---</option>
                    <option value="M" <?php if($drow['SEX']=='M') echo "selected" ;?> >Male</option>
                    <option value="F" <?php if($drow['SEX']=='F') echo "selected" ;?> >FeMale</option>
              </select>	   	    
            </td>   
            <td ><strong>&nbsp; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;&nbsp;: </strong> </td>
            <td >
              <select name="patient_gendert" id="patient_gendert" class="boxfields" >
                    <option value="" >---Select---</option>
                    <option value="M" <?php if($drow['SEX']=='M') echo "selected" ;?> >&#2950;&#2979;&#3021;</option>
                    <option value="F" <?php if($drow['SEX']=='F') echo "selected" ;?> >&#2986;&#3014;&#2979;&#3021;</option>
              </select>
            </td>
        </tr>
        
        <tr>
        	<td width="243" height="32" >
            <strong>&nbsp;Age&nbsp;(&#2997;&#2991;&#2980;&#3009;)&nbsp;:</strong>
            </td>
            <td><input type="text" name="age" id="age" value="<?php echo $drow['AGE']; ?>"  class="boxfields1"  onKeyPress="return isNumberKey(event);"/></td>
        	<td width="243" height="32" >
            <strong>&nbsp;Date Of Reporting&nbsp;(&#2980;&#3015;&#2980;&#3007;):</strong>
            </td>
            <td><input type="text" name="reporting_date" id="reporting_date" value="<?php echo $drow['DATE_OF_REPORTING']; ?>"  class="boxfields1" readonly="readonly"/>
            <a href="javascript:NewCal('reporting_date','ddMMMyyyy',false,24)">
                <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
            </a>
            </td>
        </tr>
        
        <tr>
            <td colspan="4" align="center">
                <input type="submit" name="submit" value="submit" id="submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
                <input type="reset" name="Reset" value="Reset" id="Reset" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;"  />
            </td>
        </tr>  
        </table>
    </div>
    </form>
</center>
<br />
<br />
<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>
</body>
</html>