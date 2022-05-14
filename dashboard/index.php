<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Home. lawyer Assist</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

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
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Lawyer Assist</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="readcases.php">
              <span data-feather="file"></span>
              Cases
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../album/judges.php">
              <span data-feather="shopping-cart"></span>
              Judges
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../album/client.php">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="../album/affiliates.php">
              <span data-feather="layers"></span>
              Affiliates
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fees.php">
              <span data-feather="bar-chart-2"></span>
              Rapport des Frais
            </a>
          </li>
        </ul>

       
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>


      <h2>Your Cases</h2></br>
      <div class="container">
        <div class="row">
      <?php
$servername = "localhost:3306";
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

$sql = "SELECT * FROM cases";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row['caseid'];
    $sql1 = "SELECT * FROM case_con WHERE caseid=$id";
    $result1 = $conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $sql2 = "SELECT * FROM court WHERE casesinthecourt=$id";
    $result2 = $conn->query($sql2);
    $row2=$result2->fetch_assoc();
    echo "<h1>hello</h1>";
    echo '<div class="col-md-6">
          <div class="card mb-6 shadow-sm">
             
            <div class="card-body">
            <h2><a href=cases.php?id=.$id.>.$row[party1]. vs .$row[party2].</a></h2>
            <span data-feather="file"></span>&nbsp;&nbsp;&nbsp;
            <a href=casetype.php?casetype='.$row1['casetype'].'>'.'<span class="badge badge-secondary">'.$row1['casetype'].'</span></a>
            <p>'.$row['casedescription'].'</p>
            <span data-feather="users"></span>&nbsp;&nbsp;&nbsp;
            <span class="badge badge-primary">'.$row['affiliatedcounsel'].'</span>&nbsp;&nbsp;&nbsp;
            <a href=judge.php>'.'<span class="badge badge-secondary">'.$row2['courtname'].'</span></a>
            </div>
          </div>
          </br>
          </br>
        </div>';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</div>
</div>
    </main>
    
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
