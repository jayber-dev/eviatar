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
        include "../utilities/connect.php";
        if(isset($_POST['username'])){
            $userName = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE user_name = '$userName' and password = '$password'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_num_rows($result);
            if($row == 1){
                $name_rows = mysqli_fetch_assoc($result);
                $_SESSION['name'] = $name_rows['first_name'];
                $_SESSION['admin'] = $name_rows['is_admin'];
                
                header("Location: /store/index.php");
            }
            else{
                echo "Wrong password";
            }
        }
    }
   
}

