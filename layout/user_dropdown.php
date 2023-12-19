<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Đã đăng nhập, hiển thị dropdown menu cho người dùng đã đăng nhập
    ?>
    <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tên người dùng <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="profile.php">Thông tin người dùng</a></li>       
            <?php if ($_SESSION['type'] === 'user') : ?>
                <li><a href="cart.php">Giỏ hàng</a></li>
                <li><a href="order-user.php">Đơn hàng đã đặt</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['type'] === 'admin') : ?>
                <li><a href="view/admin_dashboard.php">Dashboard Admin</a></li>
                <li><a href="cart.php">Giỏ hàng</a></li>
                <li><a href="order-user.php">Đơn hàng đã đặt</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Đăng xuất</a></li>
        </ul>
    </div>
    <?php
} else {
    // Chưa đăng nhập, hiển thị liên kết đăng nhập và đăng ký dưới dạng button
    echo '<button class="auth-btn" onclick="openModal(\'login\')">Đăng nhập</button>';
    echo '<button class="auth-btn" onclick="openModal(\'register\')">Đăng ký</button>';
}
?>
