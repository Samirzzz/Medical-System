<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Patient.php';

class PatientController
{
    static function patientsearch($value)  {
		$i=0;
		$patient=array();
		$sql="SELECT user_acc.uid, user_acc.email, patient.firstname, patient.lastname,patient.pid   
		FROM patient
		JOIN user_acc ON user_acc.uid = patient.uid 
		WHERE email LIKE '%$value%'";
		$result = mysqli_query($GLOBALS['conn'],$sql);

		while($row=mysqli_fetch_array($result)) {
			$patient[$i++]=new Patient($row[0]);
		}	
		return $patient;

	}

	public static function getAllPatients()
{
	$sql = "SELECT * FROM patient";
    $patients = mysqli_query($GLOBALS['conn'], $sql);

    $result = array();

    while ($row = mysqli_fetch_assoc($patients))
	 {
        $myObj = new Patient($row['uid']);
        $myObj->pid = $row['Pid'];
        $myObj->firstname = $row['firstname'];
        $myObj->lastname = $row['lastname'];
        $myObj->number = $row['number'];
        $myObj->age = $row['age'];
        $myObj->address = $row['address'];

        $result[] = $myObj;
    }

    return $result;
}

static function signupPatient($firstname, $lastname, $number,$age,$gender,$address,$uid) {
	$sql = "INSERT INTO patient (firstname, lastname, number, age, gender, address,uid) VALUES ('$firstname', '$lastname', '$number', '$age', '$gender', '$address','$uid')";
if(mysqli_query($GLOBALS['conn'],$sql))
		return true;
	else
		return false;
}

static function editPatient($firstname, $lastname, $number,$gender,$address,$uid)
{
	$sql = "UPDATE patient Set firstname='$firstname', lastname='$lastname', number='$number', age='$age', gender='$gender', address='$address' WHERE uid='$uid'";
	$result = mysqli_query($GLOBALS['conn'], $sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

}
public static function deletePatient($id)
{
	$sql = "DELETE FROM patient WHERE uid=$id";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	if ($result) {
		return true;
	} else {
		echo "Error deleting from 'patient': " . mysqli_error($GLOBALS['conn']);
		return false;
	}
}
}

?>