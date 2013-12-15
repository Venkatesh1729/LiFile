<?php 
session_start();
include("oracle_to_php.php");// Connection

if(isset($_POST['Submit']))
{
	$registration_no=$_POST['registration_no'];
	$registration_year=$_POST['registration_year'];
	$zone=$_POST['zone'];
	$ward=$_POST['ward'];
	$registration_date=date('Y-m-d', strtotime($_POST['registration_date']));
	$date_of_death=date('Y-m-d', strtotime($_POST['date_of_death']));
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

else if($_POST['session_hosp_id']!='')
{
	$hospt_query= mysql_query("SELECT * FROM ".hospital_table." where BD_HOSPCODE='".trim($_POST['session_hosp_id'])."'");
	//mysql_execute($hospt_query);
	$hrow=mysql_fetch_array($hospt_query);
	
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

if($_POST['death_hospital']!='')
{
	$hosp_code=$_POST['death_hospital'];
}
else if($_POST['death_hospital_tamil']!='')
{
	$hosp_code=$_POST['death_hospital_tamil'];
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

	/*$ent_date="select to_date(to_char(sysdate,'dd/mm/yyyy HH:MI:SS'),'dd/mm/yyyy HH:MI:SS') from dual";
	$compiled1 = mysql_query( $ent_date);
	//mysql_execute($compiled1);
	$row_date = mysql_fetch_array($compiled1);
	$entry_date=$row_date[0];*/
	$entry_date= date('Y-m-d');
	$entry_by=trim($_SESSION['username']);
	
	$sql = "INSERT INTO ".death_table."(DD_REGNO,DD_REGYR,DD_REGDT,DD_DEATHDT, DIV_CODE, ULB_NO,WD_CODE,DD_PERNAME,DD_PERNAMET,DD_PERSEX,DD_PERSEXT,DD_AGEDURATION,DD_AGE,DD_PLACE,DD_PLACET,DD_DEATHADD1,DD_DEATHADD1T,DD_DEATHADD2,DD_DEATHADD2T,DD_DEATHADD3,DD_DEATHADD3T,DD_DEATHADD4,DD_DEATHADD4T,DD_PERADD1,DD_PERADD1T,DD_PERADD2,DD_PERADD2T,DD_PERADD3,DD_PERADD3T,DD_PERADD4,DD_PERADD4T,DD_DURDEATHADD1,DD_DURDEATHADD1T,DD_DURDEATHADD2,DD_DURDEATHADD2T,DD_DURDEATHADD3,DD_DURDEATHADD3T,DD_DURDEATHADD4,DD_DURDEATHADD4T,DD_INFNAME,DD_INFADD1,DD_INFADD2,DD_INFADD3,DD_INFADD4,DD_INFNAMET,DD_INFADD1T,DD_INFADD2T,DD_INFADD3T,DD_INFADD4T,DD_MOTNAME,DD_MOTNAMET,DD_FATNAME,DD_FATNAMET,DD_HUSBANDNAMEORWIFE,DD_HUSBANDNAMEORWIFET,	DD_RELIGION,DD_RELIGION2,DD_RELIGIONT,DD_RELIGION2T,DD_OCCUP,DD_OCCUPT,DD_MEDKIND,DD_MEDKINDT,DD_MEDCERT,DD_MEDCERTT,DD_FEMDEATH,DD_FEMDEATHT,DD_DEATHCAUSE,DD_DEATHCAUSET,DD_SMOKFLG,DD_SMOKYRS,DD_ARCNTFLG,DD_ARCNTYRS,DD_ALCHLFLG,DD_ALCHLYRS,DD_CHEWFLG,DD_CHEWYRS,DD_REMARKS,DD_SMOKFLGT,DD_SMOKYRST,DD_ARCNTFLGT,DD_ARCNTYRST,DD_ALCHLFLGT,DD_ALCHLYRST,DD_CHEWFLGT,DD_CHEWYRST,DD_REMARKST,DD_ENTBY,DIS_CODE,BD_HOSPCODE,DD_TOWN,DD_DIST,DD_TORV,DD_STATE,DD_TOWNT,DD_DISTT,DD_TORVT,DD_STATET,DD_FLAGVI,DD_ENTDT,DD_DEADD1,DD_DEADD1T)
	VALUES('$registration_no','$registration_year','$registration_date','$date_of_death'";
	if($_POST['hospital_div_code']!="")
	{
		$sql .= ",'$hospital_div_code'";
	} 
	else if($_POST['session_hosp_id']!='')
	{
		$sql .= ", $session_hospital_div_code";
	}
else {
		$sql .= ",'$zone'";
	}
$sql .= ",'$zone','$ward','$person_name','$person_name_tamil','$gender','$gender_tamil','$age_duration','$age','$death_place','$death_place_tamil','$address_no1','$address_no1_tamil','$address_no2','$address_no2_tamil','$address_no3_state','$address_no3_state_tamil','$address_no4','$address_no4_tamil',
'$permanent_address1','$permanent_address1_tamil','$permanent_address2','$permanent_address2_tamil','$permanent_address3_state','$permanent_address3_state_tamil','$permanent_address4','$permanent_address4_tamil','$deceased_address1','$deceased_address1_tamil','$deceased_address2','$deceased_address2_tamil','$deceased_address3_state','$deceased_address3_state_tamil','$deceased_address4','$deceased_address4_tamil','$informer_name','$informer_address1','$informer_address2','$informer_address3_state','$informer_address4','$informer_name_tamil','$informer_address1_tamil','$informer_address2_tamil','$informer_address3_tamil_state','$informer_address4_tamil','$mother_name','$mother_name_tamil','$father_name','$father_name_tamil','$husband_name','$husband_name_tamil','$deceased_religion1','$deceased_religion2','$deceased_religion_tamil1','$deceased_religion_tamil2','$occupation','$occupation_tamil','$medical_attention','$medical_attention_tamil','$medical_certified','$medical_certified_tamil','$maternal_death','$maternal_death_tamil','$death_cause','$death_cause_tamil','$smoke','$txtsmokeyear','$arecanut','$txtarecanutyear','$alcohol','$txtalcholyear','$tobacco','$txttobaccoyear','$remarks','$smoke_tamil','$txtsmokeyear_tamil','$arecanut_tamil','$txtarecanutyear_tamil','$alcohol_tamil','$txtalcholyear_tamil','$tobacco_tamil','$txttobaccoyear_tamil','$remarks_tamil','$entry_by','$dis_code','$hosp_code',
'$deceased_residence_town','$deceased_residence_district','$deceased_residence_townvillage','$deceased_residence_state','$deceased_residence_town_tamil','$deceased_residence_district_tamil','$deceased_residence_townvillage_tamil','$deceased_residence_state_tamil','Y','$entry_date','$deceased_residence_address1','$deceased_residence_address1_tamil')";
	
	$compiled = mysql_query( $sql);
	//mysql_execute($compiled);
	$msg="Death Entry has been saved successfully.";

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
        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);
			
			<?php if($_SESSION['hospital']=='')
				{ ?>
			var ids = [ "person_name_tamil", "address_no1_tamil", "address_no2_tamil", "address_no4_tamil",  "informer_name_tamil", "informer_address1_tamil", "informer_address2_tamil", "informer_address4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_address1_tamil", "deceased_religion_tamil2", "remarks_tamil","permanent_address1_tamil", "permanent_address2_tamil", "permanent_address4_tamil","deceased_address1_tamil", "deceased_address2_tamil", "deceased_address4_tamil"];
				 <?php  }else { ?>				
        // Enable transliteration in the textfields with the given ids.
			var ids = [ "person_name_tamil", "informer_name_tamil", "informer_address1_tamil", "informer_address2_tamil", "informer_address4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_address1_tamil", "deceased_religion_tamil2", "remarks_tamil","permanent_address1_tamil", "permanent_address2_tamil", "permanent_address4_tamil","deceased_address1_tamil", "deceased_address2_tamil", "deceased_address4_tamil"];
		<?php } ?>
			
//			alert(ids)
        control.makeTransliteratable(ids);
        // Show the transliteration control which can be used to toggle between
        // English and Hindi.
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
if($_SESSION['hospital']!='')
{
	$hospital_code=$_SESSION['hospital'];
	$hosp_query	= mysql_query("SELECT * FROM ".hospital_table." where BD_HOSPCODE='$hospital_code'");
	//mysql_execute($hosp_query);
	$row=mysql_fetch_array($hosp_query);
	$hosp_div_code=$row['DIV_CODE'];
}
?>
<br />
<center>
<div style="width:990px;" align="center">
<form name="form1" method="post" onsubmit="return validatedeathform();">
<input type="hidden" name="session_hosp_id" id="session_hosp_id" value="<?php echo trim($_SESSION['hospital']); ?>" />
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
    <td width="209" > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields" /></td>

	<td width="243" height="32" ><strong>&nbsp;Registration Year (&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="259" > <input type="text" name="registration_year" id="registration_year" value="" class="boxfields" /></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
	    <select name="zone" id="zone" class="boxfields" onchange="getzone_id(this.value);">
        	<option value="" >---Select---</option>
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

	<td height="32" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
	    <select name="ward" id="ward"  class="boxfields">
        	<option value="">---Select---</option>

    	</select>		   	
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="registration_date" id="registration_date" value="" class="boxfields" readonly="readonly" />
	 <a href="javascript:NewCal('registration_date','ddMMMyyyy',false,24)">
    	<img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
    </a></td>
	<td height="32" ><strong>&nbsp;Date Of Death (&#2951;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="date_of_death" id="date_of_death" value="" class="boxfields" readonly="readonly" />
     <a href="javascript:NewCal('date_of_death','ddMMMyyyy',false,24)">
    	<img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
    </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name: </strong></td>
    <td > <input type="text" name="person_name" id="person_name" value="" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="person_name_tamil" id="person_name_tamil" value="" class="boxfields" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','person_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Sex: </strong></td>
    <td >
	    <select name="gender" id="gender" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" >Male</option>
            <option value="F" >FeMale</option>
   	  </select>	   	    
    </td>
    <td ><strong>&nbsp;&#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td><select name="gender_tamil" id="gender_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="M" >&#2950;&#2979;&#3021;</option>
            <option value="F" >&#2986;&#3014;&#2979;&#3021;</option>
   	  	</select>	 
    </td>
</tr>
 
<tr>
	<td height="32" ><strong>&nbsp;Age (&#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td >
    	<!--<input type="text" name="age" id="age" value="" class="boxfields" />-->
        <select name="age_select" id="age_select" class="boxfields">
        	<option value="">---Select---</option>
            <option value="Years">Years</option>
            <option value="Months">Months</option>
            <option value="Days">Days</option>
            <option value="Hours">Hours</option>
            <option value="Notknown">Notknown</option>
        </select>
        <input type="text" name="age" id="age" value="" class="boxfields"  onKeyPress="return isNumberKey(event);"/>
    </td>
</tr>
<?php if($_SESSION['hospital']==''){ ?>
<tr>
	<td height="32" ><strong>&nbsp;Place of Death: </strong></td>
    <td >
	    <select name="death_place" id="death_place" class="boxfields" onchange="getdeath_place_id(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" >House</option>
            <option value="HOSPITAL" >Hospital</option>
    	</select>
        <select name="death_hospital" id="death_hospital" class="boxfields" style="display:none;"  onchange="getdeathhospital_id(this.value);">
        	<option value="" >---Select Hospital---</option>
    	</select>
        <input type="hidden" name="hospital_div_code" id="hospital_div_code" value=""  />
        <input type="hidden" name="hospital_add1" id="hospital_add1" value=""  />
        <input type="hidden" name="hospital_add2" id="hospital_add2" value=""  />
        <input type="hidden" name="hospital_add3" id="hospital_add3" value=""  />
        <input type="hidden" name="hospital_pincode" id="hospital_pincode" value=""  />
        <input type="hidden" name="hospital_add1_tamil" id="hospital_add1_tamil" value=""  />
        <input type="hidden" name="hospital_add2_tamil" id="hospital_add2_tamil" value=""  />
        <input type="hidden" name="hospital_add3_tamil" id="hospital_add3_tamil" value=""  /> 	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="death_place_tamil" id="death_place_tamil" class="boxfields"  onchange="getdeath_place_id_tamil(this.value);" >
        	<option value="" >---Select---</option>
            <option value="HOUSE" >&#2997;&#3008;&#2975;&#3009;</option>
            <option value="HOSPITAL" >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;&#2990;&#2985;&#3016;</option>
    	</select>
        <select name="death_hospital_tamil" id="death_hospital_tamil" style="display:none;" onchange="getdeathhospital_id(this.value);">
        	<option value="" >---Select Hospital---</option>
    	</select>
            
    </td>
</tr>

<tr id="deathadd">
	<td height="32" ><strong>&nbsp;Death Address: </strong></td>
     <td >
    <input type="text" name="address_no1" id="address_no1" value="" class="boxfields1" />
    <input type="text" name="address_no2" id="address_no2" value="" class="boxfields1" />
    
    <select name="address_no3_state" id="address_no3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query2 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state2 = mysql_query( $state_query2);
				//mysql_execute($res_state2);
				while($row_state2 = mysql_fetch_array($res_state2))
				{?>
            		<option value="<?php echo $row_state2['STATE_CODE']; ?>"><?php echo $row_state2['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="address_no4" id="address_no4" value="" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021;&nbsp;<br />
 &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <input type="text" name="address_no1_tamil" id="address_no1_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="address_no2_tamil" id="address_no2_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
   
    <select name="address_no3_state_tamil" id="address_no3_state_tamil"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="address_no4_tamil" id="address_no4_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>
<?php } ?>

<tr>
	<td height="32" ><strong>&nbsp;Permanent Address of The Deceased: </strong></td>
     <td >
    <input type="text" name="permanent_address1" id="permanent_address1" value="" class="boxfields1" />
    <input type="text" name="permanent_address2" id="permanent_address2" value="" class="boxfields1" />
     <select name="permanent_address3_state" id="permanent_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query3 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state3 = mysql_query( $state_query3);
				//mysql_execute($res_state3);
				while($row_state3 = mysql_fetch_array($res_state3))
				{?>
            		<option value="<?php echo $row_state3['STATE_CODE']; ?>"><?php echo $row_state3['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="permanent_address4" id="permanent_address4" value="" class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007; :</strong></td>
     <td >
    <input type="text" name="permanent_address1_tamil" id="permanent_address1_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="permanent_address2_tamil" id="permanent_address2_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="permanent_address3_state_tamil" id="permanent_address3_state_tamil"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="permanent_address4_tamil" id="permanent_address4_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Address of the Deceased @ the time of Death: </strong></td>
     <td >
    <input type="text" name="deceased_address1" id="deceased_address1" value="" class="boxfields1" />
    <input type="text" name="deceased_address2" id="deceased_address2" value="" class="boxfields1" />
    <select name="deceased_address3_state" id="deceased_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query3 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state3 = mysql_query( $state_query3);
				//mysql_execute($res_state3);
				while($row_state3 = mysql_fetch_array($res_state3))
				{?>
            		<option value="<?php echo $row_state3['STATE_CODE']; ?>"><?php echo $row_state3['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="deceased_address4" id="deceased_address4" value="" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979; &#2984;&#3015;&#2992;&#2980;&#3021;&#2980;&#3007;&#2994;&#3021; &#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <input type="text" name="deceased_address1_tamil" id="deceased_address1_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="deceased_address2_tamil" id="deceased_address2_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="deceased_address3_state_tamil" id="deceased_address3_state_tamil"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="deceased_address4_tamil" id="deceased_address4_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Informer Name & Address: </strong></td>
     <td >
    <input type="text" name="informer_name" id="informer_name" value="" class="boxfields1"/>
    <input type="text" name="informer_address1" id="informer_address1" value="" class="boxfields1" />
    <input type="text" name="informer_address2" id="informer_address2" value="" class="boxfields1" />
    <select name="informer_address3_state" id="informer_address3_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query4 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state4 = mysql_query( $state_query4);
				//mysql_execute($res_state4);
				while($row_state4 = mysql_fetch_array($res_state4))
				{?>
            		<option value="<?php echo $row_state4['STATE_CODE']; ?>"><?php echo $row_state4['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="informer_address4" id="informer_address4" value="" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2951;&#2985;&#3021;&#2947;&#2986;&#3006;&#2992;&#3021;&#2990;&#2992;&#3021; 
    &#2986;&#3014;&#2991;&#2992;&#3021; &#38; &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;: </strong></td>
     <td >
    <input type="text" name="informer_name_tamil" id="informer_name_tamil" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="informer_address1_tamil" id="informer_address1_tamil" value="" class="boxfields1" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','informer_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <input type="text" name="informer_address2_tamil" id="informer_address2_tamil" value="" class="boxfields1" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','informer_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    <select name="informer_address3_tamil_state" id="informer_address3_tamil_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
    <input type="text" name="informer_address4_tamil" id="informer_address4_tamil" value="" class="boxfields1" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of The Mother: </strong></td>
    <td > <input type="text" name="mother_name" id="mother_name" value="" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;: </strong> </td>
    <td ><input type="text" name="mother_name_tamil" id="mother_name_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','mother_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of Father/Husband: </strong></td>
    <td > <input type="text" name="father_name" id="father_name" value="" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021;/&#2965;&#2979;&#2997;&#2992;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td ><input type="text" name="father_name_tamil" id="father_name_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','father_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Name Of The Husband/Wife: </strong></td>
    <td > <input type="text" name="husband_name" id="husband_name" value="" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2965;&#2979;&#2997;&#2992;&#3021;/&#2990;&#2985;&#3016;&#2997;&#3007; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td ><input type="text" name="husband_name_tamil" id="husband_name_tamil" value="" class="boxfields" />  <a href="javascript:;" onClick="return popitup('keyboard.php','husband_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Residence Of Deceased: </strong></td>
    <td >
	    <select name="deceased_residence_state" id="deceased_residence_state" class="boxfields1" onchange="getstatedeath_id(this.value);">
        	<option value="" >---Select State---</option>
             <?php 
				$state_query = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state = mysql_query( $state_query);
				//mysql_execute($res_state);
				while($row_state = mysql_fetch_array($res_state))
				{?>
            		<option value="<?php echo $row_state['STATE_CODE']; ?>"><?php echo $row_state['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>	   	        

	    <select name="deceased_residence_district" id="deceased_residence_district" class="boxfields1" onchange="getdistrict_death_id(this.value)">
        	<option value="" >---Select District---</option>
    	</select>
        <input type="text" name="deceased_residence_address1" id="deceased_residence_address1" value=""  class="boxfields1"/>
		<select  name="deceased_residence_townvillage" id="deceased_residence_townvillage" class="boxfields1" >
            <option value="">-Select-</option>
            <option value="1">TOWN</option>
            <option value="2">VILLAGE</option>
        </select>
	    <select name="deceased_residence_town" id="deceased_residence_town" class="boxfields1" >
            <option value="">---Select Town---</option>
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2965;&#3009;&#2975;&#3007;&#2991;&#3007;&#2992;&#3009;&#2986;&#3021;&#2986;&#3009;</strong> </td>
    <td >     
        <select name="deceased_residence_state_tamil" id="deceased_residence_state_tamil"  class="boxfields1" onchange="getstatetamildeath_id(this.value);">
            <option selected="" value="">-Select State-</option>
            <?php 
				$state_query1 = "SELECT STATE_CODE, STATE_TAMIL_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_TAMIL_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        
        <select name="deceased_residence_district_tamil" id="deceased_residence_district_tamil" class="boxfields" onchange="getdistricttamil_death_id(this.value)">
        	<option value="" >---Select District---</option>
    	</select>
        <input type="text" name="deceased_residence_address1_tamil" id="deceased_residence_address1_tamil" value=""  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_residence_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select  name="deceased_residence_townvillage_tamil" id="deceased_residence_townvillage_tamil" class="boxfields1">
            <option value="">-Select-</option>
            <option value="1">&#2984;&#2965;&#2992;&#2990;&#3021;</option>
            <option value="2">&#2965;&#3007;&#2992;&#3006;&#2990;&#2990;&#3021;</option>
        </select>	
	    <select name="deceased_residence_town_tamil" id="deceased_residence_town_tamil" class="boxfields1" >
        	<option value="" >---Select---</option>
    	</select>	     
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Religion Of the Deceased: </strong></td>
    <td >
	    <select name="deceased_religion1" id="deceased_religion1" class="boxfields" >
          <option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = mysql_query("SELECT REL_CODE, REL_DESC FROM ".religion_table." WHERE REL_STATUS='Y'");
			//mysql_execute($sel_fam_rel);
			while ($row = mysql_fetch_array($sel_fam_rel)) 
			{ ?>
        	<option value="<?php echo $row['REL_CODE'];?>" ><?php echo $row['REL_DESC'];?></option>
            <?php 
			} ?>            
    	</select>
    	<input type="text" name="deceased_religion2" id="deceased_religion2" value=""  class="boxfields1"/>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="deceased_religion_tamil1" id="deceased_religion_tamil1" class="boxfields" >
           <option value="" >---Select---</option>
            <?php 
			$sel_fam_rel = mysql_query("SELECT REL_CODE, REL_TAMIL_NAME FROM ".religion_table." WHERE REL_STATUS='Y'");
			//mysql_execute($sel_fam_rel);
			while ($row = mysql_fetch_array($sel_fam_rel)) 
			{ ?>
        	<option value="<?php echo $row['REL_CODE'];?>" ><?php echo $row['REL_TAMIL_NAME'];?></option>
            <?php 
			} ?> 
    	</select>
        <input type="text" name="deceased_religion_tamil2" id="deceased_religion_tamil2" value=""  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_religion_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Occupation: </strong></td>
    <td > <select name="occupation" id="occupation" class="boxfields" >        	
           <option selected="" value="">Select Occupation</option>
            <?php 
			$sel_occu = mysql_query("SELECT BD_FATOCCUP,OCCUP_DESC FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			//mysql_execute($sel_occu);
			while($row_foccu = mysql_fetch_array($sel_occu))
			{
			?>
				<option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>"><?php echo $row_foccu['OCCUP_DESC']; ?></option>
			<?php  
			} ?>
    	</select>
     </td>
    <td ><strong>&nbsp;&#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td>
    	<select name="occupation_tamil" id="occupation_tamil" class="boxfields" > 	
            <option selected="" value="">Select Occupation</option>
                <?php 
                $sel_occu = mysql_query("SELECT BD_FATOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
                //mysql_execute($sel_occu);
                while($row_foccu = mysql_fetch_array($sel_occu))
                {
                ?>
                <option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>"><?php echo $row_foccu['OCCUP_TAMIL_NAME']; ?>
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
            <option value="Y" >INSTITUTION</option>
            <option value="M" >MEDICAL ATTENTION OTHER THAN INSTITUTION</option>
            <option value="D" >NO MEDICAL ATTENTION</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2997;&#2965;&#3016;: </strong> </td>
    <td ><select name="medical_attention_tamil" id="medical_attention_tamil"  class="boxfields">
        	<option value="" selected>Select Medical Attention</option>	
            <option value="Y" >&#2984;&#3007;&#2993;&#3009;&#2997;&#2985;&#2990;&#3021;</option>
            <option value="M" >&#2984;&#3007;&#2993;&#3009;&#2997;&#2985;&#2990;&#3021; &#2980;&#2997;&#3007;&#2992; &#2986;&#3007;&#2993; &#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;</option>
            <option value="D" >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997; &#2965;&#2997;&#2985;&#3007;&#2986;&#3021;&#2986;&#3009; &#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Medical Certified: </strong></td>
    <td > <select name="medical_certified" id="medical_certified" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2970;&#3006;&#2985;&#3021;&#2993;&#3007;&#2980;&#2996;&#3021;: </strong> </td>
    <td ><select name="medical_certified_tamil" id="medical_certified_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y">&#2950;&#2990;&#3021;</option>
            <option value="N">&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Maternal Death: </strong></td>
    <td > <select name="maternal_death" id="maternal_death" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y">YES</option>
            <option value="N">NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3021;&#2997;&#2996;&#3007; &#2990;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="maternal_death_tamil" id="maternal_death_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >&#2950;&#2990;&#3021;</option>
            <option value="N" >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Death Cause: </strong></td>
    <td > <select name="death_cause" id="death_cause" class="boxfields" >
    	   <option>---Select---</option>
    		  <?php 
			 	$dis_dtl = mysql_query("SELECT * FROM ".disease_table." ORDER BY DIS_CODE ASC");
				//mysql_execute($dis_dtl);
				while($rows = mysql_fetch_array($dis_dtl)) 
				{ ?>
            	<option value="<?php echo $rows['DIS_CODE'];?>"><?php echo $rows['DIS_DESC'];?></option>
            <?php 
				} 
				?>    
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979;&#2990;&#3021; &#2965;&#3006;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="death_cause_tamil" id="death_cause_tamil" class="boxfields" >
           <option>---Select---</option>
          <?php 
			 	$dis_dtl = mysql_query("SELECT * FROM ".disease_table." ORDER BY DIS_CODE ASC");
				//mysql_execute($dis_dtl);
				while($rows = mysql_fetch_array($dis_dtl)) 
				{ ?>
            	<option value="<?php echo $rows['DIS_CODE'];?>"><?php echo $rows['DIS_TAMIL_NAME'];?></option>
            <?php 
				} 
				?>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Smoke: </strong></td>
    <td > <select name="smoke" id="smoke" style="width:80px;" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select> 
        <input type="text"  name="txtsmokeyear" id="txtsmokeyear" value="" size="4" maxlength="2" onKeyPress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;: </strong> </td>
    <td ><select name="smoke_tamil" id="smoke_tamil" style="width:80px;">
            <option value="" selected>Select</option>	
            <option value="Y" >&#2950;&#2990;&#3021;</option>
            <option value="N" >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtsmokeyear_tamil" id="txtsmokeyear_tamil" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Tobacco: </strong></td>
    <td > <select name="tobacco" id="tobacco" style="width:80px;" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txttobaccoyear" id="txttobaccoyear" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;&#2991;&#3007;&#2994;&#3016;: </strong> </td>
    <td ><select name="tobacco_tamil" id="tobacco_tamil" style="width:80px;" >
        	<option value="" selected>Select</option>	
            <option value="Y" >&#2950;&#2990;&#3021;</option>
            <option value="N" >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txttobaccoyear_tamil" id="txttobaccoyear_tamil" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Arecanut: </strong></td>
    <td > <select name="arecanut" id="arecanut" style="width:80px;" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtarecanutyear" id="txtarecanutyear" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3006;&#2965;&#3021;&#2965;&#3009;: </strong> </td>
    <td ><select name="arecanut_tamil" id="arecanut_tamil" style="width:80px;">
        	<option value="" selected>Select</option>	
            <option value="Y" >&#2950;&#2990;&#3021;</option>
            <option value="N" >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtarecanutyear_tamil" id="txtarecanutyear_tamil" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Alcohol: </strong></td>
    <td > <select name="alcohol" id="alcohol"  style="width:80px;">
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtalcholyear" id="txtalcholyear" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
     </td>
    <td ><strong>&nbsp;&#2990;&#2980;&#3009;: </strong> </td>
    <td ><select name="alcohol_tamil" id="alcohol_tamil"  style="width:80px;">
        	<option value="" selected>Select</option>	
            <option value="Y" >&#2950;&#2990;&#3021;</option>
            <option value="N" >&#2951;&#2994;&#3021;&#2994;&#3016;</option>
    	</select>
        <input type="text"  name="txtalcholyear_tamil" id="txtalcholyear_tamil" value="" size="4" maxlength="2" onkeypress="return isNumberKey(event);"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Remarks:</strong></td>
    <td > <input type="text" name="remarks" id="remarks" value="" style="width:80px;" /></td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2993;&#3007;&#2986;&#3021;&#2986;&#3009;&#2965;&#2995;&#3021;:</strong> </td>
    <td ><input type="text" name="remarks_tamil" id="remarks_tamil" value="" class="boxfields" />  <a href="javascript:;" onClick="return popitup('keyboard.php','remarks_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
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