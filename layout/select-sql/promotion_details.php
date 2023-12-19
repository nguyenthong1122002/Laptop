<?php
    // Kết nối đến cơ sở dữ liệu
    include 'connect.php';

    // Lấy thông tin chương trình khuyến mãi từ cơ sở dữ liệu
    $promotion_id = $_GET['id']; // Lấy id_promotions từ URL
    $sqlpromotion = "SELECT * FROM promotions WHERE id_promotions = $promotion_id";
    $resultpromotion = $conn->query($sqlpromotion);

    if ($resultpromotion->num_rows > 0) {
      $rowpromotion = $resultpromotion->fetch_assoc();
      $title = $rowpromotion['title'];
      $content = $rowpromotion['content'];
      $image_path = $rowpromotion['image_path'];
      $start_date = $rowpromotion['start_date'];
      $end_date = $rowpromotion['end_date'];
    } else {
      echo "Không tìm thấy chương trình khuyến mãi.";
      exit;
    }

    $conn->close();
  ?>