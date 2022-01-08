<?php
require_once 'includes/PHPMailer.php';
require_once 'includes/Exception.php';
require_once 'includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include_once("header.php");
include_once("totop.php");
include_once("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
<?php 
        if(isset($_POST['submit_message'])){
            $name = $_POST['user_name'];
            $email = $_POST['user_email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $message_insert = mysqli_query($con, "INSERT INTO `contact_us`( `user_name`, `user_email`, `user_subject`, `user_message`) 
            VALUES ('$name','$email','$subject','$message')");
            if($message_insert){
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth  = "true";
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;
                $mail->Username = "arslan031776@gmail.com";
                $mail->Password = "bcsf17r23A";
                $mail->Subject = "This is php mailer email";
                $mail->setFrom("arslan031776@gmail.com");
                $mail->isHTML(true);
                $mail->Body = $message;
                $mail->addAddress('mughalarslan996@gmail.com');
                if ($mail->send()) {
                    echo '<script>
                swal({
                    title: "Great News!",
                    text: "Your Message is delivered ",
                    icon: "success",
                });
                </script>';
                }
                else{
                    echo '<script>
                    swal({
                        title: "Email Error!",
                        text: "Error Sending Failed",
                        icon: "warning",
                    });
                    </script>';
                }

                echo '<script>
                swal({
                    title: "Great News!",
                    text: "Your Order has been placed successfully",
                    icon: "success",
                });
                </script>';
            }
            else
            {
                echo '<script>
                swal({
                    title: "Email Error!",
                    text: "Error Sending Failed",
                    icon: "warning",
                });
                </script>';
            }
        }
?>

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
                            <span>Conact Us</span>
                        </div>
                        <form action="" method="POST" id="RegForm">
                            <input type="text" name="user_name" placeholder="User Name" required>
                            <span style="color: red;font-size: 10px; position: absolute; margin-top: -8px; left: 0;"></span>
                            <input type="email" name="user_email" placeholder="User Email" required>
                            <span style="color: red;font-size: 10px; position: absolute; margin-top: -8px; left: 0;"></span>
                            <input type="text" name="subject" placeholder="Subject" required>
                            <span style="color: red;font-size: 10px; position: absolute; margin-top: -8px; left: 0;"></span>
                            <textarea name="message" id="" cols="35" rows="5" placeholder="Your Message" required></textarea>
                            <span style="color: red;font-size: 10px; position: absolute; margin-top: -8px; left: 0;"></span>

                            <button type="submit" name="submit_message" class="btn">Submit</button>
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