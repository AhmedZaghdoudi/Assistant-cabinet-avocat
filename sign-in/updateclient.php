<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

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
    <form class="form-signin" method="POST" action="finupdateclient.php">
  
  <h1 class="h3 mb-3 font-weight-normal">Please update client details</h1>
  <label for="inputEmail" class="sr-only">Client Name</label>
  <input name="cname" type="text" id="inputEmail" class="form-control" placeholder="Client Name" required autofocus>
  <label for="inputPassword" class="sr-only">Client Address</label>
  <input name="caddress" type="text" id="inputPassword" class="form-control" placeholder="Client Address" required>
  <label for="clientContact" class="sr-only">Client Contact</label>
  <input name="ccontact" type="text" id="inputPassword" class="form-control" placeholder="Client Contact" required>
  <label for="ClientGender" class="sr-only">Client Gender</label>
  <input name="cgender" type="text" id="CLientGedner" class="form-control" placeholder="Client Gender(M for male, F for female)" required>
  <input name="cid" type="hidden"  class="form-control" value="<?php echo $_GET['clientid'];?>">
  <label for="clientAge" class="sr-only">Client Age</label>
  <input name="cage" type="text" id="clientAge" class="form-control" placeholder="Client Age" required>
 
  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
  
</form>
</body>
</html>
