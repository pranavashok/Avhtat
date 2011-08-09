<?php
require_once 'config.php';
?>
<html>
<head>
<title>
CMS
</title>
</head>
<body>
<?php
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
$id=$_GET['id'];
$sql = "DELETE FROM articles WHERE ID=".$id.";";
$query = mysql_query($sql,$con);
if(!$query) {
	die("\nError deleting values...");
}
echo "Done...";
?><br/>
<a href='admin.php'> Go to Admin Panel</a>
</body>
</html>
