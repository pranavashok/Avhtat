<?php 
require_once 'config.php'; 

if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['feedback']) && !empty($_POST['feedback'])){
	$name = mysql_escape_string($_POST['name']);
	$email = mysql_escape_string($_POST['email']);
	$feedback = mysql_escape_string($_POST['feedback']);
	
	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}
	$db = mysql_select_db($db_name, $con);
	
	//echo $name.$email.$feedback;
	
	$sql = "INSERT INTO feedback (name, email, feedback) VALUES(
		'". mysql_escape_string($name) ."',
		'". mysql_escape_string($email) ."',
		'". mysql_escape_string($feedback) ."') ";
		
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	
		
}

?>
