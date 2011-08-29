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
echo '<div id="ititle">Information</div>
<div id="imenu">
<ul class = "ilinks">
<li id="1">Registration</li>
<li id="2">Hospitality</li>
<li id="3">Deregistration</li>
</ul>
</div>

<div id="imcs_container">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent">
<div id="isection0" class="isection">
<ul>
<li>A Valid Tathva ID is compulsory in order to get      accommodation facilities and for taking part in any event.</li>
<li>Participants should bring valid college ID cards as a      proof for identity.</li>
<li>Events registered online should be confirmed at the registration      desk.</li>
<li>Tathva ID and College ID card is must for attending      Tathva nights.</li>
<li>For team events, event team captain has to register      along with the team members’ Tathva ID.</li>
<li>The registration fee for Tathva’11 is Rs 250 and Rs 50      as refundable caution deposit. (Rs 250 + 50 refundable)</li>
<li>A separate fee will be collected from those who avail      accommodation before the days of Tathva.</li>
<li>For registering additional events, participants should      register at the registration desk.</li>
<li>Accommodation will be provided usually to a group of 3      or 4. Please try to come as in a group to make procedures simpler.</li>
<li>Participants are bound to repay the losses they make      during their stay here. </li>
</ul></div>

<div id="isection1" class="isection">
<ul>
<li>Participants reaching the college should move on to the      Registration Desk at the Main Building(MB).</li>
<li>The participant’s details will be cross checked at the      first counter.</li>
<li>Participants who have not done the online registration      might have to stand in a queue to get themselves registered.</li>
<li>After this, the participant should move to the cash      counter where they have to pay the registration fee and they will be given      the Tathva ID card. Please cross check the name and Tathva ID card given      there itself.</li>
<li>You will be given a payment receipt.</li>
</ul>
</div>

<div id="isection2" class="isection">
<ul>
<li>Those who require accommodation facility should move to      the Hospitality desk.</li>
<li>Please show the receipt of payment obtained from the      registration desk.</li>
<li>Try to come in groups of 3 or 4. One of the      participants in each group will be made as the hospitality team captain.</li>
<li><strong>THE EVENT TEAM CAPTAIN NEED NOT BE THE SAME AS THE      HOSPITALITY TEAM CAPTAIN.</strong></li>
<li>All the required utilities for stay for the entire      group will be handed over to the respective team captain.</li>
<li>It will be the team captain\'s duty to return the      utilities without damage.</li>
</ul>

<br/>
</div>

<div id="isection3" class="isection">
<ul>
<li>Before deregistering our executives will check for the      damage in the utilities given to you during stay.</li>
<li>If the team captain leaves before the other team      members please inform us and re edit the team captain.</li>
<li>After getting cleared from the hospitality desk move on      to the registration desk.</li>
<li>Here the hospitality team captain can collect the      caution deposit of his/her team.</li>
<li>Accommodation receipt must be produced during      deregistration. </li>
<li>The prizes for team events will be given only to the      event team captain.</li>
</ul>
</div>

</div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
<div id="igrad"></div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->';
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
<form id="form" name="form" method="post" action="">
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
<textarea rows="4" cols="30" name="institution" id="institution" />


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
