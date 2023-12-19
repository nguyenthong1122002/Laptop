<?php 
include 'connect.php';
            $sql = "SELECT `order_id`,`user_id`,`order_date`,`total_amount`,`promotion_code_id`,`user_name`,`user_address`,`payment_method`,`message`,`order_status` FROM `orders`";
            $result = $conn->query($sql);

?>