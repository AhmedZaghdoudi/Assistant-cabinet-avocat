<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Add a new case.</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="addnewcase.php">
  
  <h1 class="h3 mb-3 font-weight-normal">Please add case details</h1>
  <label for="inputEmail" class="sr-only">Party 1</label>
  <div class="form-group">
    <label for="example1">Party1</label>
    <select class="form-control" id="example1" name="example1">
    <?php
$servername = "localhost:3306";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $clientname=$row['clientid'];
      echo '<option value="'."$clientname".'">'.$row['clientname'].'</option>
      ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
    </select>
  </div>
  <div class="form-group">
    <label for="example1">Judge</label>
    <select class="form-control" id="example2" name="example2">
    <?php
$servername = "localhost:3306";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM court";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $courtname=$row['courtid'];
    echo '<option value="'."$courtname".'">'.$row['courtname'].'</option>
    ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
    </select>
  </div>
  <div class="form-group">
    <label for="example3">Affiliate</label>
    <select class="form-control" id="example3" name="example3">
    <?php
$servername = "localhost:3306";
$username = "root";
$password = "vashuhero1";
$dbname = "lawyer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM affiliate";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $aname=$row['affid'];
    echo '<option value="'."$aname".'">'.$row['aname'].'</option>
    ';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
    </select>
  </div>
  <label for="inputPassword" class="sr-only">Party 2</label>
  <input name="party2" type="text" id="inputPassword" class="form-control" placeholder="Party 2" required>
  <label for="clientContact" class="sr-only">Case Description</label>
  <input name="cdesc" type="text" id="inputPassword" class="form-control" placeholder="Case Decription" required>

  <input name="caseyear" type="text" id="CLientGedner" class="form-control" placeholder="Case Year" required>
  <input name="casetype" type="text" id="casetype" class="form-control" placeholder="Case Type" required>

 
 
  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
  
</form>
</body>
</html>
