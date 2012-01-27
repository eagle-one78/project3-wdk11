<?php
/****************************************************************************************************
 *      @DESC: like_get.php Project3-WDK11
 *      @AUTHOR: Sam Almendwi
 *      @Copyright: This program is only for use and learn not for sale or modify by others than me.
 *      @Information: Gets likes from the likes table if the IF-statement checks out
 *        by using the function like_count().
 * 
 ***************************************************************************************************/
    
    include '../core/init.php';
    
    if(isset($_POST['article_id'], $_SESSION['uid']) && article_exists($_POST['article_id'])){
        echo like_count($_POST['article_id']);
    }
    
?>
