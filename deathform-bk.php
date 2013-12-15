<?php include("oracle_to_php.php");// Connection?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC</title>
<script type="text/javascript" src="jsapi.js">    </script>
   
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
        //var ids = [ "child_name_tamil", "father_name_tamil"];
		var ids = [ "name_tamil", "death_place_tamil", "address_no1_tamil", "address_no2_tamil", "address_no3_tamil", "address_no4_tamil", "permanent_address1_tamil", "permanent_address2_tamil", "permanent_address3_tamil", "permanent_address4_tamil", "deceased_address1_tamil", "deceased_address2_tamil", "deceased_address3_tamil", "deceased_address4_tamil", "informer_name1_tamil", "informer_name2_tamil", "informer_name3_tamil", "informer_name4_tamil", "mother_name_tamil", "father_name_tamil", "husband_name_tamil", "deceased_residence_state_tamil", "deceased_residence_district_tamil", "deceased_residence_town_tamil", "deceased_religion_tamil", "occupation_tamil", "medical_attention_tamil", "medical_certified_tamil", "maternal_death_tamil", "death_cause_tamil", "smoke_tamil", "tobacco_tamil", "arecanut_tamil", "alcohol_tamil", "remarks"];
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
?>
<br />

<div style="width:990px; margin:0 0 0 177px;" align="center">
<form name="form1" method="post">
<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
<tr>
	<td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Death Entry Form</strong></p>
    </td>
</tr>

<tr>
	<td width="221" height="32" ><strong>&nbsp;Registration No&nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;):</strong></td>
    <td width="209" > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields" /></td>
    <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;:</strong> </td>
    <td ><input type="text" name="registration_no_tamil" id="registration_no_tamil" value="" /></td>-->

	<td width="243" height="32" ><strong>&nbsp;Registration Year (&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="259" > <input type="text" name="registration_year" id="registration_year" value="" class="boxfields" /></td>
    <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;:</strong> </td>
    <td ><input type="text" name="registration_year_tamil" id="registration_year_tamil" value="" /></td-->
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
	    <select name="zone" id="zone" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="" >East Zone</option>
            <option value="" >West Zone</option>
            <option value="" >South Zone</option>
            <option value="" >North Zone</option>
            <option value="" >Central Zone</option>
    	</select>	
    </td>
   <!-- <td ><strong>&nbsp;&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021:</strong> </td>
    <td ><input type="text" name="zone_tamil" id="zone_tamil" value="" /></td>-->


	<td height="32" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
	    <select name="ward" id="ward"  class="boxfields">
        	<option value="">---Select---</option>
            <option value="WD-32">WD-32</option>
            <option value="WD-33">WD-33</option>
            <option value="WD-34">WD-34</option>
            <option value="WD-35">WD-35</option>
            <option value="WD-36">WD-36</option>
            <option value="WD-37">WD-37</option>
            <option value="WD-56">WD-56</option>
            <option value="WD-57">WD-57</option>
            <option value="WD-58">WD-58</option>
            <option value="WD-59">WD-59</option>
            <option value="WD-60">WD-60</option>
            <option value="WD-61">WD-61</option>
            <option value="WD-62">WD-62</option>
            <option value="WD-63">WD-63</option>
            <option value="WD-64">WD-64</option>
            <option value="WD-65">WD-65</option>
            <option value="WD-66">WD-66</option>
            <option value="WD-67">WD-67</option>
            <option value="WD-69">WD-69</option>
            <option value="WD-75">WD-75</option>
    	</select>		   	
    </td>
    <!--<td ><strong>&nbsp;&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;:</strong> </td>
    <td ><input type="text" name="ward_tamil" id="ward_tamil" value="" /></td>-->
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="registration_date" id="registration_date" value="" class="boxfields" /></td>
<!--    <td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;:</strong> </td>
    <td ><input type="text" name="registration_date_tamil" id="registration_date_tamil" value="" /></td>
-->

	<td height="32" ><strong>&nbsp;Date Of Death (&#2951;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="date_of_death" id="date_of_death" value="" class="boxfields" /></td>
    <!--<td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;:</strong> </td>
    <td ><input type="text" name="date_of_birth_tamil" id="date_of_birth_tamil" value="" /></td>-->
</tr>

<tr>
	<td height="32" ><strong>&nbsp;2.Name: </strong></td>
    <td > <input type="text" name="name" id="name" value="" class="boxfields" /></td>
    <td ><strong>&nbsp;&#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="name_tamil" id="name_tamil" value="" class="boxfields" /> 
    	<a href="javascript:;" onClick="return popitup('keyboard.php','name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;3.Sex (&#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;): </strong></td>
    <td >
	    <select name="gender" id="gender" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Male - &#2950;&#2979;&#3021;</option>
            <option value="" >FeMale - &#2986;&#3014;&#2979;&#3021;</option>
   	  </select>	   	    
    </td>
    <!--<td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td ><input type="text" name="gender_tamil" id="gender_tamil" value="" /></td>-->

	<td height="32" ><strong>&nbsp;4.Age (&#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td >
    	<input type="text" name="age" id="age" value="" class="boxfields" /> 
    </td>
    <!--<td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td ><input type="text" name="gender_tamil" id="gender_tamil" value="" /></td>-->
</tr>

<tr>
	<td height="32" ><strong>&nbsp;5.Place of Death: </strong></td>
    <td >
	    <select name="death_place" id="death_place" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="" >House</option>
            <option value="" >Hospital</option>
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="death_place_tamil" id="death_place_tamil" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="" >House</option>
            <option value="" >Hospital</option>
    	</select>	     
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Death Address: </strong></td>
     <td >
    <p><input type="text" name="address_no1" id="address_no1" value="" class="boxfields" /></p>
    <p><input type="text" name="address_no2" id="address_no2" value="" class="boxfields" /></p>
    <p><input type="text" name="address_no3" id="address_no3" value="" class="boxfields" /></p>
    <p><input type="text" name="address_no4" id="address_no4" value="" class="boxfields" /></p>
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021;&nbsp;<br />
 &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <p><input type="text" name="address_no1_tamil" id="address_no1_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a> </p>
    <p><input type="text" name="address_no2_tamil" id="address_no2_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="address_no3_tamil" id="address_no3_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no3_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="address_no4_tamil" id="address_no4_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','address_no4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;5(a)Permanent Address of The Deceased: </strong></td>
     <td >
    <p><input type="text" name="permanent_address1" id="permanent_address1" value="" class="boxfields" /></p>
    <p><input type="text" name="permanent_address2" id="permanent_address2" value="" class="boxfields" /></p>
    <p><input type="text" name="permanent_address3" id="permanent_address3" value="" class="boxfields" /></p>
    <p><input type="text" name="permanent_address4" id="permanent_address4" value="" class="boxfields"/></p>
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007; :</strong></td>
     <td >
    <p><input type="text" name="permanent_address1_tamil" id="permanent_address1_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="permanent_address2_tamil" id="permanent_address2_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="permanent_address3_tamil" id="permanent_address3_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address3_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="permanent_address4_tamil" id="permanent_address4_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;5(b).Address of the Deceased @ the time of Death: </strong></td>
     <td >
    <p><input type="text" name="deceased_address1" id="deceased_address1" value="" class="boxfields" /></p>
    <p><input type="text" name="deceased_address2" id="deceased_address2" value="" class="boxfields" /></p>
    <p><input type="text" name="deceased_address3" id="deceased_address3" value="" class="boxfields" /></p>
    <p><input type="text" name="deceased_address4" id="deceased_address4" value="" class="boxfields" /></p>
    </td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979; &#2984;&#3015;&#2992;&#2980;&#3021;&#2980;&#3007;&#2994;&#3021; &#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong></td>
     <td >
    <p><input type="text" name="deceased_address1_tamil" id="deceased_address1_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="deceased_address2_tamil" id="deceased_address2_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="deceased_address3_tamil" id="deceased_address3_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address3_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="deceased_address4_tamil" id="deceased_address4_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','deceased_address4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Informer Name & Address: </strong></td>
     <td >
    <p><input type="text" name="informer_name1" id="informer_name1" value="" class="boxfields" /></p>
    <p><input type="text" name="informer_name2" id="informer_name2" value="" class="boxfields" /></p>
    <p><input type="text" name="informer_name3" id="informer_name3" value="" class="boxfields" /></p>
    <p><input type="text" name="informer_name4" id="informer_name4" value="" class="boxfields" /></p>
    </td>
    <td ><strong></strong></td>
     <td >
    <p><input type="text" name="informer_name1_tamil" id="informer_name1_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name1_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="informer_name2_tamil" id="informer_name2_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name2_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="informer_name3_tamil" id="informer_name3_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name3_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    <p><input type="text" name="informer_name4_tamil" id="informer_name4_tamil" value="" class="boxfields" /> <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name4_tamil');" > <img src="keyboard.png" width="28" height="13"> </a></p>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;6(a).Name Of The Mother: </strong></td>
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
	<td height="32" ><strong>&nbsp;7.Residence Of Deceased: </strong></td>
    <td >
	    <select name="deceased_residence_state" id="deceased_residence_state"  class="boxfields1" onchange="getstate_id(this.value);">
        	<option value="" >---Select State---</option>
             <?php 
				$state_query = "SELECT STATE_CODE, STATE_NAME FROM ".state_table." WHERE STATE_STATUS = 'Y' ORDER BY STATE_NAME ASC";
				$res_state = oci_parse($conn, $state_query);
				oci_execute($res_state);
				while($row_state = oci_fetch_array($res_state, OCI_ASSOC+OCI_RETURN_NULLS))
				{?>
            		<option value="<?php echo $row_state['STATE_CODE']; ?>"><?php echo $row_state['STATE_NAME']; ?></option>
            <?php 
				}?>
    	</select>	   	        

	    <select name="deceased_residence_district" id="deceased_residencedeceased_residence" class="boxfields1" >
        	<option value="" >---Select District---</option>
            <option value="" >Coimbatore</option>
            <option value="" >Chennai</option>
            <option value="" >Salem</option>
            <option value="" >Nammakal</option>
            
    	</select>	   	        

	    <select name="deceased_residence_town" id="deceased_residence_town" class="boxfields1" >
            <option value="">---Select Town---</option>
            <option value="09">METTUPALAYAM</option>
            <option value="10">SIRUMUGAI</option>
            <option value="11">KINATHUKADAVU</option>
            <option value="12">KANIYUR</option>
            <option value="13">KOMARALINGAM</option>
            <option value="14">MADATHUKULAM</option>
            <option value="15">SANGARAMANALLUR</option>
            <option value="16">UDUMALPET</option>
            <option value="17">CHETTIPALAYAM</option>
            <option value="18">ETTIMADAI</option>
            <option value="19">MADHUKKARAI</option>
            <option value="20">THIRUMALAYAMPALAYAM</option>
            <option value="21">VELLALUR</option>
            <option value="22">COIMBATORE</option>
            <option value="23">.VEERAPANDI</option>
            <option value="24">COODALUR</option>
            <option value="25">GOUNDAMPALAYAM</option>
            <option value="26">GURUDAMPALAYAM</option>
            <option value="27">NARASIMHANCKN PLM</option>
            <option value="28">P.N.PALAYAM</option>
            <option value="29">THUDIALUR</option>
            <option value="30">VEERAKERALAM</option>
            <option value="31">PALLADAM</option>
            <option value="32">SHYAMALAPURAM</option>
            <option value="33">KUNIAMUTHUR</option>
            <option value="34">KURICHI</option>
            <option value="35">PERUR</option>
            <option value="36">VEDAPATTI</option>
            <option value="37">NEGAMAM</option>
            <option value="38">SAMATHUR</option>
            <option value="39">POLLACHI A</option>
            <option value="40">SOOLESHWARANPATTY</option>
            <option value="41">ZAMINUTHUKULI</option>
            <option value="42">CHINNAVEDAMPATI</option>
            <option value="43">IDIGARAI</option>
            <option value="44">KALAPATTI</option>
            <option value="45">S.S.KULAM</option>
            <option value="46">SARAVANAMPATTI</option>
            <option value="47">VELLAKINAR</option>
            <option value="48">CHINNIAMPALAYAM</option>
            <option value="49">IRUGUR</option>
            <option value="50">KANNAMPALAYAM</option>
            <option value="51">KARUMATHAMPATTI</option>
            <option value="52">MOPIRIPALAYAM</option>
            <option value="53">PALLAPALAYAM</option>
            <option value="54">SULUR</option>
            <option value="55">DHALIYUR</option>
            <option value="56">IKKARAIBOLUVAMPATTY</option>
            <option value="57">PERURCHETIPALAYAM</option>
            <option value="58">POOLUVAPATTY</option>
            <option value="59">THENKARAI</option>
            <option value="60">THONDAMUTHUR</option>
            <option value="61">VADAVALLI</option>
            <option value="62">NALLUR</option>
            <option value="63">VEERAPANDI</option>
            <option value="64">TIRUPPUR</option>
            <option value="65">VELAMPALAYAM</option>
            <option value="66">DHALI</option>
            <option value="67">VALPARAI TOWNSHIP</option>
            <option value="01">ANAMALAI</option>
            <option value="02">KOTTUR</option>
            <option value="03">ODAYAKULAM</option>
            <option value="04">VETTAIKARENPUDUR</option>
            <option value="05">ANNUR</option>
            <option value="06">AVINASHI</option>
            <option value="07">TIRUMURUGANPOONDI</option>
            <option value="08">KARAMADAI</option>
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2965;&#3009;&#2975;&#3007;&#2991;&#3007;&#2992;&#3009;&#2986;&#3021;&#2986;&#3009;</strong> </td>
    <td >
   	    <select name="deceased_residence_state_tamil" id="deceased_residence_state_tamil" class="boxfields<h1></h1>" >
        	<option value="" >---Select State---</option>
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        
        <select name="deceased_residence_district_tamil" id="deceased_residence_district_tamil" class="boxfields<h1></h1>" >
        	<option value="" >---Select District---</option>
             <option value="10">&#2965;&#3019;&#2991;&#2990;&#3021;&#2986;&#3009;&#2980;&#3021;&#2980;&#3010;&#2992;&#3021;</option>
            <option value="09">&#2970;&#3014;&#2985;&#3021;&#2985;&#3016;</option>
            <option value="08">&#2970;&#3015;&#2994;&#2990;&#3021;</option>
            <option value="07">&#2984;&#3006;&#2990;&#2965;&#3021;&#2965;&#2994;&#3021;</option>

    	</select>	   	        

	    <select name="deceased_residence_town_tamil" id="deceased_residence_town_tamil" class="boxfields1" >
        	<option value="" >---Select---</option>
            <option value="" >&#2990;&#3015;&#2975;&#3021;&#2975;&#3009;&#2986;&#3021;&#2986;&#3006;&#2995;&#3016;&#2991;&#2990;&#3021;</option>
            <option value="" >&#2953;&#2975;&#3009;&#2990;&#2994;&#3016;&#2986;&#3021;&#2986;&#3015;&#2975;&#3021;&#2975;&#3016;</option>
            <option value="" >&#2986;&#2994;&#3021;&#2994;&#2975;&#2990;&#3021;</option>
            <option value="" >&#2980;&#3051;&#2986;&#3021;&#2986;&#3010;&#2992;&#3021;</option>
            
    	</select>	     
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;8.Religion Of the Deceased: </strong></td>
    <td >
	    <select name="deceased_religion" id="deceased_religion" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="" >Buddhist</option>
            <option value="" >Christian</option>
            <option value="" >Hindu</option>
            <option value="" >Islam(Muslim)</option>
            <option value="" >Jain</option>
            <option value="" >Others</option>
            <option value="" >Sikh</option>
            
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2951;&#2993;&#2984;&#3021;&#2980;&#2997;&#2992;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="deceased_religion_tamil" id="deceased_religion_tamil" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="" >---Select---</option>
            <option value="" >Buddhist</option>
            <option value="" >Christian</option>
            <option value="" >Hindu</option>
            <option value="" >Islam(Muslim)</option>
            <option value="" >Jain</option>
            <option value="" >Others</option>
            <option value="" >Sikh</option>
    	</select>	     
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;9.Occupation: </strong></td>
    <td > <select name="occupation" id="occupation" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
    
           <option value="2">Clerical & Related  Workers</option>
    
           <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
    
           <option value="8">Non-Workers</option>
    
           <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
    
           <option value="0">Professional, Technical & Related Workers</option>
    
           <option value="3">Sales Workers</option>
    
           <option value="4">Service Workers</option>
    
           <option value="7">Workers whose Occupation are not elswhere classified</option>
    	</select></td>
    <td ><strong>&nbsp;&#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td ><select name="occupation_tamil" id="occupation_tamil" class="boxfields" >
        	<option value="" >---Select---</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
    
           <option value="2">Clerical & Related  Workers</option>
    
           <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
    
           <option value="8">Non-Workers</option>
    
           <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
    
           <option value="0">Professional, Technical & Related Workers</option>
    
           <option value="3">Sales Workers</option>
    
           <option value="4">Service Workers</option>
    
           <option value="7">Workers whose Occupation are not elswhere classified</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;10.Type of Medical Attention: </strong></td>
    <td > <select name="medical_attention" id="medical_attention" class="boxfields" >
        	<option value="" selected>Select Medical Attention</option>	
            <option value="Y" >INSTITUTIONAL</option>
            <option value="M" >MEDICAL ATTENTION OTHER THAN INSTITUTION</option>
            <option value="D" >NO MEDICAL ATTENTION</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2997;&#2965;&#3016;: </strong> </td>
    <td ><select name="medical_attention_tamil" id="medical_attention_tamil"  class="boxfields">
        	<option value="" selected>Select Medical Attention</option>	
            <option value="Y" >INSTITUTIONAL</option>
            <option value="M" >MEDICAL ATTENTION OTHER THAN INSTITUTION</option>
            <option value="D" >NO MEDICAL ATTENTION</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;11.Medical Certified: </strong></td>
    <td > <select name="medical_certified" id="medical_certified" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#3051;&#2980;&#3021;&#2980;&#3009;&#2997; &#2970;&#3006;&#2985;&#3021;&#2993;&#3007;&#2980;&#2996;&#3021;: </strong> </td>
    <td ><select name="medical_certified_tamil" id="medical_certified_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;12.Maternal Death: </strong></td>
    <td > <select name="maternal_death" id="maternal_death" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select></td>
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3021;&#2997;&#2996;&#3007; &#2990;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="maternal_death_tamil" id="maternal_death_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;13.Death Cause: </strong></td>
    <td > <select name="death_cause" id="death_cause" class="boxfields" >
        	<option value="001">001-CHOLERA</option>
				
           <option value="002">002-TYPHOID & PARATYPHOID</option>
    
           <option value="003">003-FOOD POISONING</option>
    
           <option value="004">004-DYSENTRY, DIARRHOEA & GASTRIC - ENTERITIS</option>
    
           <option value="005">005-TUBERCULOSIS</option>
    
           <option value="006">006-LEPROSY</option>
    
           <option value="007">007-DIPHTHERIA</option>
    
           <option value="008">008-WHOOPING COUGH</option>
    
           <option value="009">009-TETANUS</option>
    
           <option value="010">010-ACUTE POLIOMYELITIS</option>
    
           <option value="011">011-MEASLES</option>
    
           <option value="012">012-RABIES</option>
    
           <option value="013">013-MALARIA</option>
    
           <option value="014">014-CANCER</option>
    
           <option value="015">015-DIABETIC MELLITUS</option>
    
           <option value="016">016-ANAEMIA</option>
    
           <option value="017">017-MENINGITIS</option>
    
           <option value="018">018-HEART DISEASE AND HEART ATTACKS</option>
    
           <option value="019">019-PNEUMONIA</option>
    
           <option value="020">020-INFLUENZA</option>
    
           <option value="021">021-BRONCHITIS AND ASTHMA</option>
    
           <option value="022">022-JAUNDICE</option>
    
           <option value="023">023-CHRONIC LIVER DISEASE AND CIRRHOSIS</option>
    
           <option value="024">024-ULCER OF STOMACH AND DUODENUM</option>
    
           <option value="025">025-APPENDICITIES</option>
    
           <option value="026">026-SYPHILIS AND OTHER DISEASES OF GENITOURINARY SYSTEM</option>
    
           <option value="027">027-ABORTIONS</option>
    
           <option value="028">028-COMPLICATIONS RELATED TO PREGNANCY, CHILD BIRTH & PUERPERIUM</option>
    
           <option value="029">029-CERTAIN CONDITION SUCH AS BIRTH-INJURIES, SLOW GOWTH OF FOETUS & PREMATURING ORIGINATINGIN THE PERINATAL PERIOD</option>
    
           <option value="030">030-CEREBROVASCULAR (PARALYSIS)</option>
    
           <option value="031">031-SENILITY</option>
    
           <option value="032">032-OTHERS NOT ELSEWHERE CLASSIFIED</option>
    
           <option value="033">033-BITES OR STINGS OF VENOMOUS ANIMAL</option>
    
           <option value="034">034-ACCIDENTAL BURNS</option>
    
           <option value="035">035-FALLS & DROWNING</option>
    
           <option value="036">036-ACCIDENTAL POISONING (OTHER THAN FOOD POISONING)</option>
    
           <option value="037">037-TRANSPORT ACCIDENTS ( RAILWAY, ROAD, AIRCRAFT, MOTOR & OTHER VEHICLES )</option>
    
           <option value="038">038-OTHER ACCIDENTS ( NOT ELSEWHERE CLASSIFIED )</option>
    
           <option value="039">039-SUICIDE</option>
    
           <option value="040">040-HOMICIDE</option>
    	</select></td>
    <td ><strong>&nbsp;&#2990;&#2992;&#2979;&#2990;&#3021; &#2965;&#3006;&#2992;&#2979;&#2990;&#3021;: </strong> </td>
    <td ><select name="death_cause_tamil" id="death_cause_tamil" class="boxfields" >
        	<option value="001">001-CHOLERA</option>
				
           <option value="002">002-TYPHOID & PARATYPHOID</option>
    
           <option value="003">003-FOOD POISONING</option>
    
           <option value="004">004-DYSENTRY, DIARRHOEA & GASTRIC - ENTERITIS</option>
    
           <option value="005">005-TUBERCULOSIS</option>
    
           <option value="006">006-LEPROSY</option>
    
           <option value="007">007-DIPHTHERIA</option>
    
           <option value="008">008-WHOOPING COUGH</option>
    
           <option value="009">009-TETANUS</option>
    
           <option value="010">010-ACUTE POLIOMYELITIS</option>
    
           <option value="011">011-MEASLES</option>
    
           <option value="012">012-RABIES</option>
    
           <option value="013">013-MALARIA</option>
    
           <option value="014">014-CANCER</option>
    
           <option value="015">015-DIABETIC MELLITUS</option>
    
           <option value="016">016-ANAEMIA</option>
    
           <option value="017">017-MENINGITIS</option>
    
           <option value="018">018-HEART DISEASE AND HEART ATTACKS</option>
    
           <option value="019">019-PNEUMONIA</option>
    
           <option value="020">020-INFLUENZA</option>
    
           <option value="021">021-BRONCHITIS AND ASTHMA</option>
    
           <option value="022">022-JAUNDICE</option>
    
           <option value="023">023-CHRONIC LIVER DISEASE AND CIRRHOSIS</option>
    
           <option value="024">024-ULCER OF STOMACH AND DUODENUM</option>
    
           <option value="025">025-APPENDICITIES</option>
    
           <option value="026">026-SYPHILIS AND OTHER DISEASES OF GENITOURINARY SYSTEM</option>
    
           <option value="027">027-ABORTIONS</option>
    
           <option value="028">028-COMPLICATIONS RELATED TO PREGNANCY, CHILD BIRTH & PUERPERIUM</option>
    
           <option value="029">029-CERTAIN CONDITION SUCH AS BIRTH-INJURIES, SLOW GOWTH OF FOETUS & PREMATURING ORIGINATINGIN THE PERINATAL PERIOD</option>
    
           <option value="030">030-CEREBROVASCULAR (PARALYSIS)</option>
    
           <option value="031">031-SENILITY</option>
    
           <option value="032">032-OTHERS NOT ELSEWHERE CLASSIFIED</option>
    
           <option value="033">033-BITES OR STINGS OF VENOMOUS ANIMAL</option>
    
           <option value="034">034-ACCIDENTAL BURNS</option>
    
           <option value="035">035-FALLS & DROWNING</option>
    
           <option value="036">036-ACCIDENTAL POISONING (OTHER THAN FOOD POISONING)</option>
    
           <option value="037">037-TRANSPORT ACCIDENTS ( RAILWAY, ROAD, AIRCRAFT, MOTOR & OTHER VEHICLES )</option>
    
           <option value="038">038-OTHER ACCIDENTS ( NOT ELSEWHERE CLASSIFIED )</option>
    
           <option value="039">039-SUICIDE</option>
    
           <option value="040">040-HOMICIDE</option>
    	</select></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Smoke: </strong></td>
    <td > <select name="smoke" id="smoke"  class="boxfields">
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtsmokeyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;: </strong> </td>
    <td ><select name="smoke_tamil" id="smoke_tamil" class="boxfields" >
            <option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtsmokeyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Tobacco: </strong></td>
    <td > <select name="tobacco" id="tobacco" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txttobaccoyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3009;&#2965;&#3016;&#2991;&#3007;&#2994;&#3016;: </strong> </td>
    <td ><select name="tobacco_tamil" id="tobacco_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txttobaccoyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Arecanut: </strong></td>
    <td > <select name="arecanut" id="arecanut" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txarecanutyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
    </td>
    <td ><strong>&nbsp;&#2986;&#3006;&#2965;&#3021;&#2965;&#3009;: </strong> </td>
    <td ><select name="arecanut_tamil" id="arecanut_tamil" class="boxfields" >
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txarecanutyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Alcohol: </strong></td>
    <td > <select name="alcohol" id="alcohol"  class="boxfields">
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtalcholyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
     </td>
    <td ><strong>&nbsp;&#2990;&#2980;&#3009;: </strong> </td>
    <td ><select name="alcohol_tamil" id="alcohol_tamil"  class="boxfields">
        	<option value="" selected>Select</option>	
            <option value="Y" >YES</option>
            <option value="N" >NO</option>
    	</select>
        <input type="text"  name="txtalcholyear" value="" size="4" maxlength="2" onkeypress="return Numeric()"><b>Yrs</b>
   </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Remarks:</strong></td>
    <td > <input type="text" name="remarks" id="remarks" value="" class="boxfields" /></td>
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
</body>
</html>
