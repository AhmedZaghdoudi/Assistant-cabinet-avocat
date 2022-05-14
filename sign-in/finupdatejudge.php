<?php
$cid=$_POST['cid'];
$cname=$_POST['cname'];
$caddress=$_POST['ctype'];
$cage=$_POST['cdesc'];
$cgender=$_POST['cpri'];
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

$sql = "UPDATE court SET courtname='$cname', courttype='$caddress', court_description='$cage', court_priority='$cgender' WHERE courtid=$cid";


if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully.";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?>