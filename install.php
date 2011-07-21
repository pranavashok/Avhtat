<html>
<body>
<h2>Installation</h2>
<?php require_once 'config.php' ?>
<?php
/* Set up the CMS and variables */
// let the install script create a table. database can'tbe created in hostgator.. the user doesn't have permission for that

$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);

$sql = "CREATE TABLE 'users'(ID int primary key, user_login varchar(60), user_pass varchar(64), user_email varchar(100), user_registered datetime, display_name varchar(100));";

$result = mysql_query($sql, $con);

$sql = "CREATE TABLE 'articles'(ID int primary key, article_type varchar(20), article_author varchar(60), article_created datetime, article_title varchar(40), article_content longtext);";

$result = mysql_query($sql, $con);

$sql = "CREATE TABLE 'menus'(ID int primary key, item_parent int, item_title varchar(40), item_desc varchar(40));";

$result = mysql_query($sql, $con);
?>
