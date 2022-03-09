<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$del = $_REQUEST['id'];
$sql = "DELETE FROM form WHERE id=$del";

if ($conn->query($sql) === TRUE) {
  header("Location: back.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>