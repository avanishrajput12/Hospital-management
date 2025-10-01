<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    $otp = rand(100000, 999999); // 6-digit OTP

    // Save OTP in session for verification
    // session_start();
    // $_SESSION['otp'] = $otp;

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'maditya196@gmail.com'; // Your Gmail
        $mail->Password   = 'stld zbqd acwk gebx';   // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('maditya196@gmail.com', 'YourApp');
        $mail->addAddress('pandeyaditya6531@gmail.com',""); // send OTP to entered email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is: <b>$otp</b>";
        $mail->AltBody = "Your OTP code is: $otp";

        $mail->send();
        echo "OTP sent successfully to pandeyaditya6531@gmail.com ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
