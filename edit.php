<?php
require 'config.php';
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
if ($_POST['new']){
	$sql="SELECT MAX(ID) FROM articles;";
	$result=mysql_query($sql,$con);
	if($row=mysql_fetch_array($result)){
		$id=(int)$row['MAX(ID)']+1;	
	}else {
		$id=1;
	}
	$sql="INSERT INTO articles (ID) VALUES (".$id.");";
	print $sql;
	$query=mysql_query($sql,$con);
	if(!$query){
		die("Error adding values to table.");
	}
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'edit.php';
	header("Location: http://$host$uri/$extra?id=$id");
}
?>
<html>
<head>
<title>
Edit page...
</title>
</head>
<body>
<?php
/* A content manager for tathva '11*/
$id=$_GET['id'];
if(!$id){
	$id=0;
}
$sql = "SELECT * FROM articles WHERE ID = '".$id."';";
$result = mysql_query($sql,$con);
if($row = mysql_fetch_array($result)) {
	?>
<form name='edit' action='post.php' method='POST'>
<fieldset>
<legend>Article Details</legend>
ID : <input type="hidden" name="article_id" value="<?php echo $id; ?>"/> <?php echo $id; ?> <br/>
Type: <input type="text" name="article_type" value="<?php echo $row['article_type']; ?>"/> <br/>
Author: <?php echo $row['article_author']; ?> <br/>
Created: <?php echo $row['article_created'];?> <br/>
Title: <input type="text" name="article_title" value="<?php echo $row['article_title'];?>"/> <br/>
Hash Tag: <input type="text" name="article_hash" value="<?php echo $row['article_hash'];?>"/> <br/>
Content: <textarea name="article_content" col=100 row=100><?php echo $row['article_content']; ?></textarea><br/>
<input type="submit" name="submit" value="Submit"/>
<input type="submit" name="preview" value="Preview"/>
</fieldset>
</form>
<? } else {
   	echo "Invalid Article ID.";
   }
?>
</body>
</html>
