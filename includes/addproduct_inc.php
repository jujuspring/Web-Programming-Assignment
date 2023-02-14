<?php
if (isset($_POST["addproduct"])) {
// Connect to DB
require_once 'dbh_inc.php';

// Prepare product information to insert into DB
$product_name = mysqli_real_escape_string($connection, $_POST['prod_name']);
$product_description = mysqli_real_escape_string($connection, $_POST['prod_desc']);
$product_price = mysqli_real_escape_string($connection, $_POST['prod_price']);

// Construct the SQL INSERT statement
$query = "INSERT INTO products (name, description, price) VALUES ('$product_name', '$product_description', '$product_price')";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the insert was successful
if (!$result) {
// Query failed
header("Location: ../addproduct.php?error=add_fail");
exit();
} else {
// Query successful
header("Location: ../shop.php");
exit();
}
// Close the connection
mysqli_close($connection);
}