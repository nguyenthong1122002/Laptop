<?php

// Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database details
$conn = new mysqli('localhost', 'root', '', 'Agile');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the laptop data (laptop_name, price_range, and image_url) from the database
$sql = "SELECT laptop_name, price_range, image_url,id FROM laptops";
$result = $conn->query($sql);
$productsArray = array();
while ($row = $result->fetch_assoc()) {
    $productsArray[] = $row;
}
include_once 'ProductController.php';
define('SERVER_PATH', 'action/');


?>