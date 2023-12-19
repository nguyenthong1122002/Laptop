<?php
// edit_laptop_controller.php

include 'connect.php';
include 'edit_laptop_model.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $laptop_id = $_GET['id'];

    $sql_check = "SELECT * FROM `laptops` WHERE `id` = $laptop_id";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission
            if (updateLaptopInfo($conn, $laptop_id, $_POST)) {
                echo "Thông tin laptop có ID $laptop_id đã được cập nhật thành công.";
                header("Location: /layout/display_laptop.php");
                exit();
            } else {
                echo "Lỗi khi cập nhật thông tin laptop: " . $conn->error;
            }
        }

        // Load the view
        include 'edit_laptop_view.php';
    } else {
        echo "Không tìm thấy sản phẩm có ID $laptop_id.";
    }
} else {
    echo "Không có ID hợp lệ được cung cấp.";
}

$conn->close();
?>
