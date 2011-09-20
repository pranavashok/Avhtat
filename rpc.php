<p id="searchresults">
<?php
   $count =0;
   // PHP5 Implementation - uses MySQLi.
   // mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
   require_once("config.php");
   $db = mysql_connect($host, $db_user, $db_password);
   mysql_select_db($db_name, $db);
   if(!$db) {
      // Show error if we cannot connect.
      echo 'ERROR: Could not connect to the database.';
   } else {
      // Is there a posted query string?
      if(isset($_POST['queryString'])) {
         $queryString = mysql_real_escape_string($_POST['queryString']);

         // Is the string length greater than 0?
         if(strlen($queryString) >0) {
            $query = mysql_query("SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_title LIKE '%".$queryString."%' UNION SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_tags LIKE '%".$queryString."%' UNION 
SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_strip LIKE '% ".$queryString." %' OR article_strip LIKE '% ".$queryString.".%' ORDER BY `article_type` DESC LIMIT 8");
	    //echo mysql_num_rows($query);
	    if(mysql_num_rows($query) < 4){
	    	$query = mysql_query("SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_title LIKE '%".$queryString."%' UNION SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_tags LIKE '%".$queryString."%' UNION 
SELECT article_type, article_title, article_strip, article_hash FROM articles WHERE article_strip LIKE '%".$queryString."%' ORDER BY `article_type` DESC LIMIT 8");
}
            if($query) {
               // While there are results loop through them - fetching an Object.

               // Store the category id
               $category = "";
               while ($result = mysql_fetch_object($query)) {
                  if($result->article_type != $category) { // check if the category changed
                     echo '<span class="category">'.$result->article_type.'</span>';
                     $category = $result->article_type;
                  }
                     echo '<a href="#!'.$result->article_hash.'">';
                     echo '<img src="styles/images/search_thumbs/'.$result->article_hash.'.jpg" alt="" />';
                     
                     $title = $result->article_title;
                     if(strlen($title) > 35) { 
                        $title = substr($title, 0, 35) . "...";
                     }                     
                     echo '<span class="searchheading">'.$title.'</span>';
                     
                     $description = strip_tags($result->article_strip);
                     $pos = strpos($description, $queryString);
                     if(strlen($description) > 100) { 
                        $min = $pos-10;
                        if($min<0) $min=0;
                        else if($min+100 > strlen($description)) $min= $pos-100;
                        $description = substr($description, $min, 100);
                        $min = strpos($description, " ");
                        $max = strrpos($description, " ");
                        $description = substr($description, $min, $max-$min);
                        $description = preg_replace('/'.$queryString.'/', '<strong>'.$queryString.'</strong>', $description);
                     }
                     
                     echo '<span>'.$description.'...</span></a>';
                  }
                  echo '<span class="seperator"></span><br /><br />';
            } else {
               echo 'ERROR: There was a problem with the query.';
            }
         } else {
            // Dont do anything.
         } // There is a queryString.
      } else {
         echo 'There should be no direct access to this script!';
      }
   }
?>
</p>
