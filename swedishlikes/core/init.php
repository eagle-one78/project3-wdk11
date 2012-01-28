<?php

/*****************************************************
 *      @DESC       :   init.php Project3-WDK11
 *      @AUTHOR     :   Sam Almendwi
 *      @Copyright  :   This program is only for use and learn not for sale or modify by others than me. 
 *      
 *      Information :   Initiate session_start
 *                      Including files
 *                      Create a new user (instans) of User.class.php
 *                      Preforming register form validation* 
 ****************************************************/

    session_start();
    include ('include/User.class.php');
    $user = new User();       
    
    include ('include/form_validation.php');
    include ('func/article_function.php');
    include ('include/insert_article.php');
    include ('func/get_articles.php');
    include ('func/like.php');
    include ('func/user.php');
    include ('include/add_user.php');
//    include ('func/update_user.php');
?>