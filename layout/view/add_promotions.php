<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm chương trình khuyến mãi</title>
  <link rel="stylesheet" href="/css/add_promotions.css">
</head>
<body>
  <div class="add_notification">
    <h1>Thêm chương trình khuyến mãi</h1>
    <form action="/action/process_promotion.php" method="POST" enctype="multipart/form-data">
      <label for="title">Tiêu đề:</label>
      <input type="text" id="title" name="title" required>
      <label for="content">Nội dung:</label>
      <textarea id="content" name="content" rows="4" required></textarea>
      <label for="image">Hình ảnh:</label>
      <input type="file" id="image" name="image" accept="image/*" required>
      <label for="start_date">Ngày bắt đầu:</label>
      <input type="date" id="start_date" name="start_date" required>
      <label for="end_date">Ngày kết thúc:</label>
      <input type="date" id="end_date" name="end_date" required>
      <button type="submit">Thêm chương trình</button>
      <a class="back-notificaions" href="/layout/display_promotions_controller.php">Quay về trang tạo chương trình khuyến mãi</a>
    </form>
  </div>
</body>
</html>
