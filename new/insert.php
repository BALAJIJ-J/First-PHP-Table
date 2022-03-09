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

$fnam = $_POST["fname"];
$lnam = $_POST["lname"];
$emai = $_POST["email"];

$sql = "INSERT INTO form (firstname, lastname, email) VALUES ('$fnam', '$lnam', '$emai')";

if ($conn->query($sql) === TRUE) {
  header("Location:back.php");
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>