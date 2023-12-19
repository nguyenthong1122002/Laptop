<!DOCTYPE html>
<html>
<head>
    <title>Kết quả tìm kiếm</title>
  <link rel="stylesheet" href="/css/search_laptop.css">

</head>
<body>
    <header>
        <?php include_once 'header.php'; ?>   
    </header>
    <?php
    // index.php
    include_once 'connect.php';
    include_once 'modelsearch.php';
    include_once 'view/viewsearch.php';
    include_once 'Controllersearch.php';

    $model = new Modelsearch($conn);
    $view = new Viewsearch();
    $controller = new Controllersearch($model, $view);

    if (isset($_POST['search'])) {
        $searchTerm = $_POST['search_term'];
        $controller->searchLaptops($searchTerm);
    }

    mysqli_close($conn);
    ?>
    <footer><?php include_once 'footer.php'; ?></footer>
    <script src="/js/search.js" >

    </script>
</body>
</html>
