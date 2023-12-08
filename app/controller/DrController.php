<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Doctor.php';

class DrController
{
    static function drsearch($value)  {

        $i=0;
            $dr=array();
            $sql = "SELECT user_acc.uid, user_acc.email, dr.firstname, dr.lastname ,dr.did
                                FROM dr 
                                JOIN user_acc ON user_acc.uid = dr.uid  
                                WHERE email LIKE '%$value%'";
            $result = mysqli_query($GLOBALS['conn'],$sql);
    
            while($row=mysqli_fetch_array($result)) {
                $dr[$i++]=new Dr($row[0]);
            }	
            return $dr;
    
        }
        
    
     static function getAlldoctors()
    {
        $sql = "SELECT * FROM dr";
        $doctors = mysqli_query($GLOBALS['conn'], $sql);
    
        $result = array();
    
        while ($row = mysqli_fetch_assoc($doctors))
         {
            $myObj = new Dr($row['uid']);
            $myObj->did = $row['Did'];
            $myObj->firstname = $row['firstname'];
            $myObj->lastname = $row['lastname'];
            $myObj->number = $row['number'];
            $myObj->educ = $row['educ'];
            $myObj->specialization = $row['specialization'];
    
            $result[] = $myObj;
        }
    
        return $result;
    }
    static function signupDoctor($firstname, $lastname, $number,$educ,$specialization,$uid) 
    {
    
    
        $sql = "INSERT INTO dr (firstname, lastname, number,educ,specialization,uid,cid) VALUES ('$firstname', '$lastname', '$number','$educ','$specialization','$uid','0')";
        if(mysqli_query($GLOBALS['conn'],$sql))
                return true;
            else
                return false;
    
    
    }
    static function editDoctor($firstname, $lastname, $number,$educ,$specialization,$uid)
{
	$sql = "UPDATE dr Set firstname='$firstname', lastname='$lastname', number='$number', educ='$educ', specialization='$specialization' WHERE uid='$uid'";
	$result = mysqli_query($GLOBALS['conn'], $sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

}
public static function deleteDoctor($id)
{
    $sql = "DELETE FROM dr WHERE uid=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if ($result) {
        return true;
    } else {
        echo "Error deleting from 'patient': " . mysqli_error($GLOBALS['conn']);

        return false;
    }
}
}
?>