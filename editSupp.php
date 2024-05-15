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
    include "connect.php";
    if(isset($_POST['supplier_name'])){
        $sql = "UPDATE suppliers SET Supplier_name = '{$_POST['supplier_name']}', Supplier_id = '{$_POST['supplier_id']}' WHERE id = {$_GET['Supplier_id']}";
        if ($mysqli->query($sql) === TRUE) {
            header('Location: admin.php');
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        
        $mysqli->close();
    }

    if(isset($_GET['Supplier_id'])){
        $id = $_GET['Supplier_id'];
        $sql = "SELECT * FROM suppliers where id = $id";
        $result = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_assoc($result);
        $supplier_name = $row['Supplier_name'];
        $supplier_id = $row['Supplier_id'];
        ?>
        <form action="editSupp.php?Supplier_id=<?php echo $id?>" method="post">
            <p>Supplier ID: <?php echo $id?></p>
            <input type="text" name="supplier_name" value="<?php echo $supplier_name?>">
            <input type="text" name="supplier_id" value="<?php echo $supplier_id?>">
            <input type="submit" value="Submit">
        </form>
        <div class="nav-buttons">
            <a class="nav-button" href="admin.php">Back to Admin Panel</a>
            <a class="nav-button" href="index.php">Back to Home</a>
        </div>
    <?php }
    else{
        header("Location: admin.php");
    }
    ?>
</div>
</div>
</body>
</html>
