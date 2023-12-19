<?php
 require_once '../app/Model/Clinic.php';
include_once '..\includes\db.php';
class Appointments extends Clinic
{
    private $conn;
    public $date, $time, $status, $price, $doctorId, $clinicId, $patientId;
	

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

  
}
?>