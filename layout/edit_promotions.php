<?php
require_once 'Edit_PromotionModel.php';
include 'connect.php';
class EditPromotionsController {
    private $model;

    public function __construct($conn) {
        $this->model = new Edit_PromotionModel($conn);
    }

    public function editPromotion($id) {
        $promotion = $this->model->getPromotionById($id);

        if ($promotion) {
            require 'view/edit_promotions_view.php';
        } else {
            echo "Không tìm thấy chương trình khuyến mãi có ID = $id";
        }
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : '';

$controller = new EditPromotionsController($conn);
$controller->editPromotion($id);

$conn->close();
?>
