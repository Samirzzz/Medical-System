<?php 
include_once '..\includes\db.php';
class user{
    public $username;
	public $pass;
	public $type;
	public $id;
	public $email;

function __construct($id)
{
if($id!=""){
    $sql="select * from user_acc where uid=$id";
    $result = mysqli_query($GLOBALS['conn'],$sql);
if($row=mysqli_fetch_array($result)){
                $this->username=$row["username"];
				$this->pass=$row["pass"];
				$this->id=$row["uid"];
				$this->type=$row['type'];
}

}


}








}
class dr{

}
class clinic{

}



?>