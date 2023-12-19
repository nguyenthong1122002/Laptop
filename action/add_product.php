<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $laptop_name = $_POST["laptop_name"];
    $brand = $_POST["brand"];
    $processor = $_POST["processor"];
    $screen_size = $_POST["screen_size"];
    $graphics_card = $_POST["graphics_card"];
    $ram = $_POST["ram"];
    $storage_capacity = $_POST["storage_capacity"];
    $operating_system = $_POST["operating_system"];
    $status = $_POST["status"];
    $weight = $_POST["weight"];
    $price_range = $_POST["price_range"];
    $targetDir = "img/";
    $image_urlName = basename($_FILES["image_url"]["name"]);
    $targetFilePath = $targetDir . $image_urlName;
    $image_urlFileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $conn = new mysqli('localhost', 'root', '', 'Agile');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $allowableTypes = array("jpg", "jpeg", "png", "gif");
    if (in_array($image_urlFileType, $allowableTypes)) {
        // Attempt to move the uploaded image_url to the target folder
        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $targetFilePath)) {
            echo "image_url uploaded successfully!";
        } else {
            echo "Error uploading image_url.";
        }
    } else {
        echo "Invalid image_url format. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    // SQL query to insert the data into the database
    $sql = "INSERT INTO laptops (laptop_name, brand, processor, screen_size, graphics_card, ram, storage_capacity, operating_system,status ,weight, price_range,image_url) VALUES ('$laptop_name', '$brand', '$processor', '$screen_size', '$graphics_card', '$ram', '$storage_capacity', '$operating_system', '$status' ,'$weight', '$price_range','$targetFilePath')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Thêm sản phẩm thành công!");</script>';
        echo '<script>window.location.href = "/layout/display_laptop.php";</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: /layout/display_laptop.php");

    }

    $conn->close();
}
?>
