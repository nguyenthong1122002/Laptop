<!-- Cập nhật file -->
<?php
// Kết nối tới cơ sở dữ liệu (thay đổi thông tin kết nối cho phù hợp)
// Replace these variables with your actual MySQL credentials
include_once 'connect.php';
// Lấy thông tin từ biến POST sau khi người dùng ấn nút Đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Mã hóa mật khẩu
    $full_name = $_POST['full_name'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $type = 'user'; // Mặc định loại tài khoản là 'user'

    // Kiểm tra xem tên đăng nhập và email đã tồn tại trong cơ sở dữ liệu chưa
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo '<script>alert("Tên đăng nhập hoặc email đã tồn tại. Vui lòng chọn tên đăng nhập hoặc email khác.");</script>';
        echo '<script>window.location.href = "/layout/display_users_controller.php";</script>';
    } else {
        // Thêm thông tin người dùng vào cơ sở dữ liệu
        $insert_query = "INSERT INTO users (username, password, full_name, sex, email, address, type) VALUES ('$username', '$password', '$full_name', '$sex', '$email', '$address', '$type')";
            
        if ($conn->query($insert_query) === TRUE) {
            echo '<script>alert("Đăng ký tài khoản thành công!");</script>';
            echo '<script>window.location.href = "/layout/display_users_controller.php";</script>';
        } else {
            echo '<script>alert("Đăng ký tài khoản thất bại: ' . $conn->error . '");</script>';
            echo '<script>window.location.href = "/layout/display_users_controller.php";</script>';
        }
        
    }
}

$conn->close();
?>
