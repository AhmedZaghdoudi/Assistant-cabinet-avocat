<?php
$servername = "localhost:8889";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";
$clientid=$_POST['example1'];
$courtid=$_POST['example2'];
$affid=$_POST['example3'];
$casedesc=$_POST['cdesc'];
$party2=$_POST['party2'];
$casetype=$_POST['casetype'];
$caseyear=$_POST['caseyear'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sql0 = "SELECT * FROM affiliate WHERE affid=$affid";
$result0 = $conn->query($sql0) or die($conn->error);
$row0=$result0->fetch_assoc();
$affname=$row0['aname'];
$sql2 = "SELECT * FROM client WHERE clientid=$clientid";
$result2 = $conn->query($sql2) or die($conn->error);
$row2=$result2->fetch_assoc();
$client=$row2['clientname'];
$sql = "INSERT INTO cases (party1, party2, caseyear, casedescription, affiliatedcounsel)
VALUES ('$client', '$party2', $caseyear, '$casedesc', '$affname')";
$sql1 = "INSERT INTO client_con (clientid)
VALUES ($clientid)";
$sql2 = "INSERT INTO judge_con (courted)
VALUES ($courtid)";
$sql3 = "INSERT INTO lawyer_assign (affid)
VALUES ($affid)";
$sql4= "INSERT INTO fees (typing, consultation, law, court, model, clientid) VALUES(0,0,0,0, 0, $clientid)";
$sql5= "INSERT INTO case_con(casetype)
VALUES ('$casetype')";
if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4)===TRUE  && $conn->query($sql5)===TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>