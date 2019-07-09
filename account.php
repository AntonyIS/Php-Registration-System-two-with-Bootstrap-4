<?php require 'header.php'?>


<?php
$email=$firstname=$lastname='';

require 'config.php';
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $results = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($results);

  session_start();
    $firstname = $user['firstname'];
    $lastname = $user['lasstname'];
    $email = $user['email'];
echo $firstname;

}








?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>My profile</h3>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <img src="images/avater.png" alt="">
                       </div>
                       <div class="col-md-6">
                           <span><strong>Name</strong></span>
                           <span>Python Developer</span><br>
                           <span><strong>Email</strong></span>
                           <span>developer@gmail.com</span><br>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/avater.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstanme" class="form-control" value="<?php

                                       echo $firstname;

                                    ?>">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="firstname">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-info btn-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'?>
