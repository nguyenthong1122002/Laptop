
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
    <header><?php
    include_once 'header.php';?></header>
    <main><?php include 'checklogin.php' ?>
        <form action="/action/process_profile_update.php" method="post" class="profile-user">
        <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>">
        <h1>Thông tin cá nhân</h1>
        <label for="username">Tên đăng nhập:</label>
        <input type="text" disabled id="username" name="username" value="<?php echo $user_data['username']; ?>" disabled>
        <br>
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" value="<?php echo $user_data['password']; ?>">
        <br>
        <label for="full_name">Họ và tên:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $user_data['full_name']; ?>">
        <br>
        <label for="sex">Giới tính:</label>
        <select id="sex" name="sex">
            <option value="Male" <?php echo ($user_data['sex'] === 'Male') ? 'selected' : ''; ?>>Nam</option>
            <option value="Female" <?php echo ($user_data['sex'] === 'Female') ? 'selected' : ''; ?>>Nữ</option>
        </select>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>">
        <br>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $user_data['address']; ?>">
        <br>

        <input type="submit" value="Cập nhật">
    </form></main>  
    <footer><?php include_once 'footer.php';  ?></footer>
</body>
</html>
