<!DOCTYPE html>
<html>

<head>
    <title>Sửa người dùng</title>
    <link rel="stylesheet" href="/css/edit_user.css">
</head>

<body>
    <h1>Sửa người dùng</h1>
    <form action="/action/process_edit_user.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <label for="username">Tên đăng nhập:</label>
        <input type="text"  id="username" name="username" value="<?php echo $user['username']; ?>" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>">
        <input type="checkbox" onclick="togglePassword()"> Hiển thị mật khẩu
        <br>
        <label for="full_name">Họ & tên:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $user['full_name']; ?>">
        <br>
        <label for="sex">Giới tính:</label>
        <select id="sex" name="sex">
            <option value="Male" <?php if ($user['sex'] == 'Male') echo 'selected'; ?>>Nam</option>
            <option value="Female" <?php if ($user['sex'] == 'Female') echo 'selected'; ?>>Nữ</option>
        </select>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>">
        <br>
        <input type="submit" value="Lưu">
    </form>
    <br>
    <a href="/layout/display_users_controller.php">Quay lại danh sách người dùng</a>
    <script src="/js/show-password.js"></script>
</body>

</html>
