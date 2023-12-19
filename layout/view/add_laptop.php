<!DOCTYPE html>
<html>
<head>
    <title>Add Laptop</title>
    <link rel="stylesheet" href="/css/add_product.css">
</head>

<body>
<button class="add-product-btn" onclick="openModal()">Thêm sản phẩm</button>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form action="/action/add_product.php" method="POST" enctype="multipart/form-data">
                <h1>Add Laptop</h1>
                <label for="laptop_name">Laptop Name:</label>
                <input type="text" name="laptop_name" required><br>

                <label for="brand">Brand:</label>
                <select name="brand" required>
                    <option value="Asus">Asus</option>
                    <option value="Acer">Acer</option>
                    <option value="Dell">Dell</option>
                    <option value="Gigabyte">Gigabyte</option>
                    <option value="HP">HP</option>
                    <option value="Lenovo">Lenovo</option>
                    <option value="LG">LG</option>
                    <option value="MSI">MSI</option>
                    <option value="Macbook">Macbook</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Huawei">Huawei</option>
                </select><br>

                <label for="processor">Processor:</label>
                <select name="processor" required>
                    <option value="Intel Celeron">Intel Celeron</option>
                    <option value="Intel Pentium">Intel Pentium</option>
                    <option value="Core i3">Core i3</option>
                    <option value="Core i5">Core i5</option>
                    <option value="Core i7">Core i7</option>
                    <option value="Core i9">Core i9</option>
                    <option value="Ryzen 3">Ryzen 3</option>
                    <option value="Ryzen 5">Ryzen 5</option>
                    <option value="Ryzen 7">Ryzen 7</option>
                    <option value="Ryzen 9">Ryzen 9</option>
                    <option value="Apple M1">Apple M1</option>
                    <option value="Apple M2">Apple M2</option>
                    <option value="Apple M2 Max">Apple M2 Max</option>
                    <option value="Apple M2 Pro">Apple M2 Pro</option>
                    <option value="SQ3">SQ3</option>
                </select><br>

                <label for="screen_size">Screen Size:</label>
                <select name="screen_size" required>
                    <option value="10.5 inch">10.5 inch</option>
                    <option value="11.6 inch">11.6 inch</option>
                    <option value="12.3 inch">12.3 inch</option>
                    <option value="12.5 inch">12.5 inch</option>
                    <option value="13 inch">13 inch</option>
                    <option value="13.3 inch">13.3 inch</option>
                    <option value="13.4 inch">13.4 inch</option>
                    <option value="13.5 inch">13.5 inch</option>
                    <option value="13.6 inch">13.6 inch</option>
                    <option value="14.0 inch">14.0 inch</option>
                    <option value="14.2 inch">14.2 inch</option>
                    <option value="14.5 inch">14.5 inch</option>
                    <option value="15 inch">15 inch</option>
                    <option value="15.6 inch">15.6 inch</option>
                    <option value="16 inch">16 inch</option>
                    <option value="16.1 inch">16.1 inch</option>
                    <option value="17.0 inch">17.0 inch</option>
                    <option value="17.3 inch">17.3 inch</option>
                    <option value="16.2 inch">16.2 inch</option>
                    <option value="18 inch">18 inch</option>
                </select><br>

                <label for="graphics_card">Graphics Card:</label>
                <select name="graphics_card" required>
                    <option value="Intel HD Graphics">Intel HD Graphics</option>
                    <option value="Intel UHD Graphics">Intel UHD Graphics</option>
                    <option value="Iris Xe Graphics">Iris Xe Graphics</option>
                    <option value="GeForce MX550">GeForce MX550</option>
                    <option value="GeForce MX570">GeForce MX570</option>
                    <option value="GeForce MX350">GeForce MX350</option>
                    <option value="GTX 1650">GTX 1650</option>
                    <option value="RTX 3050">RTX 3050</option>
                    <option value="RTX 3050 Ti">RTX 3050 Ti</option>
                    <option value="RTX 3060">RTX 3060</option>
                    <option value="RTX 3070">RTX 3070</option>
                    <option value="RTX 3070Ti">RTX 3070Ti</option>
                    <option value="RTX 3080 8GB">RTX 3080 8GB</option>
                    <option value="Quadro RTX A2000">Quadro RTX A2000</option>
                    <option value="RTX 3080Ti">RTX 3080Ti</option>
                    <option value="RTX 4070">RTX 4070</option>
                    <option value="RTX 4080">RTX 4080</option>
                    <option value="RTX 4090">RTX 4090</option>
                    <option value="AMD Radeon">AMD Radeon</option>
                    <option value="AMD Radeon HD">AMD Radeon HD</option>
                    <option value="Quadro T550 4GB">Quadro T550 4GB</option>
                    <option value="Quadro T550 2GB">Quadro T550 2GB</option>
                    <option value="RTX 4050 6GB">RTX 4050 6GB</option>
                    <option value="AMD Radeon 680M">AMD Radeon 680M</option>
                    <option value="RTX 3070Ti 8GB 30 core 4GB">RTX 3070Ti 8GB 30 core 4GB</option>
                    <option value="RTX 4060 8GB t500">RTX 4060 8GB t500</option>
                    <option value="RTX3050 Max Q NVIDIA GeForce">RTX3050 Max Q NVIDIA GeForce</option>
                    <option value="RTX 3050 4GB">RTX 3050 4GB</option>
                    <option value="RTX 3050 Ti 4GB">RTX 3050 Ti 4GB</option>
                    <option value="RTX 4070 8GB">RTX 4070 8GB</option>
                    <option value="Microsoft SQ3 Adreno™ 8CX Gen 3 16GB">Microsoft SQ3 Adreno™ 8CX Gen 3 16GB</option>
                    <option value="GeForce MX450 10 CORE 4GB GDDR6">GeForce MX450 10 CORE 4GB GDDR6</option>
                    <option value="Quadro T500 4GB">Quadro T500 4GB</option>
                    <option value="Intel Iris Plus Geforce">Intel Iris Plus Geforce</option>
                    <option value="RTX 2050 6GB">RTX 2050 6GB</option>
                    <option value="AMD Radeon 660M">AMD Radeon 660M</option>
                    <option value="RTX 3060 6GB">RTX 3060 6GB</option>
                    <!-- Add any other graphics card options here -->
                </select><br>
                <label for="ram">RAM:</label>
                <select name="ram" required>
                    <option value="4GB">4GB</option>
                    <option value="8GB">8GB</option>
                    <option value="16GB">16GB</option>
                    <option value="24GB">24GB</option>
                    <option value="32GB">32GB</option>
                    <option value="64GB">64GB</option>
                </select><br>

                <label for="storage_capacity">Storage Capacity:</label>
                <select name="storage_capacity" required>
                    <option value="2 TB">2 TB</option>
                    <option value="1 TB">1 TB</option>
                    <option value="256GB SSD">256GB SSD</option>
                    <option value="1TB SSD">1TB SSD</option>
                    <option value="512GB SSD">512GB SSD</option>
                    <option value="32GB eMMC">32GB eMMC</option>
                    <option value="4 TB">4 TB</option>
                    <option value="64GB eMMC">64GB eMMC</option>
                    <option value="1TB + 1TB SSD">1TB + 1TB SSD</option>
                    <option value="128GB SSD">128GB SSD</option>
                    <!-- Add any other storage capacity options here -->
                </select><br>


                <label for="operating_system">Operating System:</label>
                <select name="operating_system" required>
                    <option value="Windows 10">Windows 10</option>
                    <option value="Mac OS">Mac OS</option>
                    <option value="Windows 11">Windows 11</option>
                    <option value="Ubuntu">Ubuntu</option>
                    <option value="Non-OS">Non-OS</option>
                    <option value="Fedora">Fedora</option>
                    <option value="Windows 11 Pro">Windows 11 Pro</option>
                    <option value="Linux">Linux</option>
                    <option value="FreeDos">FreeDos</option>
                    <option value="OFFICE HOME">OFFICE HOME</option>
                </select><br>
                <select name="status" required>
                    <option value="Còn hàng">Còn hàng</option>
                    <option value="Liên hệ">Liên hệ</option>   
                </select><br>
                <label for="weight">Weight (kg):</label>
                <input type="number" name="weight" step="0.1"  required><br>
                <label for="price_range">Price Range:</label>
                <input type="number" name="price_range" step="1000" required><br>
                <label for="image_url">Image URL:</label>
                <input type="file" name="image_url"><br>
                <input type="submit" value="Add Laptop">
            </form>
            </div>
    </div>
    <script src="/js/add_product.js">
    </script>
</body>
</html>
