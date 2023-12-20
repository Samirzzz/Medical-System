<?php
session_start();
require_once '../app\controller\AppointmentController.php';
$db = Database::getInstance();
$conn = $db->getConnection();
$appointmentcntrl =new AppointmentController();
$clinicID=$appointmentcntrl->getClinicID($_SESSION["ID"]);
if(isset($_GET['Did']))
{
$docID=$_GET['Did'];
}
echo "doc id : ".$docID;
echo "clinic id : ".$clinicID;
$appointmentcntrl->assignDoc($clinicID,$docID);
header("location:./retrievedocs.php");

?>