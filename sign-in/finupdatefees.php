<?php
$id=$_POST['caseid'];
$law=$_POST['law'];
$consultation=$_POST['consultation'];
$court=$_POST['court'];
$typing=$_POST['typing'];
$servername = "localhost";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE fees SET court='$court', typing='$typing', consultation='$consultation', law='$law' WHERE caseid=$id";


if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully.";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?>