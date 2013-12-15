<?php
session_start();
include("oracle_to_php.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];	
	$password=$_POST['password'];
	$query = "SELECT COUNT(*) as cnt FROM ".hospuser_table." WHERE USERNAME = '$username' AND PASSWORD='$password'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$row_count=$row['cnt'];
	
	if($row_count > 0)
	{
		$query1 = "SELECT * FROM ".hospuser_table." WHERE USERNAME='$username' AND PASSWORD='$password'";
		$result1 = mysql_query($query1);
		//oci_execute($result1);		
		while($rows = mysql_fetch_array($result1))
		{
			session_start();
			$_SESSION['username']=$rows['USERNAME'];
			$_SESSION['hospital']=$rows['HOSPITAL_ID'];
			header("Location:home.php");
			exit;
		}
	}
	else
	{
		$msg="Incorrect Username / Password";	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ta" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CCMC Login</title>
<link rel="stylesheet" href="css/chromestyle.css" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" />
</head>
<body >
<?php //include("home.php");?>
<div id="main_div">
<div id="logo" style="background-color:#22BFF2; " >
 <img src="logo-name.jpg" />
</div>
<?php 
//print_r($_SESSION);
if($_SESSION['username']=="")
{
?>
		<div id="container">		
		<form method="post" action="index.php">
            <label for="name">Username:</label>
            <input type="text" name="username" required>
            <label for="username">Password:</label>
            <!--<p><a href="#">Forgot your password?</a></p>-->
            <input type="password" name="password" required>
            <div id="lower">            
            	<input type="submit" value="Login" name="submit">            
            </div>
		</form>
		</div>
      <p align="center"><br /><br /><?php if(isset($msg)) echo $msg; ?></p>
      <?php } else {
		  
		  header("Location:home.php");
		  
		  } ?>
   </div>
<div id="footer"> CopyRight ® 2013. Chennai City Municipal Corporation. </div>
</body>
</html>
