<?php
$cid=$_POST['cid'];
$cname=$_POST['cname'];
$caddress=$_POST['caddress'];
$cage=$_POST['cage'];
$cgender=$_POST['cgender'];
$ccontact=$_POST['ccontact'];
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

$sql = "UPDATE client SET clientname='$cname', clientaddress='$caddress', clientcontact=$ccontact, clientage=$cage, clientgender='$cgender' WHERE clientid=$cid";


if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully.";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
?>