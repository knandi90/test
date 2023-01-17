<?php
session_start();
include 'func.php';
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$var = searchUser($email,$pwd);
if (!empty($var)){
    $usr_email = $var[0]['e_mail'];
    $usr_pwd = $var[0]['pwd'];
    //echo $usr_email ." ".$usr_pwd;
    if(!empty($usr_email) && !empty($usr_pwd)){
    
        $_SESSION['username'] = $usr_email;
        $_SESSION['pwd'] = $usr_pwd ;
    echo 'Login Success!';
    echo '<script>window.location="mainpage.php";</script>';
}   else{
        echo 'Wrong User Name Or Password';
}
}else{
    echo 'Wrong User Name Or Password';
}

?>