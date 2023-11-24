<?php
include_once "..\includes\db.php";
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $drsql = "DELETE FROM dr WHERE uid = $uid";
    if ($conn->query($drsql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting : " . $conn->error;
    }
    
    $sql = "DELETE FROM user_acc WHERE uid = $uid";
    if ($conn->query($sql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting drs: " . $conn->error;
    }
   
} else {
    echo "Invalid ID.";
}
?>
