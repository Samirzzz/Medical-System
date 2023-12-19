<?php
include_once "..\includes\db.php";
$db = Database::getInstance();
	$conn = $db->getConnection();	
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $drsql = "DELETE FROM dr WHERE cid = $cid";
    if ($conn->query($drsql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting clinic: " . $conn->error;
    }
    
    $sql = "DELETE FROM clinic WHERE cid = $cid";
    if ($conn->query($sql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting clinic: " . $conn->error;
    }
   
} else {
    echo "Invalid appointment ID.";
}
?>
