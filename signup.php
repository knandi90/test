<?php
//session_start();
include 'func.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];


if(!empty($email) || !empty($pwd)){
    //deleteUser($email);
   // updateUser($fname,$emai
   insertSignup($fname,$lname,$email,$pwd,'active');
   echo '<script>window.location="index.html";</script>';
}
?>