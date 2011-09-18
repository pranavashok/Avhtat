<p id="searchresults">
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
      // Is there a posted query string?
      if(isset($_POST['queryString'])) {
         $queryString = mysql_real_escape_string($_POST['queryString']);

         // Is the string length greater than 0?
         if(strlen($queryString) >0) {
            $query = mysql_query("SELECT article_type, article_title, article_content, article_hash FROM articles WHERE article_title LIKE '%" . $queryString . "%' OR article_tags LIKE '%" . $queryString . "%' OR article_content LIKE '%" . $queryString . "%' ORDER BY article_type LIMIT 8");

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
                     echo '<img src="styles/images/aled_lewis.png" alt="" />';
                     
                     $title = $result->article_title;
                     if(strlen($title) > 35) { 
                        $title = substr($title, 0, 35) . "...";
                     }                     
                     echo '<span class="searchheading">'.$title.'</span>';
                     
                     $description = strip_tags($result->article_content);
                     $pos = strpos($description, $queryString);
                     if(strlen($description) > 80) { 
                        $description = substr($description, $pos-10, 70) . "...";
                     }
                     
                     echo '<span>'.$description.'</span></a>';
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
