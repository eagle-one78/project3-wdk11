<?php    
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        
        if(isset($_POST['change_password'], $_POST['change_password2']) && $_POST['change_password'] != $_POST['change_password2']){
            echo "Lösen 1 och 2 är inte samma, försök igen!";
        }
        else if(isset($_POST['change_password'], $_POST['change_password2']) && $_POST['change_password'] != "" && $_POST['change_password2'] != "" && $_POST['change_password'] === $_POST['change_password2']){            
            $password = $_POST['change_password'];
            $password = md5($password);
            mysql_query("UPDATE users SET password = '{$password}' WHERE uid = '{$uid}'"); 
            echo "Lösenord ändrat!";
        }

        if(isset($_POST['change_email'], $_POST['change_email2']) && $_POST['change_email'] === $_POST['change_email2']){
            $email = $_POST['change_email'];
            mysql_query("UPDATE users SET email = '{$email}' WHERE uid = '{$uid}'");      
        }

        if(isset($_POST['change_url']) && $_POST['change_url'] != ""){
            $url = $_POST['change_url'];
            mysql_query("UPDATE users SET url = '{$url}' WHERE uid = '{$uid}'");
            echo "Webbsidans info uppdaterad!";
        }
    }    
?>