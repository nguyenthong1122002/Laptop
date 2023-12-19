<?php
// Kết nối tới cơ sở dữ liệu, thay đổi thông tin kết nối phù hợp với cấu hình của bạn
include 'connect.php';

// Kiểm tra xem có dữ liệu được gửi từ form khi người dùng ấn nút Lưu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ma_khuyen_mai = $_POST["id_ma_khuyen_mai"];
    $ten_khuyen_mai = $_POST["ten_khuyen_mai"];
    $so_tien_toi_thieu = $_POST["so_tien_toi_thieu"];
    $ngay_bat_dau = $_POST["ngay_bat_dau"];
    $ngay_het_han = $_POST["ngay_het_han"];
    $so_tien_khuyen_mai = $_POST["so_tien_khuyen_mai"];

    // Cập nhật thông tin mới vào cơ sở dữ liệu
    $sql = "UPDATE ma_khuyen_mai SET 
            ten_khuyen_mai = '$ten_khuyen_mai',
            so_tien_toi_thieu = '$so_tien_toi_thieu',
            ngay_bat_dau = '$ngay_bat_dau',
            ngay_het_han = '$ngay_het_han',
            so_tien_khuyen_mai = '$so_tien_khuyen_mai'
            WHERE id_ma_khuyen_mai = $id_ma_khuyen_mai";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đã sửa khuyến mãi thành công');</script>";
        echo "<script>window.location = '/layout/display_khuyen_mai_controller.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
