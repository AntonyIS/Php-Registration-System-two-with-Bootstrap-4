<?php
#create connection to the database
$conn = mysqli_connect('localhost','root','','SystemOne');

#check connection
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}
?>