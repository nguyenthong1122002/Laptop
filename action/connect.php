<?php
// Replace these variables with your actual MySQL credentials
$hostname = "localhost";  // MySQL server hostname (usually "localhost")
$username = "root";  // MySQL username
$password = "";  // MySQL password
$database = "Agile";  // MySQL database name

// Create a connection to the MySQL server
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
