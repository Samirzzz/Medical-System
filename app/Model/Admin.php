<?php
require_once '../app/Model/User.php';
include_once '../includes/db.php';
class Admin extends user{
	public $aid;
	public $name;
	public $uid;
	public $db;
	public $conn;
	function __construct($id)
	{
		$this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, admin.name, admin.uid,admin.aid
	FROM admin 
	JOIN user_acc ON user_acc.uid = admin.uid where user_acc.uid=".$id;
			$result = mysqli_query($this->conn,$sql);
	        if($row=mysqli_fetch_array($result)){
				parent::__construct($row["uid"]);
				$this->aid=$row["aid"];
	            $this->name=$row["name"];
	}
	}

}
?>