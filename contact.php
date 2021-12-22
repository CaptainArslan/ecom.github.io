<?php
    include("header.php");
    include("totop.php");
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>

    <!-- Account Page -->

    <div class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-2 icon_and_text">
                    <!-- <img src="img/image1.png" alt="image" width="100%"> -->
                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Kaccha Fattomand Road Fazal Town Gujranwala.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>0317-7638978</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>mughalarslan996@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span >Conact Us</span>
                        </div>
                        <form action="" method="POST" id="RegForm">
                            <input type="text" name="txt_name" placeholder="User Name" required>
                            <input type="email" name="txt_email" placeholder="Email" required>
                            <input type="text" name="subject" placeholder="Subject" required>
                            <!-- <input type="password" placeholder="Confirm Password"> -->
                            <textarea name="message" id="" cols="35" rows="5" placeholder="Your Message" required></textarea>
                            <button type="submit" class="btn">Submit</button>
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

</html>