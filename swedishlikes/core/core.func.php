<?php
    include 'init.php';
    $articles = get_articles();
    if (count($articles) == 0) {
        echo "Sorry, there are no articles!";
    } 
    else {        
        foreach ($articles as $article) {
            $article_title = $article['article_title'];
            $article_id = $article['article_id'];
            $article_likes = $article['article_likes'];
            echo $article_title.$article_id.$article_likes;
        }        
    }
?>          