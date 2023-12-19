<?php
include_once 'connect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $user_id = $_POST["user_id"];
    $newPassword = $_POST["password"];
    $fullName = $_POST["full_name"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    // Perform any necessary validation on the form data here
    // For example, you may check if the email is valid, perform length checks, etc.
    // If any validation fails, you should redirect back to the profile page with an error message.
    // For simplicity, I'm omitting the validation checks here.

    // Update the user's profile data in the database, including the password (without hashing)
    if (!empty($newPassword)) {
        // Update the user's profile data in the database, including the plain password
        $sql = "UPDATE users SET full_name = ?, sex = ?, email = ?, address = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $fullName, $sex, $email, $address, $newPassword, $user_id);
    } else {
        // Update the user's profile data in the database, excluding the password
        $sql = "UPDATE users SET full_name = ?, sex = ?, email = ?, address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $fullName, $sex, $email, $address, $user_id);
    }

    // Execute the update
    if ($stmt->execute()) {
        echo "<script>alert('Đã sửa người dùng thành công');</script>";
        echo "<script>window.location = '/layout/profile.php'; </script>";
        exit();
    } else {
        // Update failed, redirect with an error message
        header("Location: /layout/profile.php?error=1");
        exit();
    }
} else {
    // If the form is not submitted via POST, redirect the user to the profile page
    header("Location: /layout/profile.php");
    exit();
}
?>
