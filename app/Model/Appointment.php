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

    public function validateAppointment($date, $time, $status, $price, $doctorId, $clinicId, $patientId)
    {
        $errors = array();

        // Validation for required fields
        if (empty($date)) {
            $errors[] = "Date is required";
        }

        if (empty($time)) {
            $errors[] = "Time is required";
        }

        if (empty($status)) {
            $errors[] = "Status is required";
        }
        if (empty($price)) {
            $errors[] = "Price is required";
        }
        if (empty($doctorId)) {
            $errors[] = "Doctor ID is required";
        }
        if (empty($clinicId)) {
            $errors[] = "Clinic ID is required";
        }
        // if (empty($patientId)) {
        //     $errors[] = "Patient ID is required";
        // }

        // Date validation
        $currentDate = date("Y-m-d");
        $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

        if ($date < $currentDate || $date > $maxAllowedDate) {
            $errors[] = "Date must be between today and 1.5 months ahead.";
        }

        return $errors;
    }
	public function getClinicID($id) {
        // return $_SESSION["ID"];
		$sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
		clinic.cnumber,clinic.workhrs,clinic.cloc
		FROM clinic 
		JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
		$result = mysqli_query($GLOBALS['conn'],$sql);
		if($row=mysqli_fetch_array($result)){
			parent::__construct($row["uid"]);
		
						$CID=$row["cid"];

		}
		return $CID;

    }


	public function getClinicName() {
        return $_SESSION["cname"];
    }
	
	public function getClinicDrs($cid)
	{
		$sql = "select firstname , lastname , Did  from dr where Cid = '$cid' ";
		$res = mysqli_query($this->conn,$sql);
		$doctors = [];
		while($row=mysqli_fetch_array($res)){
        $doctors [] = [
			'did' => $row['Did'],
			'firstname'=>$row['firstname'],
			'lastname'=>$row['lastname'],
		];} 
		return $doctors;
	}
	


    public function addAppointment($date, $time, $status, $price, $doctorId, $clinicId, $patientId)
    {
		
        $sql = "INSERT INTO appointments (date, time, status, pid, did, cid, price) VALUES ('$date', '$time', '$status', NULL , '$doctorId', '$clinicId', '$price')";
        $res = mysqli_query($this->conn, $sql);

        if ($res) {
            $this->date=$date;
            $this->time=$time;
            $this->status=$status;
            $this->price=$price;
            $this->doctorId=$doctorId;
            $this->clinicId=$clinicId;
            $this->patientId=$patientId;
            
            return true;
        } else {
            return false;
        }
    }
    public function updateAppointment($appointmentId,$a_date, $a_time, $a_status,$a_price,$a_did, $a_cid, $a_pid){
        $sql = "UPDATE appointments SET date = '$a_date', time = '$a_time', status = '$a_status'  ,Did ='$a_did',Cid ='$a_cid',Pid ='$a_pid',price ='$a_price' WHERE Appid = $appointmentId";
        $res = mysqli_query($this->conn, $sql);

        if ($res) {
            $this->date=$a_date;
            $this->time=$a_time;
            $this->status=$a_status;
            $this->price=$a_price;
            $this->doctorId=$a_did;
            $this->clinicId=$a_cid;
            $this->patientId=$a_pid;
            return true;
        } else {
            return false;
        }
    }
    public function deleteAppointment($appid){
        $sql = "DELETE FROM appointments WHERE Appid = $appid";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            
            return true;
        } else {
            return false;
        }
    }
    public function viewAppointments(){
        $sql = "SELECT * FROM appointments";
       $result = mysqli_query($this->conn,$sql);
       
       if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Appid'] . "</td>";

            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td><a href='./editappointments.php?Appid=" . $row['Appid'] . "'>Edit</a> | <a href='./deleteappointments.php?Appid=" . $row['Appid'] . "'>Delete</a></td>";
			$sql2 = "Select cname from clinic WHERE Cid = '{$row['Cid']}'";
			$res2=mysqli_query($this->conn,$sql2);
			if ($res2->num_rows>0){
				$clincirow = $res2->fetch_assoc();
				echo "<td>" . $clincirow['cname'] . "</td>";
			}
           
        
        
            echo "</tr>";
        }
    } else {
        echo "No appointments found.";
    }


    }

	public function bookingOptions(){
		$sql = "select specialization from dr ";
		$res = mysqli_query($this->conn,$sql);
        $spec=[];
		while ($row = $res->fetch_assoc())
		{
$spec[]=[
	'specialization'=>[$row['specialization']]
]
		;}
	return $spec;
	}
  
}
?>