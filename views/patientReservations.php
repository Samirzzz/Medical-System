<?php
 session_start();
 require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once '../app\controller\AppointmentController.php';
//hello

        $db = Database::getInstance();
        $conn = $db->getConnection();
$appointmentcntrl =new AppointmentController();
if(isset($_GET['Appid']))
{
$appID=$_GET['Appid'];
}
$patientId = $appointmentcntrl->getPatientID( $_SESSION["Pid"]);
echo "patient id : ".$patientId;
echo "appointment id : ".$appID;
$appointmentcntrl->bookForPatient($patientId,$appID);
$curr_email= $_SESSION["email"];

$sql22= "select date , time from appointments where Appid =".$appID;
$res22=mysqli_query($conn,$sql22,);
while($row=mysqli_fetch_array($res22))
{
    $date = date('Y-m-d H:i:s', strtotime($row["date"]));
    $time = $row["time"]; 
}

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
    $mail->setFrom($curr_email,'Tabibi Application');
    $mail->addAddress($curr_email);     //Add a recipient             //Name is optional

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Booking Confirmed ';
    $mail->Body    = 'Thank you for booking Your appointment on tabibi application your appointment has been confirmed '." " ."date : $date ". " time : $time";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("location:./pindex.php");

?>