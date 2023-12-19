<?php
// controller.php: Logic xử lý dữ liệu và gọi view

include 'connect.php';
$sqldisplay_user = "SELECT * FROM users WHERE type = 'user'";
$resultdisplay_user = $conn->query($sqldisplay_user);

include 'view/display_users.php';
?>
