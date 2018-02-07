<?php
session_start();

?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Farmers Market | Login</title>

         <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

      
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body class="bg">
  
    <div class="container-fluid  bg ">
      <div class="row">
      <div class="col-sm-4 col-md-4 d-none d-sm-block bg-light sidebar">
        <div class="logo">
            <img  src="img/logo_small.png">
              <h6>Welcome to the Farmers Market</h6>
        </div>
       
        <div class=" col-md-12 login">
       
        <form action="/include/login.aut.php" method="POST" >
          <h2 class="">Sign in</h2>
   
          <div class="form-group">
            <input type="email" class="form-control btn-round" placeholder="Email" name="email" id="email" >
          </div>
            
          <div class="form-group">
            <input type="password" class="form-control btn-round" placeholder="Password" name="password" id="password" >
          </div>
        
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-color btn-round">Sign in</button>
            
         <br>
            <h6 class="message">No account?<a href="signup.php"> Create One!</a></h6>
        </form>
            
        </div>
          
      </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
     

  </body>
</html>
