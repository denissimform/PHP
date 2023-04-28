<?php
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", 587);
// ini_set("auth_username", "ssiphostel2425@gmail.com");
// ini_set("auth_password", "wmhcjjhivfywpalq");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();

try {
    if (isset($_POST['submit'])) {
        $success = ["success" => true, "message" => "Mail has been sent on mention mail id!!"];
        $error = ["success" => false, "message" => "Something went wrong during sent mail!!"];

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ssiphostel2425@gmail.com';
        $mail->Password   = 'tdadtdoxaovwjyah';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('noreply@gmail.com', "Denis");
        $mail->addAddress($_POST['email'], 'User');

        $mail->isHTML(true);
        $mail->Subject = $_POST['title'];
        $mail->Body    = $_POST['msg'];
        // $mail->AltBody = 'Body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            echo json_encode($success);
        } else {
            echo json_encode($error);
        }

        // $to_email = 'ssiphostel2425@gmail.com';
        // $subject = $_POST['title'];
        // $message = $_POST['message'];
        // $headers = 'From: noreply@myphp.com';

        // if (mail($to_email, $subject, $message, $headers)) {
        //     echo json_encode($success);
        // } else {
        //     echo json_encode($error);
        // }
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
