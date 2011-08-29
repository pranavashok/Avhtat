<?php 
require_once 'config.php'; 
	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}
	$db = mysql_select_db($db_name, $con);
	$sql="SELECT hash, tathva_id FROM participant WHERE email='".$_GET["email"]."'";	
	$result=mysql_query($sql,$con) or die("Query error");
	$row = mysql_fetch_row($result);
	if ($row[0]==$_GET['hash']){
		$sql="UPDATE participant SET active='1' WHERE email='".$_GET["email"]."'";
		$result=mysql_query($sql,$con);
		echo "<div id='stylized'>Account verified successfully. Thank You for registering. <br/> Your Tathva ID is <strong>$row[1]</strong>. Kindly note it down for future reference.</div>";


	}else{
		echo "<div id='stylized'>Invalid Verification.</div>";
	}

	
?>
