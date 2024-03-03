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

    // Retrieve form data
    $name = $_POST['name'];
    $message = $_POST['message'];
    $icon = $_POST['icon'];
    $url = $_POST['url'];

    // Prepare SQL query to insert data into the table
    $stmt = $pdo->prepare("INSERT INTO myNotifications (name, message, icon, url) VALUES (:name, :message, :icon, :url)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':icon', $icon);
    $stmt->bindParam(':url', $url);

    // Execute the prepared statement
    $stmt->execute();

    // Close the PDO connection
    $pdo = null;

    // Echo a script to display the pop-up notification
    echo '<script>
     alert("Notification added successfully");
     window.addEventListener("load", function() {
         $(".alert").on("closed.bs.alert", function() {
             window.history.back();
         });
     });
     </script>';
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
