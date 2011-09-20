<?php 
	require_once 'config.php'; 
	//$email=mysql_real_escape_string(stripslashes($_POST['email']));
	$email = $_POST['email'];
	$hash = $_POST['hash'];
	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}
	$db = mysql_select_db($db_name, $con);
	$sql="SELECT hash, tathva_id FROM participant WHERE email='".$email."';";	
	$result=mysql_query($sql,$con) or die("Query error");
	$row = mysql_fetch_row($result);
	if ($row[0]==$hash){
		$sql="UPDATE participant SET password='".md5($_POST["password"])."' WHERE email='".$email."';";
		if(mysql_query($sql,$con)){
			echo "Password changed successfully! <br/>";
		} else{
			echo "Error connecting to database. Try again later. <br/>";

		}
	}else{
		echo "Invalid Verification.";
	}

	
?>
