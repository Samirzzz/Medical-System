<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Admin.php';
class AdminController{
	public $aid;
	public $name;
	public $uid;
	public $db;
    public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
	static function deletepatient($id,$conn){
		$sql = "DELETE FROM patient WHERE uid = $id";
    if (mysqli_query($conn,$sql)) {
		$sql = "DELETE FROM user_acc WHERE uid = $id";
		if (mysqli_query($conn,$sql)){
			header("location:adminsearch.php");
	
		} else {
			echo "Error deleting patient: " . $conn->error;
		}
    } else {
        echo "Error deleting : " . $conn->error;
    }
	
    }
	static function deletedoctor($id, $conn) {
		$sql = "SELECT Did FROM dr WHERE uid = $id";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			$row = mysqli_fetch_assoc($result);
	
			if ($row) {
				$did = $row['Did'];
	
				$sql = "DELETE FROM appointments WHERE Did = $did";
				if (mysqli_query($conn, $sql)) {
					$sql = "DELETE FROM dr WHERE uid = $id";
					if (mysqli_query($conn, $sql)) {
						$sql = "DELETE FROM user_acc WHERE uid = $id";
						if (mysqli_query($conn, $sql)) {
							header("location:adminsearch.php");
							exit();
						} else {
							echo "Error deleting user account: " . $conn->error;
						}
					} else {
						echo "Error deleting doctor: " . $conn->error;
					}
				} else {
					echo "Error deleting appointments: " . $conn->error;
				}
			} else {
				echo "Doctor not found.";
			}
		} else {
			echo "Error fetching doctor details: " . $conn->error;
		}
	}
	
static function deleteclinic($id,$conn){
    $sql = "DELETE FROM dr WHERE cid = $id";
if (mysqli_query($conn,$sql)) {
	$sql = "DELETE FROM user_acc WHERE uid = $id";
	if (mysqli_query($conn,$sql)){
		header("location:adminsearch.php");

	} else {
		echo "Error deleting patient: " . $conn->error;
	}
} else {
	echo "Error deleting : " . $conn->error;
}
}
function addpage($name,$la,$icon,$class){
	$sql_pages = "INSERT INTO pages (name, linkaddress, icons,class) VALUES ('$name', '$la', '$icon','$class')";
    $res = mysqli_query($this->conn, $sql_pages);
	if ($res) {
		header("Location: addpage.php");
	} else {
		echo "Error inserting data into the pages table: ";
	
	 }
}
function deleteadmin($id){




}



}