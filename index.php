<?php
require('./db-creds.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);
else echo "Connection successful 👍👍👍 <br/><br/>";

$sql = "SELECT id, first_name, last_name, email, gender, ip_address FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>All Users</h1>";
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Gender</th><th>IP Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["gender"]."</td><td>".$row["ip_address"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();