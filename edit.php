<!DOCTYPE html>
<html lang="en">
<?php
        require('./views/layout/_head.php')
    ?>
<body>
<div class="banner">
<div class="container">
    <?php
    include "cheakadmin.php";
    include $_SERVER['DOCUMENT_ROOT']. "./store/utilities/connect.php";
    if(isset($_POST['prname'])){
        $sql = "UPDATE products SET product_name = '{$_POST['prname']}', description = '{$_POST['des']}', price = '{$_POST['price']}', stock = '{$_POST['stock']}' WHERE id = {$_GET['product']}";
        if ($mysqli->query($sql) === TRUE) {
            header('Location: admin.php');
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        
        $mysqli->close();
    }

    if(isset($_GET['product'])){
        $id = $_GET['product'];
        $sql = "SELECT * FROM products where id = $id";
        $result = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $description = $row['description'];
        $price = $row['price'];
        $stock = $row['stock'];
        ?>
        <form action="edit.php?product=<?php echo $id?>" method="post">
            <p>Product id: <?php echo $id?></p>
            <input type="text" name="prname" value="<?php echo $product_name?>">
            <input type="text" name="des" value="<?php echo $description?>">
            <input type="number" name="price" value="<?php echo $price?>">
            <input type="number" name="stock" value="<?php echo $stock?>">
            <input type="submit" value="Submit">
            <div class="nav-buttons">
                <a class="nav-button" href="admin.php">Back to Admin Panel</a>
                <a class="nav-button" href="index.php">Back to Home</a>
            </div>
        </form>
    <?php }
    else{
        header("Location: admin.php");
    }
    ?>
</div>
</div>
</body>
</html>
