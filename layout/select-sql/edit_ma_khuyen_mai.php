<?php
// Kết nối tới cơ sở dữ liệu, thay đổi thông tin kết nối phù hợp với cấu hình của bạn
include_once 'connect.php';

if (isset($_GET['id'])) {
    $id_ma_khuyen_mai = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin của mã khuyến mãi cần chỉnh sửa
    $sql = "SELECT * FROM ma_khuyen_mai WHERE id_ma_khuyen_mai = $id_ma_khuyen_mai";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Lấy thông tin của mã khuyến mãi từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $ten_khuyen_mai = $row["ten_khuyen_mai"];
        $so_tien_toi_thieu = $row["so_tien_toi_thieu"];
        $ngay_bat_dau = $row["ngay_bat_dau"];
        $ngay_het_han = $row["ngay_het_han"];
        $so_tien_khuyen_mai = $row["so_tien_khuyen_mai"];
    } else {
        // Không tìm thấy mã khuyến mãi
        echo "Không tìm thấy mã khuyến mãi.";
        exit();
    }
} else {
    // Không có tham số id_ma_khuyen_mai được gửi đến từ trình duyệt
    echo "Không xác định mã khuyến mãi cần chỉnh sửa.";
    exit();
}
// Đóng kết nối
$conn->close();
?>
