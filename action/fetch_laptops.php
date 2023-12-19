<?php
include 'connect.php';
$brand = $_POST["brand"];
$processor = $_POST["processor"];
$ram = $_POST["ram"];
$storage_capacity = $_POST["storage_capacity"];
$sql = "SELECT `id`, `laptop_name`, `price_range`, `image_url`,`storage_capacity` FROM `laptops` WHERE 1";
$conditions = array();

if (!empty($brand)) {
    $conditions[] = "`brand` = '$brand'";
}
if (!empty($processor)) {
    $conditions[] = "`processor` = '$processor'";
}
if (!empty($ram)) {
    $conditions[] = "`ram` = '$ram'";
}
if (!empty($storage_capacity)) {
    $conditions[] = "`storage_capacity` = '$storage_capacity'";
}
if (!empty($conditions)) {
    $sql .= " AND " . implode(" AND ", $conditions);
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $laptops = array();
    while ($row = $result->fetch_assoc()) {
        $laptops[] = $row;
    }
    echo json_encode($laptops);
} else {
    echo json_encode(array());
}

$conn->close();
?>
