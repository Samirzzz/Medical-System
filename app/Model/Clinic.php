<?php
require_once '../app/Model/User.php';
include_once '..\includes\db.php';
class Clinic extends user{
	public $cid;
	public $cname;
	public $cloc;
	public $workhrs;
	public $cnumber;
	public $uid;
	public $db;
	public $conn;
	function __construct($id)
{
	$this->db = Database::getInstance();
	$this->conn = $this->db->getConnection();	
if($id!=""){
	$sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
	clinic.cnumber,clinic.workhrs,clinic.cloc
	FROM clinic 
	JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
if($row=mysqli_fetch_array($result)){
	parent::__construct($row["uid"]);

                $this->cid=$row["cid"];
				$this->cname=$row["cname"];
				$this->workhrs=$row["workhrs"];
				$this->cnumber=$row['cnumber'];
				$this->cloc=$row['cloc'];

}

}



}


}

?>