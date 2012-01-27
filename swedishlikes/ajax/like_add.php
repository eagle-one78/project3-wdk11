<?php
/****************************************************************************************************
 *      @DESC: like_add.php Project3-WDK11
 *      @AUTHOR: Sam Almendwi
 *      @Copyright: This program is only for use and learn not for sale or modify by others than me.
 *      @Information: Adds likes into the likes table if both the IF-statements checks
 *        by using the function previously_liked
 * 
 ***************************************************************************************************/
    include ('../core/init.php');  
    
    if(isset($_POST['article_id'], $_SESSION['uid']) && article_exists($_POST['article_id'])){
        $article_id = $_POST['article_id'];        
        if(!previously_liked($article_id)){
            echo "success";
            add_like($article_id);
        }      
    }
?>