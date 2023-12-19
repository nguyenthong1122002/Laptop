<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header><?php include_once 'header.php'; ?></header>
    <main><div class="gallery">
        <?php
            include_once 'connect.php';

            // Check if the necessary parameters are provided in the URL
            if (isset($_GET['brand']) && isset($_GET['processor'])) {
                // Validate and sanitize the input to prevent SQL injection
                $brand = $_GET['brand'];
                $processor = $_GET['processor'];

                // Prepare and execute the SQL query to fetch laptop information
                $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ? AND `processor` = ?");
                $stmt->bind_param("ss", $brand, $processor);
            } elseif (isset($_GET['brand']) && isset($_GET['laptop_name'])) {
                // Validate and sanitize the input to prevent SQL injection
                $brand = $_GET['brand'];
                $laptop_name = $_GET['laptop_name'];

                // Prepare and execute the SQL query to fetch laptop information
                // The SQL query will now use 'LIKE' to match laptop_name with any substring
                $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ? AND `laptop_name` LIKE ?");
                
                // Append '%' to the laptop_name to match any substring
                $laptop_name = '%' . $laptop_name . '%';

                $stmt->bind_param("ss", $brand, $laptop_name);
            } elseif (isset($_GET['brand'])) {
                // Validate and sanitize the input to prevent SQL injection
                $brand = $_GET['brand'];

                // Prepare and execute the SQL query to fetch laptop information
                $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `brand` = ?");
                $stmt->bind_param("s", $brand);
            } elseif (isset($_GET['brand']) && $_GET['brand'] === 'all') {
                // Prepare and execute the SQL query to fetch all laptop information
                $stmt = $conn->prepare("SELECT `brand`, `laptop_name`, `id`, `processor`, `screen_size`, `graphics_card`, `storage_capacity`, `operating_system`, `ram`, `weight`, `status`, `price_range`, `image_url` FROM `laptops`");
            } 
            
            else {
                echo "Không tìm thấy sản phẩm phù hợp";
                exit;
            }


            // Execute the prepared statement
            $stmt->execute();
            $result = $stmt->get_result();

            // Display laptop information
            $productsPerPage = 20;
            // Xác định trang hiện tại
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            // Tính số sản phẩm bắt đầu và kết thúc của trang hiện tại
            $startProduct = ($currentPage - 1) * $productsPerPage;
            $endProduct = $startProduct + $productsPerPage;
            // Lấy toàn bộ dữ liệu từ cơ sở dữ liệu và lưu vào một mảng
            $productsArray = array();
            while ($row = $result->fetch_assoc()) {
                $productsArray[] = $row;
            }
            $totalProducts = count($productsArray);
            if ($totalProducts > 0) {
                // Xử lý việc chỉ hiển thị các sản phẩm tương ứng với trang hiện tại
                for ($i = $startProduct; $i < min($endProduct, $totalProducts); $i++) {
                    $row = $productsArray[$i];
                    echo "<div class='laptop'>";
                    echo "<a href='/layout/product_details.php?id=" . $row['id'] . "'>"; // Link to product details page
                    // Hiển thị thông tin ảnh sản phẩm
                    if (!empty($row['image_url'])) {
                        echo "<img src='/action/" . $row['image_url'] . "' alt='Laptop Image'>";
                    } else {
                        echo "<img src='img/laptop.png' alt='Default Image'>";
                    }
                    echo "<p><strong>" . $row['laptop_name'] . "</strong></p>";
                    echo "<p>" . $row['price_range'] . " đ</p>";
                    echo "</a>";
                    echo "</div>";
                }
                $totalPages = ceil($totalProducts / $productsPerPage);
                echo "<div class='clearfix'></div>";
                // Hiển thị page links
                echo "<div class='pagination'>";
                if ($currentPage > 1) {
                    $queryParams = $_GET;
                    $queryParams['page'] = $currentPage - 1;
                    $queryString = http_build_query($queryParams);
                    echo "<a class='page-link' href='?" . $queryString . "'>Previous</a> ";
                }
            
                for ($page = 1; $page <= $totalPages; $page++) {
                    $queryParams = $_GET;
                    $queryParams['page'] = $page;
                    $queryString = http_build_query($queryParams);
                    echo "<a class='page-link' href='?" . $queryString . "'>" . $page . "</a> ";
                }
            
                if ($currentPage < $totalPages) {
                    $queryParams = $_GET;
                    $queryParams['page'] = $currentPage + 1;
                    $queryString = http_build_query($queryParams);
                    echo "<a class='page-link' href='?" . $queryString . "'>Next</a>";
                }
                
                echo "</div>";           
            } else {
                echo "<p>Không tìm thấy sản phẩm phù hợp</p>";
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
?></div></main>
    <footer><?php include_once 'footer.php'; ?></footer>

</body>
</html>

