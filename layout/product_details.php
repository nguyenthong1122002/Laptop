<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/laptop_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <header><?php include "header.php"; ?></header>
    <div class="container">
    <?php
    // product_details.php
    include 'connect.php';
    // Function to sanitize input (to prevent SQL injection)
    function sanitize_input($input) {
        return intval($input);
    }
    // Check if the 'id' parameter exists in the URL
    if (isset($_GET['id'])) {
        // Lấy Thông tin của laptop đó dựa trên id mà laptop mà đã bấm

        $laptop_id = sanitize_input($_GET['id']);
        
        // Perform the SQL query to fetch laptop details with the given id
        $sql = "SELECT `id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url` FROM `laptops` WHERE `id` = $laptop_id";
        
        // Execute the query and fetch the laptop details
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            
            <?php if (isset($_SESSION['user_id'])) : ?>
                <div class="product-details">
                <div class="product-image">
                    <img src="/action/<?php echo $row['image_url']; ?>" alt="<?php echo $row['laptop_name']; ?> Image">
                </div>
                <div class="laptop_detail">
                    <form class="product-info-form">
                        <h1><?php echo $row['laptop_name']; ?></h1>
                        <p>Hãng: <?php echo $row['brand']; ?></p>
                        <p>Processor: <?php echo $row['processor']; ?></p>
                        <p>Screen Size: <?php echo $row['screen_size']; ?></p>
                        <p>Graphics Card: <?php echo $row['graphics_card']; ?></p>
                        <p>RAM: <?php echo $row['ram']; ?></p>
                        <p>Storage Capacity: <?php echo $row['storage_capacity']; ?></p>
                        <p>Operating System: <?php echo $row['operating_system']; ?></p>
                        <p>Weight: <?php echo $row['weight']; ?></p>
                        <p class="status">Status: <?php echo $row['status']; ?></p>
                        <p>Price Range: <?php echo $row['price_range']; ?> VND</p>
                    </form>
                </div>
            </div>
                <div class="add-to-cart-form">
                    <form action="/action/add_to_cart.php" method="post">
                        <input type="hidden" name="laptop_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <label for="quantity">Số lượng: <input type="number" name="quantity" id="quantity" value="1" min="1" max="10"></label>
                        
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <?php   $laptop_id = sanitize_input($_GET['id']);
                    function getTotalRatings($laptop_id, $conn) {
                        $sql = "SELECT COUNT(*) AS total_ratings FROM binh_luan_laptop WHERE laptop_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $laptop_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['total_ratings'];
                    }

                    // Function to get the number of ratings for each star value
                    function getRatingsCount($laptop_id, $rating, $conn) {
                        $sql = "SELECT COUNT(*) AS rating_count FROM binh_luan_laptop WHERE laptop_id = ? AND rating = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ii", $laptop_id, $rating);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['rating_count'];
                    }


                        // Assuming $row['id'] contains the laptop_id, replace it with the correct variable name if needed
                        $laptop_id = $row['id'];

                        // Get the total number of ratings for the laptop
                        $total_ratings = getTotalRatings($laptop_id, $conn);

                        // Get the number of ratings for each star value
                        $ratings_5 = getRatingsCount($laptop_id, 5, $conn);
                        $ratings_4 = getRatingsCount($laptop_id, 4, $conn);
                        $ratings_3 = getRatingsCount($laptop_id, 3, $conn);
                        $ratings_2 = getRatingsCount($laptop_id, 2, $conn);
                        $ratings_1 = getRatingsCount($laptop_id, 1, $conn);
?>
                <form class="rating-review">
                    <div class="star-total-total">
                        <h1 class="name-total">Tổng số lượt đánh giá</h1>
                        <h1 class="number-rating-total" ><?php echo $total_ratings; ?></h1>
                    </div>
                    <div class="break-down">
                        <div class="star-rating">
                            <span class="star-rating">5 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <h1 class="number-rating"><?php echo $ratings_5; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span class="star-rating">4 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_4; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span class="star-rating">3 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_3; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span class="star-rating">2 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_2; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span >1 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_1; ?></h1>
                        </div>
                    </div>
                </form>
                <div class="comment-form">
                    <h3>Add Your Comment</h3>
                    <form action="/action/add_comment.php" method="post">
                        <input type="hidden" name="laptop_id" value="<?php echo $laptop_id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <?php if (!empty($_SESSION['username'])) : ?>
                            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
                        <?php endif; ?>
                        <label class="star-rating" for="rating">Rating:</label>
                        <select  name="rating" id="rating">
                            <option class="star-rating" value="5">5 Stars</option>
                            <option class="star-rating"value="4">4 Stars</option>
                            <option class="star-rating"value="3">3 Stars</option>
                            <option class="star-rating" value="2">2 Stars</option>
                            <option class="star-rating" value="1">1 Star</option>
                        </select>
                        <br>
                        <label for="comment">Your Comment:</label>
                        <textarea name="comment" id="comment" rows="4" cols="50" required></textarea>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            <?php else : ?>
                <div class="product-details-nologin">
                    <div class="product-image">
                        <img src="/action/<?php echo $row['image_url']; ?>" alt="<?php echo $row['laptop_name']; ?> Image">
                    </div>
                    <div class="laptop_detail">
                        <form class="product-info-form">
                            <h1><?php echo $row['laptop_name']; ?></h1>
                            <p>Hãng: <?php echo $row['brand']; ?></p>
                            <p>Processor: <?php echo $row['processor']; ?></p>
                            <p>Screen Size: <?php echo $row['screen_size']; ?></p>
                            <p>Graphics Card: <?php echo $row['graphics_card']; ?></p>
                            <p>RAM: <?php echo $row['ram']; ?></p>
                            <p>Storage Capacity: <?php echo $row['storage_capacity']; ?></p>
                            <p>Operating System: <?php echo $row['operating_system']; ?></p>
                            <p>Weight: <?php echo $row['weight']; ?></p>
                            <p class="status">Status: <?php echo $row['status']; ?></p>
                            <p>Price Range: <?php echo $row['price_range']; ?> VND</p>
                        </form>
                    </div>
                </div>

                <div class="add-to-cart-form-nologin">
                    <form action="/action/add_to_cart.php" method="post">
                        <input type="hidden" name="laptop_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="user_id" value="">
                        <label for="quantity">Số lượng: <input type="number" name="quantity" id="quantity" value="1" min="1" max="10" disabled></label>

                        <p>Bạn cần đăng nhập để thêm sản phẩm giỏ hàng</p>
                    </form>
                </div>
                <?php    $laptop_id = sanitize_input($_GET['id']);
                    function getTotalRatings($laptop_id, $conn) {
                        $sql = "SELECT COUNT(*) AS total_ratings FROM binh_luan_laptop WHERE laptop_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $laptop_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['total_ratings'];
                    }

                    // Function to get the number of ratings for each star value
                    function getRatingsCount($laptop_id, $rating, $conn) {
                        $sql = "SELECT COUNT(*) AS rating_count FROM binh_luan_laptop WHERE laptop_id = ? AND rating = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ii", $laptop_id, $rating);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['rating_count'];
                    }


                        // Assuming $row['id'] contains the laptop_id, replace it with the correct variable name if needed
                        $laptop_id = $row['id'];

                        // Get the total number of ratings for the laptop
                        $total_ratings = getTotalRatings($laptop_id, $conn);

                        // Get the number of ratings for each star value
                        $ratings_5 = getRatingsCount($laptop_id, 5, $conn);
                        $ratings_4 = getRatingsCount($laptop_id, 4, $conn);
                        $ratings_3 = getRatingsCount($laptop_id, 3, $conn);
                        $ratings_2 = getRatingsCount($laptop_id, 2, $conn);
                        $ratings_1 = getRatingsCount($laptop_id, 1, $conn);
 ;?>

                <form class="rating-review">
                    <div class="star-total-total">
                        <h1 class="name-total">Tổng số lượt đánh giá</h1>
                        <h1 class="number-rating-total" ><?php echo $total_ratings; ?></h1>
                    </div>
                    <div class="break-down">
                        <div class="star-rating">
                            <span>5 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <h1 class="number-rating"><?php echo $ratings_5; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span>4 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_4; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span>3 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_3; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span>2 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_2; ?></h1>
                        </div>
                        <div class="star-rating">
                            <span>1 sao : </span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <h1 class="number-rating"><?php echo $ratings_1; ?></h1>
                        </div>
                    </div>
                    </div>
                </form>
                <div class="comment-form-no-login">
                    <h3>Add Your Comment</h3>
                    <p>Bạn cần đăng nhập để comment</p>
                </div>
            <?php endif; ?>
            
            <?php
            // Đường dẫn lấy link truy vấn comment của laptop
            function get_comments_with_fullname($laptop_id) {
                global $conn;
                $laptop_id = sanitize_input($laptop_id);
                $sql = "SELECT bl.`id_nguoi_dung`, bl.`rating`, bl.`noi_dung`, u.`full_name` 
                        FROM `binh_luan_laptop` bl
                        INNER JOIN `users` u ON bl.`id_nguoi_dung` = u.`user_id`
                        WHERE bl.`laptop_id` = $laptop_id
                        ORDER BY bl.`id` DESC";
                $result = $conn->query($sql);
                return $result->fetch_all(MYSQLI_ASSOC);
            }

            // Get comments for the current laptop with full names
            $comments = get_comments_with_fullname($laptop_id);
            // Display comments
            if (!empty($comments)) {
                $comments_per_page = 5;
                $total_comments = count($comments);
                $total_pages = ceil($total_comments / $comments_per_page);

                // Get the current page from the URL query string
                $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                if ($current_page < 1) {
                    $current_page = 1;
                } elseif ($current_page > $total_pages) {
                    $current_page = $total_pages;
                }

                // Calculate the starting index and ending index of comments for the current page
                $start_index = ($current_page - 1) * $comments_per_page;
                $end_index = $start_index + $comments_per_page;

                echo '<div class="comments">';
                for ($i = $start_index; $i < $end_index && $i < $total_comments; $i++) {
                    echo '<div class="comment">';
                    echo '<p>User: ' . $comments[$i]['full_name'] . '</p>'; // Display full_name instead of id_nguoi_dung
                    echo '<p>Comment: ' . $comments[$i]['noi_dung'] . '</p>';
                    echo '</div>';
                }
                echo '</div>';

                // Display pagination links
                echo '<div class="pagination">';
                for ($page = 1; $page <= $total_pages; $page++) {
                    echo '<a href="?id=' . $laptop_id . '&page=' . $page . '">' . $page . '</a>';
                }
                echo '</div>';
            } else {
                echo '<p>Hiện không có comment nào</p>';
            }
            ?>            
            <?php
                echo "</div>";
                    } else {
                        // If no laptop with the given id is found, display an error message or redirect to a 404 page.
                        echo "<p>Không tìm thấy laptop</p>";
                    }
                    // Close the database connection
                    $conn->close();
                } else {
                    // If the 'id' parameter is not provided, display an error message or redirect to a 404 page.
                    echo "<p>Yêu cầu không hợp lệ. ID máy tính xách tay không được cung cấp</p>";
                }
                ?>
    </div>
    <footer><?php include "footer.php"; ?></footer>
</body>
</html>
