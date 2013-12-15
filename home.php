<?php
session_start();
if(isset($_SESSION['username'])=='')
{
	header("Location:index.php");
}
?>
<link rel="stylesheet" href="css/chromestyle.css" type="text/css" />
<script language="javascript">
function showRanksSubmenu1() {
    document.getElementById('rankSubMenu1').style.display = 'block';
}

function hideRanksSubmenu1() {
    document.getElementById('rankSubMenu1').style.display = 'none';
}

function showRanksSubmenu2() {
    document.getElementById('rankSubMenu2').style.display = 'block';
}

function hideRanksSubmenu2() {
    document.getElementById('rankSubMenu2').style.display = 'none';
}

function showRanksSubmenu3() {
    document.getElementById('rankSubMenu3').style.display = 'block';
}

function hideRanksSubmenu3() {
    document.getElementById('rankSubMenu3').style.display = 'none';
}

function showRanksSubmenu4() {
    document.getElementById('rankSubMenu4').style.display = 'block';
}

function hideRanksSubmenu4() {
    document.getElementById('rankSubMenu4').style.display = 'none';
}

function showRanksSubmenu5() {
    document.getElementById('rankSubMenu5').style.display = 'block';
}

function hideRanksSubmenu5() {
    document.getElementById('rankSubMenu5').style.display = 'none';
}
</script>
    	<div id="logo" style="background-color:#22BFF2; " >
    		 <img src="logo-name.jpg" />
        </div>
        <div id="menu">
        	<div class="chromestyle" id="chromemenu">
                <ul id="menuid">
                    <li>
                    	<a href="home.php" >Home</a>
                        <a href="javascript:;" rel="dropmenu1" onMouseOver="showRanksSubmenu1()" onMouseOut="hideRanksSubmenu1()" >Birth<img src="down.gif"></a>
                        <a href="javascript:;" rel="dropmenu2" onMouseOver="showRanksSubmenu2()" onMouseOut="hideRanksSubmenu2()" >Death<img src="down.gif"></a>
                        <a href="javascript:;" rel="dropmenu3" onMouseOver="showRanksSubmenu3()" onMouseOut="hideRanksSubmenu3()" >Search <img src="down.gif"></a>
                        <a href="javascript:;" rel="dropmenu4" onMouseOver="showRanksSubmenu4()" onMouseOut="hideRanksSubmenu4()" >Communicable Diseases<img src="down.gif"></a>
                        <?php if($_SESSION['username']=="admin"){?>
                        <a href="javascript:;" rel="dropmenu5" onMouseOver="showRanksSubmenu5()" onMouseOut="hideRanksSubmenu5()" >Masters<img src="down.gif"></a>			<?php } ?>
                        <a href="logout.php" >Sign out</a>
                    </li>			
                </ul>
            </div>
            
            <!--1nd drop down menu -->                                                
            <div id="dropmenu1" class="dropmenudiv" style="width: 250px;">
            	<ul id="rankSubMenu1" onMouseOver="showRanksSubmenu1();" onMouseOut="hideRanksSubmenu1();">
                	<li><a href="birthform.php">New Birth Entry</a></li>
                    <!--<li><a href="javascript:;">Stil Birth Entry</a></li>
                    <li><a href="javascript:;"> Form :1 Modification</a></li>
                    <li><a href="javascript:;">Birth Certificate</a></li>	
                    <li><a href="javascript:;">New Birth Certificate</a></li>-->
                </ul>	
            </div>
            <!--ends 1nd drop down menu -->
            
            <!--2nd drop down menu -->                                                
            <div id="dropmenu2" class="dropmenudiv" style="width: 250px;">
            	<ul id="rankSubMenu2" onMouseOver="showRanksSubmenu2()" onMouseOut="hideRanksSubmenu2()">
                	<li><a href="deathform.php">Death Entry</a></li>
                   <!-- <li><a href="javascript:;">Form :2 Modification</a></li>
                    <li><a href="javascript:;">Death Certificate</a></li>	
                    <li><a href="javascript:;">New Death Certificate</a></li>-->
                </ul>	
            </div>
            <!--ends 2nd drop down menu -->
            
            <!--3rd drop down menu -->                                                
            <div id="dropmenu3" class="dropmenudiv" style="width: 250px;">
            	<ul id="rankSubMenu3" onMouseOver="showRanksSubmenu3()" onMouseOut="hideRanksSubmenu3()">
                	<li><a href="birth_report.php">Birth Entry Search</a></li>
                    <li><a href="death_report.php">Death Entry Search</a></li>
                    <!--<li><a href="javascript:;">Legal Part Details</a></li>
                        <li><a href="javascript:;">&nbsp;&nbsp;&nbsp;Birth</a></li>	
                        <li><a href="javascript:;">&nbsp;&nbsp;&nbsp;Death</a></li>
                    <li><a href="javascript:;">Year Wise Hospital Birth Details</a></li>
                	<li><a href="javascript:;">Ward Wise - Birth & Death Details</a></li>-->

                </ul>	
            </div>
            <!--ends 3rd drop down menu -->
            
            <!--4th drop down menu -->                                                   
            <div id="dropmenu4" class="dropmenudiv" style="width: 250px;">
            	<ul id="rankSubMenu4" onMouseOver="showRanksSubmenu4()" onMouseOut="hideRanksSubmenu4()">
                    <li><a href="commu_disentry.php">Patient Entry</a></li>
                    <li><a href="commu_report.php">Search Patient List</a></li>
                    <!--<li><a href="javascript:;">Trade Wise Collection Details</a></li>
                    <li><a href="javascript:;">D&O - PFA Trade Defaulters List</a></li>-->	
                </ul>		
            </div>
            <!--ends 4th drop down menu --> 
            
            <!--5th drop down menu -->                                                   
            <div id="dropmenu5" class="dropmenudiv" style="width: 250px;">
            	<ul id="rankSubMenu5" onMouseOver="showRanksSubmenu5()" onMouseOut="hideRanksSubmenu5()">
                    <li><a href="disease_entry.php">Diseases Entry</a></li>
                    <!--<li><a href="javascript:;">Trade Wise Collection Details</a></li>
                    <li><a href="javascript:;">D&O - PFA Trade Defaulters List</a></li>-->	
                </ul>		
          </div>
            <!--ends 5th drop down menu -->   
            <br />
            <p align="left" style="font-family:tahoma; font-size:12px;">Welcome <font color="#FF0000"><?php echo $_SESSION['username']; ?></font></p>
      </div>       