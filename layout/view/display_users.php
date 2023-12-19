<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="/css/displayusers.css">
</head>
<body>
    <?php include 'admin_dashboard.php'; ?>

    <div class="danhsachnguoidung">
        <h1>Danh sách người dùng</h1>
        <button onclick="openModal()">Thêm người dùng</button>
        <?php
        if ($resultdisplay_user->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>";
            while ($row = $resultdisplay_user->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['user_id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['password']."</td>
                        <td>".$row['full_name']."</td>
                        <td>".$row['sex']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['address']."</td>
                        <td>
                        <a class='link-edit' href='edit_user.php?id=".$row['user_id']."' onclick='openModal1()'>Sửa</a> |
                        <a class='link-delete' href='/action/delete_user.php?id=".$row['user_id']."'>Xóa</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Không có người dùng nào.";
        }
        $conn->close();
        ?>

        <div id="myModal" style="display: none;">
            <div class="modal-content">
                <?php include 'add_user.php'; ?>
            </div>
        </div>
    </div>

    <script src="/js/display_user.js"></script>
</body>
</html>
