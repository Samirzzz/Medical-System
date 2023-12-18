<?php
include_once '..\includes\db.php';
require_once '../app/Model/User.php';
require_once '../app/Model/Pages.php';
class Pages{
    public $pgid;
    public $name;
    public $linkaddress;
    public $icons;
    public $class;


    function __construct($id){
        if ($id !=""){	
            $sql="select * from pages where pgid=$id";
            $result2=mysqli_query($GLOBALS['conn'],$sql) ;
            if ($row2 = mysqli_fetch_array($result2)){
                $this->name=$row2["name"];
                $this->linkaddress=$row2["linkaddress"];
                $this->pgid=$row2["pgid"];
                $this->icons=$row2["icons"];
                $this->class=$row2["class"];



            }
        }

    }

static function getallpages(){
    $sql="select * from pages";
    $PageDataSet = mysqli_query($GLOBALS['conn'],$sql);		
    $i=0;
    $Result=array();
    while ($row = mysqli_fetch_array($PageDataSet))	{
        $MyObj= new Pages($row["pgid"]);
        $Result[$i]=$MyObj;
        $i++;
    }
    return $Result;

}

}

?>