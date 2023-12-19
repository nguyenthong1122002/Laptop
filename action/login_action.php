<!-- Cập nhật file -->
<?php
session_start();
include_once 'connect.php';


// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT user_id, username, type FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Thiết lập biến session cho người dùng đã đăng nhập thành công
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['type'] = $row['type'];

        header("Location: /index.php");       
        exit();
    } else {
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng');</script>";
        echo "<script>window.location = '/index.php';</script>";
    }
}

$conn->close();
?>
