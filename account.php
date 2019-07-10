<?php require 'header.php'?>


<?php


require 'config.php';
$email=$firstname=$lastname='';
$fname=$lname=$uemail=$password=$image_name=$image_file='';

if(isset($_SESSION)){
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `user` WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    $fname = $user["firstname"];
    $lname = $user["lastname"];
    $uemail = $user["email"];
    $id = $user["id"];
    $password=$user["password"];

}



if(isset($_POST['update'])) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (isset($_POST['firstname'])) {
            $firstname = $_POST['firstname'];
        } else {
            $firstname_err = "First name is required";
        };

        #grab lastname
        if (isset($_POST['lastname'])) {
            $lastname = $_POST['lastname'];
        } else {
            $lastname_err = "Last  name is required";
        };

        #grab email

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $email_err = "Email name is required";
        };

        if (isset($_POST['password'])) {
            $password = $password;
        }


    if(isset($_FILES['image'])){

        $target_dir = "./images/";
        $target_file = $target_dir.basename($_FILES["image"]["name"]);
        $_SESSION["path"] = $target_file;
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        $_SESSION["path"] = $file_name;
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
            $destination = realpath(dirname(__FILE__))."images/".$file_name;
            move_uploaded_file($file_tmp,$destination);
            echo "Success";
        }else{
            print_r($errors);
        }
    }

        $sql = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`image`='$file_name' WHERE id='$id'";

        mysqli_query($conn, $sql);
        header("location:account.php");



}

?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-text align-content-md-center">Update Profile</h3>
            </div>
        </div>
<?php

?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-img">
                        <img src="images/avater.png" alt="" class="ml-5 mt-5"><br>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="account.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" hidden value="<?php echo $id ;?>">

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $fname ;?>">

                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $lname ;?>">
                            <input type="password" name="password" class="form-control" hidden>
                        </div>

                        <div class="form-group">
                            <label for="firstname">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $uemail ;?>">
                        </div>
                        <span class="btn btn-file"><input name="image" type="file" /></span>
                        <input type="submit" value="Update" name="update" class="btn btn-info mt-1 btn-lg ">

                    </form>
                </div>
            </div>
        </div>

    </div>


<?php require 'footer.php'?>
