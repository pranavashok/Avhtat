<?php
   // PHP5 Implementation - uses MySQLi.
   // mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
   require_once("config.php");
   $db = mysql_connect($host, $db_user, $db_password);
   mysql_select_db($db_name, $db);
   if(!$db) {
      // Show error if we cannot connect.
      echo 'ERROR: Could not connect to the database.';
   } else {
   $query = "SELECT article_content, ID FROM articles;";
   $result = mysql_query($query);
   while($row = mysql_fetch_object($result)){
   	$desc = explode('<div class="icontent">', $row->article_content);
   	$desc2 = preg_replace('/\n|\r/', ' ', $desc[1]);
   	$desc2 = mysql_real_escape_string(strip_tags($desc2));
   	$desc2 = preg_replace('/[^a-zA-Z0-9@\.\']/', ' ', $desc2);
   	$desc2 = preg_replace('/0-9\./', ' ', $desc2);
   	$desc2 = mysql_real_escape_string($desc2);
   	$desc2 = preg_replace('/ +/', ' ', $desc2);
	$sql = "UPDATE articles SET article_strip = '".$desc2."' WHERE ID = ".$row->ID.";";
	mysql_query($sql) or die('error');
   	echo "Done".$row->ID."!\n";
   }
   }
  
  ?>
