<!DOCTYPE html>
<html lang="en">
<?php
        require('./layout/_head.php');
    ?>


<div class="banner">
    <?php
    session_start();
    include "../utilities/connect.php";
    if(isset($_POST['username'])){
        $sql = "INSERT INTO users (user_name, password, first_name) VALUES ('{$_POST['username']}', '{$_POST['password']}', '{$_POST['first_name']}')";
        if ($mysqli->query($sql) === TRUE) {
            $_SESSION['name'] = $_POST['first_name'];
            header('Location: /store/index.php');
          } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
          }
          
          $mysqli->close();
    }
    ?>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <input type="submit" value="Submit">
    </form>

    </div>
    
</body>
</html>
