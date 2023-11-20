<?php
include_once("../includes/db.php");
include_once("./Appointments.php");
$appointment = new Appointments($conn);


if (isset($_GET['Appid'])) {
    $appid = $_GET['Appid'];

    

    if ($appointment->deleteAppointment($appid)) {
       
        header("location:./viewappointments.php");
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo "Invalid appointment ID.";
}
?>
