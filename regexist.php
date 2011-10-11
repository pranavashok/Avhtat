<?php
	require_once('config.php');
	//session_start();
  	$con = mysql_connect($host, $db_user, $db_password);
	//if ($con && isset($_SESSION['tathvaid'])) {
		$db = mysql_select_db($db_name, $con);
		$sql="SELECT event_id FROM event WHERE event_hash LIKE '".mysql_real_escape_string($_POST['page'])."';";
		$result=mysql_query($sql,$con) or die('error');
		$row=mysql_fetch_array($result);
		if($row){
			echo '<div id="regbutton"><a href="index.php#!eventregister/'.mysql_real_escape_string($_POST['page']).'">Register</a></div>';
		}else {
			$sql = 'SELECT workshop_id FROM workshop WHERE workshop_hash LIKE "'.mysql_real_escape_string($_POST['page']).'";';
			$result=mysql_query($sql,$con) or die('error');
			$row=mysql_fetch_array($result);
			if($row){
				echo '<div id="regbutton"><a href="index.php#!workshopregister/'.mysql_real_escape_string($_POST['page']).'">Register</a></div>';
			}
		}
	//}
?>
