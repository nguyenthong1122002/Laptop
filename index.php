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
    <hr>
    <!-- Email Marketing -->
    <div id="mc_embed_shell">
      <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
  <style type="text/css">
        #mc_embed_signup{background:#f8c03b;clear:left; font:14px Helvetica,Arial,sans-serif; width:600px;color:white;margin:15px;margin-left:auto;margin-right:auto;padding:20px;border-radius: 20px;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="https://ntt.us9.list-manage.com/subscribe/post?u=2fc9d1ea5b9bdf6b968b6c188&amp;id=93ee2652c7&amp;f_id=009c3de1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
        <div id="mc_embed_signup_scroll"><h2>Email marketing</h2>
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div>
        <div id="mce-responses" class="clear foot">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
        </div>
    <div aria-hidden="true" style="position: absolute; left: -5000px;">
        /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
        <input type="text" name="b_2fc9d1ea5b9bdf6b968b6c188_93ee2652c7" tabindex="-1" value="">
    </div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
                <p style="margin: 0px auto;"><a href="http://eepurl.com/iE3Dg-" title="Mailchimp - email marketing made easy and fun"><span style="display: inline-block; background-color: transparent; border-radius: 4px;"><img class="refferal_badge" src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg" alt="Intuit Mailchimp" style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;"></span></a></p>
            </div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
    <!-- Email Marketing -->
    <hr>
    <footer><?php include_once 'footer.php'; ?></footer>
</body>

</html>
