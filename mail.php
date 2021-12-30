<?php
    require 'includes/PHPMailer.php';
    require 'includes/Exception.php';
    require 'includes/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

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
    $mail->addAttachment("img/gallery-1.jpg");

    $mail->Body = "<h1>H1 heading</h1><br><br><p>This is paragraph..</p>";
    $mail->addAddress("arslan031776@gmail.com");
    
    if($mail->send()){
        echo "Email Send Successfully";
    }else{
        echo "Error ...........";
    }
    $mail->smtpClose();

?>