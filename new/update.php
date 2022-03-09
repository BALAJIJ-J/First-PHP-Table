<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_POST["id"];
$fnam = $_POST["fname"];
$lnam = $_POST["lname"];
$emai = $_POST["email"];

$sql = "UPDATE form SET firstname='$fnam', lastname='$lnam', email='$emai' where id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location:back.php");
}
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>