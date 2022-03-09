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
$id = $_REQUEST['id'];

$sql = "SELECT * FROM form where id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $email = $row['email'];
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<form method = "POST" action = "update.php">
    <label>First Name: </label>
    <input type = "text" name = 'fname' value=<?php echo $fname;?> > <br><br>
    <label>Last Name: </label>
    <input type = "text" name = 'lname' value=<?php echo $lname;?>> <br><br>
    <label>e-mail: </label>
    <input type = "text" name = 'email' value=<?php echo $email;?>> <br><br>   
    <input type = "hidden" name = 'id' value=<?php echo $id;?>> <br><br>
    <input type = "submit">
</form>
</body>
</html>

