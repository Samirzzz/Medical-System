<?php
session_start();
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
$appointmentcntrl->cancelReservation($patientId,$appID);
header("location:./pindex.php");

?>