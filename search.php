<?php
require_once 'config.php';
$finalResult = "<div id='ititle'>Results for : ".str_replace('|',' ',$_GET['q'])."</div>
<div id='imenu'>
<!--
<ul class = 'ilinks'>
<li id='1'>Events</li>
<li id='2'>Workshops</li>
<li id='3'>Lectures</li>
<li id='4'>Exhibitions</li>
</ul>-->
</div>

<div id='imcs_container'>
<div class='icustomScrollBox'>
<div class='icontainer'>
<div class='icontent'>";
 
$results = array();
if(isset($_GET['q'])){
	$q = trim($_GET['q']);
	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$db = mysql_select_db($db_name, $con);
	$q=strip_tags($q);
	$q=mysql_real_escape_string($q);
	$terms=explode('|',$q);
	$sql="INSERT INTO searchlog (IP,term) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$q."');";
	$result = mysql_query($sql,$con);
	$strongmatches = array();
	foreach ($terms as $i){
		array_push($strongmatches, " article_title LIKE '%".$i."%' OR article_content LIKE '%".$i."%' OR article_tags LIKE '%".$i."%' "); 
	}	
	$strongquery = implode(' AND ', $strongmatches);
	
	$strongquery = "SELECT * FROM articles WHERE ". $strongquery;	
	$result = mysql_query($strongquery,$con);
	if (!$result){
		$weakmatches = array();
		foreach ($terms as $i){
			array_push($weakmatches, " article_title LIKE '%".$i."%' OR article_content LIKE '%".$i."%' OR article_tags LIKE '%".$i."%' "); 
		}	
		$weakquery = implode(' OR ', $weakmatches);
	
		$weakquery = "SELECT * FROM articles WHERE ". $weakquery;	
		$result = mysql_query($weakquery,$con);
	}
	echo $finalResult;
	$i=0;
	echo "<div id='isection".$i."' class='isection'>";
        while ($row = mysql_fetch_assoc($result)) {
        	$short = $row['article_content'];
   		echo "<a href='index.php#!".$row['article_hash']."'>".$row['article_title']."</a><br/><br/>";
   		$i++;
        }
	echo "</div>";
	echo "</div><!--icontent-->
</div><!--icontainer-->
<div class='idragger_container'>
<div class='idragger'></div>
</div>
<div id='igrad'></div>
</div><!--icustomScrollBox-->
<a href='#' class='iscrollUpBtn'></a><a href='#' class='iscrollDownBtn'></a>
</div> <!--imcs_container-->";
}else{
	echo "No query.";

}
?>
