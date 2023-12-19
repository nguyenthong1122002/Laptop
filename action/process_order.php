<?php
// process_order.php

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are provided
    if (
        isset($_POST['user_id']) &&
        isset($_POST['user_name']) &&
        isset($_POST['user_address']) &&
        isset($_POST['payment_method'])
    ) {
        // Get the form data
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_address = $_POST['user_address'];
        $payment_method = $_POST['payment_method'];
        $message = isset($_POST['message']) ? $_POST['message'] : '';
        $promotion_code_id = isset($_POST['promotion_code']) ? $_POST['promotion_code'] : null;

        // Validate and sanitize the form data as needed

        // Calculate the total amount after applying the promotion code, if applicable
        $totalAmount = 0;
        $cart_query = "SELECT shopping_cart.laptop_id, shopping_cart.quantity, laptops.price_range 
                        FROM shopping_cart
                        JOIN laptops ON shopping_cart.laptop_id = laptops.id
                        WHERE shopping_cart.user_id = ?";
        $stmt_cart = $conn->prepare($cart_query);
        $stmt_cart->bind_param("i", $user_id);
        $stmt_cart->execute();
        $cart_result = $stmt_cart->get_result();

        if ($cart_result && $cart_result->num_rows > 0) {
            while ($cart_row = $cart_result->fetch_assoc()) {
                $price_range = $cart_row['price_range'];
                $quantity = $cart_row['quantity'];
                $totalAmount += $price_range * $quantity;
            }
        }

        // If a promotion code is selected, apply the discount to the total amount
        if (!empty($promotion_code_id)) {
            $promotion_query = "SELECT so_tien_khuyen_mai FROM ma_khuyen_mai WHERE id_ma_khuyen_mai = ?";
            $stmt_promotion = $conn->prepare($promotion_query);
            $stmt_promotion->bind_param("i", $promotion_code_id);
            $stmt_promotion->execute();
            $promotion_result = $stmt_promotion->get_result();

            if ($promotion_result && $promotion_result->num_rows > 0) {
                $promotion_row = $promotion_result->fetch_assoc();
                $discountAmount = $promotion_row['so_tien_khuyen_mai'];
                $totalAmount -= $discountAmount;
                if ($totalAmount < 0) {
                    $totalAmount = 0;
                }
            }
        }

        // Get the current date and time for order_date
        $order_date = date('Y-m-d H:i:s');

        // Insert the order details into the database
        $insert_order_query = "INSERT INTO orders (user_id, order_date, total_amount, promotion_code_id, user_name, user_address, payment_method, message, order_status)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')";
        $stmt_insert_order = $conn->prepare($insert_order_query);
        $stmt_insert_order->bind_param("isdissss", $user_id, $order_date, $totalAmount, $promotion_code_id, $user_name, $user_address, $payment_method, $message);
        $is_order_inserted = $stmt_insert_order->execute();

        if ($is_order_inserted) {
            // If the order is successfully inserted, remove the items from the shopping cart
            $delete_cart_items_query = "DELETE FROM shopping_cart WHERE user_id = ?";
            $stmt_delete_cart_items = $conn->prepare($delete_cart_items_query);
            $stmt_delete_cart_items->bind_param("i", $user_id);
            $is_cart_items_deleted = $stmt_delete_cart_items->execute();

            if ($is_cart_items_deleted) {
                echo "<script>alert('Đã đặt hàng thành công');</script>";
                echo "<script>window.location = '/layout/cart.php'; </script>";
                exit;
            } else {
                echo "Failed to clear shopping cart.";
            }
        } else {
            echo "Failed to place the order.";
        }
    } else {
        echo "Missing required fields in the form submission.";
    }
} else {
    echo "Invalid request method.";
}
?>
