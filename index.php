<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <header><?php include_once 'header.php'; ?></header>
    <main>
        <div class='chuyentrang'>
            <?php include_once 'slide-image.php'; ?>
        </div>
        <div class="gallery">
            <?php
            include_once 'index_process.php';
            $productController = new ProductController($productsArray);
            $totalProducts = $productController->getTotalProducts();
            if ($totalProducts > 0) {
                $productsToDisplay = $productController->getProductsForCurrentPage();

                foreach ($productsToDisplay as $row) {
                    echo "<div class='laptop'>";
                    echo "<a href='/layout/product_details.php?id=" . $row['id'] . "'>"; // Link to product details page
                    // Hiển thị thông tin ảnh sản phẩm
                    if (!empty($row['image_url'])) {
                        echo "<img src='" . SERVER_PATH . $row['image_url'] . "' alt='Laptop Image'>";
                    } else {
                        echo "<img src='img/laptop.png' alt='Default Image'>";
                    }
                    $formatted_price_range = number_format($row['price_range'], 0, '.', ',');
                    echo "<p>" . $formatted_price_range . " đ</p>";
                    echo "<p><strong>" . $row['laptop_name'] . "</strong></p>";
                    
                    echo "</a>";
                    echo "</div>";
                }

                $totalPages = $productController->getTotalPages();
                echo "<div class='clearfix'></div>";
                // Hiển thị page links
                echo "<div class='pagination'>";
                $currentPage = $productController->getCurrentPage();
                if ($currentPage > 1) {
                    echo "<a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a> ";
                }

                for ($page = 1; $page <= $totalPages; $page++) {
                    echo "<a class='page-link' href='?page=" . $page . "'>" . $page . "</a> ";
                }

                if ($currentPage < $totalPages) {
                    echo "<a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a>";
                }
                echo "</div>";
            } else {
                echo "<p>No laptops found in the database.</p>";
            }
            ?>
        </div>
    </main>

    <footer><?php include_once 'footer.php'; ?></footer>
</body>

</html>
