<?php
// models/PromotionModel.php
class PromotionModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPromotions($start, $itemsPerPage) {
        $sql = "SELECT `id_promotions`, `image_path`, `start_date`, `end_date`, `title` FROM `promotions` LIMIT $start, $itemsPerPage";
        $result = $this->conn->query($sql);

        $promotions = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $promotions[] = $row;
            }
        }

        return $promotions;
    }

    public function getTotalPromotions() {
        $sql = "SELECT COUNT(*) AS total FROM `promotions`";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
