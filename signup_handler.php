<?php
require_once 'config.php';

$firstname = $lastname = $email = $password = '';
$firstname_err = $lastname_err = $email_err = $password_err = $db_err= $successmsg = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
//    validate firstname
    if(isset($_POST['fname'])){
        $firstname = $_POST['fname'];
        $sql = "SELECT `id` FROM `user` WHERE `firstname` = $firstname";
        $user = mysqli_query($conn,$sql);
        if($user){
            $firstname_err = "User with $firstname already exist.Use another name";
            header('location:signup.php');
//        }
////        $sql = "SELECT `id` FROM `user` WHERE `username`=$firstname";
//        echo "HERE";
//        if(mysqli_query($conn, $sql)){
////            If user exist in the system
//            $firstname_err = "User with $firstname already exist.Use another name";
//            header('location:signup.php');
        }else{
            if(isset($_POST['lname'])) {
                $fname = $_POST['fname'];
            }else{
                $firstname_err = "First name required";
            }

            if(isset($_POST['lname'])) {
                $lname = $_POST['lname'];
            }else{
                $lastname_err = "Last name required";
            }

            if(isset($_POST['email'])) {
                $email = $_POST['email'];
            }else{
                $email_err = "Email name required";
            }

            if(isset($_POST['$password'])) {
                $password = $_POST['password'];
            }else{
                $password_err = "Password name required";
            }
        echo $fname, $lname,$email;
        $sql = "INSERT INTO `user`(`id`, `firstname`, `lastname`, `email`, `password`) VALUES (null,'$fname','$lname','$email','$password')";

            if(!mysqli_query($conn,$sql)){
                $db_err = "Failed to add user to the database";
            }else{
                $successmsg = "User added successful";
                header('location:index.php');
            }
            }
        }

}
?>