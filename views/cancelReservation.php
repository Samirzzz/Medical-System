<?php
session_start();
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl =new AppointmentController($conn);
if(isset($_GET['Appid']))
{
$appID=$_GET['Appid'];
}
$patientId = $appointmentcntrl->getPatientID( $_SESSION["Pid"]);
echo "patient id : ".$patientId;
echo "appointment id : ".$appID;
$appointmentcntrl->cancelReservation($patientId,$appID);
header("location:./pindex.php");

?>