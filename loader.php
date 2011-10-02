<?php
require_once 'config.php'; 
session_start();
$hash_full=$_GET['page'];
$tmp = explode('/', $hash_full);
$reg = $tmp[0];
$hash= $tmp[1];
if($hash_full=="register")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:register();">
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

<label>Phone
<span class="small">Add a valid phone number</span>
</label>
<input type="text" name="phone" id="phone" />

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
<br/><br/>
<center><a href="#!forgotid" rel="ajax">Forgot Tathva ID</a></center><br/>
<center><a href="#!forgotpass" rel="ajax">Forgot Password</a></center>
<div class="spacer"></div>

</form>
</div>';
}
else if($hash_full=="info")
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
<li>The event registration fee for Tathva’11 is Rs 200. Once registered you can take part in any of the events. A Hospitality fee of Rs 50 will be collected from the participants who require accomodation, which will be later refunded.</li>
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

else if($hash_full=="schedule")
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
else if($hash_full=="forgotid")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:getid();">
<h1>Forgot Tathva ID?</h1>
<p>Fill in all the required details</p>

<label>Email
<span class="small">Enter your email address</span>
</label>
<input type="text" name="email" id="email" />

<label>Phone
<span class="small">Enter your phone number</span>
</label>
<input type="text" name="phone" id="phone" />

<button type="submit">Retrieve</button>
<br/><br/>
<center><a href="#!forgotpass" rel="ajax">Forgot Password</a></center>
<div class="spacer"></div>

</form>
</div>';
}else if($hash_full=="forgotpass")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:getpass();">
<h1>Forgot Password?</h1>
<p>Fill in all the required details</p>

<label>Email
<span class="small">Enter your email address</span>
</label>
<input type="text" name="email" id="email" />

<label>Phone
<span class="small">Enter your phone number</span>
</label>
<input type="text" name="phone" id="phone" />

<button type="submit">Retrieve</button>
<br/><br/>
<center><a href="#!forgotid" rel="ajax">Forgot Tathva ID</a></center>
<div class="spacer"></div>

</form>
</div>';
}else if($hash_full=="reset")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:resetpass();">
<h1>Password Reset</h1>
<p>Fill in all the required details</p>
<label>Password
<span class="small">Enter new password</span>
</label>
<input type="password" name="password" id="password" />

<label>Confirm Password
<span class="small">Confirm new password</span>
</label>
<input type="password" name="password2" id="password2" />

<button type="submit">Reset</button>
<br/><br/>
<div class="spacer"></div>
</form></div>';
}
else if($hash_full=="sponsors")
{
echo '<div id="ititle">Sponsors</div>
<div id="imcs_container" class="fullwidth">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent">
<div id="sponsorslist"> 
Event Sponsors <br/><br/>
 	  <a href="http://gasotech.com/" target="_blank"><img src="styles/images/sponsors/gasotech.jpg" alt=""/></a> <br/><br/>
 	  <a href="http://www.raritan.com/" target="_blank"><img src="styles/images/sponsors/raritan.jpg" alt=""/></a>  <br/><br/>
 	  <a href="http://www.arbitron.com/" target="_blank"><img src="styles/images/sponsors/arbitron.jpg" alt=""/></a> <br/><br/>
       <a href="http://www.ulcyberpark.com//" target="_blank"><img src="styles/images/sponsors/cyberpark.jpg" alt=""/></a> <br/><br/> 	  
   	  <a href="http://www.arubanetworks.com/" target="_blank"><img src="styles/images/sponsors/aruba.jpg" alt=""/></a> <br/><br/>
     	  <a href="http://nsef-india.org/" target="_blank"><img src="styles/images/sponsors/nsef.jpg" alt=""/></a> <br/><br/>
     	
Adventure Sponsor<br/><br/>
 	  <a href="http://www.treksnrapids.com/" target="_blank"><img src="styles/images/sponsors/treksnrapids.jpg" alt=""/></a> <br/><br/>
 	  
Merchandise Partner<br/><br/>
  	  <a href="http://www.transition-asia.com/" target="_blank"><img src="styles/images/sponsors/transition.jpg" alt=""/></a> <br/><br/>
 
Registration Sponsor<br/><br/>
       <a href="http://www.byjusclasses.com/" target="_blank"><img src="styles/images/sponsors/byjusclasses.jpg" alt=""/></a> <br/><br/>
         
Beverage Sponsor<br/><br/>
	<a href="http://www.coca-cola.com/" target="_blank"><img src="styles/images/sponsors/cocacola.jpg" alt=""/></a><br/><br/>
	
Exhibitions Partner<br/><br/>
	<a href="http://touchmagix.com/" target="_blank"><img src="styles/images/sponsors/touchmagix.jpg" alt=""/></a><br/><br/>

Media Partner<br/><br/>
	  <a href="http://www.thinkdigit.com/" target="_blank"><img src="styles/images/sponsors/thinkdigit.jpg" alt=""/></a><br/><br/>

Education Partner<br/><br/>
 	  <a href="http://www.btechguru.com/" target="_blank"><img src="styles/images/sponsors/btechguru.jpg" alt=""/></a><br/><br/>
 	  <a href="http://www.time4education.com/" target="_blank"><img src="styles/images/sponsors/time.jpg" alt=""/></a><br/><br/>

IDP Partner<br/><br/>
 	  <a href="http://www.greenadd.in/" target="_blank"><img src="styles/images/sponsors/greenadd.jpg" alt=""/></a><br/><br/>
     	  <a href="http://www.facebook.com/archipidia" target="_blank"><img src="styles/images/sponsors/archipidia.jpg" alt=""/></a><br/><br/>

Wokshop Partner<br/><br/>
   	  <a href="http://www.aerotrix.com/" target="_blank"><img src="styles/images/sponsors/aerotrix.jpg" alt=""/></a> <br/><br/>
    	  <a href="http://www.technophilia.co.in/" target="_blank"><img src="styles/images/sponsors/technophilia.jpg" alt=""/></a> <br/><br/>
   	  <a href="http://www.metawing.com/" target="_blank"><img src="styles/images/sponsors/metawing.jpg" alt=""/></a> <br/><br/>

Engineering and Tech Partner<br/><br/>
	  <a href="http://www.faadooengineers.com/" target="_blank"><img src="styles/images/sponsors/fadoo.jpg" alt=""/></a><br/><br/>

Initiative Partner<br/><br/>
       <a href="http://www.amul.com/" target="_blank"><img src="styles/images/sponsors/amul.jpg" alt=""/></a> <br/><br/>
       <a href="http://www.teachforindia.org/" target="_blank"><img src="styles/images/sponsors/teachforindia.jpg" alt="" /></a>
       <a href="http://www.ndtv.com/micro/supportmyschool/default.aspx" target="_blank"><img src="styles/images/sponsors/supportmyschool.jpg" alt=""/></a>  <br/><br/><br/>
   	  
</div></div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->
';
}else if($hash_full=="feedback")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:feedback()">
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
}else if($hash_full=="eventregister")
{
 if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
You have not logged in. Please login before registering for an event. 
</div>';
}else {
echo '<iframe id="ifrevent" style="margin-top:-20px;" src="participating_events.php" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';

}
}

else if($hash_full=="workshopregister")
{
if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
You have not logged in. Please login before registering for a workshop. 
</div>';

}else {
echo '<iframe id="ifrworkshop" style="margin-top:-20px;" src="participating_workshops.php" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
}
}else if ($hash_full[1]=='='){
	$searchResult = file_get_contents('http://www.tathva.org/2011/search.php?'.$hash_full);
	
	echo $searchResult;
}else if ($reg=="eventregister" && $hash!=""){
	echo '<iframe style="margin-top:-20px;" src="participating_events.php?event_hash='.$hash.'" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
}else if ($reg=="workshopregister" && $hash!=""){
	echo '<iframe style="margin-top:-20px;" src="participating_workshops.php?workshop_hash='.$hash.'" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
}else
{
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
$sql = "SELECT article_content FROM articles WHERE article_hash='".$hash_full."'";
$result = mysql_query($sql,$con) or die("no content") ;
$row = mysql_fetch_array($result);
if (!($row))
	echo 'This page will be updated soon.';
else
	echo $row['article_content'];
}

?>
