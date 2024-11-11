<?php
// Database configuration
$host = "localhost";          // Database host (e.g., localhost for local development)
$db_name = "summer_camp_management";  // Name of your database
$username = "root";            // Database username (e.g., root for local development)
$password = "";                // Database password (leave blank if no password for local development)

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    
    // Set the PDO error mode to exception to handle errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";  // Optional: Use for testing connection
    
} catch(PDOException $e) {
    // Catch and display connection error
    echo "Connection failed: " . $e->getMessage();
}
?>
