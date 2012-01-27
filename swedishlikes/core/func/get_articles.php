<?php
    function get_articles() {
        $articles = array();

        $articlesQuery = "SELECT * FROM articles";
        $articlesResult = mysql_query($articlesQuery) or die(mysql_error());

        while (($articlesRow = mysql_fetch_assoc($articlesResult)) !== false) {
            $articles[] = array(
                "article_id" => $articlesRow['article_id'],
                "article_title" => $articlesRow['article_title'],
                "article_text" => $articlesRow['article_text'],
                "username" => $articlesRow['username'],
                "datetime" => $articlesRow['datetime'],
                "article_likes" => $articlesRow['article_likes']
            );
        }
        return $articles;
    }  
    
    function article_amount(){        
        return (int)mysql_result(mysql_query("SELECT COUNT(article_id) FROM articles"), 0);
    }  
?>