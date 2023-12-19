<?php
// View.php
class Viewsearch {
    public function renderLaptopList($productsArray, $totalProducts) {
        echo "<div class='laptop-container'>";
        foreach ($productsArray as $key => $row) {
            $displayStyle = ($key < 20) ? "block" : "none";
            echo "<div class='laptop' style='display: $displayStyle;'>";
            echo "<a href='/layout/product_details.php?id=" . $row['id'] . "'>";
            if (!empty($row['image_url'])) {
                echo "<img src='" . SERVER_PATH . $row['image_url'] . "' alt='Laptop Image'>";
            } else {
                echo "<img src='/img/laptop.png' alt='Default Image'>";
            }
            echo "<p> <strong>" . $row['laptop_name'] . "</strong></p>";
            echo "<p>" . $row['price_range'] . " </p>";
            echo "</a>";
            echo "</div>";
        }
        echo "</div>";

        if ($totalProducts > 20) {
            echo "<button id='loadMoreBtn'>Xem thêm</button>";
        } else {
            echo "<p class='show_all'>Đã hiển thị tất cả kết quả.</p>";
        }
    }

    public function renderNoResult() {
        echo "<p class='result'>Không tìm thấy kết quả.</p>";
    }

    public function renderEmptySearch() {
        echo "<p class='result'>Vui lòng nhập từ khóa tìm kiếm.</p>";
    }
}
?>
