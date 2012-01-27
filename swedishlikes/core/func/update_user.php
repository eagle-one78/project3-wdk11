<?php
//inte klar

function update_user($info){//update users information on demand        
        $uid = $_SESSION['uid'];
        
        
        if($info == $_POST['password'] && $_POST['password'] == $_POST['password2']){
            $password = $_POST['password'];
            $password = md5($password);
            mysql_query("UPDATE users SET password = '{$password}' WHERE uid = '{$uid}'");            
        }
        if($info == $_POST['email'] && $_POST['email'] == $_POST['email2']){
            $email = $_POST['email'];
            mysql_query("UPDATE users SET email = '{$email}' WHERE uid = '{$uid}'");      
        }
        
        if($info == $_POST['url']){
            $url = $_POST['url'];
            mysql_query("UPDATE users SET url = '{$url}' WHERE uid = '{$uid}'");      
        }
        return $info;
   }
   
   if(isset($_SESSION['uid'], $_POST['old_password'], $_POST['password'], $_POST['password2'])){
       $old_password = $_POST['old_password'];
       $origin_password = old_pass($origin_password);
       if ($origin_password === $old_password){
            update_user($_POST['password']);           
       }
   }
   if(isset($_SESSION['uid'], $_POST['old_password'], $_POST['email'], $_POST['email2'])){
       $old_password = $_POST['old_password'];
       $origin_password = old_pass($origin_password);
       if ($origin_password === $old_password){
            update_user($_POST['email']);           
       }
   }
   
   if(isset($_SESSION['uid'], $_POST['old_password'], $_POST['url'])){
       $old_password = $_POST['old_password'];
       $origin_password = old_pass($origin_password);
       if ($origin_password === $old_password){
            update_user($_POST['url']);           
       };
   }   
   
    function old_pass($origin_password){
        $uid = $_SESSION['uid'];        
        $query= "SELECT password FROM users WHERE uid = '{$uid}'";
        $result = mysql_query($query) or die (mysql_error());
        $row = mysql_fetch_assoc($result);
        $origin_password = $row['password'];      
        echo $origin_password;
    }
    
//    function uppdate_user($uid,$password,$email, $url){//update users information on demand
//        $password = md5($password);
//        $uid = $_SESSION['uid'];
//        mysql_query("UPDATE users SET password = '{$password}', email = '{$email}', url='{$url}' WHERE uid = {$uid}");
//    }   
?>
