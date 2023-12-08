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


}
?>