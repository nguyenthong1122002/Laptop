

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách mã khuyến mãi</title>
    <link rel="stylesheet" type="text/css" href="/css/display_khuyen_mai.css">
</head>
<body>
    <?php include_once 'admin_dashboard.php'; ?>
    <div class="content"><h2>Danh sách mã khuyến mãi</h2>
    <a class="add_km" href="view/add_khuyen_mai.php">Thêm khuyến mãi</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên khuyến mãi</th>
            <th>Số tiền tối thiểu</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày hết hạn</th>
            <th>Số tiền khuyến mãi</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        if (!empty($allPromotions)) {
            foreach ($allPromotions as $row) {
                echo "<tr>";
                echo "<td>" . $row["id_ma_khuyen_mai"] . "</td>";
                echo "<td>" . $row["ten_khuyen_mai"] . "</td>";
                echo "<td>" . $row["so_tien_toi_thieu"] . "</td>";
                echo "<td>" . $row["ngay_bat_dau"] . "</td>";
                echo "<td>" . $row["ngay_het_han"] . "</td>";
                echo "<td>" . $row["so_tien_khuyen_mai"] . "</td>";
                echo '<td><a class="link-edit" href="edit_ma_khuyen_mai.php?id=' . $row["id_ma_khuyen_mai"] . '">Edit</a></td>';
                echo '<td><a class="link-delete" href="/action/delete_ma_khuyen_mai.php?id=' . $row["id_ma_khuyen_mai"] . '">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Không có mã khuyến mãi.</td></tr>";
        }
        ?>
    </table></div>
    
</body>
</html>
