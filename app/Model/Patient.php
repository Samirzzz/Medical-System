<?php
require_once '../app/Model/User.php';
include_once '..\includes\db.php';


class Patient extends user{
	public $firstname;
	public $lastname;
	public $age;
	public $gender;
	public $address;
	public $number;
	public $uid;
	public $pid;
	public $image;



	
	function __construct($id)
	{
    $sql = "SELECT user_acc.uid,user_acc.image, user_acc.email,user_acc.usertype_id, patient.firstname, patient.lastname,patient.gender,
	patient.address,patient.number,patient.age,patient.uid,patient.pid 
	FROM patient 
	JOIN user_acc ON user_acc.uid = patient.uid where user_acc.uid=".$id;
			$result = mysqli_query($GLOBALS['conn'],$sql);
	        if($row=mysqli_fetch_array($result)){
				parent::__construct($row["uid"]);
				$this->pid=$row["pid"];

	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	 				$this->uid=$row["uid"];
					 $this->image=$row['image'];

	
	}


}

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




}
?>