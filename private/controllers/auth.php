<?php

class Auth
{
    function check_is_Logged() {
        // session_start();
        return isset($_SESSION['name']);
        // if (isset($_SESSION['name'])) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    function login() {
        
    }
   
}
