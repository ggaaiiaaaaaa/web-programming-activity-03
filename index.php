<?php
$product_name = $category = $price = $stock_quantity = $expiration_date = $status = "";
$product_name_error = $category_error = $price_error = $stock_error = $expiration_error = $status_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $product_name = trim(htmlspecialchars($_POST["product_name"]));
    if(empty($product_name)){
        $product_name_error = "Product name is required";
    }

    $category = trim(htmlspecialchars($_POST["category"]));
    if(empty($category)){
        $category_error = "Category is required";
    }

    $price = trim($_POST["price"]);
    if (empty($price)) {
        $price_error = "Price is required";
    } elseif (!is_numeric($price)) {
        $price_error = "Price must be a number";
    } elseif ($price <= 0) {
        $price_error = "Price must be greater than zero";
    }

    $stock_quantity = trim($_POST["stock_quantity"]);
    if (empty($stock_quantity)) {
        $stock_error = "Stock quantity is required";
    } elseif (!is_numeric($stock_quantity)) {
        $stock_error = "Stock quantity must be a number";
    } elseif ($stock_quantity < 0) {
        $stock_error = "Stock quantity cannot be negative";
    }

    $expiration_date = trim($_POST["expiration_date"]);
    if (empty($expiration_date)) {
        $expiration_error = "Expiration date is required";
    } elseif (strtotime($expiration_date) < strtotime(date("Y-m-d"))) {
        $expiration_error = "Expiration date cannot be in the past";
    }

    if (isset($_POST["status"])) {
        $status = $_POST["status"];
    } else {
        $status_error = "Status is required";
    }

    if (empty($product_name_error) && empty($category_error) && empty($price_error) &&
        empty($stock_error) && empty($expiration_error) && empty($status_error)) {
        header("Location: redirect.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Handling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Difference between GET and POST -->
<!-- GET: Appends the data to the url
     POST: Sends data in the request body -->
    <form action="" method = "post">
        <label>Product Name:</label><br>
        <input type="text" name="product_name"><br>
        <p style="color: red; margin: 0;"><?php echo $product_name_error; ?></p>

        <label>Category: </label><br>
        <select name="category">
            <option value="">--- Select Category ---</option>
            <option value="Category A">Category A</option>
            <option value="Category B">Category B</option>
            <option value="Category C">Category C</option>
            <option value="Category D">Category D</option>
        </select><br>
        <p style="color: red; margin: 0;"><?php echo $category_error; ?></p>

        <label>Price (&#8369;):</label><br>
        <input type="number" name="price" step="0.01"><br>
        <p style="color: red; margin: 0;"><?php echo $price_error; ?></p>

        <label>Stock Quantity:</label><br>
        <input type="number" name="stock_quantity" min="0"><br>
        <p style="color: red; margin: 0;"><?php echo $stock_error; ?></p>

        <label>Expiration Date:</label><br>
        <input type="date" name="expiration_date"><br>
        <p style="color: red; margin: 0;"><?php echo $expiration_error; ?></p>

        <label>Status:</label><br>
        <input type="radio" name="status" value="active" 
        <?php if($status=="active") echo "checked";?>> Active<br>
        <input type="radio" name="status" value="inactive"
        <?php if($status=="inactive") echo "checked"; ?>> Inactive<br>
        <p style="color: red; margin: 0;"><?php echo $status_error; ?></p>

        <input type="submit" value="Save Product"><br>
    </form>
</body>
</html>