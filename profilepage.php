<?php
// include("dbcon.php");
include("header.php");
// include("totop.php");
    if (!isset($_SESSION['user'])) {
        echo '<script>
        swal({
            title: "Login Error",
            text: "Please Login First to see your profile",
            icon: "warning",
        }).then(function() {
            window.location.href = "index.php";
        });
        </script>';
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile page | Red Store</title>
</head>
<body>
    
</body>
</html>