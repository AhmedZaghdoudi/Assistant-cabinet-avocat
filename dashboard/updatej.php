<?php
$id=$_POST['id'];
$jdescr=$_POST['jdescr'];
$nextstep=$_POST['nextstep'];
$courtname=$_POST['judgename'];
$date=$_POST['jdate'];
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

$sql = "UPDATE judgement SET judgement_desc='$jdescr', next_step='$nextstep', judgement_date ='$date' WHERE caseid=$id";


if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully.";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>