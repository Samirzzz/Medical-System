<?php
 require_once '../app/Model/Appointment.php';
class AppointmentController
{
   public $appointment;
   public $conn;
   public function __construct($conn){
    $this->conn = $conn;
    $this->appointment = new Appointments($this->conn);
  
}
public function getAppointmentInstance(){
    return  $this->appointment;
}


public function validateAppointment($date, $time, $status, $price, $doctorId, $clinicId)
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
public function validateAppointmentUpdate($date, $time, $price)
{
    $errors = array();

    // Validation for required fields
    if (empty($date)) {
        $errors[] = "Date is required";
    }

    if (empty($time)) {
        $errors[] = "Time is required";
    }

    // if (empty($status)) {
    //     $errors[] = "Status is required";
    // }
    if (empty($price)) {
        $errors[] = "Price is required";
    }

    // Date validation
    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($date < $currentDate || $date > $maxAllowedDate) {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    return $errors;
}


public function getClinicID($id)
 {
    // return $_SESSION["ID"];
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
    clinic.cnumber,clinic.workhrs,clinic.cloc
    FROM clinic 
    JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
    $result = mysqli_query($GLOBALS['conn'],$sql);
    if($row=mysqli_fetch_array($result)){
        // parent::__construct($row["uid"]);
    
                    $CID=$row["cid"];

    }
    return $CID;

}
public function getDocID($id)
 {
    // return $_SESSION["ID"];
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, dr.did, dr.uid
    FROM dr 
    JOIN user_acc ON user_acc.uid = dr.uid where user_acc.uid=".$id;
    $result = mysqli_query($GLOBALS['conn'],$sql);
    if($row=mysqli_fetch_array($result)){
        // parent::__construct($row["uid"]);
    
                    $DID=$row["did"];

    }
    return $DID;

}


public function getClinicName()
{
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
        $this->appointment->date=$date;
        $this->appointment->time=$time;
        $this->appointment->status=$status;
        $this->appointment->price=$price;
        $this->appointment->doctorId=$doctorId;
        $this->appointment->clinicId=$clinicId;
        $this->appointment->patientId=$patientId;
        
        return true;
    } else {
        return false;
    }
}

public function updateAppointment($appointmentId,$a_date, $a_time, $a_price){
    $sql = "UPDATE appointments SET date = '$a_date', time = '$a_time',  price ='$a_price' WHERE Appid = $appointmentId";
    $res = mysqli_query($this->conn, $sql);

    if ($res) {
        $this->appointment->date=$a_date;
        $this->appointment->time=$a_time;
       
        $this->appointment->price=$a_price;
        
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

public function viewAppointments($ID){
    $sql = "SELECT * FROM appointments where cid =".$ID;
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
    echo "<h1>" ."No appointments found"."</h1" ;
}
$sql2="select cname from clinic where cid = {$ID}";
$res2=mysqli_query($this->conn,$sql2);
if ($res2) {
    $row = mysqli_fetch_assoc($res2);
    $_SESSION['AppView'] = $row['cname'];
}
}




public function getDoctorAppointments($docID){
    $sql = "SELECT * FROM appointments where did =".$docID;
   $result = mysqli_query($this->conn,$sql);
   
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Appid'] . "</td>";

        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><a href='./deleteappointments.php?Appid=" . $row['Appid'] . "'>Cancel</a></td>";
        $sql2 = "Select cname from clinic WHERE Cid = '{$row['Cid']}'";
        $res2=mysqli_query($this->conn,$sql2);
        if ($res2->num_rows>0){
            $clincirow = $res2->fetch_assoc();
            echo "<td>" . $clincirow['cname'] . "</td>";
        }
       
    
    
        echo "</tr>";
    }
} else {
    echo "<h1>" ."No appointments found"."</h1" ;
}
$sql2 = "SELECT firstname, lastname FROM dr WHERE did = {$docID}";
$res2 = mysqli_query($this->conn, $sql2);

if ($res2->num_rows > 0) {
    $row = $res2->fetch_assoc();
    $name=$row['firstname'] . ' ' . $row['lastname'];
    $_SESSION['AppView'] = $name;
}

}


public function bookingOptions(){
    $sql = "SELECT specialization FROM dr";
    $res = mysqli_query($this->conn, $sql);
    $spec = [];

    while ($row = $res->fetch_assoc()) {
        $spec[] = $row['specialization'];
    }

    // Remove duplicates
    $spec = array_unique($spec);

    // Convert to the desired format
    $spec = array_map(function ($specialization) {
        return ['specialization' => $specialization];
    }, $spec);

    return $spec;
}



public function displayErrors($err){
    foreach ($err as $errors)
    {
        echo '<li>' .   $errors  . '</li>' ; 
    }
}

public function getSpecializationAppointments($specialization){

    $sql = "SELECT
        a.Appid, a.date, a.time, a.price, a.Did, a.Cid,
        d.firstname, d.lastname, d.specialization,
        c.cname
    FROM
        appointments a
    JOIN
        dr d ON a.Did = d.Did
    JOIN
        clinic c ON a.Cid = c.Cid
    WHERE
        d.specialization = '$specialization' and a.status = 'available' ";


    $result = mysqli_query($this->conn,$sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";   
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>"; 
            echo "<td>" . $row['specialization'] . "</td>"; 
            echo "<td>" . $row['time'] . "</td>";      
            echo "<td>" . $row['price'] . "</td>";     
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td><a href='./patientReservations.php?Appid=" . $row['Appid'] . "'>Book Now </a></td>";
            echo "</tr>";
        }
    } else 
    {
        echo  "<div class='no-appointments-found'><h1>NO APPOINTMENTS FOUND!</h1></div>";
        
    }
    






}   
public function getPatientID($id)
 {
    
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, patient.Pid, patient.uid
    FROM patient 
    JOIN user_acc ON user_acc.uid = patient.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
        
    
                    $PID=$row["Pid"];

    }
    return $PID;

} 
public function bookForPatient($pid,$appid)
{
    $sql = "UPDATE appointments SET pid = '$pid',status='reserved' WHERE Appid = $appid";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        $this->appointment->pid=$pid;
        return true;
    } 
    else 
    {
        return false;
    }
}
public function viewPatientAppointments($pid){
    $sql = "SELECT
    a.Appid, a.date, a.time, a.price, a.Did, a.Cid,
    d.firstname, d.lastname, 
    c.cname
FROM
    appointments a
JOIN
    dr d ON a.Did = d.Did
JOIN
    clinic c ON a.Cid = c.Cid
WHERE
    a.Pid =".$pid;

    $result = mysqli_query($this->conn,$sql);
    
    if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         echo "<tr>";
         echo "<td>" . $row['date'] . "</td>";
         echo "<td>" . $row['time'] . "</td>";
        
         echo "<td>" . $row['firstname'] ." ". $row['lastname']. "</td>";
        
         echo "<td>" . $row['cname'] . "</td>";
         echo "<td>" . $row['price'] . "</td>";
         echo "<td><a href='./cancelReservation.php?Appid=" . $row['Appid'] . "'>Cancel</a> </td>";
        //  $sql2 = "Select cname from clinic WHERE Cid = '{$row['Cid']}'";
        //  $res2=mysqli_query($this->conn,$sql2);
        //  if ($res2->num_rows>0){
        //      $clincirow = $res2->fetch_assoc();
        //      echo "<td>" . $clincirow['cname'] . "</td>";
        //  }
        
     
     
         echo "</tr>";
     }
 } else {
     echo "<h1>" ."No appointments found"."</h1" ;
 }
//  $sql2="select cname from clinic where cid = {$ID}";
//  $res2=mysqli_query($this->conn,$sql2);
//  if ($res2) {
//      $row = mysqli_fetch_assoc($res2);
//      $_SESSION['AppView'] = $row['cname'];
//  }
}

// <th>Date</th>
// <th>Time</th>
// <th>Doctor</th>
// <th>Actions</th>
// <th>Clinic</th>
// <th>Price</th>
public function cancelReservation($pid,$appid)
{
    $sql = "UPDATE appointments SET pid = NULL , status='available' WHERE Appid = $appid";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        
        return true;
    } 
    else 
    {
        return false;
    }

}

}

?>

