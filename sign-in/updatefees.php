<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Update fees.</title>

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
    <form class="form-signin" method="POST" action="finupdatefees.php">
  
  <h1 class="h3 mb-3 font-weight-normal">Please update fees</h1>
  <label for="inputEmail" class="sr-only">Typing fees</label>
  <input name="typing" type="number" id="inputEmail" class="form-control" placeholder="Typing fees" required autofocus>
  <label for="inputPassword" class="sr-only">Court fees</label>
  <input name="court" type="number" id="inputPassword" class="form-control" placeholder="Court fees" required>
  <label for="clientContact" class="sr-only">Law fees</label>
  <input name="law" type="number" id="inputPassword" class="form-control" placeholder="Law fees" required>
  <label for="clientContact" class="sr-only">Consultation fees</label>
  <input name="consultation" type="number" id="inputPassword" class="form-control" placeholder="Consultation fees" required>
  
  <input name="caseid" type="hidden"  class="form-control" value="<?php echo $_GET['id'];?>">

 
  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
  
</form>
</body>
</html>
