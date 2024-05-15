<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="./style/index.css" rel="stylesheet">
    <link href="./imgs/cover.jpg" rel="stylesheet">

    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),url(Cover.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="number"] {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #009688; /* צבע הכפתור */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #009671; /* צבע הכפתור בהעברת העכבר */
        }
        p {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .nav-button {
            background-color: #009688;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* רוחב הקישור */
        }
        .nav-button:hover {
            background-color: #009671;
        }
        .nav-buttons a {
            margin-right: 10px;
        }
    </style> -->
</head>
<body>
<div class="banner">
<div class="container">
    <?php
    include "cheakadmin.php";
    include "connect.php";
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
