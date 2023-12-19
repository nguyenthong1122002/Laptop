<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['title']) && isset($_POST['content']) && isset($_POST['start_date'])
        && isset($_POST['end_date']) && isset($_FILES['image']['name'])
    ) {
        include 'connect.php';

        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        if (strtotime($start_date) >= strtotime($end_date)) {
            
            echo "<script>alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc.');</script>";
            echo "<script>window.location = '/layout/view/add_promotions.php';</script>";
        }

        $image_path = "img/";
        $target_file = $image_path . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "<script>alert('Tệp tin không phải là hình ảnh.');</script>";
            echo "<script>window.location = '/layout/view/add_promotions.php';</script>";
        }

        $max_file_size = 5 * 1024 * 1024;
        if ($_FILES["image"]["size"] > $max_file_size) {
            die("Hình ảnh quá lớn. Vui lòng chọn hình ảnh nhỏ hơn 5MB.");
        }

        $allowed_extensions = array("jpeg", "jpg", "png", "gif");
        if (!in_array($imageFileType, $allowed_extensions)) {
            die("Chỉ cho phép tải lên các hình ảnh có định dạng JPEG, JPG, PNG hoặc GIF.");
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO promotions (title, content, image_path, start_date, end_date)
                    VALUES ('$title', '$content', '$target_file', '$start_date', '$end_date')";

            if ($conn->query($sql) === true) {
                echo "<script>alert('Thêm chương trình khuyến mãi thành công!');</script>";
                echo "<script>window.location = '/layout/display_promotions_controller.php';</script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }

        $conn->close();
    } else {
        echo "Vui lòng điền đầy đủ thông tin chương trình khuyến mãi.";
    }
}
?>
