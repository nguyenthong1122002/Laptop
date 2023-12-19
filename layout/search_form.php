<form action="search_laptop.php" method="post">
    <?php
    // Kiểm tra nếu có từ khóa tìm kiếm được gửi từ form
    $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';
    ?>
    <input type="text" placeholder="Tìm kiếm..." name="search_term" value="<?php echo htmlspecialchars($search_term); ?>">
    <button type="submit" name="search">Tìm kiếm</button>
</form>
