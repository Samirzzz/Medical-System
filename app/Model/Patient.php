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
	public $db;
	public $conn;


	
	function __construct($id)
	{
		$this->db = Database::getInstance();
		$this->conn = $this->db->getConnection();	
    $sql = "SELECT user_acc.uid,user_acc.image, user_acc.email,user_acc.usertype_id, patient.firstname, patient.lastname,patient.gender,
	patient.address,patient.number,patient.age,patient.uid,patient.pid 
	FROM patient 
	JOIN user_acc ON user_acc.uid = patient.uid where user_acc.uid=".$id;
			$result = mysqli_query($this->conn,$sql);
	        if($row=mysqli_fetch_array($result)){
				parent::__construct($row["uid"]);
					$this->pid=$row["pid"];
	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	 				$this->uid=$row["uid"];
					$this->image=$row['image'];
					$this->address=$row['address'];
					$this->gender=$row['gender'];
					$this->number=$row['number'];



	
	}

	


}
public function getFirstName()
	{
		return $this->firstname;
	}
	  function getLastName() {
		return $this->lastname;
	  }
	  function getuid() {
		return $this->uid;
	  }
	  function getPid() {
		return $this->pid;
	  }
	  function getAddress() {
		return $this->address;
	  }
	  function getGender() {
		return $this->gender;
	  }
	  function getNumber() {
		return $this->number;
	  }


}
?>