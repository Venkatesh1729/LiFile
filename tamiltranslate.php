<?php  include("oracle_to_php.php");?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <!--------------------------enter word and give space to get tamil letters Js ans jsapi.js library Starts here --------------------->
    
    <script type="text/javascript" src="js/jsapi.js"></script>   
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
        var ids = [ "transl1", "transl2", "transl3" ];
        control.makeTransliteratable(ids);

        // Show the transliteration control which can be used to toggle between
        // English and Hindi.
        control.showControl('translControl');
      }
      google.setOnLoadCallback(onLoad);
	 </script> 
     
	<!------------------ enter word and give space to get tamil letters Js ans jsapi.js library ends here---------------------->
    
    
    
    <!------------------ For Tamil letter select with keyboar img starts here---------------------->
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">  
	  function popitup(url,id) 
	  {
		 // alert(id);
		var url = "keyboard.php?tamil_id="+id ;
		newwindow=window.open(url,'name','height=220,width=310,scrollbar=no');
		if (window.focus) {newwindow.focus()}
		return false;
	  }
    </script>
    <!------------------ For Tamil letter select with keyboar img ends here---------------------->
    <style>
    	td {
			/*font-family:VANAVIL-Avvaiyar;*/
			font-size:14px;
		}
    </style>
  </head>
  <body>
  <?php 
  	if($_GET['id'])
	{
		$ed = "SELECT * FROM tamiltype WHERE id='".$_GET['id']."'";
		$compiled = mysql_query( $ed);
		////mysql_execute($compiled);
		$re = mysql_fetch_array($compiled);
	}
  ?>
  <table border="1" cellpadding="5" cellspacing="1" >
  <form action="tamiltranslate.php" method="post" name="form1">
  <center>
  <!--Type in tamil (Press Ctrl+g to toggle between English and Tamil)-->
   <!-- <div id='translControl'></div>-->
   
   <input type="hidden" name="eid" value="<?php echo $re['id']; ?>" >
   <tr>
 	<td>   
    Child Name :</td> <td><input type='textbox' id="transl1" name="childname" value="<?php echo $re['childname'];?>"/>
    <a href="javascript:;" onClick="return popitup('keyboard.php','transl1');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
    </tr>
   <tr>
 	<td>
    Father Name :</td>  <td><input type='textbox' id="transl2" name="fathername" value="<?php echo $re['fathername'];?>"/>
    <a href="javascript:;" onClick="return popitup('keyboard.php','transl2');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
    </tr>
   <tr>
 	<td>
    Mother Name:</td>  <td><input type='textbox' id="transl3" name="mothername" value="<?php echo $re['mothername'];?>"/>
    <a href="javascript:;" onClick="return popitup('keyboard.php','transl3');" > <img src="keyboard.png" width="28" height="13"> </a>
    </td>
    </tr>
   <!-- <br>Body<br><textarea id="transl2" name="transl2" style="width:600px;height:200px"></textarea>-->
   <!-- <input type="text" name="name" id="name" value="" >-->
 <!-- <a href="javascript:;" onClick="return popitup('keyboard.php');" > <img src="keyboard.png" width="28" height="13"> </a>-->
 <tr>
 	<td colspan="2" align="center">
 <?php 
 	if(!$_GET['id'])
	{
 ?>
<input type="submit" name="submit" id="submit" value="submit" >
<?php } else {?>
<input type="submit" name="update" id="update" value="update" >

<?php } ?>
</td>
</tr>
</center>
    </form>
    </table>
    <?php 
	
	if($_POST['submit'])
	{
		
		$ins = "INSERT INTO tamiltype (childname,fathername,mothername) VALUES('".$_POST['childname']."','".$_POST['fathername']."','".$_POST['mothername']."')";
		$compiled = mysql_query( $ins);
		//mysql_execute($compiled);
		echo "<script>window.location='tamiltranslate.php';</script>";
	}
	else if($_POST['update'])
	{
		$ups =	" UPDATE tamiltype SET childname='".$_POST['childname']."', fathername='".$_POST['fathername']."', mothername='".$_POST['mothername']."' WHERE id='".$_POST['eid']."'";
		$compiled = mysql_query( $ups);
		//mysql_execute($compiled);
			echo "<script>window.location='tamiltranslate.php';</script>";
	}
	else
	{
		$res = "SELECT * FROM tamiltype";
		$compiled1 = mysql_query( $res);
		//mysql_execute($compiled1);
		?>
        <table border="1">
        <tr>
        	<td>Child name</td>
            <td>Father name</td>
            <td>Mother name</td>
            <td>Action</td>
        <tr>
        <?php 
		while($row = mysql_fetch_array($compiled1))
		{
			?>
            <tr>
            	<td><?php echo $row['childname'];?></td>
                <td><?php echo $row['fathername'];?></td>
                <td><?php echo $row['mothername'];?></td>
                <td><a href="tamiltranslate.php?id=<?php echo $row['id'];?>">Edit</a></td>
            </tr>
			<?php
		}
		?>
        </table>
        <?php
	}
	
	
	
	//$transl1 = htmlentities($_POST['transl1'],ENT_QUOTES,'UTF-8');
	?>
    
  </body>
</html>

