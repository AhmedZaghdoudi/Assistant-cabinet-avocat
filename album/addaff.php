<?php
 $servername = "localhost:3306";
 $username = "root";
 $password = "vashuhero1";
 $dbname = "lawyer";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
$name=$_POST['affname'];
$address=$_POST['affaddress'];
$contact=$_POST['affcontact'];
$sql1 = "INSERT into affiliate(aname, contact, aaddress) VALUES('$name', '$contact',  '$address')";
$result1 = $conn->query($sql1) or die($conn->error);
echo "Affiliate added succesfully"

?>