<?php
 session_start();
 require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once '../app\controller\AppointmentController.php';


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

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'tabibii.application@gmail.com';                   
    $mail->Password   = 'sxxy bsog qtdc bhbd';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom($curr_email,'Tabibi Application');
    $mail->addAddress($curr_email);               

 
    $mail->isHTML(true);                                  
    $mail->Subject = 'Booking Confirmed ';
    $mail->Body    = 'Thank you for booking Your appointment on tabibi application your appointment has been confirmed on '." " ."date : $date ". " time : $time";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("location:./pindex.php");

?>