<?php 
// LaptopModel.php
class LaptopModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getLaptops($filterData, $startIndex, $laptopsPerPage) {
        $sql = "SELECT * FROM laptops WHERE brand = :brand AND processor = :processor AND ram = :ram AND storage_capacity = :storage_capacity LIMIT :startIndex, :laptopsPerPage";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindParam(':brand', $filterData['brand']);
        $stmt->bindParam(':processor', $filterData['processor']);
        $stmt->bindParam(':ram', $filterData['ram']);
        $stmt->bindParam(':storage_capacity', $filterData['storage_capacity']);
        $stmt->bindParam(':startIndex', $startIndex, PDO::PARAM_INT);
        $stmt->bindParam(':laptopsPerPage', $laptopsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalLaptops($filterData) {
        $sql = "SELECT COUNT(*) FROM laptops WHERE brand = :brand AND processor = :processor AND ram = :ram AND storage_capacity = :storage_capacity";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bindParam(':brand', $filterData['brand']);
        $stmt->bindParam(':processor', $filterData['processor']);
        $stmt->bindParam(':ram', $filterData['ram']);
        $stmt->bindParam(':storage_capacity', $filterData['storage_capacity']);
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
