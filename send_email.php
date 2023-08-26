<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kimwang6957@gmail.com'; // Your Gmail address
        $mail->Password = 'xongrvcuugfcxbwz'; // Your Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('kimwang6957@gmail.com', 'Lee Kim Wang'); // Your Gmail address and your name
        $mail->addAddress('kimwang6957@gmail.com'); // Recipient's email (where you want to receive the form submissions)

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission from ' . $name;
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        echo 'Message has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>