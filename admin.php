<?php
require_once 'config.php';
if (isset($_GET['sort_by'])) {
	$sort_by=$_GET['sort_by'];
}else {
	$sort_by='ID';
}
?>
<html>
<head>
<title>
Admin Panel
</title>
</head>
<body>
<form action="edit.php" method="post">
<input type="submit" name="new" value="Create New"/>
</form>

<?php
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);

$sql = "SELECT * FROM articles ORDER BY `".$sort_by."`;";
$result = mysql_query($sql,$con);
$row = mysql_fetch_array($result);
if (!$row){
	echo "No Records found..";
} else {
	echo "<table border='1'><tr><th><a href='admin.php?sort_by=ID'>ID</a></th><th><a href='admin.php?sort_by=article_title'>Title</a></th><th><a href='admin.php?sort_by=article_author'>Author</a></th><th></th><th></th></tr>";
	do{
		echo "<tr><td>".$row['ID']."</td><td>".$row['article_title']."</td><td>".$row['article_author']."</td><td><a href='edit.php?id=".$row['ID']."'>edit</a></td><td><a href='delete.php?id=".$row['ID']."'>delete</a></td></tr>";
	}while ($row=mysql_fetch_array($result));
	echo "</table>";
}
	
?>
</body>
</html>
