<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Patient.php';
require_once '../app/Model/Clinic.php';


class UserController {
    public static function login($email, $pass)
    {
       $sql = "SELECT * FROM user_acc WHERE email='$email' AND pass='$pass'";
   
       $result = mysqli_query($GLOBALS['conn'], $sql);
       if ($row = mysqli_fetch_array($result)) {		
           // if (password_verify($pass, $row['pass'])){
           $user = new User($row['uid']);
           $user->email = $row['email'];
           $user->image = $row['image'];
   
           $user->usertype = new Usertype($row['usertype_id']);
           if ($user->usertype->utid == "4") {
               $patientInfoSql = "SELECT * FROM patient WHERE uid = " . $row['uid'];
               $patientInfoResult = mysqli_query($GLOBALS['conn'], $patientInfoSql);
   
               if ($patientRow = mysqli_fetch_array($patientInfoResult)) {
                   $patient = new Patient($row['uid']);
                   $patient->pid = $patientRow['Pid'];
                   $patient->firstname = $patientRow['firstname'];
                   $patient->lastname = $patientRow['lastname'];
                   $patient->number = $patientRow['number'];
                   $patient->number = $patientRow['number'];
                   $patient->image = $user->image;
                   $patient->uid = $user->id;
   
   
   
                   
               }
               
               return $patient; 
               
           } elseif ($user->usertype->utid=="2") {
               $doctorInfoSql = "SELECT * FROM dr WHERE uid = " . $row['uid'];
               $doctorInfoResult = mysqli_query($GLOBALS['conn'], $doctorInfoSql);
   
               if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) {
                   $doctor = new Dr($row['uid']);
                   $doctor->did = $doctorRow['did'];
                   $doctor->firstname = $doctorRow['firstname'];
                   $doctor->lastname = $doctorRow['lastname'];
                   $doctor->number = $doctorRow['number'];
                   $doctor->educ = $doctorRow['educ'];
                   $doctor->specialization = $doctorRow['specialization'];
                   $doctor->image = $user->image;
   
   
               }
   
               return $doctor; 
           }
           elseif ($user->usertype->utid=="1") {
               $doctorInfoSql = "SELECT * FROM admin WHERE uid = " . $row['uid'];
               $doctorInfoResult = mysqli_query($GLOBALS['conn'], $doctorInfoSql);
           
               if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) {
                   $admin = new Admin($row['uid']);
                   $admin->aid = $doctorRow['aid'];
                   $admin->name = $doctorRow['name'];
                   
               }
               
               return $admin; 
           }
   
           elseif ($user->usertype->utid=="3") {
               $clinicInfoSql = "SELECT * FROM clinic WHERE uid = " . $row['uid'];
               $clinicInfoResult = mysqli_query($GLOBALS['conn'], $clinicInfoSql);
   
               if ($clinicRow = mysqli_fetch_array($clinicInfoResult)) {
                   $clinic = new Clinic($row['uid']);
                   $clinic->cid = $clinicRow['cid'];
                   $clinic->cname = $clinicRow['cname'];
                   $clinic->cloc = $clinicRow['cloc'];
                   $clinic->workhrs = $clinicRow['workhrs'];
                   $clinic->cnumber = $clinicRow['cnumber'];
               }
   
               return $clinic; 
           }
       // }
       }
       return NULL;
   
   }

    public static function signupUser($email, $pass, $usertype, $image) {
        $sql = "INSERT INTO user_acc (email, pass, usertype_id, image) VALUES ('$email', '$pass', '$usertype', '$image')";
        if (mysqli_query($GLOBALS['conn'], $sql)) {
            return mysqli_insert_id($GLOBALS['conn']);
        } else {
            return false;
        }
    }
    public static function editUser($email, $image, $id)
    {
        $sql = "UPDATE user_acc SET email='$email', image='$image' WHERE uid=$id";
        $result = mysqli_query($GLOBALS['conn'], $sql);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>
