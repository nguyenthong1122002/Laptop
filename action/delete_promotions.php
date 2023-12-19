<?php
// Kết nối đến cơ sở dữ liệu MySQL
include 'connect.php';

// Lấy ID chương trình khuyến mãi cần xóa từ URL
$id = $_GET['id'];

// Xóa chương trình khuyến mãi khỏi bảng promotions
$sql = "DELETE FROM promotions WHERE id_promotions = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Xóa chương trình khuyến mãi thành công');</script>";
    echo "<script>window.location = '/layout/display_promotions_controller.php';</script>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
