<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Clients View. LawyersAssist</title>

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
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Lawyer Assist</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  
</nav>

<main role="main">

  <section class="jumbotron text-center">
  <h1>View Affiliated Advocates with your firm</h1>
      <p class="lead text-muted">You can customize the Affiliates view according to your use. Also, you can add or delete Affiliates from the same page</p>
      <p>
        <a href="#" class="btn btn-primary my-2" data-toggle="modal" data-target="#addModal">Add new client</a>
        <a href="#" class="btn btn-secondary my-2">Show clients with unpaid fees</a>
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
      
      $sql = "SELECT * FROM fees WHRE model=0";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $clientid=$row['clientid'];

            $sql2 = "SELECT * FROM client WHERE clientid=$clientid";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2=$result2->fetch_assoc();




       echo '<div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
            <h2>'.$row2['clientname'].'</h2>
            <p class="card-text">'.$row2['clientcontact'].'</br><code>'.$row2['clientaddress'].'</code></p>
            
        
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-info">Edit</button>
                  <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                </div>
                
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
        <h5 class="modal-title" id="exampleModalLabel">Add new Client.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addclient.php" method="POST">
        
        <form>
  <div class="form-group">
    <label for="courtName">Client Name</label>
    <input type="text" class="form-control" id="courtname" aria-describedby="courtname" name="cname">
    
  </div>
  <div class="form-group">
    <label for="courtd">Client Age</label>
    <input type="text" class="form-control" id="courtd" name="cage">
  </div>
  <div class="form-group">
    <label  for="courtp">Client Contact</label>
    <input type="text" class="form-control" id="courtp" name="ccontact">
    
  </div>
  <div class="form-group">
    <label  for="courtp">Client Address</label>
    <input type="text" class="form-control" id="courtt" name="caddress">
    
  </div>
  <div class="form-group">
    <label  for="courtp">Client Gender(M for Male, F for Female)</label>
    <input type="text" class="form-control" id="courtt" name="cgender">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        
        </form>
                                                                                                               khk
    </div></div></div>

   
   
     
<footer class="text-muted">
 
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
