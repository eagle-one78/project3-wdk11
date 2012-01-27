<?php

/***************************************************************************************************
 * 	@DESC: like_add.php Project3-WDK11
 *      @AUTHOR: Sam Almendwi
 *      @Copyright: This program is only for use and learn not for sale or modify by others than me.
 *
 * 	function to check the validity of the given string
 * 	$what = what you are checking (URL, email, etc)
 * 	$data = the string you want to check
 **************************************************************************************************/

    function isValid($what, $data) {

        switch ($what) {
    // validate emailaddress:
            case 'email':
                $pattern = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i";
                break;

    // validate username:
            case 'name':
                $pattern = "/^[a-z]+[\w.-]*$/i";
                break;

            case 'username':
                $pattern = "/^[0-9a-zA-Z_]{5,}$/";//User must be bigger that 5 chars and contain only digits, letters and underscore
                break;

    // validate a URL address:
            case 'url':
                $pattern = "/^[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i";   // If you wish to have http:// with: $pattern = "/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i";
                break;

            // Validate Password:
            case 'password':
                $pattern = "/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/"; //Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit
                break;

            default:
                return false;
                break;
        }

        return preg_match($pattern, $data) ? true : false;
    }
?>