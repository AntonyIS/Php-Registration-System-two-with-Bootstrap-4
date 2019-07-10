<?php require 'header.php';?>
<?php
if(isset($_SESSION['user_email'])){
    $email = $_SESSION['user_email'];
    echo $email."LOve";
}

?>

<div class="container">
  <div class="jumbotron" style="text-align: center">
      <h1>My First Bootstrap Page</h1>

  </div>
</div>

<?php require 'footer.php';?>
