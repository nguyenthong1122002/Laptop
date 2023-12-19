<!-- edit_laptop_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa thông tin sản phẩm</title>
    <link rel="stylesheet" href="/css/edit_laptop.css">
</head>
<body>
    <h1>Chỉnh sửa thông tin sản phẩm</h1>
    <form method='POST'>
            <label>Tên laptop:</label>
            <input type='text' name='laptop_name' value="<?php echo $row['laptop_name']; ?>"><br>

            <label>Thương hiệu:</label>
            <select name='brand' required>
                <option value='Asus'  <?php echo  ($row['brand'] == 'Asus' )? 'selected' : ''; ?>>Asus</option>
                <option value='Acer'  <?php echo  ($row['brand'] == 'Acer' )? 'selected' : ''; ?>>Acer</option>
                <option value='Dell'  <?php echo  ($row['brand'] == 'Dell' )? 'selected' : ''; ?>>Dell</option>
                <option value='Asus'  <?php echo  ($row['brand'] == 'Gigabyte' )? 'selected' : ''; ?>>Gigabyte</option>
                <option value='Acer'  <?php echo  ($row['brand'] == 'HP' )? 'selected' : ''; ?>>HP</option>
                <option value='Dell'  <?php echo  ($row['brand'] == 'Lenovo' )? 'selected' : ''; ?>>Lenovo</option>
                <option value='Asus'  <?php echo  ($row['brand'] == 'LG' )? 'selected' : ''; ?>>LG</option>
                <option value='Acer'  <?php echo  ($row['brand'] == 'MSI' )? 'selected' : ''; ?>>MSI</option>
                <option value='Dell'  <?php echo  ($row['brand'] == 'Macbook' )? 'selected' : ''; ?>>Macbook</option>
                <option value='Acer'  <?php echo  ($row['brand'] == 'Samsung' )? 'selected' : ''; ?>>Samsung</option>
                <option value='Acer'  <?php echo  ($row['brand'] == 'Huawei' )? 'selected' : ''; ?>>Huawei</option>
            </select><br>

            <label>Bộ vi xử lý:</label>
            <select name='processor' required>
                <option value='Intel Celeron'  <?php echo  ($row['processor'] == 'Intel Celeron' )? 'selected' : ''; ?>>Intel Celeron</option>
                <option value='Intel Pentium'  <?php echo  ($row['processor'] == 'Intel Pentium' )? 'selected' : ''; ?>>Intel Pentium</option>
                <option value='Core i3'  <?php echo  ($row['processor'] == 'Core i3' )? 'selected' : ''; ?>>Core i3</option>
                <option value='Core i5'  <?php echo  ($row['processor'] == 'Core i5' )? 'selected' : ''; ?>>Core i5</option>
                <option value='Core i7'  <?php echo  ($row['processor'] == 'Core i7' )? 'selected' : ''; ?>>Core i7</option>
                <option value='Core i9'  <?php echo  ($row['processor'] == 'Core i9' )? 'selected' : ''; ?>>Core i9</option>
                <option value='Ryzen 3'  <?php echo  ($row['processor'] == 'Ryzen 3' )? 'selected' : ''; ?>>Ryzen 3</option>
                <option value='Ryzen 5'  <?php echo  ($row['processor'] == 'Ryzen 5' )? 'selected' : ''; ?>>Ryzen 5</option>
                <option value='Ryzen 7'  <?php echo  ($row['processor'] == 'Ryzen 7' )? 'selected' : ''; ?>>Ryzen 7</option>
                <option value='Ryzen 9'  <?php echo  ($row['processor'] == 'Ryzen 9' )? 'selected' : ''; ?>>Ryzen 9</option>
                <option value='Apple M1'  <?php echo  ($row['processor'] == 'Apple M1' )? 'selected' : ''; ?>>Apple M1</option>
                <option value='Apple M2'  <?php echo  ($row['processor'] == 'Apple M2' )? 'selected' : ''; ?>>Apple M2</option>
                <option value='Apple M2 Max'  <?php echo  ($row['processor'] == 'Apple M2 Max' )? 'selected' : ''; ?>>Apple M2 Max</option>
                <option value='Apple M2 Pro'  <?php echo  ($row['processor'] == 'Apple M2 Pro' )? 'selected' : ''; ?>>Apple M2 Pro</option>
                <option value='SQ3'  <?php echo  ($row['processor'] == 'SQ3' )? 'selected' : ''; ?>>SQ3</option>
            </select><br>
            <label>Screen Size:</label>
            <select name='screen_size' required>
                <option value='10.5 inch'  <?php echo  ($row['screen_size'] == '10.5 inch' )? 'selected' : ''; ?>>10.5 inch</option>
                <option value='11.6 inch'  <?php echo  ($row['screen_size'] == '11.6 inch' )? 'selected' : ''; ?>>11.6 inch</option>
                <option value='12.3 inch'  <?php echo  ($row['screen_size'] == '12.3 inch' )? 'selected' : ''; ?>>12.3 inch</option>
                <option value='12.5 inch'  <?php echo  ($row['screen_size'] == '12.5 inch' )? 'selected' : ''; ?>>12.5 inch</option>
                <option value='13 inch'  <?php echo  ($row['screen_size'] == '13 inch' )? 'selected' : ''; ?>>13 inch</option>
                <option value='13.3 inch'  <?php echo  ($row['screen_size'] == '13.3 inch' )? 'selected' : ''; ?>>13.3 inch</option>
                <option value='13.4 inch'  <?php echo  ($row['screen_size'] == '13.4 inch' )? 'selected' : ''; ?>>13.4 inch</option>
                <option value='13.5 inch'  <?php echo  ($row['screen_size'] == '13.5 inch' )? 'selected' : ''; ?>>13.5 inch</option>
                <option value='13.6 inch'  <?php echo  ($row['screen_size'] == '13.6 inch' )? 'selected' : ''; ?>>13.6 inch</option>
                <option value='14.0 inch'  <?php echo  ($row['screen_size'] == '14.0 inch' )? 'selected' : ''; ?>>14.0 inch</option>
                <option value='14.2 inch'  <?php echo  ($row['screen_size'] == '14.2 inch' )? 'selected' : ''; ?>>14.2 inch</option>
                <option value='14.5 inch'  <?php echo  ($row['screen_size'] == '14.5 inch' )? 'selected' : ''; ?>>14.5 inch</option>
                <option value='15 inch'  <?php echo  ($row['screen_size'] == '15 inch' )? 'selected' : ''; ?>>15 inch</option>
                <option value='15.6 inch'  <?php echo  ($row['screen_size'] == '15.6 inch' )? 'selected' : ''; ?>>15.6 inch</option>
                <option value='16 inch'  <?php echo  ($row['screen_size'] == '16 inch' )? 'selected' : ''; ?>>16 inch</option>
                <option value='16.1 inch'  <?php echo  ($row['screen_size'] == '16.1 inch' )? 'selected' : ''; ?>>16.1 inch</option>
                <option value='17.0 inch'  <?php echo  ($row['screen_size'] == '17.0 inch' )? 'selected' : ''; ?>>17.0 inch</option>
                <option value='17.3 inch'  <?php echo  ($row['screen_size'] == '17.3 inch' )? 'selected' : ''; ?>>17.3 inch</option>
                <option value='16.2 inch'  <?php echo  ($row['screen_size'] == '16.2 inch' )? 'selected' : ''; ?>>16.2 inch</option>
                <option value='18 inch'  <?php echo  ($row['screen_size'] == '18 inch' )? 'selected' : ''; ?>>18 inch</option>
            </select><br>
            <label>Graphics Card:</label>
            <select name='processor' required>
                <option value='Intel Celeron'  <?php echo  ($row['processor'] == 'Intel Celeron' )? 'selected' : ''; ?>>Intel Celeron</option>
                <option value='Intel Pentium'  <?php echo  ($row['processor'] == 'Intel Pentium' )? 'selected' : ''; ?>>Intel Pentium</option>
                <option value='Core i3'  <?php echo  ($row['processor'] == 'Core i3' )? 'selected' : ''; ?>>Core i3</option>
                <option value='Core i5'  <?php echo  ($row['processor'] == 'Core i5' )? 'selected' : ''; ?>>Core i5</option>
                <option value='Core i7'  <?php echo  ($row['processor'] == 'Core i7' )? 'selected' : ''; ?>>Core i7</option>
                <option value='Core i9'  <?php echo  ($row['processor'] == 'Core i9' )? 'selected' : ''; ?>>Core i9</option>
                <option value='Ryzen 3'  <?php echo  ($row['processor'] == 'Ryzen 3' )? 'selected' : ''; ?>>Ryzen 3</option>
                <option value='Ryzen 5'  <?php echo  ($row['processor'] == 'Ryzen 5' )? 'selected' : ''; ?>>Ryzen 5</option>
                <option value='Ryzen 7'  <?php echo  ($row['processor'] == 'Ryzen 7' )? 'selected' : ''; ?>>Ryzen 7</option>
                <option value='Ryzen 9'  <?php echo  ($row['processor'] == 'Ryzen 9' )? 'selected' : ''; ?>>Ryzen 9</option>
                <option value='Apple M1'  <?php echo  ($row['processor'] == 'Apple M1' )? 'selected' : ''; ?>>Apple M1</option>
                <option value='Apple M2'  <?php echo  ($row['processor'] == 'Apple M2' )? 'selected' : ''; ?>>Apple M2</option>
                <option value='Apple M2 Max'  <?php echo  ($row['processor'] == 'Apple M2 Max' )? 'selected' : ''; ?>>Apple M2 Max</option>
                <option value='Apple M2 Pro'  <?php echo  ($row['processor'] == 'Apple M2 Pro' )? 'selected' : ''; ?>>Apple M2 Pro</option>
                <option value='SQ3'  <?php echo  ($row['processor'] == 'SQ3' )? 'selected' : ''; ?>>SQ3</option>
            </select><br>
            <label >Graphics Card:</label>
            <select name="graphics_card" required>
                <option value="Intel HD Graphics" <?php echo ($row['graphics_card'] == 'Intel HD Graphics') ? 'selected' : ''; ?>>Intel HD Graphics</option>
                <option value="Intel UHD Graphics" <?php echo ($row['graphics_card'] == 'Intel UHD Graphics') ? 'selected' : ''; ?>>Intel UHD Graphics</option>
                <option value="Iris Xe Graphics" <?php echo ($row['graphics_card'] == 'Iris Xe Graphics') ? 'selected' : ''; ?>>Iris Xe Graphics</option>
                <option value="GeForce MX550" <?php echo ($row['graphics_card'] == 'GeForce MX550') ? 'selected' : ''; ?>>GeForce MX550</option>
                <option value="GeForce MX570" <?php echo ($row['graphics_card'] == 'GeForce MX570') ? 'selected' : ''; ?>>GeForce MX570</option>
                <option value="GeForce MX350" <?php echo ($row['graphics_card'] == 'GeForce MX350') ? 'selected' : ''; ?>>GeForce MX350</option>
                <option value="GTX 1650" <?php echo ($row['graphics_card'] == 'GTX 1650') ? 'selected' : ''; ?>>GTX 1650</option>
                <option value="RTX 3050" <?php echo ($row['graphics_card'] == 'RTX 3050') ? 'selected' : ''; ?>>RTX 3050</option>
                <option value="RTX 3050 Ti" <?php echo ($row['graphics_card'] == 'RTX 3050 Ti') ? 'selected' : ''; ?>>RTX 3050 Ti</option>
                <option value="RTX 3060" <?php echo ($row['graphics_card'] == 'RTX 3060') ? 'selected' : ''; ?>>RTX 3060</option>
                <option value="RTX 3070" <?php echo ($row['graphics_card'] == 'RTX 3070') ? 'selected' : ''; ?>>RTX 3070</option>
                <option value="RTX 3070Ti" <?php echo ($row['graphics_card'] == 'RTX 3070Ti') ? 'selected' : ''; ?>>RTX 3070Ti</option>
                <option value="RTX 3080 8GB" <?php echo ($row['graphics_card'] == 'RTX 3080 8GB') ? 'selected' : ''; ?>>RTX 3080 8GB</option>
                <option value="Quadro RTX A2000" <?php echo ($row['graphics_card'] == 'Quadro RTX A2000') ? 'selected' : ''; ?>>Quadro RTX A2000</option>
                <option value="RTX 3080Ti" <?php echo ($row['graphics_card'] == 'RTX 3080Ti') ? 'selected' : ''; ?>>RTX 3080Ti</option>
                <option value="RTX 4070" <?php echo ($row['graphics_card'] == 'RTX 4070') ? 'selected' : ''; ?>>RTX 4070</option>
                <option value="RTX 4080" <?php echo ($row['graphics_card'] == 'RTX 4080') ? 'selected' : ''; ?>>RTX 4080</option>
                <option value="RTX 4090" <?php echo ($row['graphics_card'] == 'RTX 4090') ? 'selected' : ''; ?>>RTX 4090</option>
                <option value="AMD Radeon" <?php echo ($row['graphics_card'] == 'AMD Radeon') ? 'selected' : ''; ?>>AMD Radeon</option>
                <option value="AMD Radeon HD" <?php echo ($row['graphics_card'] == 'AMD Radeon HD') ? 'selected' : ''; ?>>AMD Radeon HD</option>
                <option value="Quadro T550 4GB" <?php echo ($row['graphics_card'] == 'Quadro T550 4GB') ? 'selected' : ''; ?>>Quadro T550 4GB</option>
                <option value="Quadro T550 2GB" <?php echo ($row['graphics_card'] == 'Quadro T550 2GB') ? 'selected' : ''; ?>>Quadro T550 2GB</option>
                <option value="RTX 4050 6GB" <?php echo ($row['graphics_card'] == 'RTX 4050 6GB') ? 'selected' : ''; ?>>RTX 4050 6GB</option>
                <option value="AMD Radeon 680M" <?php echo ($row['graphics_card'] == 'AMD Radeon 680M') ? 'selected' : ''; ?>>AMD Radeon 680M</option>
                <option value="RTX 3070Ti 8GB 30 core 4GB" <?php echo ($row['graphics_card'] == 'RTX 3070Ti 8GB 30 core 4GB') ? 'selected' : ''; ?>>RTX 3070Ti 8GB 30 core 4GB</option>
                <option value="RTX 4060 8GB t500" <?php echo ($row['graphics_card'] == 'RTX 4060 8GB t500') ? 'selected' : ''; ?>>RTX 4060 8GB t500</option>
                <option value="RTX3050 Max Q NVIDIA GeForce" <?php echo ($row['graphics_card'] == 'RTX3050 Max Q NVIDIA GeForce') ? 'selected' : ''; ?>>RTX3050 Max Q NVIDIA GeForce</option>
                <option value="RTX 3050 4GB" <?php echo ($row['graphics_card'] == 'RTX 3050 4GB') ? 'selected' : ''; ?>>RTX 3050 4GB</option>
                <option value="RTX 3050 Ti 4GB" <?php echo ($row['graphics_card'] == 'RTX 3050 Ti 4GB') ? 'selected' : ''; ?>>RTX 3050 Ti 4GB</option>
                <option value="RTX 4070 8GB" <?php echo ($row['graphics_card'] == 'RTX 4070 8GB') ? 'selected' : ''; ?>>RTX 4070 8GB</option>
                <option value="Microsoft SQ3 Adreno™ 8CX Gen 3 16GB" <?php echo ($row['graphics_card'] == 'Microsoft SQ3 Adreno™ 8CX Gen 3 16GB') ? 'selected' : ''; ?>>Microsoft SQ3 Adreno™ 8CX Gen 3 16GB</option>
                <option value="GeForce MX450 10 CORE 4GB GDDR6" <?php echo ($row['graphics_card'] == 'GeForce MX450 10 CORE 4GB GDDR6') ? 'selected' : ''; ?>>GeForce MX450 10 CORE 4GB GDDR6</option>
                <option value="Quadro T500 4GB" <?php echo ($row['graphics_card'] == 'Quadro T500 4GB') ? 'selected' : ''; ?>>Quadro T500 4GB</option>
                <option value="Intel Iris Plus Geforce" <?php echo ($row['graphics_card'] == 'Intel Iris Plus Geforce') ? 'selected' : ''; ?>>Intel Iris Plus Geforce</option>
                <option value="RTX 2050 6GB" <?php echo ($row['graphics_card'] == 'RTX 2050 6GB') ? 'selected' : ''; ?>>RTX 2050 6GB</option>
                <option value="AMD Radeon 660M" <?php echo ($row['graphics_card'] == 'AMD Radeon 660M') ? 'selected' : ''; ?>>AMD Radeon 660M</option>
                <option value="RTX 3060 6GB" <?php echo ($row['graphics_card'] == 'RTX 3060 6GB') ? 'selected' : ''; ?>>RTX 3060 6GB</option>
            </select>


            <label for='ram'>RAM:</label>
            <select name="ram" required>
                <option value="4GB" <?php echo ($row['ram'] == '4GB') ? 'selected' : ''; ?>>4GB</option>
                <option value="8GB" <?php echo ($row['ram'] == '8GB') ? 'selected' : ''; ?>>8GB</option>
                <option value="16GB" <?php echo ($row['ram'] == '16GB') ? 'selected' : ''; ?>>16GB</option>
                <option value="24GB" <?php echo ($row['ram'] == '24GB') ? 'selected' : ''; ?>>24GB</option>
                <option value="32GB" <?php echo ($row['ram'] == '32GB') ? 'selected' : ''; ?>>32GB</option>
                <option value="64GB" <?php echo ($row['ram'] == '64GB') ? 'selected' : ''; ?>>64GB</option>
                <!-- Add more options here if needed -->
            </select>

            <label for="storage_capacity">Storage Capacity:</label>
            <select name="storage_capacity" required>
                <option value="2 TB" <?php echo ($row['storage_capacity'] == '2 TB') ? 'selected' : ''; ?>>2 TB</option>
                <option value="1 TB" <?php echo ($row['storage_capacity'] == '1 TB') ? 'selected' : ''; ?>>1 TB</option>
                <option value="256GB SSD" <?php echo ($row['storage_capacity'] == '256GB SSD') ? 'selected' : ''; ?>>256GB SSD</option>
                <option value="1TB SSD" <?php echo ($row['storage_capacity'] == '1TB SSD') ? 'selected' : ''; ?>>1TB SSD</option>
                <option value="512GB SSD" <?php echo ($row['storage_capacity'] == '512GB SSD') ? 'selected' : ''; ?>>512GB SSD</option>
                <option value="32GB eMMC" <?php echo ($row['storage_capacity'] == '32GB eMMC') ? 'selected' : ''; ?>>32GB eMMC</option>
                <option value="4 TB" <?php echo ($row['storage_capacity'] == '4 TB') ? 'selected' : ''; ?>>4 TB</option>
                <option value="64GB eMMC" <?php echo ($row['storage_capacity'] == '64GB eMMC') ? 'selected' : ''; ?>>64GB eMMC</option>
                <option value="1TB + 1TB SSD" <?php echo ($row['storage_capacity'] == '1TB + 1TB SSD') ? 'selected' : ''; ?>>1TB + 1TB SSD</option>
                <option value="128GB SSD" <?php echo ($row['storage_capacity'] == '128GB SSD') ? 'selected' : ''; ?>>128GB SSD</option>
                <!-- Add more options here if needed -->
            </select><br>
            <label for="operating_system">Operating System:</label>
            <select name="operating_system" required>
                <option value="Windows 10" <?php echo ($row['operating_system'] == 'Windows 10') ? 'selected' : ''; ?>>Windows 10</option>
                <option value="Mac OS" <?php echo ($row['operating_system'] == 'Mac OS') ? 'selected' : ''; ?>>Mac OS</option>
                <option value="Windows 11" <?php echo ($row['operating_system'] == 'Windows 11') ? 'selected' : ''; ?>>Windows 11</option>
                <option value="Ubuntu" <?php echo ($row['operating_system'] == 'Ubuntu') ? 'selected' : ''; ?>>Ubuntu</option>
                <option value="Non-OS" <?php echo ($row['operating_system'] == 'Non-OS') ? 'selected' : ''; ?>>Non-OS</option>
                <option value="Fedora" <?php echo ($row['operating_system'] == 'Fedora') ? 'selected' : ''; ?>>Fedora</option>
                <option value="Windows 11 Pro" <?php echo ($row['operating_system'] == 'Windows 11 Pro') ? 'selected' : ''; ?>>Windows 11 Pro</option>
                <option value="Linux" <?php echo ($row['operating_system'] == 'Linux') ? 'selected' : ''; ?>>Linux</option>
                <option value="FreeDos" <?php echo ($row['operating_system'] == 'FreeDos') ? 'selected' : ''; ?>>FreeDos</option>
                <option value="OFFICE HOME" <?php echo ($row['operating_system'] == 'OFFICE HOME') ? 'selected' : ''; ?>>OFFICE HOME</option>
                <!-- Add more options here if needed -->
            </select><br>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Còn hàng" <?php echo ($row['status'] == 'Còn hàng') ? 'selected' : ''; ?>>Còn hàng</option>
                <option value="Liên hệ" <?php echo ($row['status'] == 'Liên hệ') ? 'selected' : ''; ?>>Liên hệ</option>
                <!-- Add more options here if needed -->
            </select><br>

            <label>Trọng lượng (kg):</label>
            <input type="number" name="weight" step="0.1" value="<?php echo $row['weight']; ?>" required><br>

            <label>Tình trạng:</label>
            <input type="text" name="status" value="<?php echo $row['status']; ?>" required><br>

            <label>Khoảng giá:</label>
            <input type="number" name="price_range" step="1000" value="<?php echo $row['price_range']; ?>" required><br>

            <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>" required hidden><br>

            <input type="submit" value="Lưu">
            <a class="back-edit-display-laptop" href="display_laptop.php">Quay lại trang quản lí sản phẩm</a>

        </form>


</html>
