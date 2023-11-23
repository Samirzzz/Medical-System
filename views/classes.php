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
class Clinic{
	public $cid;
	public $cname;
	public $cloc;
	public $workhrs;
	public $cnumber;
	function __construct($id)
{
if($id!=""){
    $sql="select clinic.cname, clinic.cid, clinic.cloc, clinic.cnumber,clinic.workhrs 
	 from clinic where cid='$id'";
    $result = mysqli_query($GLOBALS['conn'],$sql);
if($row=mysqli_fetch_array($result)){
                $this->cid=$row["cid"];
				$this->cname=$row["cname"];
				$this->workhrs=$row["workhrs"];
				$this->cnumber=$row['cnumber'];
				$this->cloc=$row['cloc'];

}

}


}
static function clinicsearch($value)  {

	$i=0;
		$clinic=array();
		$sql = "SELECT clinic.cname, clinic.cid, clinic.cloc, clinic.cnumber,clinic.workhrs   
                FROM clinic 
                WHERE cname LIKE '%$value%'";
		$result = mysqli_query($GLOBALS['conn'],$sql);

		while($row=mysqli_fetch_array($result)) {
			$clinic[$i++]=new Clinic($row['cid']);
		}	
		return $clinic;

	}
	
	


}



class Dr extends user{
	public $firstname;
	public $lastname;
	public $specialization;
	public $educ;
	public $number;
	public $uid;
	public $did;

	public $cid;
	function __construct($id)
	{
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.type, dr.firstname, dr.lastname,dr.specialization,
	dr.educ,dr.number,dr.uid,dr.cid,dr.did 
	FROM dr 
	JOIN user_acc ON user_acc.uid = dr.uid where user_acc.uid=".$id;
			$result = mysqli_query($GLOBALS['conn'],$sql);
	        if($row=mysqli_fetch_array($result)){
				parent::__construct($row["uid"]);
				$this->did=$row["did"];

	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	             	$this->specialization=$row["specialization"];
	             	$this->educ=$row["educ"];
	             	$this->number=$row["number"];
	             	$this->cid=$row["cid"];
	 				$this->uid=$row["uid"];


	
	}

	
}
static function drsearch($value)  {

	$i=0;
		$dr=array();
		$sql = "SELECT user_acc.uid, user_acc.email, dr.firstname, dr.lastname ,dr.did
                            FROM dr 
                            JOIN user_acc ON user_acc.uid = dr.uid  
                            WHERE email LIKE '%$value%'";
		$result = mysqli_query($GLOBALS['conn'],$sql);

		while($row=mysqli_fetch_array($result)) {
			$dr[$i++]=new Dr($row[0]);
		}	
		return $dr;

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