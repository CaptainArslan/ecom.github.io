<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <title></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/fw/all.min.css">

    <script src="js/sweetalert_plugin.js"></script>
    <script src="js/jquery-2.1.1.js"></script>
</head>

<body>
    <a href="https://capchatt.000webhostapp.com/" target="_blank" style="color: #fff;">
        <div class="chat-person">
            <i class="fas fa-comment-alt"></i>
        </div>
    </a>
    <?php
    include("cartprocess.php");
    ?>
    <div class="header">
        <div class="container">
            <!-- Navigation bar -->
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="img/logos/logo.png" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="allproducts.php">Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php

                        if (!isset($_SESSION['user'])) {
                        ?>
                            <li><a href="account.php">Account</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="logout_btn"><a href="logout.php" onclick="return confirm('Are you Sure');">Logout</a></li>
                        <?php
                        }

                        ?>
                    </ul>
                </nav>


                <a href="addtocart.php"><img src="img/icons/cart.png" alt="cart image" width="25px" height="25px">
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                        <span class="cart_div">
                            <p><?php echo $cart_count; ?></p>
                        </span>

                    <?php
                    }
                    ?>
                </a>
                <img src="img/icons/menu.png" alt="menu-icon" class="menu-icon" onclick="menutoggle()">

            </div>
            <div class="userimage ">
                <a href="profilepage.php">
                    <!-- <img src="img/icons/usericon.png" alt="cart image" width="25px" height="25px" margin="10px"> -->
                    <i class="fas fa-user-circle" style="font-size: 24px;"></i>
                </a>
                <p>
                    <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } else {
                        echo "";
                    } ?>
                </p>
            </div>
        </div>
    </div>


    <!-- Prolile modal -->
    <!-- <div id="id01" class="modal">
        <div class="card-container">
            <div class="upper-container">
                <div class="image-container">
                    <img src="img/user/userimage.png" alt="user image">
                </div>
            </div>
            <div class="lower-container">
                <div>
                    <h3>
                        <?php if (isset($_SESSION['user'])) {
                            echo $_SESSION['user'];
                        } else {
                            echo "User Name";
                        } ?></h3>
                </div>
                <div>
                    <a href="profile.php?id=<?php  ?>" class="btn">Main Profile</a>
                </div>
            </div>
        </div>
    </div> -->



</body>
<script>
    // Header position fixed on scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 20) {
            //clearHeader, not clearheader - caps H
            $(".header").addClass("sticky");
        } else {
            $(".header").removeClass("sticky");
        }
    });

    
    // // User Profile modal
    // var modal = document.getElementById('id01');
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }

    // js for toggle menu 

    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>

</html>