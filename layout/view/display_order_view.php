<!DOCTYPE html>
<html>
<head>
    <title>Display Order</title>
    <link rel="stylesheet" type="text/css" href="/css/display_order.css">
</head>
<body>
    <?php include_once 'admin_dashboard.php'; ?>

    <h1>Danh sách đơn hàng đã đặt</h1>
    <table>
        <tr>
            <th class="order_id">Mã đơn hàng đã được đặt</th>
            <th class="user_id">Mã của người dùng</th>
            <th>Ngày đặt hàng</th>
            <th>Mã khuyến mãi</th>
            <th>Tên người dùng</th>
            <th>Địa chỉ người dùng</th>
            <th>Phương thức thanh toán</th>
            <th>Lời nhắn</th>
            <th>Tổng tiền cần thanh toán</th>
            <th>Trạng thái đơn hàng đã được đặt</th>
            <th>Cập nhật trạng thái đơn hàng đã được đặt</th>
        </tr>
        <?php 
        // Display orders in the table
        if ($orders->num_rows > 0) {
            while ($row = $orders->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "<td>" . $row["promotion_code_id"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["user_address"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td>" . $row["total_amount"] . "</td>";
                echo "<td>" . $row["order_status"] . "</td>";
                echo "<td>";
                echo "<button id=\"confirmButton-" . $row["order_id"] . "\" onclick=\"changeOrderStatus('confirm', " . $row["order_id"] . ")\">Xác nhận</button>";
                echo "<button id=\"shipButton-" . $row["order_id"] . "\" onclick=\"changeOrderStatus('ship', " . $row["order_id"] . ")\">Vận chuyển</button>";
                echo "<button id=\"completeButton-" . $row["order_id"] . "\" onclick=\"changeOrderStatus('complete', " . $row["order_id"] . ")\">Hoàn thành</button>";
                echo "<button id=\"cancelButton-" . $row["order_id"] . "\" onclick=\"changeOrderStatus('cancel', " . $row["order_id"] . ")\">Xóa đơn</button>";

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found.</td></tr>";
        }
        ?>
    </table>
    <script>
        function changeOrderStatus(action, orderId) {
            var url = "display_order.php"; // Corrected URL
            var data = "action=" + action + "&order_id=" + orderId;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.reload();
                }
            };
            xhr.send(data);
        }
    </script>
</body>
</html>
