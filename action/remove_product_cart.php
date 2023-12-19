<?php
include 'connect.php' ;
 // Xử lý xóa sản phẩm
 if (isset($_GET["delete_laptop_id"])) {
    $delete_laptop_id = $_GET["delete_laptop_id"];

    // Thực hiện câu truy vấn để xóa sản phẩm khỏi cơ sở dữ liệu
    $sql = "DELETE FROM shopping_cart WHERE laptop_id = $delete_laptop_id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Xóa sản phẩm thành công.");</script>';
        echo '<script>window.location.href = "/layout/cart.php";</script>';
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
        header("Location: /layout/cart.php");
    }
}
?>