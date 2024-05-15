<!DOCTYPE html>
<html lang="en">
<?php
require('./views/layout/_head.php')
?>

<head>
    <script src="./public/js/hello.js"></script>
</head>

<?php
require(__DIR__ . './views/layout/_body.php');
?>
<div class="banner">
    <?php
    require_once('./private/controllers/auth.php');

    $auth = new Auth();
    $isLogged = $auth->check_is_Logged();
    session_start();
    
    if ($auth->check_is_Logged() === true) {
        ?>
        <div class="container">
            <p class="welcome-text">Hello <?php echo $_SESSION['name'] ?></p>
            <div class="button-container">
                <a class="button" href="logout.php">Logout</a>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                    <a class="button" href="admin.php">Admin Panel</a>
                <?php } ?>
            </div>
        </div>
    <?php
    }

    if ($auth->check_is_Logged() === false) {
    ?>
        <div class="container">
            <div class="button-container">
                <a class="button" href="/store/views/login.php">Login</a>
                <a class="button" href="/store/views/register.php">Register</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>

</html>