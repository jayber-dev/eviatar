<!DOCTYPE html>
<html lang="en">
    <?php
    require ('./layout/_head.php');
    ?>
<body>
    <?php
    // include ('./partials/_navbar.php') 
    include ('./layout/_body.php')
    ?>
    <div class="banner">
        <?php

        session_start();
        include "../utilities/connect.php";
        
        ?>
        <form action="/store/views/login.php" method="post">
            <div class="error-message">
                <?php
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
                ?>
            </div>
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Submit">
        </form>

        <a href="/store/index.php" class="home-button">Back to Home</a>
    </div>
</body>
</html>
