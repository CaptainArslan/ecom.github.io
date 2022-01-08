<?php 
session_start();
include_once('header.php');
if (isset($_GET['token'])) {
    $token  = $_GET['token'];
    // $_SESSION['token'] = $_GET['token'];
    $update_status_query = mysqli_query($con, "UPDATE `user` SET `user_status`='active' WHERE `user_token` = '$token'");
    // echo $token;
    if ($update_status_query) 
    {
        // $_SESSION['token'] = $token;
        $_SESSION['msg'] = 'Your Account is Activated';
    } 
    else 
    {
        $_SESSION['msg'] = 'Please Activate your Account';
    }
    header('location: account.php');
}

?>
