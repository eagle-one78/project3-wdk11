<?php    
    $uid = $_SESSION['uid'];
    
    if(isset($_SESSION['uid'], $_POST['change_password'], $_POST['change_password2']) && $_POST['change_password'] != $_POST['change_password2']){
        echo "Lösen 1 och 2 är inte samma, försök igen! <br />";
    }
    else if(isset($_SESSION['uid'], $_POST['change_password'], $_POST['change_password2']) && $_POST['change_password'] != "" && $_POST['change_password2'] != "" && $_POST['change_password'] === $_POST['change_password2']){            
        if(isValid('password', $_POST['change_password']) && isValid('password', $_POST['change_password2'])){
            $password = $_POST['change_password'];
            $password = md5($password);
            mysql_query("UPDATE users SET password = '{$password}' WHERE uid = '{$uid}'"); 
            echo "Lösenord ändrat!<br />";            
        }
        else{
            echo "Lösenord måste vara minst 8 tecken, har minst en stor, liten bokstav, och en siffra!<br />";
        }
    }
    
    if(isset($_SESSION['uid'], $_POST['change_email'], $_POST['change_email2']) && $_POST['change_email'] != $_POST['change_email2']){
        echo "Epostadress 1 och 2 är inte samma, försök igen!<br />";
    }

    if(isset($_SESSION['uid'], $_POST['change_email'], $_POST['change_email2']) && $_POST['change_email'] === $_POST['change_email2'] && $_POST['change_email'] != "" && $_POST['change_email2'] != ""){
        if(isValid('email', $_POST['change_email']) && isValid('email', $_POST['change_email2'])){
            $email = $_POST['change_email'];
            mysql_query("UPDATE users SET email = '{$email}' WHERE uid = '{$uid}'");
            echo "E-post ändrad till: ",$_POST['change_email'],"<br />";            
        }
        else{
            echo "VG. skriv en giltig epostadress!<br />";
        }
    }

    if(isset($_SESSION['uid'], $_POST['change_url']) && $_POST['change_url'] != ""){
        if(isValid('url', $_POST['change_url'])){
            $url = $_POST['change_url'];
            mysql_query("UPDATE users SET url = '{$url}' WHERE uid = '{$uid}'");
            echo "Webbsidans adress ändrad till: ",$_POST['change_url'],"<br />";            
        }
        else{
            echo "VG. skriv en giltig webbadress!<br />";
        }
    }
    
    else if (isset($_SESSION['uid'], $_POST['change_password'], $_POST['change_password2'], $_POST['change_email'], $_POST['change_email2'], $_POST['change_url']) 
            && $_POST['change_password'] == "" && $_POST['change_password2'] == "" && $_POST['change_email'] == "" && $_POST['change_email2'] == "" && $_POST['change_url'] == ""){
        echo "Var god och fyll i de fält som skall uppdateras och tryck på spara! <br />Annars tryck på avbryt om du vill avbryta!<br />";
        
    }
?>