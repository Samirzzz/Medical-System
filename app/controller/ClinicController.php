<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Clinic.php';

class ClinicController
{
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