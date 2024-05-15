<?php
    session_start();
    if(isset($_SESSION['name'])){?>
        <div class="container">
            <p class="welcome-text">Hello <?php echo $_SESSION['name']?></p>
            <div class="button-container">
                <a class="button" href="logout.php">Logout</a>
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){ ?>
                    <a class="button" href="admin.php">Admin Panel</a>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <div class="button-container">
                <a class="button" href="login.php">Login</a>
                <a class="button" href="register.php">Register</a>
            </div>
        </div>
    <?php } ?>