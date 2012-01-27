<?php
/****************************************************************************************************
 *      @DESC       :   user.php Project3-WDK11
 *      @AUTHOR     :   Sam Almendwi
 *      @Copyright  :   This program is only for use and learn not for sale or modify by others than me. 
 * 
 ***************************************************************************************************/

    
    
    function previously_added($username, $email){//checks if the users already registrated        
        return (mysql_result(mysql_query("SELECT COUNT(uid) FROM users 
        WHERE email = '{$email}' AND username = '{$username}'")  , 0) == 0)? false : true;              
    }
    
    function user_count(){//User count to make user statistics        
        return (int)mysql_result(mysql_query("SELECT COUNT(uid) FROM users"), 0);
    }  
?>