<?php 
require_once 'config.php'; 
if(isset($_POST['item']) && !empty($_POST['item']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['phone']) && !empty($_POST['phone'])){
	$item = mysql_escape_string($_POST['item']);
	$email = mysql_escape_string($_POST['email']);
	$phone = mysql_escape_string($_POST['phone']);
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
	$sql="SELECT phone, tathva_id, hash FROM participant WHERE email='".$email."'";
	$result=mysql_query($sql,$con);
	$row=mysql_fetch_row($result);
	if (!$row) {
		$msg = "No account registered from this mail id.";
	}else{
		if($phone==$row[0]) {		
			$to = $email; // Send email to our user
			$subject='';
			$message='';
			if(strcmp($item,'id')==0){
				$subject = 'Tathva \'11 ID retrieval'; // Give the email a subject
				$message = '
		
Hello,
	Your Tathva \'11 account details : 
	------------------------
	Tathva ID: '.$row[1].'
	------------------------

Thank You!
Tathva \'11 Team
';
			} else if(strcmp($item,'pass')==0){
				$subject = 'Tathva \'11 password recovery'; // Give the email a subject
				$message = '
		
Hello,
	We received a request for resetting your Tathva \'11 password.
	Please follow the link to reset your password. 
	http://www.tathva.org/2011/?email='.$email.'&hash='.$row[2].'#!reset	

Thank You!
Tathva \'11 Team
';
			}
			$headers = 'From:no-reply@tathva.org' . "\r\n"; // Set from headers
			if(mail($to, $subject, $message, $headers)){ // Send our email
				$msg = 'Your request has been received. Please check your mail box.';
			}else{
				$msg = 'Sorry, this feature is not working now. Try again later.'; 
			}
		}
		else {
			$msg= "<p>The phone number you have entered do not match with the email id.</p>";
		}
	}
	
	echo $msg;
	
}
?>
