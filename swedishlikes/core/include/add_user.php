<?php

/***********************************************
 *      @Author: Sam ALmendwi
 *      @DESC: add_user.php 
 * 
 *      Create and add new user to the database
 **********************************************/

    include_once ('./core/func/user.php');
    
    // Register form-validation and initation of user registeration   
    if(isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['url'])){
        $errors = array();
        if( !isValid( 'name', $_POST['name'] ) ) {
            $errors[] = 'Ogiltigt namn!';
        }

        if( !isValid( 'username', $_POST['username'] ) ) {
            $errors[] = 'Användarnamn måste vara minst 5 tecken långt samt skall innehålla endast bokstäver, siffror och understreck!';
        }

        if(isset($_POST['password'] , $_POST['password2']) && $_POST['password'] != $_POST['password2']){
            $errors[] = 'Lösenorden måste vara lika!';
        }
            if( !isValid( 'password', $_POST['password'] )) {
            $errors[] = 'Lösenord måste vara minst 8 tecken lång och måste ha minst en varsal, en gemen bokstav, och en siffra!';
        }
        

        if( !isValid( 'email', $_POST['email'] ) ) {
            $errors[] = 'Please enter a valid email address!';
        }

        if( !isValid( 'url', $_POST['url'] ) && $_POST['url'] != null ) {
            $errors[] = 'Please enter a valid website address!';
        }

        if ($_POST['url'] == null){
            isValid ('url', $_POST['url']);
        }

        if( !empty($errors) ) {
            foreach( $errors as $e ){ 
                    echo $e."<br />";//catch by ajax in the right tag
            }
        }
        else{
            if(previously_added($_POST['username'], $_POST['email'])){
                echo '<div class="message">Användarnamn och/eller email redan upptagen!';         
            }
            else{
                $user->register_user($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['url']);                                    
                // Registration Success
                //echo "success";     //catch by ajax  
            }
        }                                                           
    }  
?>