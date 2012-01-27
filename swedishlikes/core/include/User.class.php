<?php

/*
 *@desc has the classes and functions that have to do with the registration and login issius
 *@Author   Sam Almendwi
 */

    include_once 'DB.class.php';

class User {

    public function __construct() 
    {
        $db = new DB();
    }


    public function register_user($name, $username, $password, $email, $url){ 

        /*
             * For example if you want to get email value. Just include the following function inside class User{} 
             * public function get_email($uid) 
             *  
             * {
             * $result = mysql_query("SELECT email FROM users WHERE uid = $uid");
             * $user_data = mysql_fetch_array($result);
             * echo $user_data['e
             * mail'];
             * }
        */

        $password = md5($password);

        $sql = mysql_query("SELECT uid from users WHERE username = '$username' or email = '$email'");
        $no_rows = mysql_num_rows($sql);

        if ($no_rows == 0){
            $result = mysql_query("INSERT INTO users(username, password, name, email, url) values ('$username', '$password','$name','$email', '$url')") or die(mysql_error());
            return $result;
        }
        else{
            return FALSE;
        }
    }

    public function check_login($emailusername, $password){
        $password = md5($password);

        $result = mysql_query("SELECT uid from users WHERE email = '$emailusername' or username='$emailusername' and password = '$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);

        if ($no_rows == 1){             
           $_SESSION['uid'] = $user_data['uid']; 
           $_SESSION['login'] = true; 
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function get_fullname($uid){
        $result = mysql_query("SELECT name FROM users WHERE uid = $uid");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }


    public function get_session(){   
        if(isset ($_SESSION['login'])){
            return $_SESSION['login'];
        }

    }

    public function user_logout(){
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
}
?>