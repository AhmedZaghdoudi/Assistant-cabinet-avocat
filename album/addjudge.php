<?php
 $servername = "localhost:3306";
 $username = "root";
 $password = "vashuhero1";
 $dbname = "lawyer";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
$courtname=$_POST['courtname'];
$courtt=$_POST['courtt'];
$courtp=$_POST['courtp'];
$courtd=$_POST['courtd'];
$sql1 = "INSERT into court(courtname, courttype, court_description, court_priority) VALUES('$courtname', '$courtt',  '$courtd', '$courtp')";
$result1 = $conn->query($sql1) or die($conn->error);
echo "Judge added successfully";
?>
 