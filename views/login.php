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
        require_once('../private/controllers/auth.php');
        ?>
        <form action="/store/views/login.php" method="post">
            <div class="error-message">
                <?php 
                    $login = new Auth();
                    $login->login();
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
