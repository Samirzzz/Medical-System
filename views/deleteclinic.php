<?php
include_once "..\includes\db.php";
require_once '../app/controller/AdminController.php';

$db = Database::getInstance();
	$conn = $db->getConnection();	
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $drsql = "DELETE FROM dr WHERE cid = $cid";
}
?>
