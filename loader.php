<?php
 require_once 'config.php'; 
//Get the page parameter from the url
// The data can be obtained from the server using the #tag. 

switch($_GET['page'])  {
    case '#lightmusic' : $page = 'Page 1'; 
                    break;
    case '#cheautic' : $page = 'Page 2'; 
                    break;
    case '#page3' : $page = 'Page 3'; 
                    break;
    case '#page4' : $page = 'Page 4'; 
                    break;
    default: $page = 'default content loaded from server';
}
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);

$sql = "SELECT article_content FROM articles WHERE article_hash=`$_GET['page']`;";
$result = mysql_query($sql,$con);
$page = $result['article_content'];

echo $page;

?>
