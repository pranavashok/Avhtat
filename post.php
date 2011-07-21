<?php
require_once 'config.php'
?>
<html>
<head>
<title>
CMS
</title>
</head>
<body>
<?php
if ($_POST['submit']) {
	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}
	$db = mysql_select_db($db_name, $con);
	$id=$_POST['article_id'];
	$type=$_POST['article_type'];
	$title=$_POST['article_title'];
	$content=$_POST['article_content'];

	$sql = "UPDATE 'articles' SET article_type='".$type."' article_title='".$title."' article_content='".$content."' WHERE ID=".$id.";";
	$query = mysql_query($sql,$con);
	echo "Done...";
	?>
	<a href="cms.
<?php
} else if($_POST['preview']) {
?>
<h2> <?php echo $title; ?> </h2><br/>
<?php echo $content;        
}
?>
</body>
</html>
