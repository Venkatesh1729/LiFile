<?php 
session_start();
include("oracle_to_php.php");// Connection

if(isset($_POST['Submit']))
{
	$registration_no=$_POST['registration_no'];
	$registration_year=$_POST['registration_year'];
	$zone=$_POST['zone'];
	$ward=$_POST['ward'];
	$registration_date=$_POST['registration_date'];
	$date_of_death=$_POST['date_of_death'];
	$person_name=$_POST['person_name'];
	$person_name_tamil=$_POST['person_name_tamil'];
	$gender=$_POST['gender'];
	$gender_tamil=$_POST['gender_tamil'];
	$age=$_POST['age'];
	$age_duration=$_POST['age_select'];
	$death_place=$_POST['death_place'];
	$death_place_tamil=$_POST['death_place_tamil'];

if($_POST['death_place']=="HOUSE")
{	
	$hospital_div_code = $_POST['hospital_div_code'];
	$address_no1=$_POST['address_no1'];
	$address_no2=$_POST['address_no2'];
	$address_no3_state=$_POST['address_no3_state'];	
	$address_no4=$_POST['address_no4'];
	$address_no1_tamil=$_POST['address_no1_tamil'];
	$address_no2_tamil=$_POST['address_no2_tamil'];
	$address_no3_state_tamil=$_POST['address_no3_state_tamil'];
	$address_no4_tamil=$_POST['address_no4_tamil'];
} 
else if($_POST['death_place']=="HOSPITAL")
{
	$hospital_div_code = $_POST['hospital_div_code'];
	$address_no1 = $_POST['hospital_add1'];
	$address_no2 = $_POST['hospital_add2'];
	$address_no3_state = $_POST['hospital_add3'];
	$address_no4 = $_POST['hospital_pincode'];
	$address_no1_tamil = $_POST['hospital_add1_tamil'];
	$address_no2_tamil = $_POST['hospital_add2_tamil'];
	$address_no4_tamil = $_POST['hospital_pincode'];
	$address_no3_state_tamil = $_POST['hospital_add3_tamil'];
	$hosp_code=$_POST['death_hospital'];
}
if($_POST['death_hospital']!='')
{
	$hosp_code=$_POST['death_hospital'];
}
else if($_POST['death_hospital_tamil']!='')
{
	$hosp_code=$_POST['death_hospital_tamil'];
}

else if($_POST['session_hosp_id']!='')
{
	$hospt_query= oci_parse($conn,"SELECT * FROM ".hospital_table." where BD_HOSPCODE='".trim($_POST['session_hosp_id'])."'");
	oci_execute($hospt_query);
	$hrow=oci_fetch_array($hospt_query);
	
	$session_hospital_div_code = $hrow['DIV_CODE'];
	$address_no1 = $hrow['BD_HOSPADD1'];
	$address_no2 = $hrow['BD_HOSPADD2'];
	$address_no3_state = $hrow['BD_HOSPADD3'];
	$address_no4 = $hrow['BD_HOSPPIN'];
	$address_no1_tamil = $hrow['BD_HOSPADD1T'];
	$address_no2_tamil = $hrow['BD_HOSPADD2T'];
	$address_no3_state_tamil = $hrow['BD_HOSPADD3T'];
	$address_no4_tamil = $hrow['BD_HOSPPIN'];
	$hosp_code=$hrow['BD_HOSPCODE'];
	$death_place='HOSPITAL';
	$death_place_tamil='HOSPITAL';
}

if($_POST['deceased_residence_district']!='')
{
	$dis_code=$_POST['deceased_residence_district'];
}
else if($_POST['deceased_residence_district_tamil']!='')
{
	$dis_code=$_POST['deceased_residence_district_tamil'];
}
	$permanent_address1=$_POST['permanent_address1'];
	$permanent_address2=$_POST['permanent_address2'];
	$permanent_address3_state=$_POST['permanent_address3_state'];	
	$permanent_address4=$_POST['permanent_address4'];
	$permanent_address1_tamil=$_POST['permanent_address1_tamil'];
	$permanent_address2_tamil=$_POST['permanent_address2_tamil'];
	$permanent_address3_state_tamil=$_POST['permanent_address3_state_tamil'];
	$permanent_address4_tamil=$_POST['permanent_address4_tamil'];
	
	$deceased_address1=$_POST['deceased_address1'];
	$deceased_address2=$_POST['deceased_address2'];
	$deceased_address3_state=$_POST['deceased_address3_state'];	
	$deceased_address4=$_POST['deceased_address4'];
	$deceased_address1_tamil=$_POST['deceased_address1_tamil'];
	$deceased_address2_tamil=$_POST['deceased_address2_tamil'];
	$deceased_address3_state_tamil=$_POST['deceased_address3_state_tamil'];
	$deceased_address4_tamil=$_POST['deceased_address4_tamil'];
	
	$informer_name=$_POST['informer_name'];
	$informer_address1=$_POST['informer_address1'];
	$informer_address2=$_POST['informer_address2'];
	$informer_address3_state=$_POST['informer_address3_state'];
	$informer_address4=$_POST['informer_address4'];
	$informer_name_tamil=$_POST['informer_name_tamil'];
	$informer_address1_tamil=$_POST['informer_address1_tamil'];
	$informer_address2_tamil=$_POST['informer_address2_tamil'];
	$informer_address3_tamil_state=$_POST['informer_address3_tamil_state'];
	$informer_address4_tamil=$_POST['informer_address4_tamil'];
	
	$mother_name=$_POST['mother_name'];
	$mother_name_tamil=$_POST['mother_name_tamil'];
	$father_name=$_POST['father_name'];
	$father_name_tamil=$_POST['father_name_tamil'];
	$husband_name=$_POST['husband_name'];
	$husband_name_tamil=$_POST['husband_name_tamil'];
	
	$deceased_residence_state=$_POST['deceased_residence_state'];
	$deceased_residence_district=$_POST['deceased_residence_district'];
	$deceased_residence_address1=$_POST['deceased_residence_address1'];
	$deceased_residence_townvillage=$_POST['deceased_residence_townvillage'];
	$deceased_residence_town=$_POST['deceased_residence_town'];
	
	$deceased_residence_state_tamil=$_POST['deceased_residence_state_tamil'];
	$deceased_residence_district_tamil=$_POST['deceased_residence_district_tamil'];
	$deceased_residence_address1_tamil=$_POST['deceased_residence_address1_tamil'];
	$deceased_residence_townvillage_tamil=$_POST['deceased_residence_townvillage_tamil'];
	$deceased_residence_town_tamil=$_POST['deceased_residence_town_tamil'];
	
	$deceased_religion1=$_POST['deceased_religion1'];
	$deceased_religion2=$_POST['deceased_religion2'];
	$deceased_religion_tamil1=$_POST['deceased_religion_tamil1'];
	$deceased_religion_tamil2=$_POST['deceased_religion_tamil2'];
	
	$occupation=$_POST['occupation'];
	$occupation_tamil=$_POST['occupation_tamil'];
	$medical_attention=$_POST['medical_attention'];
	$medical_attention_tamil=$_POST['medical_attention_tamil'];
	$medical_certified=$_POST['medical_certified'];
	$medical_certified_tamil=$_POST['medical_certified_tamil'];
	$maternal_death=$_POST['maternal_death'];
	$maternal_death_tamil=$_POST['maternal_death_tamil'];
	$death_cause=$_POST['death_cause'];
	$death_cause_tamil=$_POST['death_cause_tamil'];
	$smoke=$_POST['smoke'];
	$smoke_tamil=$_POST['smoke_tamil'];
	$tobacco=$_POST['tobacco'];
	$tobacco_tamil=$_POST['tobacco_tamil'];
	$arecanut=$_POST['arecanut'];
	$arecanut_tamil=$_POST['arecanut_tamil'];
	$alcohol=$_POST['alcohol'];
	$alcohol_tamil=$_POST['alcohol_tamil'];
	$remarks=$_POST['remarks'];
	$remarks_tamil=$_POST['remarks_tamil'];
	
	$txtsmokeyear=$_POST['txtsmokeyear'];
	$txtsmokeyear_tamil=$_POST['txtsmokeyear_tamil'];
	$txttobaccoyear=$_POST['txttobaccoyear'];
	$txttobaccoyear_tamil=$_POST['txttobaccoyear_tamil'];
	$txtarecanutyear=$_POST['txtarecanutyear'];
	$txtarecanutyear_tamil=$_POST['txtarecanutyear_tamil'];
	$txtalcholyear=$_POST['txtalcholyear'];
	$txtalcholyear_tamil=$_POST['txtalcholyear_tamil'];	
	
	/* URL VALUES */

$get_regno=$_POST['get_regno'];
$get_regyr=$_POST['get_regyr'];
$get_zone=$_POST['get_zone'];
$get_ward=$_POST['get_ward'];

	$sql="UPDATE ".death_table." SET DD_REGNO='$registration_no',DD_REGYR='$registration_year',DD_REGDT='$registration_date',DD_DEATHDT='$date_of_death'";
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
	$sql .=",ULB_NO='$zone',WD_CODE='$ward',DD_PERSEX='$gender',DD_PERSEXT='$gender_tamil',DD_PERNAME='$person_name',DD_PERNAMET='$person_name_tamil',DD_AGEDURATION='$age_duration',DD_AGE='$age',DD_PLACE='$death_place',DD_PLACET='$death_place_tamil',DD_DEATHADD1='$address_no1',DD_DEATHADD1T='$address_no1_tamil',DD_DEATHADD2='$address_no2',DD_DEATHADD2T='$address_no2_tamil',DD_DEATHADD3='$address_no3_state',DD_DEATHADD3T='$address_no3_state_tamil',DD_DEATHADD4='$address_no4',DD_DEATHADD4T='$address_no4_tamil',DD_PERADD1='$permanent_address1',DD_PERADD1T='$permanent_address1_tamil',DD_PERADD2='$permanent_address2',DD_PERADD2T='$permanent_address2_tamil',DD_PERADD3='$permanent_address3_state',DD_PERADD3T='$permanent_address3_state_tamil',DD_PERADD4='$permanent_address4',DD_PERADD4T='$permanent_address4_tamil',DD_DURDEATHADD1='$deceased_address1',DD_DURDEATHADD1T='$deceased_address1_tamil',DD_DURDEATHADD2='$deceased_address2',DD_DURDEATHADD2T='$deceased_address2_tamil',DD_DURDEATHADD3='$deceased_address3_state',DD_DURDEATHADD3T='$deceased_address3_state_tamil',DD_DURDEATHADD4='$deceased_address4',DD_DURDEATHADD4T='$deceased_address4_tamil',DD_INFNAME='$informer_name',DD_INFADD1='$informer_address1',DD_INFADD2='$informer_address2',DD_INFADD3='$informer_address3_state',DD_INFADD4='$informer_address4',DD_INFNAMET='$informer_name_tamil',DD_INFADD1T='$informer_address1_tamil',DD_INFADD2T='$informer_address2_tamil',DD_INFADD3T='$informer_address3_tamil_state',DD_INFADD4T='$informer_address4_tamil',DD_MOTNAME='$mother_name',DD_MOTNAMET='$mother_name_tamil',DD_FATNAME='$father_name',DD_FATNAMET='$father_name_tamil',DD_HUSBANDNAMEORWIFE='$husband_name',DD_HUSBANDNAMEORWIFET='$husband_name_tamil',DD_RELIGION='$deceased_religion1',DD_RELIGIONT='$deceased_religion_tamil1',DD_RELIGION2='$deceased_religion2',DD_RELIGION2T='$deceased_religion_tamil2',DD_OCCUP='$occupation',DD_OCCUPT='$occupation_tamil',DD_MEDKIND='$medical_attention',DD_MEDKINDT='$medical_attention_tamil',DD_MEDCERT='$medical_certified',DD_MEDCERTT='$medical_certified_tamil',DD_FEMDEATH='$maternal_death',DD_FEMDEATHT='$maternal_death_tamil',DD_DEATHCAUSE='$death_cause',DD_DEATHCAUSET='$death_cause_tamil',DD_SMOKFLG='$smoke',DD_SMOKFLGT='$smoke_tamil',DD_SMOKYRS='$txtsmokeyear',DD_SMOKYRST='$txtsmokeyear_tamil',DD_CHEWFLG='$tobacco',DD_CHEWFLGT='$tobacco_tamil',DD_CHEWYRS='$txttobaccoyear',DD_CHEWYRST='$txttobaccoyear_tamil',DD_ARCNTFLG='$arecanut',DD_ARCNTFLGT='$arecanut_tamil',DD_ARCNTYRS='$txtarecanutyear',DD_ARCNTYRST='$txtarecanutyear_tamil',DD_ALCHLFLG='$alcohol',DD_ALCHLFLGT='$alcohol_tamil',DD_ALCHLYRS='$txtalcholyear',DD_ALCHLYRST='$txtalcholyear_tamil',DD_REMARKS='$remarks',DD_REMARKST='$remarks_tamil',DIS_CODE='$dis_code',BD_HOSPCODE='$hosp_code',DD_STATE='$deceased_residence_state',DD_STATET='$deceased_residence_state_tamil',DD_DIST='$deceased_residence_district',DD_DISTT='$deceased_residence_district_tamil',DD_DEADD1='$deceased_residence_address1',DD_DEADD1T='$deceased_residence_address1_tamil',DD_TORV='$deceased_residence_townvillage',DD_TORVT='$deceased_residence_townvillage_tamil',DD_TOWN='$deceased_residence_town',DD_TOWNT='$deceased_residence_town_tamil' WHERE DD_REGNO='$get_regno' AND DD_REGYR='$get_regyr' AND ULB_NO='$get_zone' AND WD_CODE='$get_ward'";
	
	//echo $sql; exit;
	
	$compiled = oci_parse($conn, $sql);
	oci_execute($compiled);
	$msg="Death Entry has been updated successfully.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC</title>
<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>  
<script type="text/javascript" src="js/validate.js"></script>   
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
        var control =
            new google.elements.transliteration.TransliterationControl(options);

		//var ids = [ "person_name_tamil", "address_no1_tamil", "address_no2_tamil", "address_no4_tamil", "permanent_address1_tamil", "permanent_address2_tamil", "permanent_address4_tamil", "deceased_address1_tamil", "deceased_address2_tamil", "deceased_address4_tamil", "informer_name_tamil", "informer_address1_tamil", "informer_address2_tamil", "informer_address4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_address1_tamil", "deceased_religion_tamil2", "remarks_tamil"];
		
		<?php if($_SESSION['hospital']=='')
				{ ?>
			var ids = [ "person_name_tamil", "address_no1_tamil", "address_no2_tamil", "address_no4_tamil",  "informer_name_tamil", "informer_address1_tamil", "informer_address2_tamil", "informer_address4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_address1_tamil", "deceased_religion_tamil2", "remarks_tamil","permanent_address1_tamil", "permanent_address2_tamil", "permanent_address4_tamil","deceased_address1_tamil", "deceased_address2_tamil", "deceased_address4_tamil"];
				 <?php  }else { ?>				
        // Enable transliteration in the textfields with the given ids.
			var ids = [ "person_name_tamil", "informer_name_tamil", "informer_address1_tamil", "informer_address2_tamil", "informer_address4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_address1_tamil", "deceased_religion_tamil2", "remarks_tamil","permanent_address1_tamil", "permanent_address2_tamil", "permanent_address4_tamil","deceased_address1_tamil", "deceased_address2_tamil", "deceased_address4_tamil"];
		<?php } ?>
		
        control.makeTransliteratable(ids);
        control.showControl('translControl');
      }
      google.setOnLoadCallback(onLoad);
	  
	  function popitup(url,id) {
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
$sel_birth	= oci_parse($conn,"SELECT * FROM ".death_table." where DD_REGNO='$_GET[reg_no]' AND DD_REGYR='$_GET[regis_yr]' AND ULB_NO='$_GET[zone]' AND WD_CODE='$_GET[ward]'");
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
?>
<br />
<center>
<div style="width:990px;" align="center">
<form name="form1" method="post" onsubmit="return validatedeathform();">
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
    	<p><strong style="color:#FFF;">Death Entry Form</strong></p>
    </td>
</tr>

<tr>
	<td width="221" height="32" ><strong>&nbsp;Registration No&nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;):</strong></td>
    <td width="209" > <input type="text" name="registration_no" id="registration_no" value="<?php echo $row['DD_REGNO']; ?>" readonly="readonly" class="boxfields" /></td>
	<td width="243" height="32" ><strong>&nbsp;Registration Year (&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="259" > <input type="text" name="registration_year" id="registration_year" value="<?php echo $row['DD_REGYR']; ?>" class="boxfields" /></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
	    <select name="zone" id="zone" class="boxfields" onchange="getzone_id(this.value);">
        	<option value="" >---Select---</option>
			<?php 
			 	$sel_zone = oci_parse($conn,"SELECT ULB_NO, ULB_NAME FROM ".zone_table." ORDER BY ULB_NAME ASC");
				oci_execute($sel_zone);
				while($row_zone = oci_fetch_array($sel_zone, OCI_ASSOC+OCI_RETURN_NULLS)) 
				{ ?>
            	<option value="<?php echo $row_zone['ULB_NO'];?>" <?php if($row_zone['ULB_NO']==$row['ULB_NO']) echo "selected"; ?>><?php echo $row_zone['ULB_NAME'];?></option>
            <?php 
				} 
				?>
    	</select>	
    </td>
	<td height="32" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
	    <select name="ward" id="ward"  class="boxfields">
        	<option value="">---Select---</option>
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
	<td height="32" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="registration_date" id="registration_date" value="<?php echo $row['DD_REGDT']; ?>" class="boxfields" readonly="readonly" />
	 <a href="javascript:NewCal('registration_date','ddMMMyyyy',false,24)">
    	<img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
    </a></td>
	<td height="32" ><strong>&nbsp;Date Of Death (&#2951;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="date_of_death" id="date_of_death" value="<?php echo $row['DD_DEATHDT']; ?>" class="boxfields" readonly="readonly" />
     <a href="javascript:NewCal('date_of_death','ddMMMyyyy',false,24)">
    	<img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
    </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name: </strong></td>
    <td > <input type="text" name="person_name" id="person_name" value="<?php echo $row['DD_PERNAME']; ?>" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="person_name_tamil" id="person_name_tamil" value="<?php echo $row['DD_PERNAMET']; ?>" class="boxfields1" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','person_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Sex: </strong></td>
    <td >
	    <select name="gender" id="gender" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" <?php if($row['DD_PERSEX']=='M') echo "selected"; ?> >Male</option>
            <option value="F" <?php if($row['DD_PERSEX']=='F') echo "selected"; ?> >FeMale</option>
   	  </select>	   	    
    </td>
    <td ><strong>&nbsp;&#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td><select name="gender_tamil" id="gender_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" <?php if($row['DD_PERSEX']=='M') echo "selected"; ?>>&#2950;&#2979;&#3021;</option>
            <option value="F" <?php if($row['DD_PERSEXT']=='F') echo "selected"; ?> >&#2986;&#3014;&#2979;&#3021;</option>
   	  	</select>	 
    </td>
</tr>
 
<tr>
	<td height="32" ><strong>&nbsp;Age (&#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td >
        <select name="age_select" id="age_select" class="boxfields">
        	<option value="">---Select---</option>
            <option value="Years" <?php if($row['DD_AGEDURATION']=='Years') echo "selected"; ?>>Years</option>
            <option value="Months" <?php if($row['DD_AGEDURATION']=='Months') echo "selected"; ?>>Months</option>
            <option value="Days" <?php if($row['DD_AGEDURATION']=='Days') echo "selected"; ?>>Days</option>
            <option value="Hours" <?php if($row['DD_AGEDURATION']=='Hours') echo "selected"; ?>>Hours</option>
            <option value="Notknown" <?php if($row['DD_AGEDURATION']=='Notknown') echo "selected"; ?>>Notknown</option>
        </select>
        </td>
        <td colspan="2">
        <input type="text" name="age" id="age" value="<?php echo $row['DD_AGE']; ?>" class="boxfields" onKeyPress="return isNumberKey(event);"/>
    </td>
</tr>
<?php if($_SESSION['hospital']==''){ ?>
<tr>
	<td height="32" ><strong>&nbsp;Place of Death: </strong></td>
    <td >
	    <select name="death_place" id="death_place" class="boxfields" onchange="getdeath_place_id(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" <?php if($row['DD_PLACE']=='HOUSE') echo "selected"; ?>>House</option>
            <option value="HOSPITAL" <?php if($row['DD_PLACE']=='HOSPITAL') echo "selected"; ?> >Hospital</option>
    	</select>
        <select name="death_hospital" id="death_hospital" class="boxfields" onchange="getdeathhospital_id(this.value);" style="display:<?php if($row['DD_PLACE']=='HOSPITAL') { ?> block <?php }  else { ?> none <?php } ?> ;">
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
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021; :</strong> </td>
    <td >
   	    <select name="death_place_tamil" id="death_place_tamil" class="boxfields"  onchange="getdeath_place_id_tamil(this.value);" >
        	<option value="" >---Select---</option>
            <option value="HOUSE" <?php if($row['DD_PLACE']=='HOUSE') echo "selected"; ?> >&#2997;&#3008;&#2975;&#3009;</option>
            <option value="HOSPITAL" <?php if($row['DD_PLACE']=='HOSPITAL') echo "selected"; ?> >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;&#2990;&#2985;&#3016;</option>
    	</select>
        <select name="death_hospital_tamil" id="death_hospital_tamil" onchange="getdeathhospital_id(this.value);"  style="display:<?php if($row['DD_PLACE']=='HOSPITAL') { ?> block <?php }  else { ?> none <?php } ?> ;">
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
<?php 
if($row['DD_PLACE']=='HOUSE'){ ?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$( document ).ready(function() {
$("#deathadd").show();
});
</script>
<?php } 
else if($row['DD_PLACE']=='HOSPITAL')
{	
?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
	$("#deathadd").hide();
});
</script>
<?php
}
else { ?>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
 $("#death_place").change(function(){
   if(document.getElementById('death_place').value=='HOSPITAL')
   {
	  $("#deathadd").hide();
   }
});
});
</script>
<?php } ?>
<tr id="deathadd">
<td ><strong>&nbsp;Death Address: </strong></td>
     <td >
    <input type="text" name="address_no1" id="address_no1" value="<?php echo $row['DD_DEATHADD1']; ?>" class="boxfields1" />
    <input type="text" name="address_no2" id="address_no2" value="<?php echo $row['DD_DEATHADD2']; ?>" class="boxfields1" />    
    <select name="address_no3_state" id="address_no3_state" class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query2 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state2 = oci_parse($conn, $state_query2);
				oci_execute($res_state2);
				while($row_state2 = oci_fetch_array($res_state2, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state2['STATE_CODE']; ?>" <?php if($row_state2['STATE_CODE']==$row['DD_DEATHADD3']) echo "selected"; ?>><?php echo $row_state2['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="address_no4" id="address_no4" value="<?php echo $row['DD_DEATHADD4']; ?>" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021;&nbsp;<br />
 &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <input type="text" name="address_no1_tamil" id="address_no1_tamil" value="<?php echo $row['DD_DEATHADD1T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="address_no2_tamil" id="address_no2_tamil" value="<?php echo $row['DD_DEATHADD2T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>   
    <select name="address_no3_state_tamil" id="address_no3_state_tamil" class="boxfields1">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['DD_DEATHADD3T']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="address_no4_tamil" id="address_no4_tamil" value="<?php echo $row['DD_DEATHADD4T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>
<?php } ?>
<tr>
	<td height="32" ><strong>&nbsp;Permanent Address of The Deceased: </strong></td>
     <td >
    <input type="text" name="permanent_address1" id="permanent_address1" value="<?php echo $row['DD_PERADD1']; ?>" class="boxfields1" />
    <input type="text" name="permanent_address2" id="permanent_address2" value="<?php echo $row['DD_PERADD2']; ?>" class="boxfields1" />
     <select name="permanent_address3_state" id="permanent_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query3 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state3 = oci_parse($conn, $state_query3);
				oci_execute($res_state3);
				while($row_state3 = oci_fetch_array($res_state3, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state3['STATE_CODE']; ?>" <?php if($row_state3['STATE_CODE']==$row['DD_PERADD3']) echo "selected"; ?>><?php echo $row_state3['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="permanent_address4" id="permanent_address4" value="<?php echo $row['DD_PERADD4']; ?>" class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007; :</strong></td>
     <td >
    <input type="text" name="permanent_address1_tamil" id="permanent_address1_tamil" value="<?php echo $row['DD_PERADD1T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="permanent_address2_tamil" id="permanent_address2_tamil" value="<?php echo $row['DD_PERADD2T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="permanent_address3_state_tamil" id="permanent_address3_state_tamil" class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['DD_PERADD3T']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="permanent_address4_tamil" id="permanent_address4_tamil" value="<?php echo $row['DD_PERADD4T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Address of the Deceased @ the time of Death: </strong></td>
     <td >
    <input type="text" name="deceased_address1" id="deceased_address1" value="<?php echo $row['DD_DURDEATHADD1']; ?>" class="boxfields1" />
    <input type="text" name="deceased_address2" id="deceased_address2" value="<?php echo $row['DD_DURDEATHADD2']; ?>" class="boxfields1" />
    <select name="deceased_address3_state" id="deceased_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query3 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state3 = oci_parse($conn, $state_query3);
				oci_execute($res_state3);
				while($row_state3 = oci_fetch_array($res_state3, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state3['STATE_CODE']; ?>" <?php if($row_state3['STATE_CODE']==$row['DD_DURDEATHADD3']) echo "selected"; ?>><?php echo $row_state3['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="deceased_address4" id="deceased_address4" value="<?php echo $row['DD_DURDEATHADD4']; ?>" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979; &#2984;&#3015;&#2992;&#2980;&#3021;&#2980;&#3007;&#2994;&#3021; &#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <input type="text" name="deceased_address1_tamil" id="deceased_address1_tamil" value="<?php echo $row['DD_DURDEATHADD1T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="deceased_address2_tamil" id="deceased_address2_tamil" value="<?php echo $row['DD_DURDEATHADD2T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="deceased_address3_state_tamil" id="deceased_address3_state_tamil"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['DD_DURDEATHADD3T']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="deceased_address4_tamil" id="deceased_address4_tamil" value="<?php echo $row['DD_DURDEATHADD4T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Informer Name & Address: </strong></td>
     <td >
    <input type="text" name="informer_name" id="informer_name" value="<?php echo $row['DD_INFNAME']; ?>" class="boxfields1"/>
    <input type="text" name="informer_address1" id="informer_address1" value="<?php echo $row['DD_INFADD1']; ?>" class="boxfields1" />
    <input type="text" name="informer_address2" id="informer_address2" value="<?php echo $row['DD_INFADD2']; ?>" class="boxfields1" />
    <select name="informer_address3_state" id="informer_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query4 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state4 = oci_parse($conn, $state_query4);
				oci_execute($res_state4);
				while($row_state4 = oci_fetch_array($res_state4, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state4['STATE_CODE']; ?>" <?php if($row_state4['STATE_CODE']==$row['DD_INFADD3']) echo "selected"; ?>><?php echo $row_state4['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="informer_address4" id="informer_address4" value="<?php echo $row['DD_INFADD4']; ?>" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2951;&#2985;&#3021;&#2947;&#2986;&#3006;&#2992;&#3021;&#2990;&#2992;&#3021; 
    &#2986;&#3014;&#2991;&#2992;&#3021; &#38; &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;: </strong></td>
     <td >
    <input type="text" name="informer_name_tamil" id="informer_name_tamil" value="<?php echo $row['DD_INFNAMET']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="informer_address1_tamil" id="informer_address1_tamil" value="<?php echo $row['DD_INFADD1T']; ?>" class="boxfields1" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','informer_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="informer_address2_tamil" id="informer_address2_tamil" value="<?php echo $row['DD_INFADD2T']; ?>" class="boxfields1" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','informer_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="informer_address3_tamil_state" id="informer_address3_tamil_state" class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row_state1['STATE_CODE']==$row['DD_INFADD3T']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="informer_address4_tamil" id="informer_address4_tamil" value="<?php echo $row['DD_INFADD4T']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of The Mother: </strong></td>
    <td > <input type="text" name="mother_name" id="mother_name" value="<?php echo $row['DD_MOTNAME']; ?>" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;: </strong> </td>
    <td ><input type="text" name="mother_name_tamil" id="mother_name_tamil" value="<?php echo $row['DD_MOTNAMET']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','mother_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of Father/Husband: </strong></td>
    <td > <input type="text" name="father_name" id="father_name" value="<?php echo $row['DD_FATNAME']; ?>" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021;/&#2965;&#2979;&#2997;&#2992;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td ><input type="text" name="father_name_tamil" id="father_name_tamil" value="<?php echo $row['DD_FATNAMET']; ?>" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','father_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of The Husband/Wife: </strong></td>
    <td > <input type="text" name="husband_name" id="husband_name" value="<?php echo $row['DD_HUSBANDNAMEORWIFE']; ?>" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2965;&#2979;&#2997;&#2992;&#3021;/&#2990;&#2985;&#3016;&#2997;&#3007; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td ><input type="text" name="husband_name_tamil" id="husband_name_tamil" value="<?php echo $row['DD_HUSBANDNAMEORWIFET']; ?>" class="boxfields1" />  <a href="javascript:;" onClick="return popitup('keyboard.php','husband_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Residence Of Deceased: </strong></td>
    <td >
	    <select name="deceased_residence_state" id="deceased_residence_state" class="boxfields1" onchange="getstatedeath_id(this.value);">
        	<option value="" >---Select State---</option>
             <?php 
				$state_query = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state = oci_parse($conn, $state_query);
				oci_execute($res_state);
				while($row_state = oci_fetch_array($res_state, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state['STATE_CODE']; ?>" <?php if($row['DD_STATE']==$row_state['STATE_CODE']) echo "selected"; ?>><?php echo $row_state['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>	   	        

	    <select name="deceased_residence_district" id="deceased_residence_district" class="boxfields1" onchange="getdistrict_death_id(this.value)">
        	<option value="" >---Select District---</option>
            <?php 
				$dist_query = "SELECT * FROM ".district_table." WHERE STATE_CODE = '".$row['DD_STATE']."' ORDER BY DIST_NAME ASC";
				$res_dist = oci_parse($conn, $dist_query);
				oci_execute($res_dist);
				while($row_dist = oci_fetch_array($res_dist, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_dist['DIST_CODE']; ?>" <?php if($row['DD_DIST']==$row_dist['DIST_CODE']) echo "selected"; ?>><?php echo $row_dist['DIST_NAME']; ?></option>
            <?php 
				}?> 
    	</select>
        <input type="text" name="deceased_residence_address1" id="deceased_residence_address1" value="<?php echo $row['DD_DEADD1']; ?>"  class="boxfields1"/>
		<select name="deceased_residence_townvillage" id="deceased_residence_townvillage" class="boxfields1" >
            <option value="">-Select-</option>
            <option value="1" <?php if($row['DD_TORV']==1) echo "selected"; ?>>TOWN</option>
            <option value="2" <?php if($row['DD_TORV']==2) echo "selected"; ?>>VILLAGE</option>
        </select>
	    <select name="deceased_residence_town" id="deceased_residence_town" class="boxfields1" >
            <option value="">---Select Town---</option>
             <?php
			$sel_town = "SELECT TOWN_CODE, TOWN_NAME,TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$row['DD_DIST']."' AND TOWN_STATUS='Y'";
			$res_town = oci_parse($conn, $sel_town);
			oci_execute($res_town); 
			?>
			<?php while( $row_town = oci_fetch_array($res_town, OCI_ASSOC+OCI_RETURN_NULLS)){?>
			 <option value="<?php echo $row_town['TOWN_CODE'];?>" <?php if($row['DD_TOWN']==$row_town['TOWN_CODE']) echo "selected"; ?>><?php echo $row_town['TOWN_NAME'];?></option><?php } ?>
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2965;&#3009;&#2975;&#3007;&#2991;&#3007;&#2992;&#3009;&#2986;&#3021;&#2986;&#3009; :</strong> </td>
    <td >     
        <select name="deceased_residence_state_tamil" id="deceased_residence_state_tamil"  class="boxfields1" onchange="getstatetamildeath_id(this.value);">
            <option value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = oci_parse($conn, $state_query1);
				oci_execute($res_state1);
				while($row_state1 = oci_fetch_array($res_state1, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>" <?php if($row['DD_STATET']==$row_state1['STATE_CODE']) echo "selected"; ?>><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        
        <select name="deceased_residence_district_tamil" id="deceased_residence_district_tamil" class="boxfields" onchange="getdistricttamil_death_id(this.value)">
        	<option value="" >---Select District---</option>
            <?php 
				$dist_query = "SELECT * FROM ".district_table." WHERE STATE_CODE = '".$row['DD_STATET']."' ORDER BY DIST_NAME ASC";
				$res_dist = oci_parse($conn, $dist_query);
				oci_execute($res_dist);
				while($row_dist = oci_fetch_array($res_dist, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_dist['DIST_CODE']; ?>" <?php if($row['DD_DISTT']==$row_dist['DIST_CODE']) echo "selected"; ?>><?php echo $row_dist['DIST_TAMIL_NAME']; ?></option>
            <?php 
				}?> 
    	</select>
        <input type="text" name="deceased_residence_address1_tamil" id="deceased_residence_address1_tamil" value="<?php echo $row['DD_DEADD1T']; ?>"  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_residence_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select name="deceased_residence_townvillage_tamil" id="deceased_residence_townvillage_tamil" class="boxfields1">
            <option value="">-Select-</option>
            <option value="1" <?php if($row['DD_TORVT']==1) echo "selected"; ?>>&#2984;&#2965;&#2992;&#2990;&#3021;</option>
            <option value="2" <?php if($row['DD_TORVT']==2) echo "selected"; ?>>&#2965;&#3007;&#2992;&#3006;&#2990;&#2990;&#3021;</option>
        </select>	
	    <select name="deceased_residence_town_tamil" id="deceased_residence_town_tamil" class="boxfields1" >
        	<option value="" >---Select---</option>
            <?php
			$sel_town = "SELECT TOWN_CODE, TOWN_NAME,TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$row['DD_DISTT']."' AND TOWN_STATUS='Y'";
			$res_town = oci_parse($conn, $sel_town);
			oci_execute($res_town); 
			?>
			<?php while( $row_town = oci_fetch_array($res_town, OCI_ASSOC+OCI_RETURN_NULLS)){?>
			 <option value="<?php echo $row_town['TOWN_CODE'];?>" <?php if($row['DD_TOWNT']==$row_town['TOWN_CODE']) echo "selected"; ?>><?php echo $row_town['TOWN_TAMIL_NAME'];?></option><?php } ?>
    	</select>	     
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Religion Of the Deceased: </strong></td>
    <td >
	    <select name="deceased_religion1" id="deceased_religion1" class="boxfields" >
          <option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT REL_CODE, REL_DESC FROM ".religion_table." WHERE REL_STATUS='Y'");
			oci_execute($sel_fam_rel);
			while ($rows = oci_fetch_array($sel_fam_rel, OCI_ASSOC+OCI_RETURN_NULLS)) 
			{ ?>
        	<option value="<?php echo $rows['REL_CODE'];?>" <?php if($rows['REL_CODE']==$row['DD_RELIGION']) echo "selected"; ?> ><?php echo $rows['REL_DESC'];?></option>
            <?php 
			} ?>            
    	</select>
    	<input type="text" name="deceased_religion2" id="deceased_religion2" value="<?php echo $row['DD_RELIGION2']; ?>"  class="boxfields1"/>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021; :</strong> </td>
    <td >
   	    <select name="deceased_religion_tamil1" id="deceased_religion_tamil1" class="boxfields" >
           <option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = oci_parse($conn,"SELECT REL_CODE, REL_TAMIL_NAME FROM ".religion_table." WHERE REL_STATUS='Y'");
			oci_execute($sel_fam_rel);
			while ($rows = oci_fetch_array($sel_fam_rel, OCI_ASSOC+OCI_RETURN_NULLS)) 
			{ ?>
        	<option value="<?php echo $rows['REL_CODE'];?>" <?php if($rows['REL_CODE']==$row['DD_RELIGION']) echo "selected"; ?>  ><?php echo $rows['REL_TAMIL_NAME'];?></option>
            <?php 
			} ?> 
    	</select>
        <input type="text" name="deceased_religion_tamil2" id="deceased_religion_tamil2" value="<?php echo $row['DD_RELIGION2T']; ?>" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_religion_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Occupation: </strong></td>
    <td > <select name="occupation" id="occupation" class="boxfields" >        	
           <option value="">Select Occupation</option>
            <?php 
			$sel_occu = oci_parse($conn,"SELECT BD_FATOCCUP,OCCUP_DESC FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			oci_execute($sel_occu);
			while($row_foccu = oci_fetch_array($sel_occu))
			{
			?>
				<option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>" <?php if($row_foccu['BD_FATOCCUP']==$row['DD_OCCUP']) echo "selected"; ?>><?php echo $row_foccu['OCCUP_DESC']; ?></option>
			<?php  
			} ?>
    	</select>
     </td>
    <td ><strong>&nbsp;&#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td>
    	<select name="occupation_tamil" id="occupation_tamil" class="boxfields" > 	
            <option value="">Select Occupation</option>
                <?php 
                $sel_occu = oci_parse($conn,"SELECT BD_FATOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
                oci_execute($sel_occu);
                while($row_foccu = oci_fetch_array($sel_occu))
                {
                ?>
                <option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>" <?php if($row_foccu['BD_FATOCCUP']==$row['DD_OCCUPT']) echo "selected"; ?>><?php echo $row_foccu['OCCUP_TAMIL_NAME']; ?>
                </option>
			<?php  
			} ?>
         </select>
      </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Type of Medical Attention: </strong></td>
    <td > <select name="medical_attention" id="medical_attention" class="boxfields" >
        	<option value="" selected>Select Medical Attention</option>	
            <option value="Y" <?php if($row['DD_MEDKIND']=='Y') echo "selected"; ?> >INSTITUTION</option>
            <option value="M" <?php if($row['DD_MEDKIND']=='M') echo "selected"; ?> >MEDICAL ATTENTION OTHER THAN INSTITUTION</option>
            <option value="D" <?php if($row['DD_MEDKIND']=='D') echo "selected"; ?> >NO MEDICAL ATTENTION</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2997;&#2965;&#3016;: </strong> </td>
    <td ><select name="medical_attention_tamil" id="medical_attention_tamil"  class="boxfields">
        	<option value="" selected>Select Medical Attention</option>	
            <option value="Y" <?php if($row['DD_MEDKINDT']=='Y') echo "selected"; ?> >&#2984;&#3007;&#2993;&#3009;&#2997;&#2985;&#2990;&#3021;</option>
            <option value="M" <?php if($row['DD_MEDKINDT']=='M') echo "selected"; ?> >&#2984;&#3007;&#2993;&#3009;&#2997;&#2985;&#2990;&#3021; &#2980;&#2997;&#3007;&#2992; &#2986;&#3007;&#2993; &#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;</option>
            <option value="D" <?php if($row['DD_MEDKINDT']=='D') echo "selected"; ?> >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997; &#2965;&#2997;&#2985;&#3007;&#2986;&#3021;&#2986;&#3009; &#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Medical Certified: </strong></td>
    <td > <select name="medical_certified" id="medical_certified" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" <?php if($row['DD_MEDCERT']=='Y') echo "selected"; ?> >YES</option>
            <option value="N" <?php if($row['DD_MEDCERT']=='N') echo "selected"; ?> >NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2970;&#3006;&#2985;&#3021;&#2993;&#3007;&#2980;&#2996;&#3021;: </strong> </td>
    <td ><select name="medical_certified_tamil" id="medical_certified_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" <?php if($row['DD_MEDCERTT']=='Y') echo "selected"; ?>>&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_MEDCERTT']=='N') echo "selected"; ?>>&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Maternal Death: </strong></td>
    <td > <select name="maternal_death" id="maternal_death" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" <?php if($row['DD_FEMDEATH']=='Y') echo "selected"; ?>>YES</option>
            <option value="N"> <?php if($row['DD_FEMDEATH']=='N') echo "selected"; ?>NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3021;&#2997;&#2996;&#3007; &#2990;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="maternal_death_tamil" id="maternal_death_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" <?php if($row['DD_FEMDEATHT']=='Y') echo "selected"; ?> >&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_FEMDEATHT']=='N') echo "selected"; ?> >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Death Cause: </strong></td>
    <td > <select name="death_cause" id="death_cause" class="boxfields" >
    	   <option>---Select---</option>
    		  <?php 
			 	$dis_dtl = oci_parse($conn,"SELECT * FROM ".disease_table." ORDER BY DIS_CODE ASC");
				oci_execute($dis_dtl);
				while($rows = oci_fetch_array($dis_dtl, OCI_ASSOC+OCI_RETURN_NULLS)) 
				{ ?>
            	<option value="<?php echo $rows['DIS_CODE'];?>" <?php if($rows['DIS_CODE']==$row['DD_DEATHCAUSE']) echo "selected"; ?>><?php echo $rows['DIS_DESC'];?></option>
            <?php 
				} 
				?>    
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979;&#2990;&#3021; &#2965;&#3006;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="death_cause_tamil" id="death_cause_tamil" class="boxfields" >
           <option>---Select---</option>
          <?php 
			 	$dis_dtl = oci_parse($conn,"SELECT * FROM ".disease_table." ORDER BY DIS_CODE ASC");
				oci_execute($dis_dtl);
				while($rows = oci_fetch_array($dis_dtl, OCI_ASSOC+OCI_RETURN_NULLS)) 
				{ ?>
            	<option value="<?php echo $rows['DIS_CODE'];?>" <?php if($rows['DIS_CODE']==$row['DD_DEATHCAUSET']) echo "selected"; ?>><?php echo $rows['DIS_TAMIL_NAME'];?></option>
            <?php 
				} 
				?>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Smoke: </strong></td>
    <td > <select name="smoke" id="smoke" style="width:80px;" >
        	<option value="">Select</option>	
            <option value="Y" <?php if($row['DD_SMOKFLG']=='Y') echo "selected"; ?> >YES</option>
            <option value="N" <?php if($row['DD_SMOKFLG']=='N') echo "selected"; ?> >NO</option>
    	</select> 
        <input type="text"  name="txtsmokeyear" id="txtsmokeyear" value="<?php echo $row['DD_SMOKYRS']; ?>" size="4" maxlength="2" onKeyPress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;: </strong> </td>
    <td ><select name="smoke_tamil" id="smoke_tamil" style="width:80px;">
            <option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_SMOKFLGT']=='Y') echo "selected"; ?> >&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_SMOKFLGT']=='N') echo "selected"; ?> >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtsmokeyear_tamil" id="txtsmokeyear_tamil" value="<?php echo $row['DD_SMOKYRST']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Tobacco: </strong></td>
    <td > <select name="tobacco" id="tobacco" style="width:80px;" >
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_CHEWFLG']=='Y') echo "selected"; ?>  >YES</option>
            <option value="N" <?php if($row['DD_CHEWFLG']=='N') echo "selected"; ?>  >NO</option>
    	</select>
        <input type="text"  name="txttobaccoyear" id="txttobaccoyear" value="<?php echo $row['DD_CHEWYRS']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;&#2991;&#3007;&#2994;&#3016;: </strong> </td>
    <td ><select name="tobacco_tamil" id="tobacco_tamil" style="width:80px;" >
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_CHEWFLGT']=='Y') echo "selected"; ?> >&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_CHEWFLGT']=='N') echo "selected"; ?>>&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txttobaccoyear_tamil" id="txttobaccoyear_tamil" value="<?php echo $row['DD_CHEWYRST']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Arecanut: </strong></td>
    <td > <select name="arecanut" id="arecanut" style="width:80px;" >
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_ARCNTFLG']=='Y') echo "selected"; ?> >YES</option>
            <option value="N" <?php if($row['DD_ARCNTFLG']=='N') echo "selected"; ?> >NO</option>
    	</select>
        <input type="text"  name="txtarecanutyear" id="txtarecanutyear" value="<?php echo $row['DD_ARCNTYRS']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3006;&#2965;&#3021;&#2965;&#3009;: </strong> </td>
    <td ><select name="arecanut_tamil" id="arecanut_tamil" style="width:80px;">
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_ARCNTFLGT']=='Y') echo "selected"; ?> >&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_ARCNTFLGT']=='N') echo "selected"; ?> >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtarecanutyear_tamil" id="txtarecanutyear_tamil" value="<?php echo $row['DD_ARCNTYRST']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Alcohol: </strong></td>
    <td > <select name="alcohol" id="alcohol"  style="width:80px;">
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_ALCHLFLG']=='Y') echo "selected"; ?> >YES</option>
            <option value="N" <?php if($row['DD_ALCHLFLG']=='N') echo "selected"; ?> >NO</option>
    	</select>
        <input type="text"  name="txtalcholyear" id="txtalcholyear" value="<?php echo $row['DD_ALCHLYRS']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
     </td>
    <td ><strong>&nbsp;&#2990;&#2980;&#3009;: </strong> </td>
    <td ><select name="alcohol_tamil" id="alcohol_tamil"  style="width:80px;">
        	<option value="" >Select</option>	
            <option value="Y" <?php if($row['DD_ALCHLFLGT']=='Y') echo "selected"; ?> >&#2950;&#2990;&#3021;</option>
            <option value="N" <?php if($row['DD_ALCHLFLGT']=='N') echo "selected"; ?> >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtalcholyear_tamil" id="txtalcholyear_tamil" value="<?php echo $row['DD_ALCHLYRST']; ?>" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Remarks:</strong></td>
    <td > <input type="text" name="remarks" id="remarks" value="<?php echo $row['DD_REMARKS']; ?>" style="width:80px;" /></td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2993;&#3007;&#2986;&#3021;&#2986;&#3009;&#2965;&#2995;&#3021;:</strong> </td>
    <td ><input type="text" name="remarks_tamil" id="remarks_tamil" value="<?php echo $row['DD_REMARKST']; ?>" class="boxfields1" />  <a href="javascript:;" onClick="return popitup('keyboard.php','remarks_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
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