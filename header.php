<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/header.css">
  <title>Đầu trang</title>
</head>
<body>
<header>
  <a href="/index.php" class="logo"><img src="/img/WebLogo.png" style="width:70px"></a>
  <div class="parent-container">
    <div class="search-bar">
      <form action="/layout/search_laptop.php" method="post">
        <?php
        // Kiểm tra nếu có từ khóa tìm kiếm được gửi từ form
        $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';
        ?>
        <input type="text" placeholder="Tìm kiếm..." name="search_term" value="<?php echo htmlspecialchars($search_term); ?>">
        <button type="submit" name="search">Search</button>
      </form>
    </div>
  </div>
  <div class="notifications">
    <a href="/layout/PromotionController.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Promotion</a>
  </div>
  <div class="fiter">
    <a href="/layout/filter.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Filter</a>
  </div>
  <div class="user-info">
    <?php include 'user_dropdown.php'; ?>
  </div>
</header>
</body>
</html>
