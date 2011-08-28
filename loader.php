<?php
require_once 'config.php'; 

if($_GET['page']=="register")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="register.php">
<h1>Registration</h1>
<p>Fill in all the required details</p>

<label>Name
<span class="small">Add your name</span>
</label>
<input type="text" name="name" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />

<label>Password
<span class="small">Min. size 6 chars</span>
</label>
<input type="password" name="password" id="password" />

<label>Confirm Password
<span class="small">Re-type your password</span>
</label>
<input type="password" name="password2" id="password2" />

<label>Institution Name
<span class="small">Add your institution</span>
</label>
<input type="text" name="institution" id="institution" />


<button type="submit">Register</button>
<div class="spacer"></div>

</form>
</div>';

}

else
{
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
$sql = "SELECT article_content FROM articles WHERE article_hash='".$_GET['page']."'";
$result = mysql_query($sql,$con) or die("no content") ;
$row = mysql_fetch_array($result);
if (!($row))
	echo '404 Page Not Found';
else
	echo $row['article_content'];
}

?>
