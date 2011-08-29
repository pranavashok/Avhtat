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
else if($_GET['page']=="info")
{
echo '<div id="ititle">The Journey</div>';
}
else if($_GET['page']=="schedule")
{
echo '<div id="ititle">Schedule</div><div id="imcs_container">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent"><div id="isection0" class="isection">Schedule will be put up shortly.</div></div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
<div id="igrad"></div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->';

}
else if($_GET['page']=="gallery")
{
echo 'Gallery here';
}
else if($_GET['page']=="sponsors")
{
echo '<div id="ititle">Sponsors</div>';
}
else if($_GET['page']=="feedback")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="feedback.php">
<h1>Feedback</h1>
<p></p>
<br /><br /><br />
<label>Name
<span class="small">Add your name</span>
</label>
<input type="text" name="name" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />

<label>Feedback
<span class="small">Enter feedback here</span>
</label>
<textarea rows="4" cols="30" name="feedback" id="feedback" />


<button type="submit">Submit</button>
<div class="spacer"></div>

</form>
</div>';
}else if ($_GET['page'][1]=='='){
	$searchResult = file_get_contents('http://localhost/Tathva--11-Website/search.php?'.$_GET['page']);
	
	echo $searchResult;
}else
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
