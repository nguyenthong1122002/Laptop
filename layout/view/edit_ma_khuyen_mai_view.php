<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa mã khuyến mãi</title>
    <link rel="stylesheet" type="text/css" href="/css/edit_ma_khuyen_mai.css">
</head>
<body>
    <h2>Chỉnh sửa mã khuyến mãi</h2>
    <form action="/action/edit_ma_khuyen_mai.php" method="post">
        <input type="hidden" name="id_ma_khuyen_mai" value="<?php echo $maKhuyenMai['id_ma_khuyen_mai']; ?>">
        <label for="ten_khuyen_mai">Tên khuyến mãi :</label>
        <input type="text" name="ten_khuyen_mai" value="<?php echo $maKhuyenMai['ten_khuyen_mai']; ?>" required><br>
        <label for="so_tien_toi_thieu">Số tiền tối thiểu:</label>
        <input type="number" name="so_tien_toi_thieu" step="1000" value="<?php echo $maKhuyenMai['so_tien_toi_thieu']; ?>" required><br>
        <label for="ngay_bat_dau">Ngày bắt đầu:</label>
        <input type="date" name="ngay_bat_dau" value="<?php echo $maKhuyenMai['ngay_bat_dau']; ?>" required><br>
        <label for="ngay_het_han">Ngày hết hạn:</label>
        <input type="date" name="ngay_het_han" value="<?php echo $maKhuyenMai['ngay_het_han']; ?>" required><br>
        <label for="so_tien_khuyen_mai">Số tiền khuyến mãi:</label>
        <input type="number" name="so_tien_khuyen_mai" step="1000" value="<?php echo $maKhuyenMai['so_tien_khuyen_mai']; ?>" required><br>
        <input type="submit" value="Lưu">
        <a href="/layout/display_khuyen_mai_controller.php" class="backmakm">Quay về trang quản lí mã khuyến mãi</a>
    </form>
</body>
</html>
