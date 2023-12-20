<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Clinic.php';

class ClinicController
{
    public $db;
	public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
   
    static function clinicsearch($value,$conn)  {
    
        $i=0;
            $clinic=array();
            $sql = "SELECT user_acc.uid, user_acc.email, clinic.cid,clinic.cname, clinic.cloc ,clinic.workhrs,clinic.cnumber
                                FROM clinic 
                                JOIN user_acc ON user_acc.uid = clinic.uid  
                                WHERE email LIKE '%$value%'";
            $result = mysqli_query($conn,$sql);
    
            while($row=mysqli_fetch_array($result)) {
                $clinic[$i++]=new Clinic($row[0]);
            }	
            return $clinic;
    
        }
    
        
        static function signupClinic($cname,$cloc,$cnumber,$uid,$conn) 
    {
    
        $sql = "INSERT INTO clinic (cname,cloc,cnumber,uid) VALUES ('$cname','$cloc','$cnumber','$uid')";
        if(mysqli_query($conn,$sql))
                return true;
            else
                return false;
    
    
    }

    static function editClinic($cname,$cloc,$cnumber,$uid,$conn)
    {
        $sql = "UPDATE clinic Set cname='$cname', cloc='$cloc', cnumber='$cnumber' WHERE uid='$uid'";
	    $result = mysqli_query($conn, $sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public static function deleteClinic($id,$conn)
    {
        $sql = "DELETE FROM clinic WHERE uid=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            echo "Error deleting from 'patient': " . mysqli_error($conn);

            return false;
        }
    }
    
}
?>