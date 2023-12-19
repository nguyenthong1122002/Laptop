<?php
class OrderModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getOrders() {
        $sql = "SELECT * FROM orders";
        return $this->conn->query($sql);
    }

    public function updateStatus($action, $orderId) {
        $sql = "";
        switch ($action) {
            case "confirm":
                $sql = "UPDATE `orders` SET `order_status` = 'Confirmed' WHERE `order_id` = $orderId";
                break;
            case "ship":
                $sql = "UPDATE `orders` SET `order_status` = 'Shipped' WHERE `order_id` = $orderId";
                break;
            case "complete":
                $sql = "UPDATE `orders` SET `order_status` = 'Completed' WHERE `order_id` = $orderId";
                break;
            case "cancel":
                $sql = "DELETE FROM `orders` WHERE `order_id` = $orderId";
                break;
        }

        if ($sql !== "") {
            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                return $this->conn->error;
            }
        }
    }
}
?>
