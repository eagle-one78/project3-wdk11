<?php
/****************************************************************************************************
 *      @DESC: article_function.php Project3-WDK11
 *      @AUTHOR: Sam Almendwi
 *      @Copyright: This program is only for use and learn not for sale or modify by others than me. 
 *      @Information: Inserts articles to the database articles tabel 
 *       using getTime() and get_user() functions 
 * 
 ***************************************************************************************************/

    function insert_articles($uid) {
        $username = get_user($uid);        
        $datetime = getTime();
        $articles_insertQuery =("INSERT INTO articles (article_title, article_text, username, datetime) 
                VALUES('{$_POST['article_title']}', '{$_POST['article_text']}', '$username', '$datetime')");
        mysql_query($articles_insertQuery) or die(mysql_error());    
    } 
    
    function get_user($uid){        
        $query = "SELECT username FROM users WHERE uid = '{$uid}'";
        $result = mysql_query($query) or die (mysql_error());
        while (($user_row = mysql_fetch_assoc($result)) !== false) {
            $username = $user_row['username'];
        }
        return $username;
    }
    
    function getTime(){
		date_default_timezone_set('Europe/Berlin');
		$datetime = date("y-m-d h:i:s");
		return $datetime;
    } 
?>