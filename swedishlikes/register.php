<?php
    include 'core/init.php';    
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="js/jquery1-7-1.js"></script>
        <script type="text/javascript" src="js/regloginScript.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type="text/css" rel="stylesheet" href="css/login_style.css"/>	
    </head>
    
    <body>        
        <form method="POST" action=""  id="register_form" name="reg">                    
            <div id="new_user">Jag är ny här!</div>                 
            <label>Namn:</label>
            <input type="text" name="name"  required="true"/>
            <label>Användarnamn:</label>
            <input type="text" name="username"  required="true"/>
            <label>Lösenord:</label>
            <input type="password" name="password" required="true"/>
            <label>Upprepa lösenord:</label>
            <input type="password" name="password2" required="true"/>
            <label>E-post:</label>
            <input type="text" name="email" id="email"  required="true"/>
            <label>Webbsida:</label>
            <input type="text" name="url" id="url"/>
            <button type="submit" name="register_btn" value="Registrera">Registrera</button>
            <div id="vip"><a href="index.php">Redan medlem? Logga in här!</a></div>                  
        </form>               
    </body>
</html>