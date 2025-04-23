<?php
$host = "localhost";
$user = "root";
$password = "harish1001"; // your MySQL password
$database = "portfolio_db";

// DB connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get values
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SQL
$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
  header("Location: index.php?success=true");
  exit();
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
