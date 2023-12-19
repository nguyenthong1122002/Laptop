
<?php
require_once 'PromotionModel.php';
require_once 'connect.php';

class PromotionController {
    private $model;

    public function __construct($conn) {
        // Khởi tạo model
        $this->model = new PromotionModel($conn);
    }

    public function index($page) {
        $itemsPerPage = 10;
        $start = ($page - 1) * $itemsPerPage;

        // Lấy danh sách chương trình khuyến mãi và tổng số lượng
        $promotions = $this->model->getPromotions($start, $itemsPerPage);
        $totalPromotions = $this->model->getTotalPromotions();
        $totalPages = ceil($totalPromotions / $itemsPerPage);

        // Gọi view để hiển thị danh sách chương trình khuyến mãi
        require 'view/show-promotions.php';
    }
}

// Lấy trang hiện tại từ tham số URL
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Tạo kết nối đến CSDL


$controller = new PromotionController($conn);
$controller->index($page);
?>
