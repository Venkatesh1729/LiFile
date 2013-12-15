<?php 
session_start();
include("oracle_to_php.php");// Connection

if(isset($_POST['submit']))
{	
$registration_no=$_POST['registration_no'];
$registration_year=$_POST['registration_year'];
$zone=$_POST['zone'];
$ward=$_POST['ward'];
$oldward=$_POST['oldward'];
$panchayath=$_POST['panchayath'];
$registrationdate=date('Y-m-d', strtotime($_POST['registration_date']));
$date_of_birth=date('Y-m-d',  strtotime($_POST['date_of_birth']));
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
else if($_POST['birth_place']=="HOSPITAL")
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
	$hosp_code=$_POST['birth_hospital'];
}
else if($_POST['session_hosp_id']!='')
{
	$hospt_query= mysql_query("SELECT * FROM ".hospital_table." where BD_HOSPCODE='".trim($_POST['session_hosp_id'])."'");
	//mysql_execute($hospt_query);
	$hrow=mysql_fetch_array($hospt_query);
	
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
$birth_order_tamil=$_POST['birth_order_tamil'];

$delivery_attention=$_POST['delivery_attention'];
$delivery_attention_tamil=$_POST['delivery_attention_tamil'];

$delivery_type=$_POST['delivery_type'];
$delivery_type_tamil=$_POST['delivery_type_tamil'];

$childweight=$_POST['childweight'];
$pregnancyduration=$_POST['pregnancyduration'];

$remarks=$_POST['remarks'];
$remarks_tamil=$_POST['remarks_tamil'];

//print_r($_POST);exit;

//BD_TYPE,BD_CHLDSEXT,BD_NAMEDT,BD_HOSPCODE,BD_FOETAL,BD_ENTBY,BD_ENTDT,BD_STAT,BD_FLAGVI,ULB_NO

/*$ent_date="select to_date(to_char(sysdate,'dd/mm/yyyy HH:MI:SS'),'dd/mm/yyyy HH:MI:SS') from dual";
$compiled1 = mysql_query( $ent_date);
//mysql_execute($compiled1);
$row_date = mysql_fetch_array($compiled1);
$entry_date=$row_date[0];
*/
$entry_by=trim($_SESSION['username']);

$entry_date = date('Y-m-d');
$sql = "INSERT INTO ".birth_table."(BD_REGNO,BD_REGYR,BD_REGDT,BD_CHLDDOB, DIV_CODE";
$sql .=",ULB_NO, WD_CODE,BD_CHLDSEX,BD_CHLDNAME,BD_CHLDNAMET,BD_FATNAME,BD_FATNAMET,BD_MOTNAME,BD_MOTNAMET,BD_FATSTREET,BD_FATSTREETT,BD_FATADD1,BD_FATADD1T,BD_FATADD2,BD_FATADD2T,BD_FATPIN,BD_FATPINT,BD_INFNAME,BD_INFADD1,BD_INFADD2,BD_INFADD3,BD_INFPIN,BD_PAROPTT,BD_PARTOWN,BD_PARDIST,BD_STATE,BD_FATREL,BD_FATLIT,BD_MOTLIT,BD_FATOCCUP,BD_MOTOCCUP,BD_MOTAGEM,BD_MOTAGED,BD_BIRTHORD,BD_DELVTYPE,BD_DELMETH,BD_CHLDWT,BD_PREGDUR,BD_REMARKS,OLD_WD_CODE,BD_INFNAMET,BD_INFADD1T,BD_INFADD2T,BD_INFADD3T,BD_INFPINT,BD_REMARKST,BD_DELVTYPET,BD_DELMETHT,BD_FATRELT,BD_CHDREL,BD_CHDRELT,BD_FATLITT,BD_MOTLITT,BD_FATOCCUPT,BD_MOTOCCUPT,BD_PAROPTTT,BD_PARTOWNT,BD_PARDISTT,BD_STATET,BD_PERADD1,BD_PERADD1T,BD_PERADD2,BD_PERADD2T,BD_PERADD3,BD_PERADD3T,BD_PERPIN,BD_PERPINT,BD_FLAGVI,BD_ENTBY,BD_CHLDSEXT,BD_CHLDPOB,BD_CHLDPOBT,BD_BIRSTREET,BD_BIRSTREETT,BD_BIRADD1,BD_BIRADD1T,BD_BIRADD2,BD_BIRADD2T,BD_BIRPIN,BD_BIRPINT,BD_HOSPCODE,BD_MOTADDR1,BD_MOTADDR1T,BD_ENTDT,ISPANCHAYAT) VALUES('$registration_no','$registration_year','$registrationdate','$date_of_birth'";
if($_POST['hospital_div_code']!="")
{
	$sql .= ", $_POST[hospital_div_code]";
} 
else if($_POST['session_hosp_id']!='')
{
	$sql .= ", $session_hospital_div_code";
}
else {
	$sql .= ", '$zone'";
}
$sql.=",'$zone','$ward','$child_gender','$child_name','$child_name_tamil','$father_name','$father_name_tamil','$mother_name','$mother_name_tamil','$parent_addr_at_childbirth1','$parent_addr_at_childbirth_tamil1','$parent_addr_at_childbirth2','$parent_addr_at_childbirth_tamil2','$parent_addr_at_childbirth_state','$parent_addr_at_childbirth_state_tamil','$parent_addr_at_childbirth3','$parent_addr_at_childbirth_tamil3','$informer_name','$informer_address1','$informer_address2','$informer_address_state','$informer_address3',

'$permanent_mother_townvillage','$permanent_mother_town','$permanent_mother_add_district','$permanent_mother_add_state',

'$family_religion1','$fathers_edu_level','$mothers_edu_level','$fathers_occupation','$mothers_occupation','$ageattimeofmarriage','$ageattimeofdelivery','$birth_order','$delivery_attention','$delivery_type','$childweight','$pregnancyduration','$remarks','$oldward','$informer_name_tamil','$informer_address_tamil1','$informer_address_tamil2','$informer_address_tamil_state','$informer_address_tamil3','$remarks_tamil','$delivery_attention_tamil','$delivery_type_tamil','$family_religion_tamil1','$family_religion2','$family_religion_tamil2','$fathers_edu_level_tamil','$mothers_edu_level_tamil','$fathers_occupation_tamil','$mothers_occupation_tamil','$permanent_mother_townvillage_tamil','$permanent_mother_town_tamil','$permanent_mother_add_district_tamil','$permanent_mother_add_state_tamil','$permanent_address1','$permanent_address_tamil1','$permanent_address2','$permanent_address_tamil2','$permanent_address_state','$permanent_address_state_tamil','$permanent_address3','$permanent_address_tamil3','Y','$entry_by','$child_gendert','$birth_place','$birth_place_tamil','$birth_address1','$birth_address_tamil1','$birth_address2','$birth_address_tamil2','$birth_address_state','$birth_address_state_tamil','$birth_address3','$birth_address_tamil3','$hosp_code','$permanent_mother_add1','$permanent_mother_add_tamil1','$entry_date','$panchayath')";

//echo $sql;//exit;

$compiled = mysql_query( $sql);
//mysql_execute($compiled);

$msg="Birth Entry has been saved successfully.";

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
		<?php if($_SESSION['hospital']=='')
				{ ?>
				 var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil", "family_religion_tamil2", "birth_address_tamil1", "birth_address_tamil2"];
				 <?php  }else { ?>				
        // Enable transliteration in the textfields with the given ids.
        var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil", "family_religion_tamil2"];
		<?php } ?>
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

if($_SESSION['hospital']!='')
{
	$hospital_code=$_SESSION['hospital'];
	$hosp_query	= mysql_query("SELECT * FROM ".hospital_table." where BD_HOSPCODE='$hospital_code'");
	//mysql_execute($hosp_query);
	$row=mysql_fetch_array($hosp_query);
	$hosp_div_code=$row['DIV_CODE'];
}
?><br />
  <center>     
<div style="width:990px;" align="center">
<form name="form1" method="post" action="birthform.php" onSubmit="return validatebirthform();">
<input type="hidden" name="session_hosp_id" id="session_hosp_id" value="<?php echo trim($_SESSION['hospital']); ?>" />
<p align="center" style="font:Arial, Helvetica, sans-serif; font-size:14px; color:#F00;"><?php echo $msg; ?></p>
<br />
<table border="1" cellspacing="3" cellpadding="5" width="100%" class="mt" align="center" bordercolor="#4282B2">
<tr>
	<td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Form No: 1 - Entry Form</strong></p>
    </td>
</tr>

<tr>
	<td width="251" height="32" ><strong>&nbsp;Registration No&nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;):</strong></td>
    <td width="211" > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields" /></td>
    <td width="219" height="32" ><strong>&nbsp;Registration Year &nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="251" > <input type="text" name="registration_year" id="registration_year" value="" class="boxfields" /></td>
</tr>
<tr>
	<td height="28" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
      <select name="zone" id="zone" class="boxfields" onchange="getzone_id(this.value);" >
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
    <td height="28" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
      <select name="ward" id="ward"  class="boxfields" onchange="getward_id(this.value);" >
        	<option value="">---Select---</option>
    	</select>	   	
    </td>
</tr>
<tr>
	<td height="27" ><strong>&nbsp;OldWard (&#2986;&#2996;&#3016;&#2991; &#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td >
      <select name="oldward" id="oldward" class="boxfields">
        	<option value="">---Select---</option>
    	</select>	   	
    </td>
    <td height="27" ><strong>&nbsp;Panchayath (&#2986;&#2974;&#3021;&#2970;&#3006;&#2991;&#2980;&#3021;&#2980;&#3009;): </strong></td>
    <td > <input type="checkbox" name="panchayath" id="panchayath" value="Panchayath" /></td>
</tr>

<tr>
	<td height="27" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="registration_date" id="registration_date" size="18" value="<?php echo date('d-M-Y');?>"  readonly="readonly"/>
    <a href="javascript:NewCal('registration_date','ddMMMyyyy',false,24)">
    	<img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
    </a>
    </td>
    <td height="27" ><strong>&nbsp;Date Of Birth (&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td ><input type="text" name="date_of_birth" id="date_of_birth" value="" size="18" readonly="readonly"/>
        <a href="javascript:NewCal('date_of_birth','ddMMMyyyy',false,24)">
            <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date">
        </a>
    </td>
</tr>

<tr>
	<td height="28" ><strong>&nbsp;Child Sex: </strong></td>
    <td >
    <select name="child_gender" id="child_gender" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="M" >Male</option>
            <option value="F" >FeMale</option>
   	  </select>	   	    
    </td>   
    <td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td >
      <select name="child_gendert" id="child_gendert" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="M" >&#2950;&#2979;&#3021;</option>
            <option value="F" >&#2986;&#3014;&#2979;&#3021;</option>
   	  </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Name: </strong></td>
    <td > <input type="text" name="child_name" id="child_name" value="" class="boxfields" />
   	</td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="child_name_tamil" id="child_name_tamil" value="" class="boxfields" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','child_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Father Name: </strong></td>
    <td > <input type="text" name="father_name" id="father_name" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="father_name_tamil" id="father_name_tamil" value="" class="boxfields"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','father_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Mother Name: </strong></td>
    <td > <input type="text" name="mother_name" id="mother_name" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;: </strong> </td>
    <td >
    	<input type="text" name="mother_name_tamil" id="mother_name_tamil" value="" class="boxfields"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','mother_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<?php if($_SESSION['hospital']==''){ ?>
<tr>
	<td height="32" ><strong>&nbsp;Place of Birth: </strong></td>
    <td >
	    <select name="birth_place" id="birth_place" class="boxfields" onchange="getbirth_place_id(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" >House</option>
            <option value="HOSPITAL" >Hospital</option>
    	</select>
        <select name="birth_hospital" id="birth_hospital" class="boxfields" style="display:none;"  onchange="gethospital_id(this.value);">
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
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="birth_place_tamil" id="birth_place_tamil" class="boxfields" onchange="getbirth_place_id_tamil(this.value);">
        	<option value="" >---Select---</option>
            <option value="HOUSE" >&#2997;&#3008;&#2975;&#3009;</option>
            <option value="HOSPITAL" >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;&#2990;&#2985;&#3016;</option>
    	</select>	
        <select name="birth_hospital_tamil" id="birth_hospital_tamil" class="boxfields1" style="display:none;" onchange="gethospitaltamil_id(this.value);">
        	<option value="" >---Select Hospital---</option>
    	</select>     
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr id="birthadd">
	<td height="32" ><strong>&nbsp;Birth Address: </strong></td>
     <td >
        <input type="text" name="birth_address1" id="birth_address1" value="" class="boxfields1" />
        <input type="text" name="birth_address2" id="birth_address2" value="" class="boxfields1" />
        <select name="birth_address_state" id="birth_address_state"  class="boxfields1">
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
        <input type="text" name="birth_address3" id="birth_address3" value="" class="boxfields1" />
    </td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
        <input type="text" name="birth_address_tamil1" id="birth_address_tamil1" value="" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','birth_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="birth_address_tamil2" id="birth_address_tamil2" value="" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','birth_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select name="birth_address_state_tamil" id="birth_address_state_tamil"  class="boxfields1">
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
        <input type="text" name="birth_address_tamil3" id="birth_address_tamil3" value="" class="boxfields1" />
    </td>
</tr>
<?php } ?>

<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Permanent Residential<br />&nbsp;Address of the <br />&nbsp;Parents(5.a): </strong></td>
    <td > 
        <input type="text" name="permanent_address1" id="permanent_address" value="" class="boxfields1" />
        <input type="text" name="permanent_address2" id="permanent_address2" value="" class="boxfields1" />

        <select name="permanent_address_state" id="permanent_address_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
			<?php 
				$state_query1 = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state1 = mysql_query( $state_query1);
				//mysql_execute($res_state1);
				while($row_state1 = mysql_fetch_array($res_state1))
				{?>
            		<option value="<?php echo $row_state1['STATE_CODE']; ?>"><?php echo $row_state1['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>
        <input type="text" name="permanent_address3" id="permanent_address3" value="" class="boxfields1" pattern="[0-9]{0,6}"/>
    </td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2993;&#3021;&#2993;&#3019;&#2992;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; 
     &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;(5.a):</strong> </td>
    <td >
        <input type="text" name="permanent_address_tamil1" id="permanent_address_tamil1" value="" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="permanent_address_tamil2" id="permanent_address_tamil2" value="" class="boxfields1" />
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       
        <select name="permanent_address_state_tamil" id="permanent_address_state_tamil"  class="boxfields1">
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
        <input type="text" name="permanent_address_tamil3" id="permanent_address_tamil3" value="" class="boxfields1" pattern="[0-9]{0,6}" title="Please enter the pincode" />
    </td>
</tr>

<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Address Of the <br />&nbsp;Parents At the Time <br />&nbsp;of Birth of child: </strong></td>
     <td >
        <input type="text" name="parent_addr_at_childbirth1" id="parent_addr_at_childbirth1" value="" class="boxfields1"/>
        <input type="text" name="parent_addr_at_childbirth2" id="parent_addr_at_childbirth2" value="" class="boxfields1"/>
        <select name="parent_addr_at_childbirth_state" id="parent_addr_at_childbirth_state"  class="boxfields1">
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
        <input type="text" name="parent_addr_at_childbirth3" id="parent_addr_at_childbirth3" value="" class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2993;&#3021;&#2993;&#3019;&#2992;&#3007;&#2985;&#3021; &#2986;&#3007;&#2993;&#2984;&#3021;&#2980;<br />&nbsp;&#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021;&nbsp; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
     <td >
        <input type="text" name="parent_addr_at_childbirth_tamil1" id="parent_addr_at_childbirth_tamil1" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <input type="text" name="parent_addr_at_childbirth_tamil2" id="parent_addr_at_childbirth_tamil2" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select name="parent_addr_at_childbirth_state_tamil" id="parent_addr_at_childbirth_state_tamil"  class="boxfields1">
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
        <input type="text" name="parent_addr_at_childbirth_tamil3" id="parent_addr_at_childbirth_tamil3" value="" class="boxfields1"/>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Informer Name& Address: </strong></td>
    <td > 
    	<input type="text" name="informer_name" id="informer_name" value="" class="boxfields1"/>
    	<input type="text" name="informer_address1" id="informer_address1" value="" class="boxfields1"/>
      	<input type="text" name="informer_address2" id="informer_address2" value="" class="boxfields1"/>
       	<select name="informer_address_state" id="informer_address_state"  class="boxfields1">
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
        <input type="text" name="informer_address3" id="informer_address3" value="" class="boxfields"/>
    </td>
    <td ><strong>&nbsp;&#2951;&#2985;&#3021;&#2947;&#2986;&#3006;&#2992;&#3021;&#2990;&#2992;&#3021; 
    &#2986;&#3014;&#2991;&#2992;&#3021; &#38; &nbsp;&#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
    <td >
    	<input type="text" name="informer_name_tamil" id="informer_name_tamil" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    	<input type="text" name="informer_address_tamil1" id="informer_address_tamil1" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
      	<input type="text" name="informer_address_tamil2" id="informer_address_tamil2" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       	<select name="informer_address_tamil_state" id="informer_address_tamil_state"  class="boxfields1">
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
        <input type="text" name="informer_address_tamil3" id="informer_address_tamil3" value="" class="boxfields"/>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Permanent Address <br />&nbsp;of the Mother: </strong></td>
    <td >
   	    <select name="permanent_mother_add_state" id="permanent_mother_add_state"  class="boxfields1" onchange="getstate_id(this.value);">
            <option selected="" value="">-Select State-</option>
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
        <select name="permanent_mother_add_district" id="permanent_mother_add_district" class="boxfields1" onchange="getdistrict_id(this.value);">
            <option value="">-Select District-</option>
 
		</select>
        <input type="text" name="permanent_mother_add1" id="permanent_mother_add1" value=""  class="boxfields1"/>
        <select  name="permanent_mother_townvillage" id="permanent_mother_townvillage" class="boxfields1" >
            <option value="">-Select-</option>
            <option value="1">TOWN</option>
            <option value="2">VILLAGE</option>
        </select>	
        <select name="permanent_mother_town" id="permanent_mother_town" class="boxfields1">
            <option value="">-Select Town-</option>
        </select>
    
    </td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
    <td >
   	   <select name="permanent_mother_add_state_tamil" id="permanent_mother_add_state_tamil"  class="boxfields1" onchange="getstate_tamil_id(this.value);">
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
        <select name="permanent_mother_add_district_tamil" id="permanent_mother_add_district_tamil" class="boxfields1" 
        onchange="getdistricttamil_id(this.value)">
            <option value="">-Select District-</option>
		</select>
        <input type="text" name="permanent_mother_add_tamil1" id="permanent_mother_add_tamil1" value=""  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_mother_add_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
        <select  name="permanent_mother_townvillage_tamil" id="permanent_mother_townvillage_tamil" class="boxfields1">
            <option value="">-Select-</option>
            <option value="1">&#2984;&#2965;&#2992;&#2990;&#3021;</option>
            <option value="2">&#2965;&#3007;&#2992;&#3006;&#2990;&#2990;&#3021;</option>
        </select>	
        <select name="permanent_mother_town_tamil" id="permanent_mother_town_tamil" class="boxfields1">
            <option value="">-Select Town-</option>
            <option value="09">&#2965;&#3019;&#2991;&#2990;&#3021;&#2986;&#3009;&#2980;&#3021;&#2980;&#3010;&#2992;&#3021;</option>
            <option value="10">&#2970;&#2992;&#2997;&#2979;&#2990;&#3021;&#2986;&#2975;&#3021;&#2975;&#3007;</option>
            <option value="11">&#2986;&#3015;&#2992;&#3009;&#2992;&#3021;</option>
            <option value="12">&#2986;&#2994;&#3021;&#2994;&#2975;&#2990;&#3021;</option>      
            <option value="" >&#2990;&#3015;&#2975;&#3021;&#2975;&#3009;&#2986;&#3021;&#2986;&#3006;&#2995;&#3016;&#2991;&#2990;&#3021;</option>
            <option value="" >&#2953;&#2975;&#3009;&#2990;&#2994;&#3016;&#2986;&#3021;&#2986;&#3015;&#2975;&#3021;&#2975;&#3016;</option>
            <option value="" >&#2986;&#2994;&#3021;&#2994;&#2975;&#2990;&#3021;</option>
            <option value="" >&#2980;&#3007;&#3051;&#2986;&#3021;&#2986;&#3010;&#2992;&#3021;</option>
        </select>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Religion of the Family: </strong></td>
    <td >
        <select name="family_religion1" id="family_religion1" class="boxfields1">
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
        <input type="text" name="family_religion2" id="family_religion2" value=""  class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2975;&#3009;&#2990;&#3021;&#2986;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021;:</strong> </td>
    <td >
        <select name="family_religion_tamil1" id="family_religion_tamil1" class="boxfields1">
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
        <input type="text" name="family_religion_tamil2" id="family_religion_tamil2" value=""  class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','family_religion_tamil2');" > 
        <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Literacy Status of the Father: </strong></td>
    <td >
        <select name="fathers_edu_level" id="fathers_edu_level" class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = mysql_query( "SELECT BD_FATLIT, EDN_DESC FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			//mysql_execute($sel_fedu);
			while($row_fedu = mysql_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_FATLIT'];?>" ><?php echo $row_fedu['EDN_DESC'];?></option>
            <?php 
			} ?>
    	</select>    
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;:</strong> </td>
    <td >
    	<select name="fathers_edu_level_tamil" id="fathers_edu_level_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = mysql_query( "SELECT BD_FATLIT, EDN_TAMIL_NAME FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			//mysql_execute($sel_fedu);
			while($row_fedu = mysql_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_FATLIT'];?>" ><?php echo $row_fedu['EDN_TAMIL_NAME'];?></option>
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
				$sel_medu = mysql_query( "SELECT BD_MOTLIT, EDN_DESC FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
				//mysql_execute($sel_medu);
				while($row_edu = mysql_fetch_array($sel_medu))
				{
			?>
            		<option value="<?php echo $row_edu['BD_MOTLIT'];?>" ><?php echo $row_edu['EDN_DESC'];?></option>
            <?php 
				} ?>
    	</select>      
   </td>
   <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;: </strong> </td>
   <td >
    	<select name="mothers_edu_level_tamil" id="mothers_edu_level_tamil"  class="boxfields">
        	<option value="" >---Select---</option>
            <?php 
			$sel_fedu = mysql_query( "SELECT BD_FATLIT, EDN_TAMIL_NAME FROM ".education_table." WHERE EDN_STATUS = 'Y' ORDER BY EDN_DESC ASC");
			//mysql_execute($sel_fedu);
			while($row_fedu = mysql_fetch_array($sel_fedu))
			{
			?>
            <option value="<?php echo $row_fedu['BD_FATLIT'];?>" ><?php echo $row_fedu['EDN_TAMIL_NAME'];?></option>
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
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select name="fathers_occupation_tamil" id="fathers_occupation_tamil" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <?php 
			$sel_occu = mysql_query("SELECT BD_FATOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			//mysql_execute($sel_occu);
			while($row_foccu = mysql_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_foccu['BD_FATOCCUP']; ?>"><?php echo $row_foccu['OCCUP_TAMIL_NAME']; ?></option>
			<?php  
			} ?>
       </select>      
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Occupation of&nbsp;the Mother: </strong></td>
    <td >
        <select  name="mothers_occupation"  id="mothers_occupation" class="boxfields">
            <option selected="" value="">Select Occupation</option>
           <?php 
			$sel_occu = mysql_query("SELECT BD_MOTOCCUP,OCCUP_DESC FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			//mysql_execute($sel_occu);
			while($row_moccu = mysql_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_moccu['BD_MOTOCCUP']; ?>"><?php echo $row_moccu['OCCUP_DESC']; ?></option>
			<?php  
			} ?>
        </select>                 
    </td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select  name="mothers_occupation_tamil"  id="mothers_occupation_tamil" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <?php 
			$sel_occu = mysql_query("SELECT BD_MOTOCCUP,OCCUP_TAMIL_NAME FROM ".occupation_table." WHERE OCCUP_STATUS ='Y' ORDER BY OCCUP_DESC ASC");
			//mysql_execute($sel_occu);
			while($row_moccu = mysql_fetch_array($sel_occu))
			{
			?>
			<option value="<?php echo $row_moccu['BD_MOTOCCUP']; ?>"><?php echo $row_moccu['OCCUP_TAMIL_NAME']; ?></option>
			<?php  
			} ?>
        </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Age of the Mother @ the time of &nbsp;Marriage&nbsp;(&#2980;&#3007;&#2992;&#3009;&#2990;&#2979;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2986;&#3019;&#2980;&#3009; <br />&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofmarriage" id="ageattimeofmarriage" value="" class="boxfields"/></td>
    <td height="32" ><strong>&nbsp;Age of the Mother @ the time &nbsp;of Delivery (&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; 
      &nbsp;&#2986;&#3019;&#2980;&#3009;&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofdelivery" id="ageattimeofdelivery" value="" class="boxfields"/></td>
</tr>

<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Birth Order(&#2986;&#3007;&#2993;&#2986;&#3021;&#2986;&#3009; &#2997;&#2992;&#3007;&#2970;&#3016;): </strong></td>
    <td > <input type="text" name="birth_order" id="birth_order" value="" class="boxfields"/></td>
    <td colspan="2"></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Delivery Attention: </strong></td>
    <td >
    	<select name="delivery_attention" id="delivery_attention" class="boxfields">
        <option selected="" value="">Select Type</option>
        <?php 
			$delat_query = "SELECT DELATN_CODE, DELATN_DESC FROM ".delivery_attention_table." WHERE DELATN_STATUS ='Y'"; 
			$res_delat = mysql_query( $delat_query);
			//mysql_execute($res_delat);
			while($row_delat = mysql_fetch_array($res_delat))
			{
		?>
        		<option value="<?php echo $row_delat['DELATN_CODE'];?>"><?php echo $row_delat['DELATN_DESC'];?></option>
        <?php 
			} ?>
        </select>
    </td>
    <td ><strong>&nbsp;Delivery Attention:</strong> </td>
    <td >
    	<select name="delivery_attention_tamil" id="delivery_attention_tamil" class="boxfields">
            <option selected="" value="">Select Type</option>
            <?php 
			$delat_query = "SELECT DELATN_CODE, DELATN_TAMIL_NAME FROM ".delivery_attention_table." WHERE DELATN_STATUS ='Y'"; 
			$res_delat = mysql_query( $delat_query);
			//mysql_execute($res_delat);
			while($row_delat = mysql_fetch_array($res_delat))
			{
		?>
        		<option value="<?php echo $row_delat['DELATN_CODE'];?>"><?php echo $row_delat['DELATN_TAMIL_NAME'];?></option>
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
        <option selected="" value="">Select Type</option>
        <?php 
			$sel_fam_rel = mysql_query("SELECT DELMETH_CODE, DELMETH_DESC FROM ".delivery_table." WHERE DELMETH_STATUS='Y'");
			//mysql_execute($sel_fam_rel);		
			while($row_del = mysql_fetch_array($sel_fam_rel))
			{
		?>
        		<option value="<?php echo $row_del['DELMETH_CODE']; ?>"><?php echo $row_del['DELMETH_DESC']; ?></option>
        <?php  
			} ?>
		</select>
    </td>
   <td ><strong>&nbsp;Delivery Type:</strong> </td>
   <td >
    <select name="delivery_type_tamil" id="delivery_type_tamil" class="boxfields">
        <option selected="" value="">Select Type</option>
         <?php 
			$sel_fam_rel = mysql_query("SELECT DELMETH_CODE, DELMETH_TAMIL_NAME FROM ".delivery_table." WHERE DELMETH_STATUS='Y'");
			//mysql_execute($sel_fam_rel);		
			while($row_del = mysql_fetch_array($sel_fam_rel))
			{
		?>
        		<option value="<?php echo $row_del['DELMETH_CODE']; ?>"><?php echo $row_del['DELMETH_TAMIL_NAME']; ?></option>
        <?php  
			} ?>
    </select>
   </td>
</tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Weight Kgs<br />&nbsp;(&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2958;&#2975;&#3016;): </strong></td>
    <td > <input type="text" name="childweight" id="childweight" value="" class="boxfields"/></td>
    <td height="32" ><strong>&nbsp;Pregnancy Duration [Week] &nbsp;(&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021;&nbsp;&#2965;&#3006;&#2994;&#2990;&#3021;):</strong></td>
    <td > <input type="text" name="pregnancyduration" id="pregnancyduration" value="" class="boxfields"/></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Remarks:</strong></td>
    <td > <input type="text" name="remarks" id="remarks" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2993;&#3007;&#2986;&#3021;&#2986;&#3009;&#2965;&#2995;&#3021;:</strong> </td>
    <td ><input type="text" name="remarks_tamil" id="remarks_tamil" value="" class="boxfields"/>
    <a href="javascript:;" onClick="return popitup('keyboard.php','remarks_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></td>
</tr>  
<tr>
	<td colspan="4" align="center">
    	<input type="submit" name="submit" value="submit" id="submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
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