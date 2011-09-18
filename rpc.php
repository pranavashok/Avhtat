<p id="searchresults">
<?php
   // PHP5 Implementation - uses MySQLi.
   // mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
   require_once("config.php");
   mysql_select_db('tathva11', $db);
   
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
                     
                     $description = $result->article_content;
                     if(strlen($description) > 80) { 
                        $description = substr($description, 0, 80) . "...";
                     }
                     
                     echo '<span>Description of each event comes here and it is less than 80 letters long.</span></a>';
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
