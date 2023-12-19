<!DOCTYPE html>
<html>
<head>
  <title>Chi tiết chương trình khuyến mãi</title>
  <link rel="stylesheet" href="/css/detail-promotions.css">
</head>
<body>
    <header><?php include 'header.php'; ?></header>
    <main>
    <?php include 'select-sql/promotion_details.php'; ?>
    <div class="promotion-detail">
        <h1 class="title-promotions"><?php echo $title; ?></h1>

        <div class="date-range">
        <div class="date-range-start">Từ ngày <?php echo $start_date; ?></div>
        <div class="date-range-end">Đến ngày <?php echo $end_date; ?></div>
        </div>
        <img src="<?php echo SERVER_PATH . $image_path; ?>" alt="<?php echo $title; ?>">
        <p class="content"><?php echo $content; ?></p>
    </div>
    </main>
<footer><?php include 'footer.php'; ?></footer>
  
</body>
</html>
