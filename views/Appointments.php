<?php

class Appointments
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
        if (empty($patientId)) {
            $errors[] = "Patient ID is required";
        }

        // Date validation
        $currentDate = date("Y-m-d");
        $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

        if ($date < $currentDate || $date > $maxAllowedDate) {
            $errors[] = "Date must be between today and 1.5 months ahead.";
        }

        return $errors;
    }

    public function addAppointment($date, $time, $status, $price, $doctorId, $clinicId, $patientId)
    {
        $sql = "INSERT INTO appointments (date, time, status, pid, did, cid, price) VALUES ('$date', '$time', '$status', '$patientId', '$doctorId', '$clinicId', '$price')";
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
            echo "<td>" . $row['Cid'] . "</td>";
        
            
            echo "</tr>";
        }
    } else {
        echo "No appointments found.";
    }


    }
  
}
?>
