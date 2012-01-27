<?php
/****************************************************************************************************
 *      @DESC: insert_article.php Project3-WDK11
 *      @AUTHOR: Sam Almendwi
 *      @Copyright: This program is only for use and learn not for sale or modify by others than me.
 *      @Information: Inserts articles by using the insert_articles() function
 *       and and the IF-statement goes true  
 * 
 ***************************************************************************************************/
    if(isset($_SESSION['uid'], $_POST['article_title'], $_POST['article_text'])){                
        insert_articles($_SESSION['uid']);             
    }
?>
