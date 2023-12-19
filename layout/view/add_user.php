<!DOCTYPE html>
<html>
<!--Thêm Người Dùng-->
<head>
    <title>Thêm người dùng</title>
    <link rel="stylesheet"href="/css/add_users.css">
</head>
<body>

    <form class="add-user-form" action="/action/add_users.php" method="post">
        <h1>Thêm người dùng</h1>
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="full_name">Họ và tên:</label>
        <input type="text" id="full_name" name="full_name">
        <br>
        <label for="sex">Giới tính:</label>
        <select id="sex" name="sex">
            <option value="Male">Nam</option>
            <option value="Female">Nữ</option>
        </select>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address">
        <br>
        <input type="submit" value="Đăng ký">
    </form>
    <br>
    <a href="/layout/display_users_controller.php">x</a>

</body>
</html>
