<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function generateRandomFourDigitNumber() 
{
    $min = 1000;
    $max = 9999;
    return random_int($min, $max);
}
$randomtoken = generateRandomFourDigitNumber();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

$email = $_POST["email"];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                 
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tabibii.application@gmail.com';                     //SMTP username
    $mail->Password   = 'sxxy bsog qtdc bhbd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email,'Tabibi Application');
    $mail->addAddress($email);     //Add a recipient             //Name is optional

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'here is your token :';
    $mail->Body    = $randomtoken;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/forgetpassstyle.css">
    <title>forgetpassword</title>
</head>
<body>
<div class="container">

<form action="" method="POST" class="mail">
<input class="mail" type="text" name="email" placeholder="Email" id="email" required>
<input type="submit" name="submit" class="sbutton">
</form>
</div>
</body>
</html>
