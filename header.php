<!DOCTYPE html>
<html lang="en">
<head>
  <title>Php Registration System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="">

    <!-- navbar goes here -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
          <!-- Brand -->
          <a class="navbar-brand" href="index.php">Php App</a>

          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="secrete.php">Secret</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                session_start();
                if(isset($_SESSION['loggedin'])){
                    echo ' <li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>';
                    echo ' <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                }else{
                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                          <li class="nav-item"><a class="nav-link" href="signup.php">Sign up</a></li>';
                }
                ?>

              
            </ul>
          </div> 
        </nav>
  