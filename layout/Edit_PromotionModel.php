<?php
class Edit_PromotionModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPromotionById($id) {
        $sql = "SELECT * FROM promotions WHERE id_promotions = '$id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
