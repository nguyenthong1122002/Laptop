

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách đơn hàng</title>
    <style>
        /* CSS styles for the table */
        h1 {
            padding-left:30px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin:30px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color:white;
            text-align: center;
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header><?php include 'header.php'; ?></header>
    <main><h1>Danh sách đơn hàng của bạn</h1>
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Mã người dùng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Mã khuyến mãi</th>
            <th>Tên người dùng</th>
            <th>Địa chỉ người dùng</th>
            <th>Phương thức thanh toán</th>
            <th>Lời ghi chú khi đặt hàng</th>
            <th>Trạng thái đơn hàng</th>
        </tr>
        <?php
        // Start the session if not already started
        include 'connect.php';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT `order_id`, `user_id`, `order_date`, `total_amount`, `promotion_code_id`, `user_name`, `user_address`, `payment_method`, `message`, `order_status` FROM `orders` WHERE `user_id` = $user_id";
            $result = $conn->query($sql);
        }
        ?>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                // Format the date if needed (e.g., $formattedDate = date('Y-m-d', strtotime($row['order_date']);)
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>" . $row['total_amount'] . "</td>";
                echo "<td>" . $row['promotion_code_id'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['user_address'] . "</td>";
                echo "<td>" . $row['payment_method'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td>" . $row['order_status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Không có đơn hàng nào.</td></tr>";
        }
        ?>
    </table></main>
    <footer><?php include 'footer.php'; ?></footer>
</body>
</html>

<?php
$conn->close();
?>
