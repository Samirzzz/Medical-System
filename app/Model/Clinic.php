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
	function __construct($id)
{
if($id!=""){
	$sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
	clinic.cnumber,clinic.workhrs,clinic.cloc
	FROM clinic 
	JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
    $result = mysqli_query($GLOBALS['conn'],$sql);
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
public function getcid(){
	return $this->cid;
}
static function clinicsearch($value)  {

	$i=0;
		$clinic=array();
		$sql = "SELECT user_acc.uid, user_acc.email, clinic.cid,clinic.cname, clinic.cloc ,clinic.workhrs,clinic.cnumber
                            FROM clinic 
                            JOIN user_acc ON user_acc.uid = clinic.uid  
                            WHERE email LIKE '%$value%'";
		$result = mysqli_query($GLOBALS['conn'],$sql);

		while($row=mysqli_fetch_array($result)) {
			$clinic[$i++]=new Clinic($row[0]);
		}	
		return $clinic;

	}

	
	static function signupClinic($cname,$cloc,$cnumber,$uid) 
{

	$sql = "INSERT INTO clinic (cname,cloc,cnumber,uid) VALUES ('$cname','$cloc','$cnumber','$uid')";
	if(mysqli_query($GLOBALS['conn'],$sql))
			return true;
		else
			return false;


}



}

?>