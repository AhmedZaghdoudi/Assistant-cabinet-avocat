<?php
$affid=$_POST['affid'];
$aname=$_POST['aname'];
$aaddress=$_POST['aaddress'];
$acontact=$_POST['acontact'];
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

$sql = "UPDATE affiliate SET aname='$aname', contact='$acontact', aaddress='$aaddress' WHERE affid=$affid";


if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully.";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?>