<?php
include_once '..\includes\db.php';
require_once '../app/Model/User.php';
require_once '../app/Model/Pages.php';

class Usertype{
    public $utid;
    public $name;
    public $pages;
    
    function __construct($id)
    {
        if ($id !=""){
            $sql="select * from usertypes where utid=$id";
            $result=mysqli_query($GLOBALS['conn'],$sql);
            if ($row = mysqli_fetch_array($result))	{
                $this->name=$row["name"];
                $this->utid=$row["utid"];
                $sql="select pageid from usertype_pages where usertypeid=$this->utid";
                $result=mysqli_query($GLOBALS['conn'],$sql);
                $i=0;
                while($row1=mysqli_fetch_array($result)){
                    $this->pages[$i]=new Pages($row1[0]);
                    $i++;
                }
            }
        }	
    }
    
    static function getallusertypes() {
        $sql="select * from usertypes";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $i=0;
    $userarray=array();
    while($row4=mysqli_fetch_array($result)) {
    
        $userarray[$i++]=new Usertype($row4[0]);
    }	
    return $userarray;
    
    }
    
    
    }

?>