<?php
/*******************************************************************
 *      @DESC: index.php
 *      @Author: Sam Almendwi
 *      @Copyright: This program/code is only for use and learn not for sale or modify by others than me.
 * 
 *      Gets the Main page information
 *      User login & registration area
 *      Gets the content of the information for unregistrated users
 ******************************************************************/
    include 'core/init.php';    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Swedish like buttons for Swedish likes"/> 
        <meta name="keywords" content="Swedish likes, likes, like buttons, buttons, Swedish" />
        <link type="text/css" rel="stylesheet" href="css/login_style.css"/>
        <link type="text/css" rel="stylesheet" href="css/menu.css"/>
        <title>SWEDISH LIKES | Login</title>	      
        <script type="text/javascript" src="js/jquery1-7-1.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/form_validation.js"></script>
        <script type="text/javascript" src="js/form_script.js"></script>
        <script type="text/javascript" src="js/menuScript.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="login_system">
                    <form id="login_form" method="POST" action="" name="login">                    
                        <label>Användarnamn</label>
                        <input type="text" name="emailusername"  required="required"/>
                        <label>Lösenord</label>
                        <input type="password" name="password" id="password" required="true"/>
                        <input type="hidden" name="flag" value="login"/>
                        <button type="submit" name="login_btn" value="Login"/>Loggin</button>                     
                    </form>	
                    <div id="register_area">
                        <p><a id="register_link">Registrera nytt konto</a></p>
                        <p><a id="pass_reminder" href="#">Glömt lösen?</a></p>
                        <div id="login_check"> <!-- ändra css!!-->
                                <?php 
                                    if ($user->get_session()) {
                                        header("location:login.php");
                                    }
                                    if (ISSET($_POST['emailusername'], $_POST['password'])) {
                                        
                                        $login = $user->check_login($_POST['emailusername'], $_POST['password']);
                                        
                                        if ($login) {// Login Success
                                            header("location:index.php");
                                        } else {// Login Failed                                    
                                            echo '<div id="loginMSG">Invalid login! please try again!</div>';
                                        }
                                    }
                                ?>
                       </div>
                    </div>
                </div>            

                <div id="site_title">
                    <h1><a href="login.php">SWEDISH LIKES</a></h1>
                </div>      
            </div>  
            
            <div id="wrapper">
                <div id="page_menu">
                    <div id="all">
                        <ul id="jsddm">
                            <li><a href="#">Blogg</a></li>
                            <li><a href="#">Om oss</a></li>
                            <li><a href="login.php">Start</a></li>
                        </ul>
                        <div class="clear"> </div>
                    </div>            
                </div>
                <div id="reg_message"></div>
                <div id="content">                    
                    <form method="POST" action=""  id="register_form" name="register_form">                    
                        <div id="new_user">Jag är ny här!</div>
                        <div class="reg_message"></div>                        
                        <p>Namn</p><input type="text" name="name"  required="true" class="required"/>                        
                        <p>Användarnamn</p><input type="text" name="username"  required="true"/>
                        <p>Lösenord</p><input type="password" name="password" required="true"/>
                        <p>Upprepa lösenord</p><input type="password" name="password2" required="true"/>
                        <p>E-post</p><input type="email" name="email" id="email"  required="true" class="required email"/>
                        <p>Webbsida</p><input type="text" name="url" id="url"/>
                        <button id="register_btn" type="submit" name="register_btn" value="Registrera">Registrera</button>
                        <button type="reset" id="reg_reset" name="reset" value="rensa">Stäng</button>
                        <div id="vip"><a href="index.php">Redan medlem? Logga in här!</a></div>                  
                    </form>              
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
        </div>
    </body>
</html>