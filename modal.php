<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/modal.css">
</head>

<body>
    <div class="modal" id="modal">
        <div class="account-page">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-2">
                    <img src="img/image1.png" alt="image" width="100%">
                </div> -->
                    <div class="col-2">
                        <div class="form-container">
                            <div class="close_btn" style="height: 20px;">
                                <span class="close" style="height: 100%;" onclick="document.getElementById('modal').style.display='none'">&times;</span>
                            </div>

                            <div class="form-btn">
                                <span onclick="login()">Login</span>
                                <span onclick="register()">Register</span>
                                <hr id="indicator">
                            </div>


                            <form action="account.php" id="LoginForm" method="POST">
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

                            <form action="account.php" id="RegForm" method="POST">
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
    </div>
</body>
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var indicator = document.getElementById("indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100%)";
    }

    function login() {
        RegForm.style.transform = "translateX(100%)";
        LoginForm.style.transform = "translateX(100%)";
        indicator.style.transform = "translateX(0px)";
    }
</script>

</html>