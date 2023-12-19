<?php

function getAllPromotionCodes($conn, $totalAmount) {
    $query = "SELECT * FROM ma_khuyen_mai WHERE so_tien_toi_thieu <= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $totalAmount);
    $stmt->execute();
    $result = $stmt->get_result();
    $promotionCodes = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $promotionCodes[] = array(
                'id' => $row['id_ma_khuyen_mai'],
                'ten' => $row['ten_khuyen_mai'],
                'so_tien_khuyen_mai' => $row['so_tien_khuyen_mai']
            );
        }
    }
    return $promotionCodes;
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user name based on user_id
    $user_query = "SELECT username FROM users WHERE user_id = ?";
    $stmt_user = $conn->prepare($user_query);
    $stmt_user->bind_param("i", $user_id);
    $stmt_user->execute();
    $user_result = $stmt_user->get_result();
    $user_name = "";
    if ($user_result && $user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();
        $user_name = $user_row['username'];
    }

    // Fetch items from the shopping cart table for the current user
    $cart_query = "SELECT shopping_cart.user_id, shopping_cart.laptop_id, shopping_cart.quantity, laptops.laptop_name, laptops.price_range 
                    FROM shopping_cart
                    JOIN laptops ON shopping_cart.laptop_id = laptops.id
                    WHERE shopping_cart.user_id = ?";
    $stmt_cart = $conn->prepare($cart_query);
    $stmt_cart->bind_param("i", $user_id);
    $stmt_cart->execute();
    $cart_result = $stmt_cart->get_result();

    if ($cart_result && $cart_result->num_rows > 0) {
        echo "<body>";
        echo "<form class='pay-up' action='/action/process_order.php' method='post'>";
        echo "<table class='pay-up-table'>";

        echo "<tr><th>Tên Laptop</th><th>Giá tiền</th><th>Số lượng</th></tr>";
        $totalAmount = 0;
        while ($cart_row = $cart_result->fetch_assoc()) {
            $laptop_name = $cart_row['laptop_name'];
            $price_range = $cart_row['price_range'];
            $quantity = $cart_row['quantity'];

            echo "<tr>";
            echo "<td>$laptop_name</td>";
            echo "<td>$price_range</td>";
            echo "<td>$quantity</td>";
            echo "</tr>";

            $totalAmount += $price_range * $quantity;
        }
        echo "</table>";

        // Fetch all promotion codes
        $promotionCodes = getAllPromotionCodes($conn, $totalAmount);

        // Calculate and display the total amount before applying any discount
        echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
        echo "<label for='user_name'>Lời nhắn</label>";
        // Text area for messages
        echo "<textarea class='pay-up-input' name='message' placeholder='Lời nhắn'></textarea>";
        echo "<label  for='promotion_code'>Mã khuyến mãi</label>";
        // Promotional code input (dropdown menu)
        echo "<select id='promotion_code'  name='promotion_code'>";
        echo "<option  value=''>Chọn mã khuyến mãi (nếu có)</option>";
        foreach ($promotionCodes as $code) {
            echo "<option value='{$code['id']}'>{$code['ten']} - Giảm {$code['so_tien_khuyen_mai']} VNĐ</option>";
        }
        echo "</select>";

        // User address
        // Assuming the user's address is stored in the 'users' table, adjust the column name accordingly
        $address_query = "SELECT address FROM users WHERE user_id = ?";
        $stmt_address = $conn->prepare($address_query);
        $stmt_address->bind_param("i", $user_id);
        $stmt_address->execute();
        $address_result = $stmt_address->get_result();
        $address = "";
        if ($address_result && $address_result->num_rows > 0) {
            $address_row = $address_result->fetch_assoc();
            $address = $address_row['address'];
        }
        echo "<label for='user_address'>Địa chỉ</label>";
        echo "<input class='pay-up-input' type='text' name='user_address' placeholder='Địa chỉ' value='$address' id='user_address'>";

        // User name (already fetched earlier)
        echo "<label  for='user_name'>Tên người dùng</label>";
        echo "<input class='pay-up-name' type='text' name='user_name' value='$user_name' style='width: 100%;'>";

        // Payment methods dropdown
        echo "<label for='payment_method'>Phương thức thanh toán</label>";
        echo "<select id='payment_method' name='payment_method'>";
        echo "<option id='payment_method_option' value='credit_card'>Thẻ tín dụng</option>";
        echo "<option id='payment_method_option'value='paypal'>PayPal</option>";
        echo "<option id='payment_method_option'value='cash_on_delivery'>Tiền mặt khi nhận hàng</option>";
        echo "</select>";
        echo "<p name='totalAmount' id='total_amount'>Tổng tiền: " . number_format($totalAmount, 0, '', '.') . " VNĐ</p>";
        echo "<button type='submit' class='pay-button'>Thanh toán</button>";
        echo "<a class='back-shopping-cart' href='cart.php'>Quay về giỏ hàng</a>";
        echo "</form>";
        echo "</body>";
    } else {
        echo "<p>Your shopping cart is empty.</p>";
    }
} else {
    echo "<p>User not logged in. Please log in to view the shopping cart.</p>";
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function updateTotalAmount() {
    var selectedPromotionID = $('#promotion_code').val();
    var selectedPromotion = promotionCodes.find(code => code.id == selectedPromotionID);

    var totalAmount = 0;
    $('.pay-up-table tr').each(function (index, row) {
        if (index > 0) { // Skip the header row
            var price_range = parseInt($(row).find('td:nth-child(2)').text());
            var quantity = parseInt($(row).find('td:nth-child(3)').text());
            totalAmount += price_range * quantity;
        }
    });

    if (selectedPromotion) {
        var discountAmount = parseInt(selectedPromotion.so_tien_khuyen_mai);
        var totalAmountAfterDiscount = totalAmount - discountAmount;
        if (totalAmountAfterDiscount < 0) {
            totalAmountAfterDiscount = 0;
        }
        $('#total_amount').text('Tổng tiền: ' + totalAmountAfterDiscount.toLocaleString('vi-VN') + ' VNĐ');
    } else {
        $('#total_amount').text('Tổng tiền: ' + totalAmount.toLocaleString('vi-VN') + ' VNĐ');
    }
}

$(document).ready(function () {
    // Call the updateTotalAmount function on page load
    updateTotalAmount();

    // Call the updateTotalAmount function whenever the promotion code dropdown is changed
    $('#promotion_code').on('change', function () {
        updateTotalAmount();
    });
});

var promotionCodes = <?php echo json_encode(getAllPromotionCodes($conn, $totalAmount)); ?>;
</script>



