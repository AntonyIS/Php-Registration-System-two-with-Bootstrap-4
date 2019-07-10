<?php  require 'header.php' ;?>


<?php

$firstname=$lastname=$email=$password='';
$firstname_err=$lastname_err=$email_err=$password_err=$password2_err=$no_match='';
$errors = array();

if (isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(empty($firstname)){
        header('location:signup.php?firstname_err');
        exit();
    }else{
        $firstname = $firstname;
    }

    if(empty($lastname)){
        header('location:signup.php?lastname_err');
        exit();
    }else{
        $lastname = $lastname;
    }

    if(empty($email)){
        header('location:signup.php?email_err');
        exit();
    }else{
        $email = $email;
    }

    if(empty($password)){
        header('location:signup.php?password_err');
        exit();
    }else{
        $password = $password;
    }

    if(empty($password2)){
        header('location:signup.php?password2_err');
        exit();
    }else{
        $password2 = $password2;
    }

    if($password!=$password2){
        header('location:signup.php?no_match');
        exit();
    }else{
        $password =md5($password);
    }


    include 'config.php';
//    check if the user exists in the database
    $sql= "SELECT * FROM `user` WHERE email='$email'";
    $results = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($results);

    if($user){
        $_SESSION['user_err'] = "User with the given credentials already exists";
        header("location:signup.php");

    }else{
        $sql = "INSERT INTO `user`(`id`, `firstname`, `lastname`, `email`, `password`) VALUES (null,'$firstname','$lastname','$email','$password')";
        mysqli_query($conn,$sql);
        header("location:login.php");

        $_SESSION['email'] = $email;
    }

}

?>
    <div class="container" >
        <div class="card mt-5 mb-20" >
            <div class="card-header bg-info">
                <h3 style="text-align: center" >Signup here</h3>
            </div>
            <div class="row">

                <div class="col-6 col-md-3"></div>
                <div class="col-6 col-md-6">
                    <div class="card-body">
                        <form method="POST" action="signup.php">
                            <div class="form-group">
                                <label for="firstname">First name</label>
                                <?php
                                    if(isset($_GET['firstname_err'])){
                                        echo "<br>";
                                       echo "<h3 style='text-align: center' class='alert-danger'>First name is required</h3>";
                                    }
                                ?>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                if(isset($_GET['lastname_err'])){
                                    echo "<br>";
                                    echo "<span style='text-align: center' class='alert-danger'>Last name is required</span>";
                                }
                                ?>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <?php
                                if(isset($_GET['email_err'])){
                                    echo "<br>";
                                    echo "<span style='text-align: center' class='alert-danger'>Email is required</span>";
                                }
                                ?>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <?php
                                if(isset($_GET['password_err'])){
                                    echo "<br>";
                                    echo "<span style='text-align: center' class='alert-danger'>Password is required</span>";
                                }
                                ?>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <?php
                                if(isset($_GET['password2_err']) ){
                                    echo "<br>";
                                    echo "<span style='text-align: center' class='alert-danger'>Password is required</span>";
                                }elseif ( isset($_GET['no_match'])){
                                    echo "<span style='text-align: center' class='alert-danger'>Password did not match</span>";
                                }
                                ?>
                                <input type="password" name="password2" id="password2" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block" name="signup">Signup</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-6 col-md-3"></div>
            </div>
        </div>
    </div>
<?php require 'footer.php';?>