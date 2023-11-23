<?php 
include_once '..\includes\db.php';
class user{
    public $email;
	public $pass;
	public $type;
	public $id;

function __construct($id)
{
if($id!=""){
    $sql="select * from user_acc where uid=$id";
    $result = mysqli_query($GLOBALS['conn'],$sql);
if($row=mysqli_fetch_array($result)){
                $this->email=$row["email"];
				$this->pass=$row["pass"];
				$this->id=$row["uid"];
				$this->type=$row['type'];
}

}


}







}

class Patient extends user{
	public $firstname;
	public $lastname;
	public $age;
	public $gender;
	public $address;
	public $number;
	public $uid;
	public $pid;

	
	function __construct($id)
	{
$sql = "SELECT user_acc.uid, user_acc.email,user_acc.type, patient.firstname, patient.lastname,patient.gender,
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


					
					

					

	
	// $sql = "SELECT user_acc.uid, user_acc.email,user_acc.type, patient.firstname, patient.lastname,patient.gender,
	// patient.address,patient.number,patient.age,patient.uid 
	// FROM patient 
	// JOIN user_acc ON user_acc.uid = patient.uid";
	// 	$result = mysqli_query($GLOBALS['conn'],$sql);
	
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
	
	





	
}



?>