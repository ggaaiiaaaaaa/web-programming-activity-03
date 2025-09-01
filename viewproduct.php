<?php
$product_name = htmlspecialchars($_POST["product_name"]);
$category = htmlspecialchars($_POST["category"]);
$price = number_format($_POST["price"], 2);
$stock_quantity = htmlspecialchars($_POST["stock_quantity"]);
$expiration_date = date("M-d-Y", strtotime($_POST["expiration_date"]));
$status = htmlspecialchars($_POST["status"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
</head>
<body>
    <form action="" method="post">
    <label for="">Product Name: <?php echo $_POST["product_name"]; ?></label>
    <label for="">Price: <?php echo $_POST["price"]; ?></label>
    <label for="">Stock Quantity: <?php echo $_POST["stock_quantity"]; ?></label>
    <label for="">Expiration Date: <?php echo $_POST["expiration_date"]; ?></label>
    <label for="">Status: <?php echo $_POST["status"]; ?></label>
    </form>
</body>
</html>