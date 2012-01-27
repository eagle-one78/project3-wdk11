<?php
    
    function article_exists($article_id){
        $article_id = (int)$article_id;//för att undvika sql-injection i och med man byter värdet till endast int
        return (mysql_result(mysql_query("SELECT COUNT(article_id)FROM articles 
                WHERE article_id = '{$article_id}'"),0)== 0)? false : true;        
    }
    
    function previously_liked($article_id){
        $article_id = (int)$article_id;
        return (mysql_result(mysql_query("SELECT COUNT(like_id) FROM likes 
        WHERE uid = '{$_SESSION['uid']}' AND article_id = $article_id"), 0) == 0)? false : true;              
    }
    
    function like_count($article_id){
        $article_id = (int)$article_id;
        return (int)mysql_result(mysql_query("SELECT article_likes FROM articles 
                WHERE article_id = '{$article_id}'"), 0 , 'article_likes');
    }
    
    function add_like($article_id){
        $article_id = (int)$article_id;
        mysql_query("UPDATE articles SET article_likes = article_likes + 1 WHERE article_id = {$article_id}");
        mysql_query("INSERT INTO likes (uid , article_id) VALUES ('{$_SESSION['uid']}', '{$article_id}')");
    }
    
    function like_amount(){        
        return (int)mysql_result(mysql_query("SELECT COUNT(like_id) FROM likes"), 0);
    }  
?>