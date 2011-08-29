<?php 
require_once 'config.php'; 

if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
	$name = mysql_escape_string($_POST['name']);
	$email = mysql_escape_string($_POST['email']);
	$password = mysql_escape_string($_POST['password']);
}
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
	// Return Error - Invalid Email
	$msg = 'The email you have entered is invalid, please try again.';
}else{	// Return Success - Valid Email

	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}
	$db = mysql_select_db($db_name, $con);
	$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
	$hash = md5( rand(0,1000) );
	mysql_query("INSERT INTO users (username, password, email, hash) VALUES(
		'". mysql_escape_string($name) ."',
		'". mysql_escape_string(md5($password)) ."',
		'". mysql_escape_string($email) ."',
		'". mysql_escape_string($hash) ."') ") or die(mysql_error());
		
	$to      = $email; // Send email to our user
	$subject = 'Tathva \'11 Signup Verification'; // Give the email a subject
	$message = '

	Thanks for signing up on Tathva \'11!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

	------------------------
	E-Mail: '.$name.'
	Password: '.$password.'
	------------------------

	Please click this link to activate your account:

	http://www.tathva.org/2011/verify.php?email='.$email.'&hash='.$hash.'

	';

	$headers = 'From:no-reply@tathva.org' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email

	
}
?>

