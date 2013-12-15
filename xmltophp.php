<style>
table.mt {
	border-width: 1px;
	border-spacing:2px;
	border-style: solid;
	border-color: #4282B2;
	border-collapse: collapse;
	background-color: transparent;
/*	height:250px;*/
	font-family:Tahoma;
	font-size: 12px;
    font-weight: normal;
    
    text-transform: none;
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
.headsec {
	background-color:#EEEEEE;
	height:30px;
}
</style>
<?php
$xml=simplexml_load_file("South.xml");
//print_r($xml);
//echo count($xml);
$count_Above70 = count($xml->Above70);
$count_Between_50_to_70 = count($xml->Between_50_to_70);
$count_Below50 = count($xml->Below50);

?>


<table border="1" cellspacing="0" cellpadding="5" class="mt" align="center" bordercolor="#4282B2" style="width:90%;">
<tr>
	<td colspan="8" bgcolor="#4282B2" height="28"><strong style="color:#FFF;">Above70</strong></td>
</tr>
<tr>
	<td class="headsec"><strong>Si No</strong></td>
    <td class="headsec"><strong>Vehicle Number</strong></td>
    <td class="headsec"><strong>No Of Trips</strong></td>
    <td class="headsec"><strong>Vehicle Type</strong></td>
    <td class="headsec"><strong>Total In Weight</strong></td>
    <td class="headsec"><strong>Total Out Weight</strong></td>
    <td class="headsec"><strong>MSW Weight</strong></td>
    <td class="headsec"><strong>Efficiency</strong></td>
</tr>
<?php
$si =1;
for($i=0; $i<$count_Above70;$i++)
{ ?>
	<tr>
        <td><?php echo  $si; ?></td>
        <td><?php echo  $xml->Above70[$i]->Vehicle_Number; ?></td>
        <td><?php echo  $xml->Above70[$i]->No_Of_Trips; ?></td>
        <td><?php echo  $xml->Above70[$i]->Vehicle_Type; ?></td>
        <td><?php echo  $xml->Above70[$i]->Total_In_Weight; ?></td>
        <td><?php echo  $xml->Above70[$i]->Total_Out_Weight; ?></td>
        <td><?php echo  $xml->Above70[$i]->MSW_Weight; ?></td>
        <td><?php echo  $xml->Above70[$i]->Efficiency; ?></td>
    </tr>
<?php $si++;
}
?>
<tr>
	<td colspan="8" bgcolor="#4282B2" height="28"><strong style="color:#FFF;">Between 50 to 70</strong></td>
</tr>
<?php 
$si =1;
for($i=0; $i<$count_Between_50_to_70;$i++)
{ ?>
	<tr>
        <td><?php echo  $si; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->Vehicle_Number; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->No_Of_Trips; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->Vehicle_Type; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->Total_In_Weight; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->Total_Out_Weight; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->MSW_Weight; ?></td>
        <td><?php echo  $xml->Between_50_to_70[$i]->Efficiency; ?></td>
    </tr>
<?php $si++;
}
?>
<tr>
	<td colspan="8" bgcolor="#4282B2" height="28"><strong style="color:#FFF;">Below50</strong></td>
</tr>
<?php 
$si =1;
for($i=0; $i<$count_Below50;$i++)
{ ?>
	<tr>
        <td><?php echo  $si; ?></td>
        <td><?php echo  $xml->Below50[$i]->Vehicle_Number; ?></td>
        <td><?php echo  $xml->Below50[$i]->No_Of_Trips; ?></td>
        <td><?php echo  $xml->Below50[$i]->Vehicle_Type; ?></td>
        <td><?php echo  $xml->Below50[$i]->Total_In_Weight; ?></td>
        <td><?php echo  $xml->Below50[$i]->Total_Out_Weight; ?></td>
        <td><?php echo  $xml->Below50[$i]->MSW_Weight; ?></td>
        <td><?php echo  $xml->Below50[$i]->Efficiency; ?></td>
    </tr>
<?php $si++;
}
?>
</table>