<?php
include 'connect.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Thực hiện truy vấn để xóa mã khuyến mãi dựa trên ID
    $sql = "DELETE FROM ma_khuyen_mai WHERE id_ma_khuyen_mai=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đã xóa khuyến mãi thành công');</script>";
        echo "<script>window.location = '/layout/display_khuyen_mai_controller.php';</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<script>alert('Lỗi: Không tìm thấy ID mã khuyến mãi.');</script>";
    echo "<script>window.location = '/layout/display_khuyen_mai_controller.php';</script>";
}

// Đóng kết nối
$conn->close();
?>
