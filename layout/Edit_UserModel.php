<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserById($user_id) {
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
