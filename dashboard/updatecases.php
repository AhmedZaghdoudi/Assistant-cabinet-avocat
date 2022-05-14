<?php
$id=$_POST['id'];
$casetype=$_POST['casetype'];
$casetitle=$_POST['casetitle'];
$party1=$_POST['party1'];
$party2=$_POST['party2'];
$court=$_POST['court'];
$date=$_POST['date'];
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

$sql = "UPDATE cases SET casename='$casetitle', party1='$party1', party2='$party2', court='$court', caseyear='$date' WHERE id=$id";
$sql1="UPDATE case_con SET casetype='$casetype' WHERE caseid=$id";

if ($conn->query($sql) === TRUE && $conn_>query($sql1)===TRUE) {
  echo "Record updated successfully. You may need to change you judges table.";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>