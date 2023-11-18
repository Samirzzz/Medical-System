<?php
include_once "..\includes\db.php";
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    
    $sql = "DELETE FROM clinic WHERE cid = $cid";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully.";
        header("location:clinic.php");
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
} else {
    echo "Invalid appointment ID.";
}
?>
