<?php
session_start();
if(isset($_SESSION['admin'])){
    if($_SESSION['admin'] != 1){
        header("Location: index.php");
    }
}
else{
    header("Location: index.php");
}
