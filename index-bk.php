<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ta" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style >
table.mt {
	border-width: 1px;
	border-spacing:2px;
	border-style: solid;
	border-color: #4282B2;
	border-collapse: collapse;
	background-color: transparent;
/*	height:250px;*/
}

table.mt td {
	border-width: 1px;
	padding: 1px;
	word-spacing:5px;
	
	border-style: solid;
	border-color: #4282B2;
	/*text-align: center;*/
	vertical-align:middle;
}
.frc {
	background: #efefef;
}
.headsec {
	background-color:#D9D8D8;
	height:48px;
}
td{
    color: #2B6998;
    font-family: tahoma;
    font-size: 12px;
    line-height: 22px;
	
}
.boxfields{
	width:200px; 
	height:18px;
}
.boxfields1{
	width:200px; 
	height:18px;
	margin-bottom:2px;
}

</style>
<script type="text/javascript" src="jsapi.js"></script>
   
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
        var ids = [ "child_name_tamil", "father_name_tamil", "mother_name_tamil", "permanent_address_tamil1", "permanent_address_tamil2", "birth_address_tamil1", "birth_address_tamil2", "parent_addr_at_childbirth_tamil1", "parent_addr_at_childbirth_tamil2", "informer_name_tamil", "informer_address_tamil1", "informer_address_tamil2", "permanent_mother_add_tamil1", "remarks_tamil"];
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
<form name="form1" method="post">
<table width="982" border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
<tr>
	<td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
    	<p><strong style="color:#FFF;">Form No: 1 - Entry Form</strong></p>
    </td>
</tr>

<tr>
	<td width="251" height="32" ><strong>&nbsp;Registration No&nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;):</strong></td>
    <td width="211" > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields"/></td>
    <td width="219" height="32" ><strong>&nbsp;Registration Year &nbsp;(&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td width="251" > <input type="text" name="registration_year" id="registration_year" value="" class="boxfields"/></td>
    <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;:</strong> </td>
    <td ><input type="text" name="registration_no_tamil" id="registration_no_tamil" value="" /></td>-->
</tr>


 <!--<tr>
	<td height="32" ><strong>&nbsp;Registration Year (&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;):</strong></td>
    <td > <input type="text" name="registration_year" id="registration_year" value="" /></td>
   <td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;:</strong> </td>
    <td ><input type="text" name="registration_year_tamil" id="registration_year_tamil" value="" /></td>
</tr>-->

<tr>
	<td height="28" ><strong>&nbsp;Zone (&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021): </strong></td>
    <td >
      <select name="zone" id="zone" class="boxfields" >
            <option selected="" value="">---Select---</option>
            <option value="01">EAST ZONE - &#2965;&#3007;&#2996;&#2965;&#3021;&#2965;&#3009;</option>
            <option value="02">WEST ZONE - &#2990;&#3015;&#2993;&#3021;&#2965;&#3009;</option>
            <option value="03">SOUTH ZONE - &#2980;&#3014;&#2993;&#3021;&#2965;&#3009;</option>
            <option value="04">NORTH ZONE - &#2997;&#2975;&#2965;&#3021;&#2965;&#3009;</option>
            <option value="05">CENTRAL ZONE - &#2990;&#2980;&#3021;&#2980;&#3007;&#2991;</option>
    	</select>	
    </td>
    <td height="28" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
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
   <!-- <td ><strong>&nbsp;&#2990;&#2979;&#3021;&#2975;&#2994;&#2990;&#3021:</strong> </td>
    <td ><input type="text" name="zone_tamil" id="zone_tamil" value="" /></td>-->
</tr>
 <!--
<tr>
	<td height="32" ><strong>&nbsp;Ward (&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td > 
	    <select name="ward" id="ward" style="width:150px;">
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
   <td ><strong>&nbsp;&#2986;&#3007;&#2992;&#3007;&#2997;&#3009;:</strong> </td>
    <td ><input type="text" name="ward_tamil" id="ward_tamil" value="" /></td>
</tr>-->

<tr>
	<td height="27" ><strong>&nbsp;OldWard (&#2986;&#2996;&#3016;&#2991; &#2986;&#3007;&#2992;&#3007;&#2997;&#3009;): </strong></td>
    <td >
      <select name="oldward" id="oldward" class="boxfields">
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
    <td height="27" ><strong>&nbsp;Panchayath (&#2986;&#2974;&#3021;&#2970;&#3006;&#2991;&#2980;&#3021;&#2980;&#3009;): </strong></td>
    <td > <input type="checkbox" name="panchayath" id="panchayath" value="" /></td>
    <!--<td ><strong>&nbsp;&#2986;&#2996;&#2991; &#2986;&#3007;&#2992;&#3007;&#2997;&#3009;:</strong> </td>
    <td ><input type="text" name="oldward_tamil" id="oldward_tamil" value="" /></td>-->
</tr>

<!-- <tr>
	<td height="32" ><strong>&nbsp;Panchayath: </strong></td>
    <td > <input type="checkbox" name="panchayath" id="panchayath" value="" /></td>
   <td ><strong>&nbsp;Panchayath:</strong> </td>
    <td ><input type="text" name="panchayath_tamil" id="panchayath_tamil" value="" /></td>
</tr>-->

<tr>
	<td height="27" ><strong>&nbsp;Reg.Date (&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="registration_date" id="registration_date" value="" class="boxfields"/></td>
    <td height="27" ><strong>&nbsp;Date Of Birth (&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="date_of_birth" id="date_of_birth" value="" class="boxfields"/></td>
<!--    <td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009; &#2980;&#3015;&#2980;&#3007;:</strong> </td>
    <td ><input type="text" name="registration_date_tamil" id="registration_date_tamil" value="" /></td>
--></tr>

<!--<tr>
	<td height="32" ><strong>&nbsp;Date Of Birth (&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;): </strong></td>
    <td > <input type="text" name="date_of_birth" id="date_of_birth" value="" /></td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2980;&#3015;&#2980;&#3007;:</strong> </td>
    <td ><input type="text" name="date_of_birth_tamil" id="date_of_birth_tamil" value="" /></td>
</tr>-->

<tr>
	<td height="28" ><strong>&nbsp;Child Sex (&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;): </strong></td>
    <td >
    <select name="child_gender" id="child_gender" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Male - &#2950;&#2979;&#3021;</option>
            <option value="" >FeMale - &#2986;&#3014;&#2979;&#3021;</option>
   	  </select>	   	    
    </td>
    <td style="border:none;" colspan="2"></td>
    
    <!--<td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016; &#2986;&#3006;&#2994;&#3007;&#2985;&#2990;&#3021;: </strong> </td>
    <td ><input type="text" name="gender_tamil" id="gender_tamil" value="" /></td>-->
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Name: </strong></td>
    <td > <input type="text" name="child_name" id="child_name" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2986;&#3014;&#2991;&#2992;&#3021;:</strong> </td>
    <td >
    	<input type="text" name="child_name_tamil" id="child_name_tamil" value="" class="boxfields"/> 
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

<tr>
	<td height="32" ><strong>&nbsp;Place of Birth: </strong></td>
    <td >
	    <select name="birth_place" id="birth_place" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >House</option>
            <option value="" >Hospital</option>
    	</select>	   	        
    </td>
    <td ><strong>&nbsp;&#2986;&#3007;&#2993;&#2984;&#3021;&#2980; &#2951;&#2975;&#2990;&#3021;</strong> </td>
    <td >
   	    <select name="birth_place_tamil" id="birth_place_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >&#2997;&#3008;&#2975;&#3009;</option>
            <option value="" >&#2990;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2997;&#2990;&#2985;&#3016;</option>
    	</select>	     
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Permenent Residential<br />&nbsp;Address of the <br />&nbsp;Parents(5.a): </strong></td>
    <td > 
        <input type="text" name="permanent_address1" id="permanent_address" value="" class="boxfields1" />
        <input type="text" name="permanent_address2" id="permanent_address2" value="" class="boxfields1" />
        <select name="permanent_address_state" id="permanent_address_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <option value="28">ANDHRA PRADESH </option>
            <option value="04">CHANDIGARH </option>
            <option value="07">DELHI </option>
            <option value="24">GUJARAT </option>
            <option value="06">HARYANA </option>
            <option value="01">HIMACHAL PRADESH </option>
            <option value="02">HIMACHAL PRADESH </option>
            <option value="29">KARNATAKA </option>
            <option value="32">KERALA </option>
            <option value="27">MAHARASHTRA </option>
            <option value="98">OTHER COUNTRY </option>
            <option value="34">PONDICHERRY </option>
            <option value="03">PUNJAB </option>
            <option value="08">RAJASTHAN </option>
            <option value="33">TAMIL NADU </option>
            <option value="09">UTTAR PRADESH </option>
            <option value="05">UTTARANCHAL </option>
            <option value="19">WEST BENGAL </option>
    	</select>
        <input type="text" name="permanent_address3" id="permanent_address3" value="" class="boxfields1" />
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
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        <input type="text" name="permanent_address_tamil3" id="permanent_address_tamil3" value="" class="boxfields1" />
        <!--<a href="javascript:;" onClick="return popitup('keyboard.php','permanent_address_tamil3');" > <img src="keyboard.png" width="28" height="13"> </a>-->
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Birth Address: </strong></td>
     <td >
        <input type="text" name="birth_address1" id="birth_address1" value="" class="boxfields1" />
        <input type="text" name="birth_address2" id="birth_address2" value="" class="boxfields1" />
        <select name="birth_address_state" id="birth_address_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <option value="28">ANDHRA PRADESH </option>
            <option value="04">CHANDIGARH </option>
            <option value="07">DELHI </option>
            <option value="24">GUJARAT </option>
            <option value="06">HARYANA </option>
            <option value="01">HIMACHAL PRADESH </option>
            <option value="02">HIMACHAL PRADESH </option>
            <option value="29">KARNATAKA </option>
            <option value="32">KERALA </option>
            <option value="27">MAHARASHTRA </option>
            <option value="98">OTHER COUNTRY </option>
            <option value="34">PONDICHERRY </option>
            <option value="03">PUNJAB </option>
            <option value="08">RAJASTHAN </option>
            <option value="33">TAMIL NADU </option>
            <option value="09">UTTAR PRADESH </option>
            <option value="05">UTTARANCHAL </option>
            <option value="19">WEST BENGAL </option>
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
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        <input type="text" name="birth_address_tamil3" id="birth_address_tamil3" value="" class="boxfields1" />
         <!--<a href="javascript:;" onClick="return popitup('keyboard.php','birth_address_tamil3');" > <img src="keyboard.png" width="28" height="13"> </a>-->
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
            <option value="28">ANDHRA PRADESH </option>
            <option value="04">CHANDIGARH </option>
            <option value="07">DELHI </option>
            <option value="24">GUJARAT </option>
            <option value="06">HARYANA </option>
            <option value="01">HIMACHAL PRADESH </option>
            <option value="02">HIMACHAL PRADESH </option>
            <option value="29">KARNATAKA </option>
            <option value="32">KERALA </option>
            <option value="27">MAHARASHTRA </option>
            <option value="98">OTHER COUNTRY </option>
            <option value="34">PONDICHERRY </option>
            <option value="03">PUNJAB </option>
            <option value="08">RAJASTHAN </option>
            <option value="33">TAMIL NADU </option>
            <option value="09">UTTAR PRADESH </option>
            <option value="05">UTTARANCHAL </option>
            <option value="19">WEST BENGAL </option>
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
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        <input type="text" name="parent_addr_at_childbirth_tamil3" id="parent_addr_at_childbirth_tamil3" value="" class="boxfields1"/>
		<!--<a href="javascript:;" onClick="return popitup('keyboard.php','parent_addr_at_childbirth_tamil3');" > <img src="keyboard.png" width="28" height="13"> </a>-->
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
            <option value="28">ANDHRA PRADESH </option>
            <option value="04">CHANDIGARH </option>
            <option value="07">DELHI </option>
            <option value="24">GUJARAT </option>
            <option value="06">HARYANA </option>
            <option value="01">HIMACHAL PRADESH </option>
            <option value="02">HIMACHAL PRADESH </option>
            <option value="29">KARNATAKA </option>
            <option value="32">KERALA </option>
            <option value="27">MAHARASHTRA </option>
            <option value="98">OTHER COUNTRY </option>
            <option value="34">PONDICHERRY </option>
            <option value="03">PUNJAB </option>
            <option value="08">RAJASTHAN </option>
            <option value="33">TAMIL NADU </option>
            <option value="09">UTTAR PRADESH </option>
            <option value="05">UTTARANCHAL </option>
            <option value="19">WEST BENGAL </option>
    	</select>
        <input type="text" name="informer_address3" id="informer_address3" value="" class="boxfields"/>
    </td>
    <td ><strong>&nbsp;Informer Name& Address:</strong> </td>
    <td >
    	<input type="text" name="informer_name_tamil" id="informer_name_tamil" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_name_tamil');" > <img src="keyboard.png" width="28" height="13"> </a>
    	<input type="text" name="informer_address_tamil1" id="informer_address_tamil1" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil1');" > <img src="keyboard.png" width="28" height="13"> </a>
      	<input type="text" name="informer_address_tamil2" id="informer_address_tamil2" value="" class="boxfields1"/>
        <a href="javascript:;" onClick="return popitup('keyboard.php','informer_address_tamil2');" > <img src="keyboard.png" width="28" height="13"> </a>
       	<select name="informer_address_tamil_state" id="informer_address_tamil_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        <input type="text" name="informer_address_tamil3" id="informer_address_tamil3" value="" class="boxfields"/>
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Permanent Address <br />&nbsp;of the Mother: </strong></td>
    <td >
   	    <select name="permanent_mother_add_state" id="permanent_mother_add_state"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <option value="28">ANDHRA PRADESH </option>
            <option value="04">CHANDIGARH </option>
            <option value="07">DELHI </option>
            <option value="24">GUJARAT </option>
            <option value="06">HARYANA </option>
            <option value="01">HIMACHAL PRADESH </option>
            <option value="02">HIMACHAL PRADESH </option>
            <option value="29">KARNATAKA </option>
            <option value="32">KERALA </option>
            <option value="27">MAHARASHTRA </option>
            <option value="98">OTHER COUNTRY </option>
            <option value="34">PONDICHERRY </option>
            <option value="03">PUNJAB </option>
            <option value="08">RAJASTHAN </option>
            <option value="33">TAMIL NADU </option>
            <option value="09">UTTAR PRADESH </option>
            <option value="05">UTTARANCHAL </option>
            <option value="19">WEST BENGAL </option>
    	</select>
        <select name="permanent_mother_add_district" id="permanent_mother_add_district" class="boxfields1">
            <option value="">-Select District-</option>
            <option value="10">ERODE</option>
            <option value="09">NAMAKKAL</option>
            <option value="08">SALEM</option>
            <option value="07">VILLUPURAM</option>
            <option value="06">THIRUVANNAMALAI</option>
            <option value="05">DHARMAPURI</option>
            <option value="04">VELLORE</option>
            <option value="12">COIMBATORE</option>
            <option value="02">CHENNAI</option>
            <option value="03">KANCHEEPURAM</option>
            <option value="11">THE NILGIRIS</option>
            <option value="01">THIRUVALLUR</option>
            <option value="13">DINDIGUL</option>
            <option value="14">KARUR</option>
            <option value="15">THIRUCHIRAPALLI</option>
            <option value="16">PERAMBALUR</option>
            <option value="17">CUDDALORE</option>
            <option value="18">NAGAPATTINAM</option>
            <option value="19">THIRUVARUR</option>
            <option value="20">THANJAVUR</option>
            <option value="21">PUDUKOTTAI</option>
            <option value="22">SIVAGANGA</option>
            <option value="23">MADURAI</option>
            <option value="24">THENI</option>
            <option value="25">VIRUDHUNAGAR</option>
            <option value="26">RAMANATHAPURAM</option>
            <option value="27">THOOTHUKUDI</option>
            <option value="28">THIRUNELVELI</option>
            <option value="29">KANYAKUMARI</option>
		</select>
        <input type="text" name="permanent_mother_add1" id="permanent_mother_add1" value=""  class="boxfields1"/>
        <select  name="permanent_mother_townvillage" id="permanent_mother_townvillage" class="boxfields1">
            <option value="">-Select-</option>
            <option value="1">TOWN</option>
            <option value="2">VILLAGE</option>
        </select>	
        <select name="permanent_mother_town" id="permanent_mother_town" class="boxfields1">
            <option value="">-Select Town-</option>
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
    <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2984;&#3007;&#2992;&#2984;&#3021;&#2980;&#2992; &#2990;&#3009;&#2965;&#2997;&#2992;&#3007;:</strong> </td>
    <td >
   	   <select name="permanent_mother_add_state_tamil" id="permanent_mother_add_state_tamil"  class="boxfields1">
            <option selected="" value="">-Select State-</option>
            <option value="28">&#2980;&#2990;&#3007;&#2996;&#3021;&#2984;&#3006;&#2975;&#3009;</option>
            <option value="04">&#2965;&#3015;&#2992;&#2995;&#3006; </option>
            <option value="07">&#2950;&#2984;&#3021;&#2980;&#3007;&#2992;&#3006; &#2986;&#3007;&#2992;&#2980;&#3015;&#2970;&#2990;&#3021; </option>
            <option value="24">&#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965;&#3006; </option>
    	</select>
        <select name="permanent_mother_add_district_tamil" id="permanent_mother_add_district_tamil" class="boxfields1">
            <option value="">-Select District-</option>
            <option value="10">&#2965;&#3019;&#2991;&#2990;&#3021;&#2986;&#3009;&#2980;&#3021;&#2980;&#3010;&#2992;&#3021;</option>
            <option value="09">&#2970;&#3014;&#2985;&#3021;&#2985;&#3016;</option>
            <option value="08">&#2970;&#3015;&#2994;&#2990;&#3021;</option>
            <option value="07">&#2984;&#3006;&#2990;&#2965;&#3021;&#2965;&#2994;&#3021;</option>
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
    	</select>
        <input type="text" name="family_religion2" id="family_religion2" value=""  class="boxfields1"/>
    </td>
    <td ><strong>&nbsp;&#2965;&#3009;&#2975;&#3009;&#2990;&#3021;&#2986;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2990;&#2980;&#2990;&#3021;:</strong> </td>
    <td >
        <select name="family_religion_tamil1" id="family_religion_tamil1" class="boxfields1">
        	<option value="" >---Select---</option>
    	</select>
        <input type="text" name="family_religion_tamil2" id="family_religion_tamil2" value=""  class="boxfields1"/>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Literacy Status of the Father: </strong></td>
    <td >
        <select name="fathers_edu_level" id="mothers_edu_level" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Below Primary</option>
            <option value="" >Graduate & Above</option>
            <option value="" >Illiterate</option>
            <option value="" >Matric But Below Graduate</option>
            <option value="" >Primary But Below Matric</option>
    	</select>    
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;:</strong> </td>
    <td >
    	<select name="fathers_edu_level_tamil" id="fathers_edu_level_tamil" class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Below Primary</option>
            <option value="" >Graduate & Above</option>
            <option value="" >Illiterate</option>
            <option value="" >Matric But Below Graduate</option>
            <option value="" >Primary But Below Matric</option>
    	</select>  
    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Literacy Status&nbsp;of the Mother: </strong></td>
    <td >
        <select name="mothers_edu_level" id="mothers_edu_level"  class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Below Primary</option>
            <option value="" >Graduate & Above</option>
            <option value="" >Illiterate</option>
            <option value="" >Matric But Below Graduate</option>
            <option value="" >Primary But Below Matric</option>
    	</select>      
   </td>
   <td ><strong>&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2965;&#2994;&#3021;&#2997;&#3007; &#2980;&#2965;&#3009;&#2980;&#3007;: </strong> </td>
   <td >
    	<select name="mothers_edu_level_tamil" id="mothers_edu_level_tamil"  class="boxfields">
        	<option value="" >---Select---</option>
            <option value="" >Below Primary</option>
            <option value="" >Graduate & Above</option>
            <option value="" >Illiterate</option>
            <option value="" >Matric But Below Graduate</option>
            <option value="" >Primary But Below Matric</option>
    	</select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Occupation of&nbsp;the Father: </strong></td>
    <td >
        <select name="fathers_occupation" id="fathers_occupation" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
            <option value="2">Clerical & Related Workers</option>
            <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
            <option value="8">Non-Workers</option>
            <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
            <option value="0">Professional, Technical & Related Workers</option>
            <option value="3">Sales Workers</option>
            <option value="4">Service Workers</option>
            <option value="7">Workers whose Occupation are not elswhere classified</option>
       </select>      
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select name="fathers_occupation" id="fathers_occupation_tamil" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
            <option value="2">Clerical & Related Workers</option>
            <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
            <option value="8">Non-Workers</option>
            <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
            <option value="0">Professional, Technical & Related Workers</option>
            <option value="3">Sales Workers</option>
            <option value="4">Service Workers</option>
            <option value="7">Workers whose Occupation are not elswhere classified</option>
       </select>      

    </td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Occupation of&nbsp;the Mother: </strong></td>
    <td >
        <select  name="mothers_occupation"  id="mothers_occupation" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
            <option value="2">Clerical & Related Workers</option>
            <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
            <option value="8">Non-Workers</option>
            <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
            <option value="0">Professional, Technical & Related Workers</option>
            <option value="3">Sales Workers</option>
            <option value="4">Service Workers</option>
            <option value="7">Workers whose Occupation are not elswhere classified</option>
        </select>
                 
    </td>
    <td ><strong>&nbsp;&#2980;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2980;&#3018;&#2996;&#3007;&#2994;&#3021;: </strong> </td>
    <td >
    	<select  name="mothers_occupation_tamil"  id="mothers_occupation_tamil" class="boxfields">
            <option selected="" value="">Select Occupation</option>
            <option value="1">Administrative Executive & Managerial Workers</option>
            <option value="2">Clerical & Related Workers</option>
            <option value="5">Farmers, Fisherman, Hunters, Loggers etc., and Related Workers</option>
            <option value="8">Non-Workers</option>
            <option value="6">Production & Other Related Workers, Transport Equipment Operators & Labourers</option>
            <option value="0">Professional, Technical & Related Workers</option>
            <option value="3">Sales Workers</option>
            <option value="4">Service Workers</option>
            <option value="7">Workers whose Occupation are not elswhere classified</option>
        </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Age of the Mother @ the time of &nbsp;Marriage&nbsp;(&#2980;&#3007;&#2992;&#3009;&#2990;&#2979;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2986;&#3019;&#2980;&#3009; <br />&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofmarriage" id="ageattimeofmarriage" value="" class="boxfields"/></td>
   <!-- <td ><strong>&nbsp;&#2980;&#3007;&#2992;&#3009;&#2990;&#2979;&#2980;&#3021;&#2980;&#3007;&#2985;&#3021; &#2986;&#3019;&#2980;&#3009; <br />&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;:</strong> </td>
    <td ><input type="text" name="registration_no" id="registration_no" value="" class="boxfields"/></td>-->
    <td height="32" ><strong>&nbsp;Age of the Mother @ the time &nbsp;of Delivery (&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; 
      &nbsp;&#2986;&#3019;&#2980;&#3009;&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;): </strong></td>
    <td > <input type="text" name="ageattimeofdelivery" id="ageattimeofdelivery" value="" class="boxfields"/></td>
</tr>

<!--<tr>
	<td height="32" ><strong>&nbsp;Age of the Mother @ the time of &nbsp;Delivery: </strong></td>
    <td > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; &#2986;&#3019;&#2980;&#3009; <br />&nbsp;&#2980;&#3006;&#2991;&#3007;&#2985;&#3021; &#2997;&#2991;&#2980;&#3009;:</strong> </td>
    <td ><input type="text" name="registration_no" id="registration_no" value="" class="boxfields"/></td>
</tr>
-->
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Birth Order: </strong></td>
    <td > <input type="text" name="birth_order" id="birth_order" value="" class="boxfields"/></td>
    <td ><strong>&nbsp;Birth Order:</strong> </td>
    <td ><input type="text" name="birth_order_tamil" id="birth_order_tamil" value="" class="boxfields"/></td>
</tr>

<tr>
	<td height="32" ><strong>&nbsp;Delivery Attention: </strong></td>
    <td >
    	<select name="delivery_attention" id="delivery_attention" class="boxfields">
            <option selected="" value="">Select Type</option>
            <option value="3">Doctor Nurse or Trained Midwife</option>
            <option value="1">Institutional - Government</option>
            <option value="2">Institutional - Private or Non Government</option>
            <option value="5">Relatives and Others</option>
            <option value="4">Traditional Birth Attendant</option>
        </select>
    </td>
    <td ><strong>&nbsp;Delivery Attention:</strong> </td>
    <td >
    	<select name="delivery_attention_tamil" id="delivery_attention_tamil" class="boxfields">
            <option selected="" value="">Select Type</option>
            <option value="3">Doctor Nurse or Trained Midwife</option>
            <option value="1">Institutional - Government</option>
            <option value="2">Institutional - Private or Non Government</option>
            <option value="5">Relatives and Others</option>
            <option value="4">Traditional Birth Attendant</option>
        </select>
    </td>
</tr>
<tr><td style="background-color:#F0F0F0;" colspan="4" height="1"></td></tr>
<tr>
	<td height="32" ><strong>&nbsp;Delivery Type: </strong></td>
    <td >
    <select name="delivery_type" id="delivery_type" class="boxfields">
        <option selected="" value="">Select Type</option>
        <option value="1">NORMAL</option>
        <option value="2">CESAREAN</option>
        <option value="3">FORCEPS</option>
    </select>
    </td>
   <td ><strong>&nbsp;Delivery Type:</strong> </td>
   <td >
    <select name="delivery_type_tamil" id="delivery_type_tamil" class="boxfields">
        <option selected="" value="">Select Type</option>
        <option value="1">NORMAL</option>
        <option value="2">CESAREAN</option>
        <option value="3">FORCEPS</option>
    </select>
   </td>
</tr>
<tr>
	<td height="32" ><strong>&nbsp;Child Weight Kgs<br />&nbsp;(&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2958;&#2975;&#3016;): </strong></td>
    <td > <input type="text" name="childweight" id="childweight" value="" class="boxfields"/></td>
    <td height="32" ><strong>&nbsp;Pregnancy Duration [Week] &nbsp;(&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021;&nbsp;&#2965;&#3006;&#2994;&#2990;&#3021;):</strong></td>
    <td > <input type="text" name="pregnancyduration" id="pregnancyduration" value="" class="boxfields"/></td>
    <!--<td ><strong>&nbsp;&#2965;&#3009;&#2996;&#2984;&#3021;&#2980;&#3016;&#2991;&#3007;&#2985;&#3021; &#2958;&#2975;&#3016;:</strong> </td>
    <td ><input type="text" name="registration_no" id="registration_no" value="" /></td>-->
</tr>
<!-- <tr>
	<td height="32" ><strong>&nbsp;Pregnancy Duration <br />&nbsp;[Week](&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; <br />&nbsp;&#2965;&#3006;&#2994;&#2990;&#3021;):</strong></td>
    <td > <input type="text" name="registration_no" id="registration_no" value="" class="boxfields"/></td>
   <td ><strong>&nbsp;&#2990;&#2965;&#2986;&#3015;&#2993;&#3009;&#2997;&#3007;&#2985;&#3021; &#2965;&#3006;&#2994;&#2990;&#3021;:</strong> </td>
    <td ><input type="text" name="registration_no" id="registration_no" value="" /></td>-->
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
    	<input type="submit" name="Submit" value="Submit" id="Submit" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;" />
        <input type="reset" name="Reset" value="Reset" id="Reset" style="background-color:#4282B2; border-color:#4282B2;color:#FFF; height:25px; font-weight:bold;"  />
    </td>
</tr>                  
</table>

</form>
</body>
</html>
