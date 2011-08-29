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
	$sql="SELECT name FROM participant WHERE email='".$_POST["email"]."'";
	$result=mysql_query($sql,$con);
	$row=mysql_fetch_row($result);
	if (!$row) {
		if($_POST["password"]==$_POST["password2"]) {
			$sql="SELECT max(no) FROM participant ";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if ($row==0) {
				die('Error: ' . mysql_error());
			}
			$row[0]+=1000;
			if($_POST["accomodation"]!="yes") 
				$_POST["accomodation"]="no";
			$_POST["password"]=md5($_POST["password"]);
		//id setting	
			$sql="INSERT INTO participant (tathva_id, name, email,password,college_name) VALUES 
			('TAT".$row[0]."','".$name."','".$email."','".md5($password)."','".$_POST["institution"]."');";
			mysql_query($sql,$con) or die('Error.');
			$hash = md5( rand(0,1000) );
		
			$to      = $email; // Send email to our user
			$subject = 'Tathva \'11 Signup Verification'; // Give the email a subject
			$message = '
		
			Thank You for signing up on Tathva \'11!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		
			------------------------
			E-Mail: '.$name.'
			Password: '.$password.'
			------------------------
		
			Please click this link to activate your account:
			
			http://www.tathva.org/2011/verify.php?email='.$email.'&hash='.$hash.'
		
			';

			$headers = 'From:no-reply@tathva.org' . "\r\n"; // Set from headers
			if(mail($to, $subject, $message, $headers)){ // Send our email
				echo $_POST["name"].", you have been registered. <br/>";
				echo "Your Tathva ID is TAT".$row[0]."<br/>";
				$msg = 'Your account has been created, <br /> please verify it by clicking the activation link that has been send to your email.';
			}else{
				$msg = 'Sorry, the register feature is not working now. Try again later.'; 
				$sql="DELETE FROM participant WHERE tathva_id = 'TAT".$row[0]."';";
				mysql_query($sql,$con) or die('Error deleteing.');
			}		
		}
		else {
			$msg= "<p>Password you have re-entered is incorrect, please confirm your password.</p>";
		}
	}
	else {
		$msg = "<p>You have already been registered as ".$row[0]."</p>";
	}
	
	echo $msg;
	
}
?>

