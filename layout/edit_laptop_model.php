<?php
// edit_laptop_model.php

function updateLaptopInfo($conn, $laptop_id, $data) {
    $laptop_name = $_POST['laptop_name'];
    $brand = $_POST['brand'];
    $processor = $_POST['processor'];
    $screen_size = $_POST['screen_size'];
    $graphics_card = $_POST['graphics_card'];
    $ram = $_POST['ram'];
    $storage_capacity = $_POST['storage_capacity'];
    $operating_system = $_POST['operating_system'];
    $weight = $_POST['weight'];
    $status = $_POST['status'];
    $price_range = $_POST['price_range'];
    $image_url = $_POST['image_url'];
    $sql_update = "UPDATE `laptops` SET 
    `laptop_name` = '$laptop_name',
    `brand` = '$brand',
    `processor` = '$processor',
    `screen_size` = '$screen_size',
    `graphics_card` = '$graphics_card',
    `ram` = '$ram',
    `storage_capacity` = '$storage_capacity',
    `operating_system` = '$operating_system',
    `weight` = '$weight',
    `status` = '$status',
    `price_range` = '$price_range',
    `image_url` = '$image_url'
    WHERE `id` = $laptop_id";

    if ($conn->query($sql_update) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
