<!DOCTYPE html>
<html lang="en">

    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .banner{
            width: 100%;
            min-height: 100vh;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        
     .home-button {
        text-decoration: none;
        color: #fff;
        background-color: #009688;
        padding: 10px 20px;
        border-radius: 4px;
        margin-top: 20px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .home-button:hover {
            background-color: #009671;
        }
        .button {
            display: block;
            text-decoration: none;
            color: #fff;
            background-color: #009688;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
        .home-button:hover {
            background-color: #009671;
        }
    </style> -->
<?php
    require('./views/layout/_head.php');
?>
<?php
    // require('./views/partials/_navbar.php');
    require('./views/layout/_body.php')
?>
<body>
    <div class="banner">
        <div class="container">
            <?php
            require_once('./private/controllers/auth.php');
            $is_admin = new Auth;
            $is_admin->check_is_admin();
            // include "cheakadmin.php";
            include __DIR__. "/private/model/connect.php";
            ?>
            <h2>Product List</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Edit Product</th>
                    <th>Delelte Product</th>

                </tr>
                <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($mysqli,$sql);
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $product_name = $row['product_name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $stock = $row['stock'];
                        ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $product_name ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $stock ?></td>
                            <td><a href="edit.php?product=<?php echo $id?>">Edit</a></td>
                            <td><a href="delete_product.php?id=<?php echo $id ?>">Delete</a></td>
                        </tr>
                    <?php }
                }
                ?>
            </table>
            <a href="/store/views/add_product.php" class="button">Add Product</a>


            <h2>Supplier List</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Supplier Name</th>
                    <th>Supplier ID</th>
                    <th>Edit Supplier</th>
                    <th>Delete Supplier</th>

                </tr>
                <?php
                $sql = "SELECT * FROM suppliers";
                $result = mysqli_query($mysqli,$sql);
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $supplier_name = $row['Supplier_name'];
                        $supplier_id = $row['Supplier_id'];
                        ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $supplier_name ?></td>
                            <td><?php echo $supplier_id ?></td>
                            <td><a href="editSupp.php?Supplier_id=<?php echo $id?>">Edit</a></td>
                            <td><a href="delete_supp.php?id=<?php echo $id?>">Delete</a></td>

                        </tr>
                    <?php }
                }
                ?>
            </table>
            <div class="table-buttons">
                <a href="add_supp.php?id=<?php echo $id?>"class="button">Add Supplier</a>
                <a href="index.php" class="button">Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>
