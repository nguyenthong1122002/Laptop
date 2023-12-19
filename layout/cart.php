<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
<header><?php include "header.php"; ?></header>

    <main>
    <?php
    // cart.php
    // Initialize the session (assuming you want to use sessions)
    include 'connect.php';

    // Function to sanitize input (to prevent SQL injection)
    function sanitize_input($input) {
        return intval($input);
    }

    // Check if the user is logged in and get the user_id from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = sanitize_input($_SESSION['user_id']);

        // Fetch distinct items from the shopping cart table for the current user
        $sql = "SELECT DISTINCT shopping_cart.laptop_id, shopping_cart.quantity, laptops.laptop_name, laptops.price_range 
                FROM shopping_cart
                JOIN laptops ON shopping_cart.laptop_id = laptops.id
                WHERE shopping_cart.user_id = $user_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Initialize a variable to keep track of the total price
            $totalPrice = 0;
            echo "<div class='cart-shopping'>";

            echo "<h2 class='gio-hang'>Giỏ Hàng</h2>";
            echo "<table class='cart-shopping'>";
            echo "<tr><th>Tên Laptop</th><th>Giá tiền</th><th>Số lượng</th><th>Xóa</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $laptop_id = $row['laptop_id'];
                $laptop_name = $row['laptop_name'];
                $price_range = $row['price_range'];
                $quantity = $row['quantity'];

                // Tính tổng giá tiền cho sản phẩm hiện tại
                $totalPriceForItem = $price_range * $quantity;
                // Cập nhật giá tiền tổng cộng
                $totalPrice += $totalPriceForItem;

                echo "<tr>";
                echo "<td>$laptop_name</td>";
                echo "<td>$price_range</td>";
                echo "<td>";

                // New div wrapper for quantity-value
                echo "<div class='quantity-wrapper'>";
                echo "<span class='quantity-action-btn-increase' data-laptop-id='$laptop_id' data-action='increase'>+</span> ";
                echo "<span class='quantity-value' data-laptop-id='$laptop_id'>$quantity</span> ";
                echo "<span class='quantity-action-btn-decrease' data-laptop-id='$laptop_id' data-action='decrease'>-</span>";
                echo "</div>";

                echo "</td>";
                echo "<td class='remove-product'><a href='/action/remove_product_cart.php?delete_laptop_id=$laptop_id'><img src='/img/remove_product.jpg' alt='Remove'></a></td>";
                echo "</tr>";
            }
            echo "</table>";

            // Hiển thị tổng giá tiền
            echo "<p id='totalPriceDisplay'>Tổng Tiển: $totalPrice</p>";
            echo "</div>";
        } else {
            echo "<p>Giỏ hàng của bạn đang trống.</p>";
        }
    } else {
        echo "<p>User not logged in. Please log in to view the shopping cart.</p>";
    }
    ?>
        <!-- HTML -->
    <button class="paymentButton" onclick="openmodalpay('cart')">Thanh Toán</button>
    <div id="modal-cart" class="modal-pay">
        <div class="modal-content-pay">
    <?php include 'pay-up.php' ?>
    </div>
</div>
</main>
<footer><?php include "footer.php"; ?></footer>

<script src="/js/cart.js"></script>


</body>
</html>
