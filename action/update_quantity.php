<?php
// update_quantity.php

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Function to sanitize input (to prevent SQL injection)
    function sanitize_input($input) {
        return intval($input);
    }

    // Get the laptop ID and new quantity from the POST data
    $laptop_id = sanitize_input($_POST['laptop_id']);
    $quantity = sanitize_input($_POST['quantity']);

    // Update the quantity in the shopping cart table
    $sql = "UPDATE shopping_cart SET quantity = $quantity WHERE laptop_id = $laptop_id";
    $result = $conn->query($sql);

    // Check if the update was successful
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }

    $conn->close();
}
?>
