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
	dr.educ,dr.number,dr.uid,dr.cid,dr.did,user_acc.image
	FROM dr 
	JOIN user_acc ON user_acc.uid = dr.uid where user_acc.uid=".$id;
			$result = mysqli_query($GLOBALS['conn'],$sql);
	        if($row=mysqli_fetch_array($result))
			{
				parent::__construct($row["uid"]);
				$this->did=$row["did"];

	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	             	$this->specialization=$row["specialization"];
	             	$this->educ=$row["educ"];
	             	$this->number=$row["number"];
	             	$this->cid=$row["cid"];
	 				$this->uid=$row["uid"];
	 				$this->image=$row["image"];




	
	}

	
	}

}
?>