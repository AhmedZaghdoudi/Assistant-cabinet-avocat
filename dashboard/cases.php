<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

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
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">LawyerAssist</a>
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
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="cases.php">
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
            <a class="nav-link" href="fees.php">
              <span data-feather="users"></span>
              Fees Report
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../album/client.php">
              <span data-feather="bar-chart-2"></span>
              clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../album/affiliates.php">
              <span data-feather="layers"></span>
              Affiliates
            </a>
          </li>
        </ul>


      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      

    </br></br></br></br></br>

      <h2>Your Cases</h2>
      </br></br>
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
$id=$_GET['id'];
$sql = "SELECT * FROM cases where caseid='$id'";
$result = $conn->query($sql);
    $sql0 = "SELECT * FROM cases WHERE caseid=$id";
    $result0 = $conn->query($sql0);
    $row0=$result0->fetch_assoc();
    $sql1 = "SELECT * FROM case_con WHERE caseid=$id";
    $result1 = $conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $sql2 = "SELECT * FROM court WHERE casesinthecourt=$id";
    $result2 = $conn->query($sql2);
    $row2=$result2->fetch_assoc();

    $sql3 = "SELECT * FROM judgement WHERE caseid=$id";
    $result3 = $conn->query($sql3);
    $row3=$result3->fetch_assoc();

    echo "<div class=".'"card">
    <div class="card-body">
      <h2>'.$row0[party1].' vs '.$row0[party2].'</a></h2>
      <a href=casetype.php?casetype='.$row1['casetype'].'>'.'<span class="badge badge-secondary">'.$row1['casetype'].'</span></a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">Update</button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal">Delete</button>
      <div style="width:750px"><p>'.$row0['casedescription'].'</p></div>
      <h2>Judgement</h2><a href=judge.php?courtid='.$row2['courtid'].'>'.'<a href=../album/judges.php/><span class="badge badge-secondary">'.$row2['courtname'].'</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatejModal">Update</button>
     
      <div style="width:750px"><p>'.$row3['judgement_desc'].'</p></div>
      <p><b>Dated:'.$row3['judgement_date'].'</b></p>
      <p style="text-align:right"> <code><i>Next Step:'.$row3['next_step'].'</code></i></p>
      <span data-feather="users"></span>&nbsp;&nbsp;&nbsp;
      <a href=../album/affiliates.php/><span class="badge badge-primary">'.$row0['affiliatedcounsel'].'</span></a>&nbsp;&nbsp;&nbsp;
      
    </div>
  </div>
  <div class="modal fade" id="updatejModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Judgement details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form action="updatej.php" method="POST">
        
      <form>
       
<div class="form-group">
  <label for="courtd">Judgement Description</label>
  <input type="text" class="form-control" id="courtd" name="jdescr">
</div>
<div class="form-group">
  <label  for="courtp">Judgement Date</label>
  <input type="date" class="form-control" id="courtp" name="jdate">
  
</div>
<div class="form-group">
  <label  for="courtp">Next Step</label>
  <input type="text" class="form-control" id="courtp" name="nextstep">
  
</div>
<div class="form-group">
  
  <input type="hidden" class="form-control" value="'.$id.'" name="id">
  
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

       
 
  
       
      </div>
      <div class="modal-footer">
        
      </div>
    </div></div></div>
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update case details.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="updatecases.php" method="POST">';?>
        <input type="hidden" value="<?php echo $id?>" name="id">
        <input type="text"  name="casetitle" placeholder="Enter new Case title"></br></br></br>
        <input type="text" placeholder="Enter new first Party" name="party1"></br></br></br>
        <input type="text" placeholder="Enter new second party" name="party2"></br></br></br>
        <input type="date" placeholder="Enter new court name" name="court"></br></br></br>
        <input type="date" placeholder="Enter new listing date" name="date"></br></br></br>
        <input type="text" placeholder="Enter new case description" name="cased"></br></br></br>
        
     <?php  echo '<input type="submit" clas="btn btn-primary">
        
        
        </form>
     
    </div></div></div>
   
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update case details.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p>Are you sure</p>
         <form method="POST" action="deletecases.php">
         
    <div class="form-group row">
   
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control" value="'.$id.' name="id">
      </div>
     
    </div>
         
   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-danger">
        </div>
      </div></div></div>
     
      
 </br></br>';
 
$conn->close();
?>
    </main>
    
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
