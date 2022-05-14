<?php
$id=$_GET['id'];
$servername = "localhost";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";
global $party1;
global $party2;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE fees SET model=1 WHERE caseid=$id";


if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully.";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?>