<?php
class MaKhuyenMaiModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getMaKhuyenMaiById($id) {
        $sql = "SELECT * FROM ma_khuyen_mai WHERE id_ma_khuyen_mai = $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
