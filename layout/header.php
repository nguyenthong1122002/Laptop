<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Header</title>
  <link rel="stylesheet" href="/css/header.css">
</head>
<body>
  <header>
    <a href="/index.php" class="logo"><img src="/img/WebLogo.png" style="width:70px"></a>
    <div class="parent-container">
      <div class="search-bar">
        <?php include 'search_form.php'; ?>
      </div>
    </div>
    <div class="notifications">
      <a href="PromotionController.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Chương trình khuyến mãi</a>
    </div>
    <div class="fiter">
      <a href="filter.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Bộ lọc tìm kiếm</a>
    </div>
    <div class="user-info">
      <?php include 'user_dropdown.php'; ?>
    </div>
  </header>

  <!-- Modal for login -->
  <div id="modal-login" class="modal">
    <div class="modal-content">
      <?php include 'login.php'; ?>
    </div>
  </div>

  <!-- Modal for register -->
  <div id="modal-register" class="modal">
    <div class="modal-content">
      <?php include 'register.php'; ?>
    </div>
  </div>

  <!-- JavaScript to handle modal functionality -->
  <script src="/js/header.js"></script>
</body>
</html>
