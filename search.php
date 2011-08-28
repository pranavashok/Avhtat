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
	$matches = array();
	foreach ($terms as $i){
		array_push($matches, " article_title LIKE '%".$i."%' OR article_content LIKE '% ".$i." %' OR article_tags LIKE '%".$i."%' "); 
	}	
	$query = implode(' OR ', $matches);
	$query = "SELECT * FROM articles WHERE ". $query;	
	$result = mysql_query($query,$con) or die("No results found.") ;
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
