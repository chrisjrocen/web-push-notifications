<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "myDB";

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query to fetch notifications
    $stmt = $pdo->prepare("SELECT * FROM myNotifications");
    // Execute the prepared statement
    $stmt->execute();
    // Fetch all notifications
    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return notifications as JSON
    echo json_encode($notifications);
} catch(PDOException $e) {
    // Return error message
    echo json_encode(array("error" => $e->getMessage()));
}

// Close the PDO connection
$pdo = null;
?>
