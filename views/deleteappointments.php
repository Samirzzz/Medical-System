<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl = new AppointmentController();
$db = Database::getInstance();
$conn = $db->getConnection();	


if (isset($_GET['Appid'])) {
    $appid = $_GET['Appid'];

    

    if ($appointmentcntrl->deleteAppointment($appid)) {
       
        header("location:./viewappointments.php");
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo "Invalid appointment ID.";
}
?>
