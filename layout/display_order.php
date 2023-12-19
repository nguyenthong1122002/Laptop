<?php

class OrderController {
    private $model;

    public function __construct($conn) {
        $this->model = new OrderModel($conn);
    }

    public function displayOrders() {
        $orders = $this->model->getOrders();
        require 'view/display_order_view.php';
    }

    public function updateOrderStatus($action, $orderId) {
        $result = $this->model->updateStatus($action, $orderId);
        if ($result === true) {
            echo "Order status updated successfully.";
        } else {
            echo "Error updating order status: " . $result;
        }
    }
}




session_start();
require_once 'OrderModel.php';
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new OrderController($conn);

    if (isset($_POST["action"]) && isset($_POST["order_id"])) {
        $action = $_POST["action"];
        $orderId = $_POST["order_id"];
        $controller->updateOrderStatus($action, $orderId);
    }
} else {
    $controller = new OrderController($conn);
    $controller->displayOrders();
}

$conn->close();

?>
