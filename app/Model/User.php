<?php
include_once '..\includes\db.php';
require_once '../app/Model/UserType.php';



class user{
    public $email;
	public $pass;
	public $id;
    public $usertype;
	public $image;

function __construct($id)
{
if($id!="")
{
    $sql="select * from user_acc where uid=$id";
    $result = mysqli_query($GLOBALS['conn'],$sql);
if($row=mysqli_fetch_array($result)){
                $this->email=$row["email"];
				$this->pass=$row["pass"];
				$this->id=$row["uid"];
				$this->image=$row["image"];
				$this->usertype=new Usertype($row['usertype_id']);
}

}


}
}


   



?>