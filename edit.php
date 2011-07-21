<?php
require_once 'config.php'
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
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
$id=$_GET['id'];
$sql = "SELECT * FROM 'articles' WHERE ID = '".$id."';";
$result = mysql_query($sql,$con);
if($row = mysql_fetch_array($result)) {
	?>
<form name='edit' action='post.php' method='post'>
<fieldset>
<legend>Article Details</legend>
ID : <input type="hidden" name="article_id" value="<?php echo $id; ?>"/> <?php echo $id; ?> <br/>
Type: <input type="text" name="article_type" value="<?php echo $row['article_type']; ?>"/> <br/>
Author: <?php echo $row['article_author']; ?> <br/>
Created: <?php echo $row['article_created'];?> <br/>
Title: <input type="text" name="article_title" value="<?php echo $row['article_author'];?>"/> <br/>
Content: <textarea name="article_content" col=100 row=100><?php echo $row['article_content']; ?></textarea><br/>
<button type="submit" name="submit" value="Submit"/>
<button type="submit" name="preview" value="Preview"/>
</fieldset>
</form>
<? } else {
   	echo "Invalid Article ID.";
   }
?>
</body>
</html>
