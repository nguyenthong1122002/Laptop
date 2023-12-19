<?php
include 'connect.php';

// Kiểm tra xem người dùng đã submit form hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_khuyen_mai = $_POST["ten_khuyen_mai"];
    $so_tien_toi_thieu = $_POST["so_tien_toi_thieu"];
    $ngay_bat_dau = $_POST["ngay_bat_dau"];
    $ngay_het_han = $_POST["ngay_het_han"];
    $so_tien_khuyen_mai = $_POST["so_tien_khuyen_mai"];

    // Thực hiện kiểm tra ngày hết hạn phải lớn hơn ngày bắt đầu
    if ($ngay_het_han <= $ngay_bat_dau) {
        echo "<script>alert('Ngày hết hạn phải lớn hơn ngày bắt đầu.'); window.location = '/layout/display_khuyen_mai_controller.php';</script>";
    } else {
        // Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO ma_khuyen_mai (ten_khuyen_mai, so_tien_toi_thieu, ngay_bat_dau, ngay_het_han, so_tien_khuyen_mai)
                VALUES ('$ten_khuyen_mai', '$so_tien_toi_thieu', '$ngay_bat_dau', '$ngay_het_han', '$so_tien_khuyen_mai')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm mã khuyến mãi thành công!";
            echo "<script> window.location = '/layout/display_khuyen_mai_controller.php';</script>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Đóng kết nối
$conn->close();
?>
