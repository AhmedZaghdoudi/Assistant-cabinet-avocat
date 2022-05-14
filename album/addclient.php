<?php
 $servername = "localhost:3306";
 $username = "root";
 $password = "vashuhero1";
 $dbname = "lawyer";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
$name=$_POST['cname'];
$address=$_POST['caddress'];
$contact=$_POST['ccontact'];
$age=$_POST['cage'];
$gender=$_POST['cgender'];

$sql1 = "INSERT into client(clientname, clientcontact, clientaddress, clientage, clientgender) VALUES('$name', '$contact',  '$address', '$age', '$gender')";
$result1 = $conn->query($sql1) or die($conn->error);
echo "Client added successfully"

?>