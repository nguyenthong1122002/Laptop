<?php
include 'connect.php';

// Lấy dữ liệu từ form
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Cập nhật thông tin chương trình khuyến mãi trong bảng promotions
$sql = "UPDATE promotions SET title='$title', content='$content', start_date='$start_date', end_date='$end_date' WHERE id_promotions='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật chương trình khuyến mãi thành công!";
    echo "<script>window.location = '/layout/display_promotions_controller.php';</script>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
