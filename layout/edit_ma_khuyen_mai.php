<?php
require_once 'MaKhuyenMaiModel.php';
include_once 'connect.php';

class EditMaKhuyenMaiController {
    private $model;

    public function __construct($conn) {
        $this->model = new MaKhuyenMaiModel($conn);
    }

    public function editMaKhuyenMai($id) {
        $maKhuyenMai = $this->model->getMaKhuyenMaiById($id);

        if ($maKhuyenMai) {
            require 'view/edit_ma_khuyen_mai_view.php';
        } else {
            echo "Không tìm thấy mã khuyến mãi.";
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $controller = new EditMaKhuyenMaiController($conn);
    $controller->editMaKhuyenMai($id);
} else {
    echo "Invalid request.";
}

$conn->close();
?>
