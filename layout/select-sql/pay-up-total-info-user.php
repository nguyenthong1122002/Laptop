<?php 

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
?>