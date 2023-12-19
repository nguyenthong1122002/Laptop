<?php
// Include the code to connect to the database and verify the user's authentication session

include_once 'connect.php';


// Check if the user is logged in and has a valid session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

// Retrieve the user's information from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows === 1) {
    // Fetch the user's data
    $user_data = $result->fetch_assoc();
} else {
    // Handle the case when the user data cannot be retrieved (e.g., user not found)
    // You can redirect to an error page or display an error message here
    echo "Error: User data not found.";
    exit();
}
?>