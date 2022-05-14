<?php 
 $servername = "localhost:3306";
 $username = "root";
 $password = "vashuhero1";
 $dbname = "lawyer";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$clientid=$_GET['clientid'];
// sql to delete a record
$sql = "DELETE FROM client WHERE clientid=$clientid";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>