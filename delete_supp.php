<?php
include "cheakadmin.php";
include "connect.php";

if(isset($_GET['id'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM suppliers WHERE id=$id" ;
        if ($mysqli->query($sql) === TRUE) {
            header('Location: admin.php');
            exit(); 
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    } else {
        echo "No product ID provided"; 
    }
    
    $mysqli->close();
}
?>
