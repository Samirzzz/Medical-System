<?php
 session_start();
require_once '../app\controller\AppointmentController.php';
        $db = Database::getInstance();
        $conn = $this->db->getConnection();
$appointmentcntrl =new AppointmentController();
if(isset($_GET['Appid']))
{
$appID=$_GET['Appid'];
}
$patientId = $appointmentcntrl->getPatientID( $_SESSION["Pid"]);
echo "patient id : ".$patientId;
echo "appointment id : ".$appID;
$appointmentcntrl->bookForPatient($patientId,$appID);
header("location:./pindex.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<table >
   

    
</body>
</html>