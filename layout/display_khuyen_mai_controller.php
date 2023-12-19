<?php
// controller.php: Logic xử lý dữ liệu và gọi view

include 'connect.php';
include 'display_khuyen_mai_model.php';

$promoModel = new PromoModel($conn);
$allPromotions = $promoModel->getAllPromotions();

include 'view/display_khuyen_mai.php';
?>
