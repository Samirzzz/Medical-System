<?php
 require_once '../app/Model/Clinic.php';
include_once '..\includes\db.php';
class Appointments extends Clinic
{
    public $db;
    public $conn;
    public $date, $time, $status, $price, $doctorId, $clinicId, $patientId;
	

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

  
}
?>