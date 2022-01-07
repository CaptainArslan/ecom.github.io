<?php
require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include("header.php");
include("dbcon.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <?php
        include("totop.php");
        $style = '';
        $_SESSION['msg'] = '';
        // <!-- Register User code -->
        if (isset($_POST['register_btn'])) {

            $user_name = mysqli_real_escape_string($con, $_POST['txt_name']);
            $user_email = mysqli_real_escape_string($con, $_POST['txt_email']);
            $user_phone = mysqli_real_escape_string($con, $_POST['txt_phone']);
            $user_password = mysqli_real_escape_string($con, $_POST['txt_password']);
            $user_compassword = mysqli_real_escape_string($con, $_POST['txt_confirm_password']);
            $date = date("Y-m-d h:i:sa");

            $pass = password_hash($user_password, PASSWORD_BCRYPT);
            $cpass = password_hash($user_compassword, PASSWORD_BCRYPT);
            $user_role = 'U';

            $emailquery = "SELECT * FROM `user` WHERE `user_email` = '$user_email'";
            $emailresult = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($emailresult);

            $token = bin2hex(random_bytes(15));
            if ($emailcount > 0) {
                echo '<script>
                                            swal({
                                                title: "Error",
                                                text: "Email Already Exist!",
                                                icon: "warning",
                                            });
                                            </script>';
            } else {

                if ($user_password === $user_compassword) {
                    $insertquery = "INSERT INTO `user`(`date`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_confirm_password`, `user_role`, `user_token`, `user_status`) 
                                            VALUES ('$date','$user_name','$user_email','$user_phone','$pass','$cpass','$user_role' , '$token', 'inactive')";

                    $queryfire = mysqli_query($con, $insertquery);
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth  = "true";
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;
                    $mail->Username = "arslan031776@gmail.com";
                    $mail->Password = "Bcsf17r23A";
                    $mail->Subject = "Email Activation";
                    $mail->setFrom("arslan031776@gmail.com");
                    // $mail->addEmbeddedImage("img\product_img\/' . $image. '",'Order images');
                    $mail->isHTML(true);
                    $mail->Body = " Hello '.$user_name.' Click Here To Activate your Account http://localhost/ecom/activate.php?token=$token";
                    $mail->addAddress($user_email);
                    if ($mail->send()) {
                        // echo 'send';
                    } else {
                        // echo 'Error';
                    }
                    $_SESSION['msg'] = "Check Your Email to Activate your Account $user_email";
                    echo '<script>
                        swal({
                            title: "Great News!",
                            text: "Your Are Registered Successfully Check Email to activate account",
                            icon: "success",
                        }).then(function(){
                            window.reload();
                        });
                        </script>';
                } else {
                    echo '<script>
                        swal({
                            title: "Error",
                            text: "Password! Does Not Matched Correctly!",
                            icon: "warning",
                        });
                        </script>';
                }
            }
        }
        // Login User

        if (isset($_POST['login_btn'])) {

            $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $checkemail = "SELECT * FROM `user` WHERE `user_email` = '$useremail' ";
            $emailcheck = mysqli_query($con, $checkemail);

            $mailcount = mysqli_num_rows($emailcheck);

            if ($mailcount > 0) {
                $db_data = mysqli_fetch_assoc($emailcheck);

                $db_pass = $db_data['user_password'];

                $_SESSION['user_id'] = $db_data['user_id'];
                $_SESSION['user'] = $db_data['user_name'];
                $_SESSION['email'] = $db_data['user_email'];

                //First $password is that password which comes from input type
                //and the second is which we get from the databse 
                //Password verify is to check the necrypted password and the password in database in hashing format

                $pass_decode = password_verify($password, $db_pass);
                if ($pass_decode) {

                    if (isset($_POST['rememberme'])) {
                        setcookie('EmailCookie', $useremail, time() + (86400 * 30));
                        setcookie('PasswordCookie', $password, time() + (86400 * 30));
                    }
                    // alert("Congratulation! you are logged in successfully");
                    // header('location: index.php');
                    ?>
                        <script>
                            window.location.href = window.location.href;
                        </script>
                    <?php
                } else {
                    echo '<script>
                        swal({
                            title: "Error Occured",
                            text: "Password! Does Not Matched",
                            icon: "warning",
                        });
                        </script>';
                }
            } else {
                echo '<script>
                        swal({
                            title: "Error Occured",
                            text: "Invalid Email or password ",
                            icon: "warning",
                        });
                        </script>';
            }
        }
    ?>
    <!-- Account Page -->
    <?php 
        if(isset($_SESSION['email']) && $_SESSION['email'])
        {
            $style = 'display: none'; 
        }
    ?>
    <div class="account-page" >
        <div class="container">
        <p style="background: #fff;text-align: center;color: red;"><?php echo $_SESSION['msg'];?></p>
            <div class="row">
                <div class="col-2">
                    <img src="img/image1.png" alt="image" width="100%">
                </div>
                <div class="col-2" style="<?php echo $style?>">
                    <div class="form-container" >
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="LoginForm" method="POST">
                            <input type="email" placeholder="email" name="useremail" value="<?php if (isset($_COOKIE['EmailCookie'])) {
                                                                                                echo $_COOKIE['EmailCookie'];
                                                                                            } ?>" required>
                            <input type="password" placeholder="Password" id="loginpassword" name="password" value="<?php if (isset($_COOKIE['PasswordCookie'])) {
                                                                                                                        echo $_COOKIE['PasswordCookie'];
                                                                                                                    } ?>" required>
                            <input type="checkbox" onclick="passwordToogle()" id="showpassword"><text class="showpassword">Show Password</text><br>
                            <input type="checkbox" id="showpassword" name="rememberme">
                            <text class="showpassword">Remember Me</text>
                            <button type="submit" class="btn" name="login_btn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="RegForm" method="POST">
                            <input type="text" placeholder="Full Name" name="txt_name" required>
                            <input type="email" placeholder="Email" name="txt_email" required>
                            <input type="number" placeholder="Phone" name="txt_phone" required>
                            <input type="password" placeholder="Password" id="password" name="txt_password" required>
                            <input type="password" placeholder="Confirm Password" id="confirm_password" name="txt_confirm_password" required>
                            <input type="checkbox" onclick="passwordToogle()" id="showpassword"><text class="showpassword">Show Password</text>
                            <button type="submit" class="btn" name="register_btn">Register</button>
                            <p onclick="login()" class="alreadyhaveanaccount">Already have an Account </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>
<!-- Js for toogle form -->
<script>
    function passwordToogle() {
        var x = document.getElementById("password");
        var y = document.getElementById("confirm_password");

        var z = document.getElementById("loginpassword");

        if (x.type === "password" && y.type === "password" && z.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }


    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var indicator = document.getElementById("indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(0px)";
    }
</script>

</html>