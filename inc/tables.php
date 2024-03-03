<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE myNotifications (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  message TEXT NOT NULL,
  icon VARCHAR(100),
  url VARCHAR(255),
  time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  additional_info TEXT
);";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table myNotifications created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>