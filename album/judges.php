<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Judges View. LawyerAssist</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

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
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Laswyer Assist</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  
</nav>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>View Judges @ Allahabad Highcourt</h1>
      <p class="lead text-muted">You can customize the judges view according to your use. Also, you can add or delete judges from the same page</p>
      <p>
        <a href="#" class="btn btn-primary my-2" data-toggle="modal" data-target="#addModal">Add new Judge</a>
        <a href="currentjudge.php" class="btn btn-secondary my-2">Show judge with current activity</a>
        <a href="../dashboard/index.php" class="btn btn-secondary my-2">Back to home</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
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
          $courtid=$row['courtid'];
       echo '<div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
            <h2>'.$row['courtname'].'</h2>
              <p class="card-text">'.$row['court_description'].'</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-info"><a  href="../sign-in/updatejudge.php?id='.$courtid.'">Edit</a></button>
                  <button type="button" class="btn btn-sm btn-outline-danger"><a  href="deletejudge.php?courtid='.$courtid.'">Delete</a></button>
                </div>
                <code>'.$row['courttype'].'</code>
                <small class="text-muted">'.$row['court_priority'].'</small>
              </div>
            </div>
          </div>
        </div>';
        }}
        else{
          echo "0 records found";
        }
        ?>
        
      </div>
    </div>
  </div>

</main>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new court.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addjudge.php" method="POST">
        
        <form>
  <div class="form-group">
    <label for="courtName">Court Name</label>
    <input type="text" class="form-control" id="courtname" aria-describedby="courtname" name="courtname">
    
  </div>
  <div class="form-group">
    <label for="courtd">Court Description</label>
    <input type="text" class="form-control" id="courtd" name="courtd">
  </div>
  <div class="form-group">
    <label  for="courtp">Court Priority</label>
    <input type="text" class="form-control" id="courtp" name="courtp">
    
  </div>
  <div class="form-group">
    <label  for="courtp">Court Type</label>
    <input type="text" class="form-control" id="courtt">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        
        </form>
     
    </div></div></div>
   
     
<footer class="text-muted">
 
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
