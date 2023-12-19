<!DOCTYPE html>
<html>
<head>
    <title>Thêm mã khuyến mãi</title>
    <link rel="stylesheet" type="text/css" href="/css/add_khuyen_mai.css">
</head>
<body>
    <div class="add-khuyen-mai">
        <h2>Thêm mã khuyến mãi</h2>
        <form action="/action/add_ma_khuyen_mai.php" method="post">
            <label for="so_tien_toi_thieu">Số tiền tối thiểu:</label>
            <input type="number" name="so_tien_toi_thieu" step="1000" required><br>

            <label for="ten_khuyen_mai">Tên mã khuyến mãi : </label>
            <input type="text" name="ten_khuyen_mai" required><br>

            <label for="ngay_bat_dau">Ngày bắt đầu:</label>
            <input type="date" id="ngay_bat_dau" name="ngay_bat_dau" required><br>

            <label for="ngay_het_han">Ngày hết hạn:</label>
            <input type="date" id="ngay_het_han" name="ngay_het_han" required><br>

            <label for="so_tien_khuyen_mai">Số tiền khuyến mãi:</label>
            <input type="number" name="so_tien_khuyen_mai" step="1000" required><br>

            <input type="submit" value="Thêm">
            <a class="back_display_km" href="/layout/display_khuyen_mai_controller.php">Quay về trang quản lí mã khuyến mãi</a>
        </form>
    </div>
</body>
</html>
