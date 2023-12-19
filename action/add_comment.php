<?php
// Check if the form was submitted with POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the connection to the database
    include 'connect.php';

    // Validate and sanitize input
    function sanitize_input($input) {
        // Example validation - you can add more checks based on your requirements
        return htmlspecialchars(trim($input));
    }

    // Check if the user is logged in
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // Redirect the user to the laptop details page with an error message
        header("Location: /laptop_detail.php?id=" . sanitize_input($_POST['id_laptop']) . "&comment_error=1");
        exit();
    }

    // Get the input values from the form
    $laptop_id = sanitize_input($_POST['laptop_id']);
    $user_id = $_SESSION['user_id']; // Assuming 'user_id' is set in the session after login
    $rating = sanitize_input($_POST['rating']);
    $comment = sanitize_input($_POST['comment']);

    // Perform the SQL query to insert the comment into the database using prepared statement
    $stmt = $conn->prepare("INSERT INTO `binh_luan_laptop` (`laptop_id`, `id_nguoi_dung`, `rating`, `noi_dung`, `ngay_binh_luan`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $laptop_id, $user_id, $rating, $comment, date('Y-m-d'));

    // Check if the query was successful
    if ($stmt->execute()) {
        // Redirect the user back to the laptop details page with a success message
        header("Location: /layout/product_details.php?id=$laptop_id");
        exit();
    } else {
        // If there was an error with the query, display an error message or redirect to an error page
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form was not submitted with POST method, redirect the user to an error page
    header("Location: /error.php");
    exit();
}
?>
