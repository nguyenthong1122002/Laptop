
<!DOCTYPE html>
<html>
<head>
    <title>Laptop Filter</title>
    <link rel="stylesheet" href="/css/filter.css">
</head>
<body>
    <header><?php include 'header.php';?></header>
    <main><form id="filterForm">
        <label for="brand">Hãng:</label>
        <select id="brand" name="brand">
            <option value="">Tất cả</option>
            <option value="Asus">Asus</option>
            <option value="Msi">Msi</option>
            <option value="HP">HP</option>
            <option value="Acer">Acer</option>
            <option value="Dell">Dell</option>
            <option value="Samsung">SamSung</option>
            <option value="Macbook">Macbook</option>
            <option value="Lenovo">Lenovo</option>
            <option value="LG">LG</option>
            <option value="GIGABYTE">GIGABYTE</option>
            <option value="Huawei">Huawei</option>
        </select>
        <br>
        <label for="processor">CPU:</label>
        <select id="processor" name="processor">
            <option value="">Tất cả</option>
            <option value="Core i3">Core i3</option>
            <option value="Core i5">Core i5</option>
            <option value="Core i7">Core i7</option>
            <option value="Core i9">Core i9</option>
        </select>
        <br>
        <label for="ram">Ram:</label>
        <select id="ram" name="ram">
            <option value="">Tất cả</option>
            <option value="4GB">4GB</option>
            <option value="8GB">8GB</option>
            <option value="16GB">16GB</option>
            <option value="24GB">24GB</option>
            <option value="32GB">32GB</option>
            <option value="64GB">64GB</option>
        </select>
        <br>
        <label for="storage_capacity">Dung lượng ổ cứng:</label>
        <select id="storage_capacity" name="storage_capacity">
            <option value="">Tất cả</option>
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
        </select>
        <br>
        <button type="submit">Lọc</button>
    </form>

    <div id="laptopsContainer">

    </div>
    <div class="pagination">
        <button id="prevPageBtn" disabled>Previous Page</button>
        <button id="nextPageBtn" disabled>Next Page</button>
    </div></main>
    
    <footer><?php 
    include 'footer.php';
    ?>
    </footer>
    <script src="/js/filter.js">
        
    </script>
</body>
</html>
