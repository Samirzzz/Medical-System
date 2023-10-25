<?php
include "includes/appnavbar.php";
include_once "includes/db.php";
if (isset($_GET['Appid'])) {
    $appid = $_GET['Appid'];

    
    $sql = "DELETE FROM appointments WHERE Appid = $appid";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully.";
        header("location:viewappointments.php");
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo "Invalid appointment ID.";
}
?>
