<?php
/*******************************************************************
 *      @DESC       :   login.php
 *      @Author     :   Sam Almendwi
 *      @Copyright  :   This program is only for use and learn not for sale or modify by others than me.
 * 
 *      Information :   Gets the user information
 *                      Gets the content of the information for registrated users.
 ******************************************************************/
    include ('core/init.php');
    $uid = $_SESSION['uid']; 
    include ('core/func/update_user.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SWEDISH LIKES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Swedish like buttons for Swedish likes"/> 
        <meta name="keywords" content="Swedish likes, likes, like buttons, buttons, Swedish"/>
        <link type="text/css" rel="stylesheet" href="css/homestyle.css"/>
        <link type="text/css" rel="stylesheet" href="css/menu.css"/>
        <script type="text/javascript" src="js/jquery_mini1-7-1.js"></script>
        <script type="text/javascript" src="js/paginator_pager.js"></script>
        <script type="text/javascript" src="js/pagerScript.js"></script>
        <script type="text/javascript" src="js/menuScript.js"></script>
        <script type="text/javascript" src="js/form_script.js"></script>
        <script type="text/javascript" src="js/like.js"></script>    
        <title>SWEDISH LIKES</title>	
    </head>
    
    <body>
        <div id="container">
            <div id="header">  
                <div id="login_system">                    	
                    <div id="user_name">Hej <?php $user->get_fullname($uid);?></div>
                    <a id="logout" href="?quit=logout">Logga ut</a>
                    <a id="update_profile">Ändra profil</a>
                </div>    
                
                <?php
                    if (!$user->get_session()){
                       header("location:index.php");
                    }
                    if (isset ($_GET['quit']) && $_GET['quit'] == 'logout'){
                        $user->user_logout();
                        header("location:index.php");
                    }         
                ?>
                
                <div id="site_title">
                    <h1><a href="login.php">SWEDISH LIKES</a></h1>
                </div>                
            </div>  
            
            
            <div id="wrapper">
                <div id="page_menu">
                    <div id="all">
                        <ul id="jsddm">
<!--                            <li><a href="#">Kategorier</a>
                                <ul>
                                    <li><a href="#">IT & Datorer</a></li>
                                    <li><a href="#">Fordon</a></li>
                                    <li><a href="#">Hem & trädgård</a></li>
                                    <li><a href="#">Politik</a></li>
                                </ul>
                            </li>-->
                            <li><a>Artiklar</a>
                                <ul>
                                    <li><a>Top tio</a></li>
                                    <li><a id="new_article">Ny artikel</a></li>
                                    <li><a>Mina artiklar</a></li>
                                    <li><a>Gjorda likes</a></li>
                                    <li><a>Mina likes</a></li>
                                </ul>
                            </li>
                            <li><a>Blogg</a></li>
                            <li><a>Om SWLS</a></li>
                            <li><a href="login.php">Start</a></li>
                        </ul>
                        <div class="clear"> </div>
                    </div>            
                </div>
                
                <div id="article_form">
                    <form id="article_insert_form" action="" method="post">
                        <p><label>Artikel titel:</label><input type="text" name="article_title" required="required"/></p>
                        <p><label>Artikel text:</label><textarea name="article_text" cols="30" rows="5" required="required"></textarea></p>
                        <p><button type="submit" id="article_submit" name="skicka" value="Skicka">Skicka</button></p>
                        <p><button type="reset" id="reset" name="reset" value="rensa">Stäng</button></p>
                    </form>
                </div>
                <div id="update_form">
                    <form method="POST" action="" id="update_form" name="update_form">                    
                        <div id="profile_update">Ändra profil</div> 
                        <p>Ändra lösenord</p><input type="password" name="change_password"/>
                        <p>Upprepa lösenord</p><input type="password" name="change_password2"/>
                        <p>E-post</p><input type="email" name="change_email" id="email"/>
                        <p>Upprepa E-post</p><input type="email" name="change_email2" id="email2"/>
                        <p>Webbsida</p><input type="text" name="change_url" id="url"/>
                        <button id="update_btn" type="submit" name="update_btn" value="Updatera">Spara</button>
                        <button type="reset" id="update_reset" name="reset" value="rensa">Avbryt</button>
                        <div id="back"><a href="index.php">Tillbaka till Medlemssidan</a></div>                  
                    </form>                     
                </div>
                
                <div id="pagingControls"></div>
                <div id="content">
                    <?php                        
                        $articles = get_articles();
                        if(count($articles) == 0){
                            echo "Sorry, there are no articles!";
                        }
                        else{
                            echo '<ul class="articles">';
                            foreach($articles as $article){
                               echo '<li class="articleLi"><p class="articleTitle">', $article['article_title'], '</p><div class="article_text">',$article['article_text'],'</div><p><a class="likes" data-article-id=',$article['article_id'],'>Like</a> 
                                   <div class="message',$article['article_id'],'"></div><div class="likesamount"><span id="article_',$article['article_id'],'_likes">',$article['article_likes'],'</span> Likes</div></p><div class="article_username">',$article['username'],'</div><div class="article_time">',$article['datetime'],'</div></li>'; 
                            }
                            echo '</ul>';
                        }
                    ?>                
                </div>            
            </div>              

            <div id="footer">
                <div id="statistics">
                    <p id="user_amount">Registrerade användare: <?php echo user_count()?></p> 
                    <p id="article_amount">Artiklar totalt: <?php echo article_amount()?></p>
                    <p id="like_amount">Likes totalt: <?php echo like_amount()?></p>
                </div>
                <div id="footer_info">
                    <p>&COPY;TDSS <a href="http://www.tdss.se" id="tdss_link" target="_blank">The Daily Solutions Sweden</a>&nbsp;2012</p>
                </div>
            </div>            
       </div>
    </body>
</html>