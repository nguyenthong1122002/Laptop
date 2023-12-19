<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Xóa các đơn hàng liên quan đến người dùng
    $sql_delete_orders = "DELETE FROM orders WHERE user_id = $user_id";

    if ($conn->query($sql_delete_orders) === TRUE) {
        // Sau khi xóa các đơn hàng liên quan, tiến hành xóa người dùng
        $sql_delete_user = "DELETE FROM users WHERE user_id = $user_id";

        if ($conn->query($sql_delete_user) === TRUE) {
            echo "<script>alert('Đã xóa người dùng và dữ liệu liên quan thành công');</script>";
        } else {
            echo "<script>alert('Đã xóa người dùng thành công, nhưng xảy ra lỗi khi xóa dữ liệu liên quan');</script>";
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "<script>alert('Xóa các đơn hàng liên quan thất bại');</script>";
        echo "Lỗi: " . $conn->error;
    }

    echo "<script>window.location = '/layout/display_users_controller.php';</script>";
}

$conn->close();
?>
