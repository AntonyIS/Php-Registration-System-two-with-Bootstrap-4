<?php  require 'header.php' ;?>
<?php

if(isset($_SESSION['loggedin'])){
    header("location:index.php");
}
$email=$password=$id='';
$email_err = $password_err='';
if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password =$_POST['password'];
    if(empty($email)){
        header('location:login.php?email_err');
        exit();
    }else{
        $email = $email;
    }

    if(empty($password)){
        header('location:login.php?password_err');
        exit();
    }else{
        $password = md5($password);
    }
    include  'config.php';
    $sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
    $results = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($results);
    $id = $user["id"];
    if(!$user){
        header("location:login.php?login_err");
    }else{

        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        header("location:index.php?u_email=$email");
    }
}


?>


<div class="container" >
    <div class="card mt-5 mb-20" >
        <div class="card-header bg-info">
                    <h3 style="text-align: center">Login here</h3>
                </div>
        <div class="row">

            <div class="col-6 col-md-3"></div>
            <div class="col-6 col-md-6">
                <div class="card-body">
                    <form method="POST">

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
                           <button type="submit" class="btn btn-success btn-block" name="signin">Signin</button>
                        </div>
                        <?php
                        if(isset($_GET['login_err'])){
                            echo "<br>";
                            echo "<span style='text-align: center' >
                            Login Unsuccessful. Try again or <a href='signup.php'>Register</a>
                                </span>";
                        }
                        ?>

                    </form>
                </div>
                    </div>
            <div class="col-6 col-md-3"></div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>