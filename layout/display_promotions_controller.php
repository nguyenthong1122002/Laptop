<?php
// controller.php: Logic xử lý dữ liệu và gọi view

include 'connect.php';

$sql = "SELECT * FROM promotions";
$result = $conn->query($sql);

include 'view/display_promotions.php';
?>
