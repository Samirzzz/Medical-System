<?php
require_once '../app/Model/User.php';
include_once '..\includes\db.php';
class Dr extends user{
	public $firstname;
	public $lastname;
	public $specialization;
	public $educ;
	public $number;
	public $cid;
	public $uid;
	public $image;

	
	public $did;
	function __construct($id)
	{
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, dr.firstname, dr.lastname,dr.specialization,
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
	 				$this->uid=$row["image"];




	
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
	

 static function getAlldoctors()
{
    $sql = "SELECT * FROM dr";
    $doctors = mysqli_query($GLOBALS['conn'], $sql);

    $result = array();

    while ($row = mysqli_fetch_assoc($doctors))
	 {
        $myObj = new Dr($row['uid']);
        $myObj->did = $row['Did'];
        $myObj->firstname = $row['firstname'];
        $myObj->lastname = $row['lastname'];
        $myObj->number = $row['number'];
        $myObj->educ = $row['educ'];
        $myObj->specialization = $row['specialization'];

        $result[] = $myObj;
    }

    return $result;
}
static function signupDoctor($firstname, $lastname, $number,$educ,$specialization,$uid) 
{


	$sql = "INSERT INTO dr (firstname, lastname, number,educ,specialization,uid,cid) VALUES ('$firstname', '$lastname', '$number','$educ','$specialization','$uid','0')";
	if(mysqli_query($GLOBALS['conn'],$sql))
			return true;
		else
			return false;


}


}
?>