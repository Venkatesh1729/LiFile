<?php include("oracle_to_php.php");// Connection
if($_GET['zone_id']!="")
{
	$zone_id = $_GET['zone_id'];
	$sel_ward = mysql_query("SELECT WD_CODE FROM ".ward_table." WHERE ULB_NO = '".$zone_id."' ORDER BY WD_CODE ASC");
	//mysql_execute($sel_ward);
	?>
    <option value="">---Select---</option>
    <?php while($row_ward = mysql_fetch_array($sel_ward)){?>	
    <option value="<?php echo $row_ward['WD_CODE']; ?>"><?php echo $row_ward['WD_CODE']; ?></option>    
<?php  } } 

if($_GET['ward_id']!="")
{
	$ward_id = $_GET['ward_id'];
	$sel_oldward = mysql_query("SELECT OLD_WD_CODE, OLD_WD_CODE2 FROM ".ward_table." WHERE WD_CODE = '".$ward_id."'");
	//mysql_execute($sel_oldward);
	//$num_oldward = mysql_num_rows($sel_oldward);
	$row_oldward = mysql_fetch_array($sel_oldward);
	//echo mysql_num_rows($sel_oldward); exit;
	?>
    <option value="">---Select---</option>
    <?php
	if($row_oldward['OLD_WD_CODE']!="" )
	{
		//while($row_oldward = mysql_fetch_array($sel_oldward)){?>	
    <option value="<?php echo $row_oldward['OLD_WD_CODE']; ?>"><?php echo $row_oldward['OLD_WD_CODE']; ?></option> 
    <?php 
	}
	if($row_oldward['OLD_WD_CODE2']!="")
	{
	?>
    	<option value="<?php echo $row_oldward['OLD_WD_CODE2']; ?>"><?php echo $row_oldward['OLD_WD_CODE2']; ?></option>    
<?php
	}
// } 
	
}
/*------------------------------------------------------------------------------------------------------------------------------*/
if($_GET['state_id']!="")
{
	$state_id = $_GET['state_id'];
	$sel_dist = "SELECT DIST_CODE, DIST_NAME FROM ".district_table." WHERE STATE_CODE='".$state_id."' AND DIST_STATUS='Y'";
	$res_dist = mysql_query( $sel_dist);
	//mysql_execute($res_dist);
	?>
    <option value="">---Select District---</option>
    <?php while( $row_dist = mysql_fetch_array($res_dist)){?>
     <option value="<?php echo $row_dist['DIST_CODE'];?>"><?php echo $row_dist['DIST_NAME'];?></option>
<?php 
		}
}

if($_GET['state_tamil_id']!="")
{
	$state_tamil_id = $_GET['state_tamil_id'];
	$sel_dist_tamil = "SELECT DIST_CODE, DIST_TAMIL_NAME FROM ".district_table." WHERE STATE_CODE='".$state_tamil_id."' AND DIST_STATUS='Y'";
	$res_dist_tamil = mysql_query( $sel_dist_tamil);
	//mysql_execute($res_dist_tamil);
	?>
    <option value="">---Select District---</option>
    <?php while( $row_dist_tamil = mysql_fetch_array($res_dist_tamil)){?>
     <option value="<?php echo $row_dist_tamil['DIST_CODE'];?>"><?php echo $row_dist_tamil['DIST_TAMIL_NAME'];?></option>
<?php 
		}
}
if($_GET['state_death_id']!="")
{
	$state_death_id = $_GET['state_death_id'];
	$sel_dist = "SELECT DIST_CODE, DIST_NAME FROM ".district_table." WHERE STATE_CODE='".$state_death_id."' AND DIST_STATUS='Y'";
	$res_dist = mysql_query( $sel_dist);
	//mysql_execute($res_dist);
	?>
    <option value="">---Select District---</option>
    <?php while( $row_dist = mysql_fetch_array($res_dist)){?>
     <option value="<?php echo $row_dist['DIST_CODE'];?>"><?php echo $row_dist['DIST_NAME'];?></option>
<?php 
		}
}

if($_GET['state_tdeath_id']!="")
{
	$state_tdeath_id = $_GET['state_tdeath_id'];
	$sel_dist_tamil = "SELECT DIST_CODE, DIST_TAMIL_NAME FROM ".district_table." WHERE STATE_CODE='".$state_tdeath_id."' AND DIST_STATUS='Y'";
	$res_dist_tamil = mysql_query( $sel_dist_tamil);
	//mysql_execute($res_dist_tamil);
	?>
    <option value="">---Select District---</option>
    <?php while( $row_dist_tamil = mysql_fetch_array($res_dist_tamil)){?>
     <option value="<?php echo $row_dist_tamil['DIST_CODE'];?>"><?php echo $row_dist_tamil['DIST_TAMIL_NAME'];?></option>
<?php 
		}
}

/*-------------------------------------------------------------------------------------------------------------------------------------------*/
if($_GET['dist_id']!="")
{
	$dist_id = $_GET['dist_id'];
	$sel_town = "SELECT TOWN_CODE, TOWN_NAME FROM ".town_table." WHERE DIST_CODE='".$dist_id."' AND TOWN_STATUS='Y'";
	$res_town = mysql_query( $sel_town);
	//mysql_execute($res_town); 
	?>
	<option value="">---Select Town--</option>
    <?php while( $row_town = mysql_fetch_array($res_town)){?>
     <option value="<?php echo $row_town['TOWN_CODE'];?>"><?php echo $row_town['TOWN_NAME'];?></option>

<?php }
}
if($_GET['distdeath_id']!="")
{
	$distdeath_id = $_GET['distdeath_id'];
	$sel_town = "SELECT TOWN_CODE, TOWN_NAME FROM ".town_table." WHERE DIST_CODE='".$distdeath_id."' AND TOWN_STATUS='Y'";
	$res_town = mysql_query( $sel_town);
	//mysql_execute($res_town); 
	?>
	<option value="">---Select Town--</option>
    <?php while( $row_town = mysql_fetch_array($res_town)){?>
     <option value="<?php echo $row_town['TOWN_CODE'];?>"><?php echo $row_town['TOWN_NAME'];?></option>

<?php }
}
if($_GET['disttdeath_id']!="")
{
	$disttdeath_id = $_GET['disttdeath_id'];
	$sel_town = "SELECT TOWN_CODE, TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$disttdeath_id."' AND TOWN_STATUS='Y'";
	$res_town = mysql_query( $sel_town);
	//mysql_execute($res_town); 
	?>
	<option value="">---Select Town--</option>
    <?php while( $row_town = mysql_fetch_array($res_town)){?>
     <option value="<?php echo $row_town['TOWN_CODE'];?>"><?php echo $row_town['TOWN_TAMIL_NAME'];?></option>

<?php }
}

if($_GET['distttamil_id']!="")
{
	$distttamil_id = $_GET['distttamil_id'];
	$sel_town = "SELECT TOWN_CODE, TOWN_TAMIL_NAME FROM ".town_table." WHERE DIST_CODE='".$distttamil_id."' AND TOWN_STATUS='Y'";
	$res_town = mysql_query( $sel_town);
	//mysql_execute($res_town); 
	?>
	<option value="">---Select Town--</option>
    <?php while( $row_town = mysql_fetch_array($res_town)){?>
     <option value="<?php echo $row_town['TOWN_CODE'];?>"><?php echo $row_town['TOWN_TAMIL_NAME'];?></option>

<?php }
}


if($_GET['birthplace_id']=="HOSPITAL")
{
	//echo "birth_hospital";
	$birthplace_id = $_GET['birthplace_id'];
	$zone_id = $_GET['hosp_zone_id'];
	$sel_hosp = "SELECT BD_HOSPCODE, BD_HOSPNAME FROM ".hospital_table." WHERE ULB_NO='".$zone_id."' ";
	$res_hosp = mysql_query( $sel_hosp);
	//mysql_execute($res_hosp); 
	?>
	<option value="">---Select Hospital--</option>
    <?php while( $row_hosp = mysql_fetch_array($res_hosp)){?>
     <option value="<?php echo $row_hosp['BD_HOSPCODE'];?>"><?php echo $row_hosp['BD_HOSPNAME'];?></option>
     <?php
	}
}

if($_GET['birthtplace_id']=="HOSPITAL")
{
	//echo "birth_hospital";
	$birthplace_id = $_GET['birthplace_id'];
	$zone_id = $_GET['hospt_zone_id'];
	$sel_hosp = "SELECT BD_HOSPCODE, BD_HOSPNAMET FROM ".hospital_table." WHERE ULB_NO='".$zone_id."' ";
	$res_hosp = mysql_query( $sel_hosp);
	//mysql_execute($res_hosp); 
	?>
	<option value="">---Select Hospital--</option>
    <?php while( $row_hosp = mysql_fetch_array($res_hosp)){?>
     <option value="<?php echo $row_hosp['BD_HOSPCODE'];?>"><?php echo $row_hosp['BD_HOSPNAMET'];?></option>
     <?php
	}
}

if($_GET['hospital_id']!="")
{
	$hospital_id = $_GET['hospital_id'];
	$sel_hosdetail = "SELECT DIV_CODE,  BD_HOSPADD1, BD_HOSPADD2, BD_HOSPADD3, BD_HOSPPIN, BD_HOSPADD1T, BD_HOSPADD2T, BD_HOSPADD3T  FROM ".hospital_table." WHERE BD_HOSPCODE = '".$hospital_id."'";
	$res_hosp_det = mysql_query( $sel_hosdetail);
	//mysql_execute($res_hosp_det);	
	$row_hosp_det = mysql_fetch_array($res_hosp_det);
	echo $row_hosp_det['DIV_CODE']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3']."^%$#@*&^".$row_hosp_det['BD_HOSPPIN']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3T'];
}

if($_GET['hospitaltamil_id']!="")
{
	$hospital_id = $_GET['hospitaltamil_id'];
	$sel_hosdetail = "SELECT DIV_CODE,  BD_HOSPADD1, BD_HOSPADD2, BD_HOSPADD3, BD_HOSPPIN, BD_HOSPADD1T, BD_HOSPADD2T, BD_HOSPADD3T  FROM ".hospital_table." WHERE BD_HOSPCODE = '".$hospital_id."'";
	$res_hosp_det = mysql_query( $sel_hosdetail);
	//mysql_execute($res_hosp_det);	
	$row_hosp_det = mysql_fetch_array($res_hosp_det);
	echo $row_hosp_det['DIV_CODE']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3']."^%$#@*&^".$row_hosp_det['BD_HOSPPIN']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3T'];
}

if($_GET['deathplace_id']=="HOSPITAL")
{
	//echo "birth_hospital";
	$birthplace_id = $_GET['deathplace_id'];
	$zone_id = $_GET['death_zone_id'];
	$sel_hosp = "SELECT BD_HOSPCODE, BD_HOSPNAME FROM ".hospital_table." WHERE ULB_NO='".$zone_id."' ";
	$res_hosp = mysql_query( $sel_hosp);
	//mysql_execute($res_hosp); 
	?>
	<option value="">---Select Hospital--</option>
    <?php while( $row_hosp = mysql_fetch_array($res_hosp)){?>
     <option value="<?php echo $row_hosp['BD_HOSPCODE'];?>"><?php echo $row_hosp['BD_HOSPNAME'];?></option>
     <?php
	}
}

if($_GET['deathplace_id']=="HOSPITAL")
{
	//echo "birth_hospital";
	$getdeath_place_id_tamil = $_GET['getdeath_place_id_tamil'];
	$zone_id = $_GET['deathta_zone_id'];
	$sel_hosp = "SELECT BD_HOSPCODE, BD_HOSPNAMET FROM ".hospital_table." WHERE ULB_NO='".$zone_id."' ";
	$res_hosp = mysql_query( $sel_hosp);
	//mysql_execute($res_hosp); 
	?>
	<option value="">---Select Hospital--</option>
    <?php while( $row_hosp = mysql_fetch_array($res_hosp)){?>
     <option value="<?php echo $row_hosp['BD_HOSPCODE'];?>"><?php echo $row_hosp['BD_HOSPNAMET'];?></option>
     <?php
	}
}


if($_GET['hospitaldeath_id']!="")
{
	$hospitaldeath_id = $_GET['hospitaldeath_id'];
	$sel_hosdetail = "SELECT DIV_CODE,  BD_HOSPADD1, BD_HOSPADD2, BD_HOSPADD3, BD_HOSPPIN, BD_HOSPADD1T, BD_HOSPADD2T, BD_HOSPADD3T  FROM ".hospital_table." WHERE BD_HOSPCODE = '".$hospitaldeath_id."'";
	$res_hosp_det = mysql_query( $sel_hosdetail);
	//mysql_execute($res_hosp_det);	
	$row_hosp_det = mysql_fetch_array($res_hosp_det);
	echo $row_hosp_det['DIV_CODE']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3']."^%$#@*&^".$row_hosp_det['BD_HOSPPIN']."^%$#@*&^".$row_hosp_det['BD_HOSPADD1T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD2T']."^%$#@*&^".$row_hosp_det['BD_HOSPADD3T'];
}
?>