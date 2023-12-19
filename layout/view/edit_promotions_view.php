<!DOCTYPE html>
<html>
<head>
    <title>Sửa chương trình khuyến mãi</title>
    <link rel="stylesheet" href="/css/edit_promotions.css">
</head>
<body>
    <h1>Sửa chương trình khuyến mãi</h1>
    <form method="post" action="/action/process_edit.php">
        <input type="hidden" name="id" value="<?php echo $promotion['id_promotions']; ?>">
        <label>Tiêu đề:</label><br>
        <input type="text" name="title" value="<?php echo $promotion['title']; ?>" required><br><br>
        <label>Nội dung:</label><br>
        <textarea name="content" required><?php echo $promotion['content']; ?></textarea><br><br>
        <label>Hình ảnh (đường dẫn):</label><br>
        <input type="text" name="image_path"  value="<?php echo $promotion['image_path']; ?>" required><br><br>
        <label>Ngày bắt đầu:</label><br>
        <input type="date" name="start_date" value="<?php echo $promotion['start_date']; ?>" required><br><br>
        <label>Ngày kết thúc:</label><br>
        <input type="date" name="end_date" value="<?php echo $promotion['end_date']; ?>" required><br><br>
        <input  type="submit" value="Lưu">
        <a href="display_promotions_controller.php">Quay lại danh sách</a>
    </form>
    <br>
</body>
</html>
