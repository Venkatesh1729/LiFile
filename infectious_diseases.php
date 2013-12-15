<?php 
session_start();
include("oracle_to_php.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC</title>
</head>
<body>
<?php
include("home.php");
?>
<br />
<center>
	<div style="width:990px;" align="center">
    	<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2">
        <tr>
            <td height="35" colspan="6"  align="center" style="background-color:#4282B2;">
                <p><strong style="color:#FFF;">Communicable Diseases Entry</strong></p>
            </td>
        </tr>
        
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Types Of Diseases&nbsp;:</strong>
            </td>
            <td width="209" >
            	<select name=""  class="boxfields">
                	<option >--- Select ---</option>
                </select>
            </td>
            <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;:</strong> </td>
            <td ><input type="text" name="registration_no_tamil" id="registration_no_tamil" value="" /></td>-->
        
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3021;&#2965;&#2995;&#3021; &#2997;&#2965;&#3016;&#2965;&#2995;&#3021;&nbsp;:</strong></td>
            <td width="259" >
             <select name=""  class="boxfields">
                	<option >--- Select ---</option>
             </select>
            </td>
            <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;:</strong> </td>
            <td ><input type="text" name="registration_year_tamil" id="registration_year_tamil" value="" /></td-->
        </tr>
        
        <tr>
            <td width="221" height="32" >
            	<strong>&nbsp;Patient Type&nbsp;:</strong>
            </td>
            <td width="209" >
            	<select name=""  class="boxfields">
                	<option >--- Select ---</option>
					<option value="In Patient" >In Patient</option>
                    <option value="Out Patient" >Out Patient</option>                    
                </select>
            </td>
            <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2958;&#2979;&#3021;:</strong> </td>
            <td ><input type="text" name="registration_no_tamil" id="registration_no_tamil" value="" /></td>-->
        
            <td width="243" height="32" ><strong>&nbsp;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007; &#2997;&#2965;&#3016;&nbsp;:</strong></td>
            <td width="259" >
             <select name=""  class="boxfields">
                	<option >--- Select ---</option>
                    <option value="In Patient" >&#2953;&#2995;&#3021;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007;</option>
                    <option value="Out Patient" >&#2986;&#3009;&#2993;&#2984;&#3015;&#3006;&#2991;&#3006;&#2995;&#3007;</option>
             </select>
            </td>
            <!--<td ><strong>&nbsp;&#2986;&#2980;&#3007;&#2997;&#3009;&nbsp;&#2997;&#3051;&#2975;&#2990;&#3021;:</strong> </td>
            <td ><input type="text" name="registration_year_tamil" id="registration_year_tamil" value="" /></td-->
        </tr>
        </table>
    </div>
</center>
</body>
</html>