<?php
include "cheakadmin.php";
include "connect.php";

if(isset($_GET['id'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM products WHERE id=$id" ;
        if ($mysqli->query($sql) === TRUE) {
            header('Location: admin.php');
            exit(); // נוסיף יציאה כדי למנוע ביצועים נוספים לאחר ההפניה
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    } else {
        echo "No product ID provided"; // הודעה אם לא נסרק ID
    }
    
    $mysqli->close();
}
?>
