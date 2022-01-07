<?php
include_once("dbcon.php");
if(isset($_GET['token']) ){
    $token  = $_GET['token'];

    $update_status_query = mysqli_query($con, "UPDATE `user` SET `user_status`='active' WHERE `user_token` = '$token'");
    // echo $token;
    if($update_status_query)
    {
        if($_SESSION['msg'])
        {
            $_SESSION['msg'] = 'Your Account is Updated Successfully'; 
        }
        else
        {
            $_SESSION['msg'] = 'Your Are logged out'; 
        }
    }
    else
    {
        $_SESSION['msg'] = 'Please Activate your Account'; 
    }
    header('Location: account.php');
}
?>