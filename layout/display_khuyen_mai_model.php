<?php
class PromoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllPromotions() {
        $sql = "SELECT * FROM ma_khuyen_mai";
        $result = $this->conn->query($sql);

        $promotions = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $promotions[] = $row;
            }
        }

        return $promotions;
    }
}
?>
