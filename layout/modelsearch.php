<?php
// Model.php
class Modelsearch {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function searchLaptops($searchTerm) {
        $sql = "SELECT * FROM laptops WHERE laptop_name LIKE '%$searchTerm%'";
        $result = mysqli_query($this->conn, $sql);

        $productsArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $productsArray[] = $row;
        }

        return $productsArray;
    }
}
?>
