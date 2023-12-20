<?php
include_once "../includes/db.php";
require_once '../app/controller/AdminController.php';

$db = Database::getInstance();
	$conn = $db->getConnection();
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $pid = $_GET['pid'];

    $deletePatient=AdminController::deletepatient($uid,$conn);

}
?>
