<!DOCTYPE html>
<html lang="en">
<?php
require('./layout/_head.php')
?>

<body>
    <div class="banner">
        <form action="/store/views/add_product.php" method="POST">
            <label for="product_name"> Product Name
                <input id="product_name" type="text" name="product_name" class="text">
            </label>
            <label for="description"> Description
                <input id="description" type="text" name="description" class="text">
            </label>
            <label for="price"> Price
                <input id="price" type="text" name="price" class="text">
            </label>
            <label for="stock"> Stock
                <input id="stock" type="text" name="stock" class="text">
            </label>
            <input type="submit" class="submit">
        </form>
    </div>
</body>

</html>