<?php
// Khởi động session (nếu chưa khởi động)
session_start();

// Xóa các biến session liên quan đến người dùng đã đăng nhập
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['role']);

// Hủy session
session_destroy();

// Chuyển hướng người dùng đến trang chủ hoặc trang đăng nhập sau khi logout
header("Location: /index.php"); // Thay đổi đường dẫn nếu cần thiết
exit();
?>
