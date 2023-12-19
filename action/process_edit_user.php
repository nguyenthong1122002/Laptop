<!-- Cập nhật file -->
<?php
// Kết nối đến cơ sở dữ liệu (giữ nguyên đoạn kết nối đã sử dụng ở trang display_users_controller.php)
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    // Cập nhật thông tin người dùng dựa trên ID
    $sql = "UPDATE users SET username = '$username', full_name = '$full_name', sex = '$sex', email = '$email', address = '$address' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location = '/layout/display_users_controller.php';</script>";
        header("Location: /layout/display_users_controller.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
