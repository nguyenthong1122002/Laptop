<?php
// add_to_cart.php
session_start();
include 'connect.php';

// Function to sanitize input (to prevent SQL injection)
function sanitize_input($input) {
    return intval($input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['laptop_id']) && isset($_POST['quantity'])) {
        $user_id = sanitize_input($_POST['user_id']);
        $laptop_id = sanitize_input($_POST['laptop_id']);
        $quantity = sanitize_input($_POST['quantity']);

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            $user_id = sanitize_input($_SESSION['user_id']);

            // Verify if the laptop exists with the given ID
            $stmt = $conn->prepare("SELECT * FROM laptops WHERE id = ?");
            $stmt->bind_param("i", $laptop_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Check if quantity is valid (greater than 0)
                if ($quantity > 0) {
                    // Check if the product is already in the shopping cart
                    $stmt = $conn->prepare("SELECT * FROM shopping_cart WHERE user_id = ? AND laptop_id = ?");
                    $stmt->bind_param("ii", $user_id, $laptop_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo '<script>alert("Sản phẩm đã có trong giỏ hàng rồi.");</script>';
                        echo '<script>window.location.href = "/layout/product_details.php?id=' . $laptop_id . '";</script>';
                    } else {
                        // Add the item to the shopping cart table with the user_id
                        $timestamp = date("Y-m-d H:i:s");
                        $stmt = $conn->prepare("INSERT INTO `shopping_cart` (`user_id`, `laptop_id`, `quantity`, `timestamp`) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("iiis", $user_id, $laptop_id, $quantity, $timestamp);

                        if ($stmt->execute()) {
                            // Replace the echo statement with a JavaScript alert
                            echo '<script>alert("Thêm sản phẩm thành công vào giỏ hàng");</script>';
                            // Redirect to the product details page after showing the alert
                            echo '<script>window.location.href = "/layout/product_details.php?id=' . $laptop_id . '";</script>';
                            exit; // Stop further execution to prevent unintended behavior.
                        } else {
                            echo '<script>alert("Thêm sản phẩm thất bại vào giỏ hàng");</script>';
                        }
                    }
                } else {
                    echo '<script>alert("Invalid quantity. Please enter a positive quantity.");</script>';
                }
            } else {
                echo '<script>alert("Laptop with the provided ID does not exist.");</script>';
            }
        } else {
            echo '<script>alert("User not logged in. Please log in to add items to the cart.");</script>';
        }
    }
}
$conn->close();
?>
