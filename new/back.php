<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href = new.php><h3>To Insert New Records</h3></a>
</body>
</html>

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

/*
//SELECT
$sql = "SELECT id, firstname, lastname, email FROM form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " First Name: " . $row["firstname"]. " Last Name: " . $row["lastname"]. " email " .$row["email"].  "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();*/



$sql = "SELECT id, firstname, lastname, email FROM form";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='10'>

<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['email'] . "</td>"; 
  
  
  echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
  echo '<td><a href="delete.php ?id=' . $row['id'] . '">Delete</a></td>'; 
  echo "</tr>";
  }
echo "</table>";
}

$conn->close();
?>