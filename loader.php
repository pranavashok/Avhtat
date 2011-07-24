<?php
 
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
echo $page;

?>
