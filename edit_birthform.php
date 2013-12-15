<?php 
session_start();
include("oracle_to_php.php");// Connection

if(isset($_POST['Submit']))
{
//	print_r($_POST); exit;
$registration_no=$_POST['registration_no'];
$registration_year=$_POST['registration_year'];
$zone=$_POST['zone'];
$ward=$_POST['ward'];
$oldward=$_POST['oldward'];
$panchayath=$_POST['panchayath'];
$registration_date=$_POST['registration_date'];
$date_of_birth=$_POST['date_of_birth'];
$child_gender=$_POST['child_gender'];
$child_gendert=$_POST['child_gendert'];
$child_name=$_POST['child_name'];
$child_name_tamil=$_POST['child_name_tamil'];
$father_name=$_POST['father_name'];
$father_name_tamil=$_POST['father_name_tamil'];
$mother_name=$_POST['mother_name'];
$mother_name_tamil=$_POST['mother_name_tamil'];
$birth_place=$_POST['birth_place'];
$birth_place_tamil=$_POST['birth_place_tamil'];
$permanent_address1=$_POST['permanent_address1'];
$permanent_address2=$_POST['permanent_address2'];
$permanent_address_state=$_POST['permanent_address_state'];	
$permanent_address3=$_POST['permanent_address3'];
$permanent_address_tamil1=$_POST['permanent_address_tamil1'];
$permanent_address_tamil2=$_POST['permanent_address_tamil2'];
$permanent_address_state_tamil=$_POST['permanent_address_state_tamil'];
$permanent_address_tamil3=$_POST['permanent_address_tamil3'];

if($_POST['birth_place']=="HOUSE")
{	
	$birth_address1=$_POST['birth_address1'];
	$birth_address2=$_POST['birth_address2'];
	$birth_address_state=$_POST['birth_address_state'];	
	$birth_address3=$_POST['birth_address3'];
	$birth_address_tamil1=$_POST['birth_address_tamil1'];
	$birth_address_tamil2=$_POST['birth_address_tamil2'];
	$birth_address_state_tamil=$_POST['birth_address_state_tamil'];
	$birth_address_tamil3=$_POST['birth_address_tamil3'];
} 
else if($_POST['birth_place']=="HOSPITAL" || $_POST['birth_place_tamil']=='HOSPITAL')
{
	$hospital_div_code = $_POST['hospital_div_code'];
	$birth_address1 = $_POST['hospital_add1'];
	$birth_address2 = $_POST['hospital_add2'];
	$birth_address_state = $_POST['hospital_add3'];
	$birth_address3 = $_POST['hospital_pincode'];
	$birth_address_tamil1 = $_POST['hospital_add1_tamil'];
	$birth_address_tamil2 = $_POST['hospital_add2_tamil'];
	$birth_address_state_tamil = $_POST['hospital_add3_tamil'];
	$birth_address_tamil3 = $_POST['hospital_pincode'];
	if($_POST['birth_hospital']!='')
	{
		$hosp_code=$_POST['birth_hospital'];
	}
	else if($_POST['birth_hospital_tamil']!='')
	{
		$hosp_code=$_POST['birth_hospital_tamil'];
	}
}

else if($_POST['session_hosp_id']!='')
{
	$hospt_query= oci_parse($conn,"SELECT * FROM ".hospital_table." where BD_HOSPCODE='".trim($_POST['session_hosp_id'])."'");
	oci_execute($hospt_query);
	$hrow=oci_fetch_array($hospt_query);
	
	$session_hospital_div_code = $hrow['DIV_CODE'];
	$birth_address1 = $hrow['BD_HOSPADD1'];
	$birth_address2 = $hrow['BD_HOSPADD2'];
	$birth_address_state = $hrow['BD_HOSPADD3'];
	$birth_address3 = $hrow['BD_HOSPPIN'];
	$birth_address_tamil1 = $hrow['BD_HOSPADD1T'];
	$birth_address_tamil2 = $hrow['BD_HOSPADD2T'];
	$birth_address_state_tamil = $hrow['BD_HOSPADD3T'];
	$birth_address_tamil3 = $hrow['BD_HOSPPIN'];
	$hosp_code=$hrow['BD_HOSPCODE'];
	$birth_place='HOSPITAL';
	$birth_place_tamil='HOSPITAL';
}

$parent_addr_at_childbirth1=$_POST['parent_addr_at_childbirth1'];
$parent_addr_at_childbirth2=$_POST['parent_addr_at_childbirth2'];
$parent_addr_at_childbirth_state=$_POST['parent_addr_at_childbirth_state'];
$parent_addr_at_childbirth3=$_POST['parent_addr_at_childbirth3'];
$parent_addr_at_childbirth_tamil1=$_POST['parent_addr_at_childbirth_tamil1'];
$parent_addr_at_childbirth_tamil2=$_POST['parent_addr_at_childbirth_tamil2'];
$parent_addr_at_childbirth_state_tamil=$_POST['parent_addr_at_childbirth_state_tamil'];
$parent_addr_at_childbirth_tamil3=$_POST['parent_addr_at_childbirth_tamil3'];

$informer_name=$_POST['informer_name'];
$informer_address1=$_POST['informer_address1'];
$informer_address2=$_POST['informer_address2'];
$informer_address_state=$_POST['informer_address_state'];
$informer_address3=$_POST['informer_address3'];
$informer_name_tamil=$_POST['informer_name_tamil'];
$informer_address_tamil1=$_POST['informer_address_tamil1'];
$informer_address_tamil2=$_POST['informer_address_tamil2'];
$informer_address_tamil_state=$_POST['informer_address_tamil_state'];
$informer_address_tamil3=$_POST['informer_address_tamil3'];

$permanent_mother_add_state=$_POST['permanent_mother_add_state'];
$permanent_mother_add_district=$_POST['permanent_mother_add_district'];
$permanent_mother_add1=$_POST['permanent_mother_add1'];
$permanent_mother_townvillage=$_POST['permanent_mother_townvillage'];
$permanent_mother_town=$_POST['permanent_mother_town'];
$permanent_mother_add_state_tamil=$_POST['permanent_mother_add_state_tamil'];
$permanent_mother_add_district_tamil=$_POST['permanent_mother_add_district_tamil'];
$permanent_mother_add_tamil1=$_POST['permanent_mother_add_tamil1'];
$permanent_mother_townvillage_tamil=$_POST['permanent_mother_townvillage_tamil'];
$permanent_mother_town_tamil=$_POST['permanent_mother_town_tamil'];

$family_religion1=$_POST['family_religion1'];
$family_religion2=$_POST['family_religion2'];
$family_religion_tamil1=$_POST['family_religion_tamil1'];
$family_religion_tamil2=$_POST['family_religion_tamil2'];

$fathers_edu_level=$_POST['fathers_edu_level'];
$fathers_edu_level_tamil=$_POST['fathers_edu_level_tamil'];
$mothers_edu_level=$_POST['mothers_edu_level'];
$mothers_edu_level_tamil=$_POST['mothers_edu_level_tamil'];

$fathers_occupation=$_POST['fathers_occupation'];
$fathers_occupation_tamil=$_POST['fathers_occupation_tamil'];
$mothers_occupation=$_POST['mothers_occupation'];
$mothers_occupation_tamil=$_POST['mothers_occupation_tamil'];

$ageattimeofmarriage=$_POST['ageattimeofmarriage'];
$ageattimeofdelivery=$_POST['ageattimeofdelivery'];

$birth_order=$_POST['birth_order'];

$delivery_attention=$_POST['delivery_attention'];
$delivery_attention_tamil=$_POST['delivery_attention_tamil'];

$delivery_type=$_POST['delivery_type'];
$delivery_type_tamil=$_POST['delivery_type_tamil'];

$childweight=$_POST['childweight'];
$pregnancyduration=$_POST['pregnancyduration'];

$remarks=$_POST['remarks'];
$remarks_tamil=$_POST['remarks_tamil'];

/* URL VALUES */

$get_regno=$_POST['get_regno'];
$get_regyr=$_POST['get_regyr'];
$get_zone=$_POST['get_zone'];
$get_ward=$_POST['get_ward'];

$sql="UPDATE ".birth_table." SET BD_REGNO='$registration_no',BD_REGYR='$registration_year',BD_REGDT='$registration_date',BD_CHLDDOB='$date_of_birth'";
if($_POST['hospital_div_code']!="")
{
	$sql .= ", DIV_CODE='$hospital_div_code'";
}
else if($_POST['session_hosp_id']!='')
{
	$sql .= ", DIV_CODE='$session_hospital_div_code'";
}
else {
	$sql .= ", DIV_CODE='$zone'";
}
$sql .=",ULB_NO='$zone',WD_CODE='$ward',BD_CHLDSEX='$child_gender',BD_CHLDSEXT='$child_gendert',BD_CHLDNAME='$child_name',BD_CHLDNAMET='$child_name_tamil',
BD_FATNAME='$father_name',BD_FATNAMET='$father_name_tamil',BD_MOTNAME='$mother_name',BD_MOTNAMET='$mother_name_tamil',BD_FATSTREET='$parent_addr_at_childbirth1',
BD_FATSTREETT='$parent_addr_at_childbirth_tamil1',BD_FATADD1='$parent_addr_at_childbirth2',BD_FATADD1T='$parent_addr_at_childbirth_tamil2',BD_FATADD2='$parent_addr_at_childbirth_state',BD_FATADD2T='$parent_addr_at_childbirth_state_tamil',BD_FATPIN='$parent_addr_at_childbirth3',BD_FATPINT='$parent_addr_at_childbirth_tamil3',BD_INFNAME='$informer_name',BD_INFNAMET='$informer_name_tamil',BD_INFADD1='$informer_address1',BD_INFADD1T='$informer_address_tamil1',BD_INFADD2='$informer_address2',BD_INFADD2T='$informer_address_tamil2',BD_INFADD3='$informer_address_state',BD_INFADD3T='$informer_address_tamil_state',BD_INFPIN='$informer_address3',
BD_INFPINT='$informer_address_tamil3',BD_CHLDPOB='$birth_place',BD_CHLDPOBT='$birth_place_tamil',BD_HOSPCODE='$hosp_code',BD_BIRSTREET='$birth_address1',BD_BIRSTREETT='$birth_address_tamil1',BD_BIRADD1='$birth_address2',BD_BIRADD1T='$birth_address_tamil2',BD_BIRADD2='$birth_address_state',BD_BIRADD2T='$birth_address_state_tamil',BD_BIRPIN='$birth_address3',BD_BIRPINT='$birth_address_tamil3',BD_PERADD1='$permanent_address1',BD_PERADD1T='$permanent_address_tamil1',BD_PERADD2='$permanent_address2',BD_PERADD2T='$permanent_address_tamil2',BD_PERADD3='$permanent_address_state',BD_PERADD3T='$permanent_address_state_tamil',BD_PERPIN='$permanent_address3',BD_PERPINT='$permanent_address_tamil3',BD_PAROPTT='$permanent_mother_townvillage',BD_PAROPTTT='$permanent_mother_townvillage_tamil',BD_PARTOWN='$permanent_mother_town',BD_PARTOWNT='$permanent_mother_town_tamil',BD_PARDIST='$permanent_mother_add_district',BD_PARDISTT='$permanent_mother_add_district_tamil',BD_STATE='$permanent_mother_add_state',BD_STATET='$permanent_mother_add_state_tamil',BD_FATREL='$family_religion1',BD_FATRELT='$family_religion_tamil1',BD_CHDREL='$family_religion2',BD_CHDRELT='$family_religion_tamil2',BD_FATLIT='$fathers_edu_level',BD_FATLITT='$fathers_edu_level_tamil',BD_MOTLIT='$mothers_edu_level',BD_MOTLITT='$mothers_edu_level_tamil',BD_FATOCCUP='$fathers_occupation',BD_FATOCCUPT='$fathers_occupation_tamil',BD_MOTOCCUP='$mothers_occupation',BD_MOTOCCUPT='$mothers_occupation_tamil',BD_MOTAGEM='$ageattimeofmarriage',BD_MOTAGED='$ageattimeofdelivery',BD_BIRTHORD='$birth_order',BD_DELVTYPE='$delivery_attention',BD_DELVTYPET='$delivery_attention_tamil',BD_DELMETH='$delivery_type',BD_DELMETHT='$delivery_type_tamil',OLD_WD_CODE='$oldward',BD_CHLDWT='$childweight',BD_PREGDUR='$pregnancyduration',BD_REMARKS='$remarks',BD_REMARKST='$remarks_tamil',BD_MOTADDR1='$permanent_mother_add1',BD_MOTADDR1T='$permanent_mother_add_tamil1',BD_ENTDT='$entry_date',ISPANCHAYAT='$panchayath' WHERE BD_REGNO='$get_regno' AND BD_REGYR='$get_regyr' AND ULB_NO='$get_zone' AND WD_CODE='$get_ward'";

//echo $sql;exit;

$compiled = oci_parse($conn, $sql);
oci_execute($compiled);

$msg="Birth Entry has been updated successfully.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ta" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC</title>
<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/common.js"></script>   
<script>
/*function hosp_validation()
{
	if(document.getElementById('birth_hospital').value!=document.getElementById('birth_hospital_tamil').value)
	{
		alert("Hospitals should be same.");
		return false;
	}
	if(document.getElementById('oldward').value=="")
	{
		alert('Old Ward should not be empty');
		return false;
	}
}*/
</script>
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
        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textfields with the given ids.
       // var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "birth_address_tamil1", "birth_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil", "family_religion_tamil2"];
	   
	   <?php if($_SESSION['hospital']=='')
				{ ?>
				 var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil", "family_religion_tamil2", "birth_address_tamil1", "birth_address_tamil2"];
				 <?php  }else { ?>				
        // Enable transliteration in the textfields with the given ids.
        var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil", "family_religion_tamil2"];
		<?php } ?>
	   
        control.makeTransliteratable(ids);

        // Show the transliteration control which can be used to toggle between
        // English and Hindi.
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

$sel_birth	= oci_parse($conn,"SELECT * FROM ".birth_table." where BD_REGNO='$_GET[reg_no]' AND BD_REGYR='$_GET[regis_yr]' AND ULB_NO='$_GET[zone]' AND WD_CODE='$_GET[ward]'");
oci_execute($sel_birth);
$row=oci_fetch_array($sel_birth);

if($_SESSION['hospital']!='')
{
	$hospital_code=$_SESSION['hospital'];
	$hosp_query	= oci_parse($conn,"SELECT * FROM ".hospital_table." where BD_HOSPCODE='$hospital_code'");
	oci_execute($hosp_query);
	$hrow=oci_fetch_array($hosp_query);
	$hosp_div_code=$hrow['DIV_CODE'];
}
?><br />
 <center>
<div style="width:990px;" align="center">
<form name="form1" method="post" onsubmit="return validatebirthform();">
<input type="hidden" name="session_hosp_id" id="session_hosp_id" value="<?php echo trim($_SESSION['hospital']); ?>" />
<input type="hidden" name="get_regno" value="<?php echo $_GET['reg_no']; ?>" />
<input type="hidden" name="get_regyr" value="<?php echo $_GET['regis_yr']; ?>" />
<input type="hidden" name="get_zone" value="<?php echo $_GET['zone']; ?>" />
<input type="hidden" name="get_ward" value="<?php echo $_GET['ward']; ?>" />
<p align="center" style="font:Arial, Helvetica, sans-serif; font-size:14px; color:#F00;"><?php echo $msg; ?></p>
<br />
<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
<tr>
	<td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Form No: 1 - Entry Form</strong></p>
    </td>
</tr>

<tr>
	<td width="251" height="32" ><strong>&nbsp;Registration No&nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;):</strong></td>
    <td width="211" > <input type="text" name="registration_no" id="registration_no" readonly="readonly" class="boxfields" value="<?php echo $row['BD_REGNO']; ?>" /></td>
    <td width="219" height="32" ><strong>&nbsp;Registration Year &nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="251" > <input type="text" name="registration_year" value="<?php echo $row['BD_REGYR']; ?>" id="registration_year" class="boxfields"/></td>
</tr>

<tr>
	<td height="28" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
      <select name="zone" id="zone" class="boxfields" onchange="getzone_id(this.value);">
            <option value="">---Select---</option>
            <?php 
			 	$sel_zone = oci_parse($conn,"SELECT ULB_NO, ULB_NAME FROM ".zone_table." ORDER BY ULB_NAME ASC");
				oci_execute($sel_zone);
				while($row_zone = oci_fetch_array($sel_zone, OCI_ASSOC+OCI_RETURN_NULLS)) 
				{ ?>
            	<option value="<?php echo $row_zone['ULB_NO'];?>" <?php if($row['ULB_NO']==$row_zone['ULB_NO']) echo "selected"; ?>><?php echo $row_zone['ULB_NAME'];?></option>
            <?php 
				} 
				?>
    	</select>	
    </td>
    <td height="28" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
      <select name="ward" id="ward" class="boxfields" onchange="getward_id(this.value);">
      	<?php
		  $sel_ward = oci_parse($conn,"SELECT WD_CODE FROM ".ward_table." WHERE ULB_NO = '".$row['ULB_NO']."' ORDER BY WD_CODE ASC");
			oci_execute($sel_ward);
			?>
			<option value="">---Select---</option>
			<?php while($row_ward = oci_fetch_array($sel_ward)){?>	
			<option value="<?php echo $row_ward['WD_CODE']; ?>" <?php if($row['WD_CODE']==$row_ward['WD_CODE']) echo "selected"; ?>><?php echo $row_ward['WD_CODE']; ?></option>    		<?php  } ?>      
    	</select>	   	
    </td>
</tr>
<tr>
	<td height="27" ><strong>&nbsp;OldWard (&#2986;&#2996;&#3016;&#2991; &#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td> <?php 
		$sel_oldward = oci_parse($conn,"SELECT OLD_WD_CODE, OLD_WD_CODE2 FROM ".ward_table." WHERE WD_CODE = '".$row['WD_CODE']."'");
		oci_execute($sel_oldward);
		$row_oldward = oci_fetch_array($sel_oldward);
		?>    
    	  <select name="oldward" id="oldward" class="boxfields">
 			<option value="">---Select---</option>
      <?php
	    $sel_oldward = oci_parse($conn,"SELECT OLD_WD_CODE, OLD_WD_CODE2 FROM ".ward_table." WHERE WD_CODE = '".$row['WD_CODE']."'");
		oci_execute($sel_oldward);
		$row_oldward = oci_fetch_array($sel_oldward);
		?>
		<?php
		if($row_oldward['OLD_WD_CODE']!="")
		{?>
			<option value="<?php echo $row_oldward['OLD_WD_CODE']; ?>" <?php if($row['OLD_WD_CODE']==$row_oldward['OLD_WD_CODE']) echo "selected"; ?>><?php echo $row_oldward['OLD_WD_CODE']; ?></option> 
		<?php 
		}
		if($row_oldward['OLD_WD_CODE2']!="")
		{
		?>
			<option value="<?php echo $row_oldward['OLD_WD_CODE2']; ?>" <?php if($row['OLD_WD_CODE']==$row_oldward['OLD_WD_CODE2']) echo "selected"; ?>><?php echo $row_oldward['OLD_WD_CODE2']; ?></option>    
	<?php
		}
		?>
    </select>	   	
    </td>
    <td height="27" ><strong>&nbsp;Panchayath (&#2986;&#2974;&#3021;&#2970;&#3006;&#2991;&#2980;&#3021;&#2980;&#3009;): </strong></td>
    <td> <input type="checkbox" name="panchayath" id="panchayath" value="Panchayath" <?php if($row['ISPANCHAYAT']=='Panchayath') echo "checked"; ?> /></td>
</tr>

<tr>
	<td height="27" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td> <input type="text" name="registration_date" id="registration_date" value="<?php echo $row['BD_REGDT']; ?>" class="boxfields"/></td>
    <td height="27" ><strong>&nbsp;Date Of Birth (&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td> <input type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $row['BD_CHLDDOB']; ?>" class="boxfields"/></td>
</tr>

<tr>
	<td height="28" ><strong>&nbsp;Child Sex: </strong></td>
    <td >
    <select name="child_gender" id="child_gender" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" <?php if($row['BD_CHLDSEX']=='M') echo "selected"; ?>>Male</option>
            <option value="F" <?php if($row['BD_CHLDSEX']=='F') echo "selected"; ?>>FeMale</option>
   	  </select>	   	    
    </td>   
    <td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td >
      <select name="child_gendert" id="child_gendert" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" <?php if($row['BD_CHLDSEX']=='M') echo "selected"; ?> >&#2950;&#2979;&#3021;</option>
            <option value="F" <?php if($row['BD_CHLDSEX']=='F') echo "selected"; ?> >&#2986;&#3014;&#2979;&#3021;</option>
   	  </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Name: </strong></td>
    <td> <input type="text" name="child_name" id="child_name" class="boxfields" value="<?php echo $row['BD_CHLDNAME']; ?>" /></td>
    <td><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td>
    	<input type="text" name="child_name_tamil" id="child_name_tamil" value="<?php echo $row['BD_CHLDNAMET']; ?>" class="boxfields1"/> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','child_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Father Name: </strong></td>
    <td > <input type="text" name="father_name" id="father_name" value="<?php echo $row['BD_FATNAME']; ?>" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="father_name_tamil" id="father_name_tamil" value="<?php echo $row['BD_FATNAMET']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','father_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Mother Name: </strong></td>
    <td > <input type="text" name="mother_name" id="mother_name" value="<?php echo $row['BD_MOTNAME']; ?>" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;: </strong> </td>
    <td >
    	<input type="text" name="mother_name_tamil" id="mother_name_tamil" value="<?php echo $row['BD_MOTNAMET']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','mother_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>
<?php if($_SESSION['hospital']==''){ ?>
<tr>
	<td height="32" ><strong>&nbsp;Place of Birth: </strong></td>
    <td >
	    <select name="birth_place" id="birth_place" class="boxfields" onchange="getbirth_place_id(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" <?php if($row['BD_CHLDPOB']=='HOUSE') echo "selected"; ?> >House</option>
            <option value="HOSPITAL" <?php if($row['BD_CHLDPOB']=='HOSPITAL') echo "selected"; ?> >Hospital</option>
    	</select>
        
        <select name="birth_hospital" id="birth_hospital" class="boxfields" onchange="gethospital_id(this.value);"  style=" display:<?php if($row['BD_CHLDPOB']=='HOSPITAL') { ?> block <?php }  else { ?> none <?php } ?> ;">
        	<option value="" >---Select Hospital---</option>
            <?php 
				$hosp_query1 = "SELECT * FROM ".hospital_table." WHERE ULB_NO='".$row['ULB_NO']."'";
				$res_hosp = oci_parse($conn, $hosp_query1);
				oci_execute($res_hosp);
				while($row_hosp = oci_fetch_array($res_hosp, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_hosp['BD_HOSPCODE']; ?>" <?php if($row_hosp['BD_HOSPCODE']==$row['BD_HOSPCODE']) echo "selected"; ?>><?php echo $row_hosp['BD_HOSPNAME']; ?></option>
            <?php 
				}?>
    	</select>
		       <?php
				$hquery1 = "SELECT * FROM ".hospital_table." WHERE BD_HOSPCODE='".$row['BD_HOSPCODE']."'";
				$hosp_reslt = oci_parse($conn, $hquery1);
				oci_execute($hosp_reslt);
				$hrow = oci_fetch_array($hosp_reslt, OCI_ASSOC+OCI_RETURN_NULLS);
				?>
        <?php /*?><input type="hidden" name="hospital_div_code" id="hospital_div_code" value="<?php echo $hrow['DIV_CODE']; ?>"  />
        <input type="hidden" name="hospital_add1" id="hospital_add1" value="<?php echo $hrow['BD_HOSPADD1']; ?>"  />
        <input type="hidden" name="hospital_add2" id="hospital_add2" value="<?php echo $hrow['BD_HOSPADD2']; ?>"  />
        <input type="hidden" name="hospital_add3" id="hospital_add3" value="<?php echo $hrow['BD_HOSPADD3']; ?>"  />
        <input type="hidden" name="hospital_pincode" id="hospital_pincode" value="<?php echo $hrow['BD_HOSPPIN']; ?>"  />
        <input type="hidden" name="hospital_add1_tamil" id="hospital_add1_tamil" value="<?php echo $hrow['BD_HOSPADD1T']; ?>"  />
        <input type="hidden" name="hospital_add2_tamil" id="hospital_add2_tamil" value="<?php echo $hrow['BD_HOSPADD2T']; ?>"  />
        <input type="hidden" name="hospital_add3_tamil" id="hospital_add3_tamil" value="<?php echo $hrow['BD_HOSPADD3T']; ?>"  /><?php */?>
                                      
    </td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="birth_place_tamil" id="birth_place_tamil" class="boxfields1" onchange="getbirth_place_id_tamil(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" <?php if($row['BD_CHLDPOBT']=='HOUSE') echo "selected"; ?> >&#2997;&#3008;&#2975;&#3009;</option>
            <option value="HOSPITAL" <?php if($row['BD_CHLDPOBT']=='HOSPITAL') echo "selected"; ?> >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;&#2990;&#2985;&#3016;</option>
    	</select>	
       
        <select name="birth_hospital_tamil" id="birth_hospital_tamil" class="boxfields1" onchange="gethospitaltamil_id(this.value);"  style=" display:<?php if($row['BD_CHLDPOBT']=='HOSPITAL') { ?> block <?php }  else { ?> none <?php } ?> ;">
        	<option value="" >---Select Hospital---</option>
            <?php 
				$hosp_query1 = "SELECT * FROM ".hospital_table." WHERE ULB_NO='".$row['ULB_NO']."'";
				$res_hosp = oci_parse($conn, $hosp_query1);
				oci_execute($res_hosp);
				while($row_hosp = oci_fetch_array($res_hosp, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_hosp['BD_HOSPCODE']; ?>" <?php if($row_hosp['BD_HOSPCODE']==$row['BD_HOSPCODE']) echo "selected"; ?>><?php echo $row_hosp['BD_HOSPNAMET']; ?></option>
            <?php 
				}?>
    	</select> 
         <?php
				$hquery1 = "SELECT * FROM ".hospital_table." WHERE BD_HOSPCODE='".$row['BD_HOSPCODE']."'";
				$hosp_reslt = oci_parse($conn, $hquery1);
				oci_execute($hosp_reslt);
				$hrow = oci_fetch_array($hosp_reslt, OCI_ASSOC+OCI_RETURN_NULLS);
				?>
        <input type="hidden" name="hospital_div_code" id="hospital_div_code" value="<?php echo $hrow['DIV_CODE']; ?>"  />
        <input type="hidden" name="hospital_add1" id="hospital_add1" value="<?php echo $hrow['BD_HOSPADD1']; ?>"  />
        <input type="hidden" name="hospital_add2" id="hospital_add2" value="<?php echo $hrow['BD_HOSPADD2']; ?>"  />
        <input type="hidden" name="hospital_add3" id="hospital_add3" value="<?php echo $hrow['BD_HOSPADD3']; ?>"  />
        <input type="hidden" name="hospital_pincode" id="hospital_pincode" value="<?php echo $hrow['BD_HOSPPIN']; ?>"  />
        <input type="hidden" name="hospital_add1_tamil" id="hospital_add1_tamil" value="<?php echo $hrow['BD_HOSPADD1T']; ?>"  />
        <input type="hidden" name="hospital_add2_tamil" id="hospital_add2_tamil" value="<?php echo $hrow['BD_HOSPADD2T']; ?>"  />
        <input type="hidden" name="hospital_add3_tamil" id="hospital_add3_tamil" value="<?php echo $hrow['BD_HOSPADD3T']; ?>"  />
        
    </td>
</tr>
<?php } ?>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Permanent Residential<br />&nbsp;Address of the <br />&nbsp;Parents(5.a): </strong></td>
    <td > 
        <input type="text" name="permanent_address1" id="permanent_address" value="<?php echo $row['BD_PERADD1']; ?>" class="boxfields1" />
        <input type="text" name="permanent_address2" id="permanent_address2" value="<?php echo $row['BD_PERADD2']; ?>" class="boxfields1" />

        <select name="permanent_address_state" id="permanent_address_state"  class="boxfields1">
            <option value="">-Select State-</option>
			<?php 
				$state_query1 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['BD_PERADD3']) echo "selected"; ?>><?php echo $row_state1['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="permanent_address3" id="permanent_address3" value="<?php echo $row['BD_PERPIN']; ?>" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2993;&#3021;&#2993;&#3019;&#2992;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; 
     &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;(5.a):</strong> </td>
    <td >
        <input type="text" name="permanent_address_tamil1" id="permanent_address_tamil1" value="<?php echo $row['BD_PERADD1T']; ?>" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="permanent_address_tamil2" id="permanent_address_tamil2" value="<?php echo $row['BD_PERADD2T']; ?>" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       
        <select name="permanent_address_state_tamil" id="permanent_address_state_tamil"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['BD_PERADD3T']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="permanent_address_tamil3" id="permanent_address_tamil3" value="<?php echo $row['BD_PERPINT']; ?>" class="boxfields1" />
    </td>
</tr>
<?php 
if($row['BD_CHLDPOBT']=='HOUSE'){ ?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$( document ).ready(function() {
$("#birthadd").show();
});
</script>
<?php } 
else if($row['BD_CHLDPOBT']=='HOSPITAL')
{	
?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
	$("#birthadd").hide();
});
</script>
<?php
}
else { ?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$( document ).ready(function() {
 $("#birth_place").change(function(){
	   if(document.getElementById('birth_place').value=='HOSPITAL')
	   {
		$("#birthadd").hide();
	   }
});
});
</script>
<?php } ?>
<?php if($_SESSION['hospital']==''){ ?>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr id="birthadd">
	<td height="32" ><strong>&nbsp;Birth Address: </strong></td>
     <td >
        <input type="text" name="birth_address1" id="birth_address1" value="<?php echo $row['BD_BIRSTREET']; ?>" class="boxfields1" />
        <input type="text" name="birth_address2" id="birth_address2" value="<?php echo $row['BD_BIRADD1']; ?>" class="boxfields1" />
        <select name="birth_address_state" id="birth_address_state"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query2 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state2 = oci_parse($conn, $state_query2);
				oci_execute($res_state2);
				while($row_state2 = oci_fetch_array($res_state2, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state2['STATE_CODE']; ?>" <?php if($row['BD_BIRADD2']==$row_state2['STATE_CODE']) echo "selected"; ?>><?php echo $row_state2['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="birth_address3" id="birth_address3" value="<?php echo $row['BD_BIRPIN']; ?>" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
        <input type="text" name="birth_address_tamil1" id="birth_address_tamil1" value="<?php echo $row['BD_BIRSTREETT']; ?>" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','birth_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="birth_address_tamil2" id="birth_address_tamil2" value="<?php echo $row['BD_BIRADD1T']; ?>" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','birth_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select name="birth_address_state_tamil" id="birth_address_state_tamil"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row['BD_BIRADD2T']==$row_state1['STATE_CODE']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="birth_address_tamil3" id="birth_address_tamil3" value="<?php echo $row['BD_BIRPINT']; ?>" class="boxfields1" />
    </td>
</tr>
<?php } ?>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Address Of the <br />&nbsp;Parents At the Time <br />&nbsp;of Birth of child: </strong></td>
     <td >
        <input type="text" name="parent_addr_at_childbirth1" id="parent_addr_at_childbirth1" value="<?php echo $row['BD_FATSTREET']; ?>" class="boxfields1"/>
        <input type="text" name="parent_addr_at_childbirth2" id="parent_addr_at_childbirth2" value="<?php echo $row['BD_FATADD1']; ?>" class="boxfields1"/>
        <select name="parent_addr_at_childbirth_state" id="parent_addr_at_childbirth_state"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query3 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state3 = oci_parse($conn, $state_query3);
				oci_execute($res_state3);
				while($row_state3 = oci_fetch_array($res_state3, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state3['STATE_CODE']; ?>" <?php if($row['BD_FATADD2']==$row_state3['STATE_CODE']) echo "selected"; ?>><?php echo $row_state3['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="parent_addr_at_childbirth3" id="parent_addr_at_childbirth3" value="<?php echo $row['BD_FATPIN']; ?>" class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2993;&#3021;&#2993;&#3019;&#2992;&#3007;&#2985;&#3021; &#2986;&#3007;&#2993;&#2984;&#3021;&#2980;<br />&nbsp;&#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021;&nbsp; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
     <td >
        <input type="text" name="parent_addr_at_childbirth_tamil1" id="parent_addr_at_childbirth_tamil1" value="<?php echo $row['BD_FATSTREETT']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="parent_addr_at_childbirth_tamil2" id="parent_addr_at_childbirth_tamil2" value="<?php echo $row['BD_FATADD1T']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select name="parent_addr_at_childbirth_state_tamil" id="parent_addr_at_childbirth_state_tamil"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row['BD_FATADD2T']==$row_state1['STATE_CODE']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="parent_addr_at_childbirth_tamil3" id="parent_addr_at_childbirth_tamil3" value="<?php echo $row['BD_FATPINT']; ?>" class="boxfields1"/>
		<!--<a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil3');" > <img src="keyboard.png" width="28" height="13"> </a>-->
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Informer Name& Address: </strong></td>
    <td > 
    	<input type="text" name="informer_name" id="informer_name" value="<?php echo $row['BD_INFNAME']; ?>" class="boxfields1"/>
    	<input type="text" name="informer_address1" id="informer_address1" value="<?php echo $row['BD_INFADD1']; ?>" class="boxfields1"/>
      	<input type="text" name="informer_address2" id="informer_address2" value="<?php echo $row['BD_INFADD2']; ?>" class="boxfields1"/>
       	<select name="informer_address_state" id="informer_address_state"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query4 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state4 = oci_parse($conn, $state_query4);
				oci_execute($res_state4);
				while($row_state4 = oci_fetch_array($res_state4, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state4['STATE_CODE']; ?>" <?php if($row['BD_INFADD3']==$row_state4['STATE_CODE']) echo "selected"; ?>><?php echo $row_state4['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="informer_address3" id="informer_address3" value="<?php echo $row['BD_INFPIN']; ?>" class="boxfields"/>
    </td>
    <td ><strong>&nbsp;&#2951;&#2985;&#3021;&#2947;&#2986;&#3006;&#2992;&#3021;&#2990;&#2992;&#3021; 
    &#2986;&#3014;&#2991;&#2992;&#3021; &#38; &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
    <td >
    	<input type="text" name="informer_name_tamil" id="informer_name_tamil" value="<?php echo $row['BD_INFNAMET']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    	<input type="text" name="informer_address_tamil1" id="informer_address_tamil1" value="<?php echo $row['BD_INFADD1T']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
      	<input type="text" name="informer_address_tamil2" id="informer_address_tamil2" value="<?php echo $row['BD_INFADD2T']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       	<select name="informer_address_tamil_state" id="informer_address_tamil_state"  class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row['BD_INFADD3']==$row_state1['STATE_CODE']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="informer_address_tamil3" id="informer_address_tamil3" value="<?php echo $row['BD_INFPINT']; ?>" class="boxfields1"/>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Permanent Address <br />&nbsp;of the Mother: </strong></td>
    <td >
   	    <select name="permanent_mother_add_state" id="permanent_mother_add_state"  class="boxfields1" onchange="getstate_id(this.value);">
            <option value="">-Select State-</option>
            <?php 
				$state_query = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state = oci_parse($conn, $state_query);
				oci_execute($res_state);
				while($row_state = oci_fetch_array($res_state, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state['STATE_CODE']; ?>" <?php if($row['BD_STATE']==$row_state['STATE_CODE']) echo "selected"; ?>><?php echo $row_state['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <select name="permanent_mother_add_district" id="permanent_mother_add_district" class="boxfields1" onchange="getdistrict_id(this.value);">
            <option value="">-Select District-</option>
            <?php 
				$dist_query = "SELECT * FROM ".district_table." WHERE STATE_CODE = '".$row['BD_STATE']."' ORDER BY DIST_NAME ASC";
				$res_dist = oci_parse($conn, $dist_query);
				oci_execute($res_dist);
				while($row_dist = oci_fetch_array($res_dist, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_dist['DIST_CODE']; ?>" <?php if($row['BD_PARDIST']==$row_dist['DIST_CODE']) echo "selected"; ?>><?php echo $row_dist['DIST_NAME']; ?></option>
            <?php 
				}?> 
		</select>
        <input type="text" name="permanent_mother_add1" id="permanent_mother_add1" value="<?php echo $row['BD_MOTADDR1']; ?>"  class="boxfields1"/>
        <select  name="permanent_mother_townvillage" id="permanent_mother_townvillage" class="boxfields1" >
            <option value="1" <?php if($row['BD_PAROPTT']==1) echo "selected"; ?>>TOWN</option>
            <option value="2" <?php if($row['BD_PAROPTT']==2) echo "selected"; ?>>VILLAGE</option>
        </select>	
        <select name="permanent_mother_town" id="permanent_mother_town" class="boxfields1">
            <option value="">-Select Town-</option>
            <?php
			$sel_town = "SELECT TOWN_CODE, TOWN_NAME,TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$row['BD_PARDIST']."' AND TOWN_STATUS='Y'";
			$res_town = oci_parse($conn, $sel_town);
			oci_execute($res_town); 
			?>
			<?php while( $row_town = oci_fetch_array($res_town, OCI_ASSOC+OCI_RETURN_NULLS)){?>
			 <option value="<?php echo $row_town['TOWN_CODE'];?>" <?php if($row['BD_PARTOWN']==$row_town['TOWN_CODE']) echo "selected"; ?>><?php echo $row_town['TOWN_NAME'];?></option><?php } ?>
        </select>
    
    </td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
    <td >
   	   <select name="permanent_mother_add_state_tamil" id="permanent_mother_add_state_tamil"  class="boxfields1" onchange="getstate_tamil_id(this.value);">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row['BD_STATET']==$row_state1['STATE_CODE']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>           
    	</select>
        <select name="permanent_mother_add_district_tamil" id="permanent_mother_add_district_tamil" class="boxfields1" 
        onchange="getdistricttamil_id(this.value)">
            <option value="">-Select District-</option>
            <?php 
				$dist_query = "SELECT * FROM ".district_table." WHERE STATE_CODE = '".$row['BD_STATE']."' ORDER BY DIST_NAME ASC";
				$res_dist = oci_parse($conn, $dist_query);
				oci_execute($res_dist);
				while($row_dist = oci_fetch_array($res_dist, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_dist['DIST_CODE']; ?>" <?php if($row['BD_PARDISTT']==$row_dist['DIST_CODE']) echo "selected"; ?>><?php echo $row_dist['DIST_TAMIL_NAME']; ?></option>
            <?php 
				}?> 
		</select>
        <input type="text" name="permanent_mother_add_tamil1" id="permanent_mother_add_tamil1" value="<?php echo $row['BD_MOTADDR1T']; ?>"  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_mother_add_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select  name="permanent_mother_townvillage_tamil" id="permanent_mother_townvillage_tamil" class="boxfields1">
            <option value="1" <?php if($row['BD_PAROPTTT']==1) echo "selected"; ?>>&#2984;&#2965;&#2992;&#2990;&#3021;</option>
            <option value="2" <?php if($row['BD_PAROPTTT']==2) echo "selected"; ?>>&#2965;&#3007;&#2992;&#3006;&#2990;&#2990;&#3021;</option>
        </select>	
        <select name="permanent_mother_town_tamil" id="permanent_mother_town_tamil" class="boxfields1">
            <option value="">-Select Town-</option>
            	<?php
			$sel_town = "SELECT TOWN_CODE, TOWN_NAME,TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$row['BD_PARDIST']."' AND TOWN_STATUS='Y'";
			$res_town = oci_parse($conn, $sel_town);
			oci_execute($res_town); 
			?>
			<?php while( $row_town = oci_fetch_array($res_town, OCI_ASSOC+OCI_RETURN_NULLS)){?>
			 <option value="<?php echo $row_town['TOWN_CODE'];?>" <?php if($row['BD_PARTOWNT']==$row_town['TOWN_CODE']) echo "selected"; ?>><?php echo $row_town['TOWN_TAMIL_NAME'];?></option><?php } ?>
        </select>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Religion of the Family: </strong></td>
    <td >
        <select name="family_religion1" id="family_religion1" class="boxfields1">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT REL_CODE, REL_DESC FROM ".religion_table." WHERE REL_STATUS='Y'");
			oci_execute($sel_fam_rel);
			while ($rows = oci_fetch_array($sel_fam_rel, OCI_ASSOC+OCI_RETURN_NULLS)) 
			{ ?>
        	<option value="<?php echo $rows['REL_CODE'];?>" <?php if($rows['REL_CODE']==$row['BD_FATREL']) echo "selected"; ?> ><?php echo $rows['REL_DESC'];?></option>
            <?php 
			} ?>            
    	</select>
        <input type="text" name="family_religion2" id="family_religion2" value="<?php echo $row['BD_CHDREL']; ?>"  class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2975;&#3009;&#2990;&#3021;&#2986;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021;:</strong> </td>
    <td >
        <select name="family_religion_tamil1" id="family_religion_tamil1" class="boxfields1">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT REL_CODE, REL_TAMIL_NAME FROM ".religion_table." WHERE REL_STATUS='Y'");
			oci_execute($sel_fam_rel);
			while ($rows = oci_fetch_array($sel_fam_rel, OCI_ASSOC+OCI_RETURN_NULLS)) 
			{ ?>
        	<option value="<?php echo $rows['REL_CODE'];?>" <?php if($row['BD_FATRELT']==$rows['REL_CODE']) echo "selected"; ?>><?php echo $rows['REL_TAMIL_NAME'];?></option>
            <?php 
			} ?> 
    	</select>
        <input type="text" name="family_religion_tamil2" id="family_religion_tamil2" value="<?php echo $row['BD_CHDRELT']; ?>"  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','family_religion_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Literacy Status of the Father: </strong></td>
    <td >
        <select name="fathers_edu_level" id="fathers_edu_level" class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = oci_parse($conn, "SELECT BD_FATLIT, EDN_DESC FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			oci_execute($sel_fedu);
			while($row_fedu = oci_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_FATLIT'];?>" <?php if($row_fedu['BD_FATLIT']==$row['BD_FATLIT']) echo "selected"; ?>><?php echo $row_fedu['EDN_DESC'];?></option>
            <?php 
			} ?>
    	</select>    
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;:</strong> </td>
    <td >
    	<select name="fathers_edu_level_tamil" id="fathers_edu_level_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = oci_parse($conn, "SELECT BD_FATLIT, EDN_TAMIL_NAME FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			oci_execute($sel_fedu);
			while($row_fedu = oci_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_FATLIT'];?>" <?php if($row_fedu['BD_FATLIT']==$row['BD_FATLITT']) echo "selected"; ?>><?php echo $row_fedu['EDN_TAMIL_NAME'];?></option>
            <?php 
			} ?>
    	</select>  
    </td>
</tr>
<tr>
	<td height="32" ><strong>&nbsp;Literacy Status&nbsp;of the Mother: </strong></td>
    <td >
        <select name="mothers_edu_level" id="mothers_edu_level"  class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
				$sel_medu = oci_parse($conn, "SELECT BD_MOTLIT, EDN_DESC FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
				oci_execute($sel_medu);
				while($row_edu = oci_fetch_array($sel_medu, OCI_ASSOC+OCI_RETURN_NULLS))
				{
			?>
            		<option value="<?php echo $row_edu['BD_MOTLIT'];?>" <?php if($row_edu['BD_MOTLIT']==$row['BD_MOTLIT']) echo "selected"; ?> ><?php echo $row_edu['EDN_DESC'];?></option>
            <?php 
				} ?>
    	</select>      
   </td>
   <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;: </strong> </td>
   <td >
    	<select name="mothers_edu_level_tamil" id="mothers_edu_level_tamil"  class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = oci_parse($conn, "SELECT BD_MOTLIT, EDN_TAMIL_NAME FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			oci_execute($sel_fedu);
			while($row_fedu = oci_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_MOTLIT'];?>" <?php if($row_fedu['BD_MOTLIT']==$row['BD_MOTLITT']) echo "selected"; ?> ><?php echo $row_fedu['EDN_TAMIL_NAME'];?></option>
            <?php 
			} ?>
    	</select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Occupation of&nbsp;the Father: </strong></td>
    <td >
        <select name="fathers_occupation" id="fathers_occupation" class="boxfields">
            <option value="">Select Occupation</option>
            <?php 
			$sel_occu = oci_parse($conn,"SELECT BD_FATOCCUP,OCCUP_DESC FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			oci_execute($sel_occu);
			while($row_foccu = oci_fetch_array($sel_occu))
			{
			?>
				<option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>" <?php if($row_foccu['BD_FATOCCUP']==$row['BD_FATOCCUP']) echo "selected"; ?>><?php echo $row_foccu['OCCUP_DESC']; ?></option>
			<?php  
			} ?>
		</select>      
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select name="fathers_occupation_tamil" id="fathers_occupation_tamil" class="boxfields">
            <option value="">Select Occupation</option>
            <?php 
			$sel_occu = oci_parse($conn,"SELECT BD_FATOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			oci_execute($sel_occu);
			while($row_foccu = oci_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>" <?php if($row_foccu['BD_FATOCCUP']==$row['BD_FATOCCUPT']) echo "selected"; ?>><?php echo $row_foccu['OCCUP_TAMIL_NAME']; ?></option>
			<?php  
			} ?>
       </select>      
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Occupation of&nbsp;the Mother: </strong></td>
    <td >
        <select  name="mothers_occupation"  id="mothers_occupation" class="boxfields">
            <option value="">Select Occupation</option>
           <?php 
			$sel_occu = oci_parse($conn,"SELECT BD_MOTOCCUP,OCCUP_DESC FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			oci_execute($sel_occu);
			while($row_moccu = oci_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_moccu['BD_MOTOCCUP']; ?>" <?php if($row_moccu['BD_MOTOCCUP']==$row['BD_MOTOCCUP']) echo "selected"; ?>><?php echo $row_moccu['OCCUP_DESC']; ?></option>
			<?php  
			} ?>
        </select>                 
    </td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select  name="mothers_occupation_tamil"  id="mothers_occupation_tamil" class="boxfields">
            <option value="">Select Occupation</option>
            <?php 
			$sel_occu = oci_parse($conn,"SELECT BD_MOTOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			oci_execute($sel_occu);
			while($row_moccu = oci_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_moccu['BD_MOTOCCUP']; ?>" <?php if($row_moccu['BD_MOTOCCUP']==$row['BD_MOTOCCUPT']) echo "selected"; ?>><?php echo $row_moccu['OCCUP_TAMIL_NAME']; ?></option>
			<?php  
			} ?>
        </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Age of the Mother @ the time of &nbsp;Marriage&nbsp;(&#2980;&#3007;&#2992;&#3009;&#2990;&#2979;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2986;&#3019;&#2980;&#3009; <br />&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofmarriage" id="ageattimeofmarriage" value="<?php echo $row['BD_MOTAGEM']; ?>" class="boxfields"/></td>
    <td height="32" ><strong>&nbsp;Age of the Mother @ the time &nbsp;of Delivery (&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; 
      &nbsp;&#2986;&#3019;&#2980;&#3009;&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofdelivery" id="ageattimeofdelivery" value="<?php echo $row['BD_MOTAGED']; ?>" class="boxfields"/></td>
</tr>

<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Birth Order (&#2986;&#3007;&#2993;&#2986;&#3021;&#2986;&#3009; &#2997;&#2992;&#3007;&#2970;&#3016;): </strong></td>
    <td colspan="3" > <input type="text" name="birth_order" id="birth_order" value="<?php echo $row['BD_BIRTHORD']; ?>" class="boxfields"/></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Delivery Attention: </strong></td>
    <td >
    	<select name="delivery_attention" id="delivery_attention" class="boxfields">
        <option value="">Select Type</option>
        <?php 
			$delat_query = "SELECT DELATN_CODE, DELATN_DESC FROM ".delivery_attention_table." WHERE DELATN_STATUS ='Y'"; 
			$res_delat = oci_parse($conn, $delat_query);
			oci_execute($res_delat);
			while($row_delat = oci_fetch_array($res_delat, OCI_ASSOC+OCI_RETURN_NULLS))
			{
		?>
        		<option value="<?php echo $row_delat['DELATN_CODE'];?>" <?php if($row_delat['DELATN_CODE']==$row['BD_DELVTYPE']) echo "selected"; ?>><?php echo $row_delat['DELATN_DESC'];?></option>
        <?php 
			} ?>
        </select>
    </td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2992;&#2970;&#2997;&#2990;&#3021; &#2986;&#3006;&#2992;&#3021;&#2980;&#2997;&#2992;&#3021; :</strong> </td>
    <td >
    	<select name="delivery_attention_tamil" id="delivery_attention_tamil" class="boxfields">
            <option value="">Select Type</option>
            <?php 
			$delat_query = "SELECT DELATN_CODE, DELATN_TAMIL_NAME FROM ".delivery_attention_table." WHERE DELATN_STATUS ='Y'"; 
			$res_delat = oci_parse($conn, $delat_query);
			oci_execute($res_delat);
			while($row_delat = oci_fetch_array($res_delat, OCI_ASSOC+OCI_RETURN_NULLS))
			{
		?>
        		<option value="<?php echo $row_delat['DELATN_CODE'];?>" <?php if($row_delat['DELATN_CODE']==$row['BD_DELVTYPET']) echo "selected"; ?>><?php echo $row_delat['DELATN_TAMIL_NAME'];?></option>
        <?php 
			} ?>
        </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Delivery Type: </strong></td>
    <td >
	    <select name="delivery_type" id="delivery_type" class="boxfields">
        <option value="">Select Type</option>
        <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT DELMETH_CODE, DELMETH_DESC FROM ".delivery_table." WHERE DELMETH_STATUS='Y'");
			oci_execute($sel_fam_rel);		
			while($row_del = oci_fetch_array($sel_fam_rel))
			{
		?>
        		<option value="<?php echo $row_del['DELMETH_CODE']; ?>" <?php if($row['BD_DELMETH']==$row_del['DELMETH_CODE']) echo "selected"; ?>><?php echo $row_del['DELMETH_DESC']; ?></option>
        <?php  
			} ?>
		</select>
    </td>
   <td ><strong>&nbsp;&#2986;&#3007;&#2992;&#2970;&#2997; &#2990;&#3009;&#2993;&#3016;:</strong> </td>
   <td >
    <select name="delivery_type_tamil" id="delivery_type_tamil" class="boxfields">
        <option value="">Select Type</option>
         <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT DELMETH_CODE, DELMETH_TAMIL_NAME FROM ".delivery_table." WHERE DELMETH_STATUS='Y'");
			oci_execute($sel_fam_rel);		
			while($row_del = oci_fetch_array($sel_fam_rel))
			{
		?>
        		<option value="<?php echo $row_del['DELMETH_CODE']; ?>" <?php if($row['BD_DELMETHT']==$row_del['DELMETH_CODE']) echo "selected"; ?>><?php echo $row_del['DELMETH_TAMIL_NAME']; ?></option>
        <?php  
			} ?>
    </select>
   </td>
</tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Weight Kgs<br />&nbsp;(&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2958;&#2975;&#3016;): </strong></td>
    <td > <input type="text" name="childweight" id="childweight" value="<?php echo $row['BD_CHLDWT']; ?>" class="boxfields"/></td>
    <td height="32" ><strong>&nbsp;Pregnancy Duration [Week] &nbsp;(&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021;&nbsp;&#2965;&#3006;&#2994;&#2990;&#3021;):</strong></td>
    <td > <input type="text" name="pregnancyduration" id="pregnancyduration" value="<?php echo $row['BD_PREGDUR']; ?>" class="boxfields"/></td>
</tr>
<tr>
	<td height="32" ><strong>&nbsp;Remarks:</strong></td>
    <td > <input type="text" name="remarks" id="remarks" value="<?php echo $row['BD_REMARKS']; ?>" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2993;&#3007;&#2986;&#3021;&#2986;&#3009;&#2965;&#2995;&#3021;:</strong> </td>
    <td ><input type="text" name="remarks_tamil" id="remarks_tamil" value="<?php echo $row['BD_REMARKST']; ?>" class="boxfields1"/>
    <a href="javascript:;" onClick="return popitup('keyboard.php','remarks_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>  
<?php /*?><tr>
	<td height="32"><strong>&nbsp;Approval Status</strong></td>
    <td>
    <select name="isapprove" id="isapprove" class="boxfields">
    	<option value="1"<?php if($row['IS_APPROVE']==1){ ?> selected="selected"<?php } ?> >Approve</option>
    	<option value="0"<?php if($row['IS_APPROVE']==0){ ?> selected="selected"<?php } ?> >Pending</option>        
    </select>
    </td>
</tr>
<?php */?><tr>
	<td colspan="4" align="center">
    	<input type="submit" name="Submit" value="Submit" id="Submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
        <input type="reset" name="Reset" value="Reset" id="Reset" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;"  />
    </td>
</tr>                  
</table>
</form>
</div>
 </center>
<br />
<br />

<div id="footer"> CopyRight ® 2013. Coimbatore City Municipal Corporation. </div>

</body>
</html>
