<?php 
include_once '..\includes\db.php';
// class user{
//     public $email;
// 	public $pass;
// 	public $id;
//     public $usertype;
// 	public $image;

// function __construct($id)
// {
// if($id!="")
// {
//     $sql="select * from user_acc where uid=$id";
//     $result = mysqli_query($GLOBALS['conn'],$sql);
// if($row=mysqli_fetch_array($result)){
//                 $this->email=$row["email"];
// 				$this->pass=$row["pass"];
// 				$this->id=$row["uid"];
// 				$this->image=$row["image"];
// 				$this->usertype=new Usertype($row['usertype_id']);
// }

// }


// }

// static function login($email, $pass)
//  {
// 	$sql = "SELECT * FROM user_acc WHERE email='$email' AND pass='$pass'";

// 	$result = mysqli_query($GLOBALS['conn'], $sql);
// 	if ($row = mysqli_fetch_array($result)) {		
// 		// if (password_verify($pass, $row['pass'])){
// 		$user = new User($row['uid']);
// 		$user->email = $row['email'];
// 		$user->image = $row['image'];

// 		$user->usertype = new Usertype($row['usertype_id']);
// 		if ($user->usertype->utid == "4") {
// 			$patientInfoSql = "SELECT * FROM patient WHERE uid = " . $row['uid'];
// 			$patientInfoResult = mysqli_query($GLOBALS['conn'], $patientInfoSql);

// 			if ($patientRow = mysqli_fetch_array($patientInfoResult)) {
// 				$patient = new Patient($row['uid']);
// 				$patient->pid = $patientRow['Pid'];
// 				$patient->firstname = $patientRow['firstname'];
// 				$patient->lastname = $patientRow['lastname'];
// 				$patient->number = $patientRow['number'];
// 				$patient->number = $patientRow['number'];
// 				$patient->image = $user->image;
// 				$patient->uid = $user->id;



				
// 			}
			
// 			return $patient; 
			
// 		} elseif ($user->usertype->utid=="2") {
// 			$doctorInfoSql = "SELECT * FROM dr WHERE uid = " . $row['uid'];
// 			$doctorInfoResult = mysqli_query($GLOBALS['conn'], $doctorInfoSql);

// 			if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) {
// 				$doctor = new Dr($row['uid']);
// 				$doctor->did = $doctorRow['did'];
// 				$doctor->firstname = $doctorRow['firstname'];
// 				$doctor->lastname = $doctorRow['lastname'];
// 				$doctor->number = $doctorRow['number'];
// 				$doctor->educ = $doctorRow['educ'];
// 				$doctor->specialization = $doctorRow['specialization'];
// 				$doctor->image = $user->image;


// 			}

// 			return $doctor; 
// 		}
// 		elseif ($user->usertype->utid=="1") {
// 			$doctorInfoSql = "SELECT * FROM admin WHERE uid = " . $row['uid'];
// 			$doctorInfoResult = mysqli_query($GLOBALS['conn'], $doctorInfoSql);
		
// 			if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) {
// 				$admin = new Admin($row['uid']);
// 				$admin->aid = $doctorRow['aid'];
// 				$admin->name = $doctorRow['name'];
				
// 			}
			
// 			return $admin; 
// 		}

// 		elseif ($user->usertype->utid=="3") {
// 			$clinicInfoSql = "SELECT * FROM clinic WHERE uid = " . $row['uid'];
// 			$clinicInfoResult = mysqli_query($GLOBALS['conn'], $clinicInfoSql);

// 			if ($clinicRow = mysqli_fetch_array($clinicInfoResult)) {
// 				$clinic = new Clinic($row['uid']);
// 				$clinic->cid = $clinicRow['cid'];
// 				$clinic->cname = $clinicRow['cname'];
// 				$clinic->cloc = $clinicRow['cloc'];
// 				$clinic->workhrs = $clinicRow['workhrs'];
// 				$clinic->cnumber = $clinicRow['cnumber'];
// 			}

// 			return $clinic; 
// 		}
// 	// }
// 	}
// 	return NULL;

// }
// static function signupUser($email, $pass, $usertype,$image) 
// {
//     // $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
// 	$sql = "INSERT INTO user_acc (email, pass, usertype_id,image) VALUES ('$email', '$pass', '$usertype','$image')";    
//     if(mysqli_query($GLOBALS['conn'], $sql)) {
//         return mysqli_insert_id($GLOBALS['conn']);
//     } else {
//         return false;
//     }
// }

// }

// class Admin extends user{
// 	public $aid;
// 	public $name;
// 	public $uid;
// 	function __construct($id)
// 	{
//     $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, admin.name, admin.uid,admin.aid
// 	FROM admin 
// 	JOIN user_acc ON user_acc.uid = admin.uid where user_acc.uid=".$id;
// 			$result = mysqli_query($GLOBALS['conn'],$sql);
// 	        if($row=mysqli_fetch_array($result)){
// 				parent::__construct($row["uid"]);
// 				$this->aid=$row["aid"];
// 	            $this->name=$row["name"];
// 	}
// 	}

// }


// class Clinic extends user{
// 	public $cid;
// 	public $cname;
// 	public $cloc;
// 	public $workhrs;
// 	public $cnumber;
// 	public $uid;
// 	function __construct($id)
// {
// if($id!=""){
// 	$sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
// 	clinic.cnumber,clinic.workhrs,clinic.cloc
// 	FROM clinic 
// 	JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
//     $result = mysqli_query($GLOBALS['conn'],$sql);
// if($row=mysqli_fetch_array($result)){
// 	parent::__construct($row["uid"]);

//                 $this->cid=$row["cid"];
// 				$this->cname=$row["cname"];
// 				$this->workhrs=$row["workhrs"];
// 				$this->cnumber=$row['cnumber'];
// 				$this->cloc=$row['cloc'];

// }

// }



// }
// public function getcid(){
// 	return $this->cid;
// }
// static function clinicsearch($value)  {

// 	$i=0;
// 		$clinic=array();
// 		$sql = "SELECT user_acc.uid, user_acc.email, clinic.cid,clinic.cname, clinic.cloc ,clinic.workhrs,clinic.cnumber
//                             FROM clinic 
//                             JOIN user_acc ON user_acc.uid = clinic.uid  
//                             WHERE email LIKE '%$value%'";
// 		$result = mysqli_query($GLOBALS['conn'],$sql);

// 		while($row=mysqli_fetch_array($result)) {
// 			$clinic[$i++]=new Clinic($row[0]);
// 		}	
// 		return $clinic;

// 	}

	
// 	static function signupClinic($cname,$cloc,$cnumber,$uid) 
// {

// 	$sql = "INSERT INTO clinic (cname,cloc,cnumber,uid) VALUES ('$cname','$cloc','$cnumber','$uid')";
// 	if(mysqli_query($GLOBALS['conn'],$sql))
// 			return true;
// 		else
// 			return false;


// }



// }



// class Dr extends user{
// 	public $firstname;
// 	public $lastname;
// 	public $specialization;
// 	public $educ;
// 	public $number;
// 	public $cid;
// 	public $uid;
// 	public $image;

	
// 	public $did;
// 	function __construct($id)
// 	{
//     $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, dr.firstname, dr.lastname,dr.specialization,
// 	dr.educ,dr.number,dr.uid,dr.cid,dr.did 
// 	FROM dr 
// 	JOIN user_acc ON user_acc.uid = dr.uid where user_acc.uid=".$id;
// 			$result = mysqli_query($GLOBALS['conn'],$sql);
// 	        if($row=mysqli_fetch_array($result)){
// 				parent::__construct($row["uid"]);
// 				$this->did=$row["did"];

// 	             	$this->firstname=$row["firstname"];
// 	             	$this->lastname=$row["lastname"];
// 	             	$this->specialization=$row["specialization"];
// 	             	$this->educ=$row["educ"];
// 	             	$this->number=$row["number"];
// 	             	$this->cid=$row["cid"];
// 	 				$this->uid=$row["uid"];
// 	 				$this->uid=$row["image"];




	
// 	}

	
// }
// static function drsearch($value)  {

// 	$i=0;
// 		$dr=array();
// 		$sql = "SELECT user_acc.uid, user_acc.email, dr.firstname, dr.lastname ,dr.did
//                             FROM dr 
//                             JOIN user_acc ON user_acc.uid = dr.uid  
//                             WHERE email LIKE '%$value%'";
// 		$result = mysqli_query($GLOBALS['conn'],$sql);

// 		while($row=mysqli_fetch_array($result)) {
// 			$dr[$i++]=new Dr($row[0]);
// 		}	
// 		return $dr;

// 	}
	

//  static function getAlldoctors()
// {
//     $sql = "SELECT * FROM dr";
//     $doctors = mysqli_query($GLOBALS['conn'], $sql);

//     $result = array();

//     while ($row = mysqli_fetch_assoc($doctors))
// 	 {
//         $myObj = new Dr($row['uid']);
//         $myObj->did = $row['Did'];
//         $myObj->firstname = $row['firstname'];
//         $myObj->lastname = $row['lastname'];
//         $myObj->number = $row['number'];
//         $myObj->educ = $row['educ'];
//         $myObj->specialization = $row['specialization'];

//         $result[] = $myObj;
//     }

//     return $result;
// }
// static function signupDoctor($firstname, $lastname, $number,$educ,$specialization,$uid) 
// {


// 	$sql = "INSERT INTO dr (firstname, lastname, number,educ,specialization,uid,cid) VALUES ('$firstname', '$lastname', '$number','$educ','$specialization','$uid','0')";
// 	if(mysqli_query($GLOBALS['conn'],$sql))
// 			return true;
// 		else
// 			return false;


// }


// }



// class Patient extends user{
// 	public $firstname;
// 	public $lastname;
// 	public $age;
// 	public $gender;
// 	public $address;
// 	public $number;
// 	public $uid;
// 	public $pid;
// 	public $image;



	
// 	function __construct($id)
// 	{
//     $sql = "SELECT user_acc.uid,user_acc.image, user_acc.email,user_acc.usertype_id, patient.firstname, patient.lastname,patient.gender,
// 	patient.address,patient.number,patient.age,patient.uid,patient.pid 
// 	FROM patient 
// 	JOIN user_acc ON user_acc.uid = patient.uid where user_acc.uid=".$id;
// 			$result = mysqli_query($GLOBALS['conn'],$sql);
// 	        if($row=mysqli_fetch_array($result)){
// 				parent::__construct($row["uid"]);
// 				$this->pid=$row["pid"];

// 	             	$this->firstname=$row["firstname"];
// 	             	$this->lastname=$row["lastname"];
// 	 				$this->uid=$row["uid"];
// 					 $this->image=$row['image'];

	
// 	}


// }

// 	static function patientsearch($value)  {
// 		$i=0;
// 		$patient=array();
// 		$sql="SELECT user_acc.uid, user_acc.email, patient.firstname, patient.lastname,patient.pid   
// 		FROM patient
// 		JOIN user_acc ON user_acc.uid = patient.uid 
// 		WHERE email LIKE '%$value%'";
// 		$result = mysqli_query($GLOBALS['conn'],$sql);

// 		while($row=mysqli_fetch_array($result)) {
// 			$patient[$i++]=new Patient($row[0]);
// 		}	
// 		return $patient;

// 	}

// 	public static function getAllPatients()
// {
// 	$sql = "SELECT * FROM patient";
//     $patients = mysqli_query($GLOBALS['conn'], $sql);

//     $result = array();

//     while ($row = mysqli_fetch_assoc($patients))
// 	 {
//         $myObj = new Patient($row['uid']);
//         $myObj->pid = $row['Pid'];
//         $myObj->firstname = $row['firstname'];
//         $myObj->lastname = $row['lastname'];
//         $myObj->number = $row['number'];
//         $myObj->age = $row['age'];
//         $myObj->address = $row['address'];

//         $result[] = $myObj;
//     }

//     return $result;
// }

// static function signupPatient($firstname, $lastname, $number,$age,$gender,$address,$uid) {
// 	$sql = "INSERT INTO patient (firstname, lastname, number, age, gender, address,uid) VALUES ('$firstname', '$lastname', '$number', '$age', '$gender', '$address','$uid')";
// if(mysqli_query($GLOBALS['conn'],$sql))
// 		return true;
// 	else
// 		return false;
// }




// }
	

	
	

// class Appointments extends Clinic
// {
//     private $conn;
//     public $date, $time, $status, $price, $doctorId, $clinicId, $patientId;
	

//     public function __construct($conn)
//     {
//         $this->conn = $conn;
//     }

//     public function validateAppointment($date, $time, $status, $price, $doctorId, $clinicId, $patientId)
//     {
//         $errors = array();

//         // Validation for required fields
//         if (empty($date)) {
//             $errors[] = "Date is required";
//         }

//         if (empty($time)) {
//             $errors[] = "Time is required";
//         }

//         if (empty($status)) {
//             $errors[] = "Status is required";
//         }
//         if (empty($price)) {
//             $errors[] = "Price is required";
//         }
//         if (empty($doctorId)) {
//             $errors[] = "Doctor ID is required";
//         }
//         if (empty($clinicId)) {
//             $errors[] = "Clinic ID is required";
//         }
//         // if (empty($patientId)) {
//         //     $errors[] = "Patient ID is required";
//         // }

//         // Date validation
//         $currentDate = date("Y-m-d");
//         $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

//         if ($date < $currentDate || $date > $maxAllowedDate) {
//             $errors[] = "Date must be between today and 1.5 months ahead.";
//         }

//         return $errors;
//     }
// 	public function getClinicID($id) {
//         // return $_SESSION["ID"];
// 		$sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, clinic.cname, clinic.uid,clinic.cid,
// 		clinic.cnumber,clinic.workhrs,clinic.cloc
// 		FROM clinic 
// 		JOIN user_acc ON user_acc.uid = clinic.uid where user_acc.uid=".$id;
// 		$result = mysqli_query($GLOBALS['conn'],$sql);
// 		if($row=mysqli_fetch_array($result)){
// 			parent::__construct($row["uid"]);
		
// 						$CID=$row["cid"];

// 		}
// 		return $CID;

//     }


// 	public function getClinicName() {
//         return $_SESSION["cname"];
//     }
	
// 	public function getClinicDrs($cid)
// 	{
// 		$sql = "select firstname , lastname , Did  from dr where Cid = '$cid' ";
// 		$res = mysqli_query($this->conn,$sql);
// 		$doctors = [];
// 		while($row=mysqli_fetch_array($res)){
//         $doctors [] = [
// 			'did' => $row['Did'],
// 			'firstname'=>$row['firstname'],
// 			'lastname'=>$row['lastname'],
// 		];} 
// 		return $doctors;
// 	}
	


//     public function addAppointment($date, $time, $status, $price, $doctorId, $clinicId, $patientId)
//     {
		
//         $sql = "INSERT INTO appointments (date, time, status, pid, did, cid, price) VALUES ('$date', '$time', '$status', NULL , '$doctorId', '$clinicId', '$price')";
//         $res = mysqli_query($this->conn, $sql);

//         if ($res) {
//             $this->date=$date;
//             $this->time=$time;
//             $this->status=$status;
//             $this->price=$price;
//             $this->doctorId=$doctorId;
//             $this->clinicId=$clinicId;
//             $this->patientId=$patientId;
            
//             return true;
//         } else {
//             return false;
//         }
//     }
//     public function updateAppointment($appointmentId,$a_date, $a_time, $a_status,$a_price,$a_did, $a_cid, $a_pid){
//         $sql = "UPDATE appointments SET date = '$a_date', time = '$a_time', status = '$a_status'  ,Did ='$a_did',Cid ='$a_cid',Pid ='$a_pid',price ='$a_price' WHERE Appid = $appointmentId";
//         $res = mysqli_query($this->conn, $sql);

//         if ($res) {
//             $this->date=$a_date;
//             $this->time=$a_time;
//             $this->status=$a_status;
//             $this->price=$a_price;
//             $this->doctorId=$a_did;
//             $this->clinicId=$a_cid;
//             $this->patientId=$a_pid;
//             return true;
//         } else {
//             return false;
//         }
//     }
//     public function deleteAppointment($appid){
//         $sql = "DELETE FROM appointments WHERE Appid = $appid";
//         $res = mysqli_query($this->conn, $sql);
//         if ($res) {
            
//             return true;
//         } else {
//             return false;
//         }
//     }
//     public function viewAppointments(){
//         $sql = "SELECT * FROM appointments";
//        $result = mysqli_query($this->conn,$sql);
       
//        if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             echo "<tr>";
//             echo "<td>" . $row['Appid'] . "</td>";

//             echo "<td>" . $row['date'] . "</td>";
//             echo "<td>" . $row['time'] . "</td>";
//             echo "<td>" . $row['status'] . "</td>";
//             echo "<td><a href='./editappointments.php?Appid=" . $row['Appid'] . "'>Edit</a> | <a href='./deleteappointments.php?Appid=" . $row['Appid'] . "'>Delete</a></td>";
// 			$sql2 = "Select cname from clinic WHERE Cid = '{$row['Cid']}'";
// 			$res2=mysqli_query($this->conn,$sql2);
// 			if ($res2->num_rows>0){
// 				$clincirow = $res2->fetch_assoc();
// 				echo "<td>" . $clincirow['cname'] . "</td>";
// 			}
           
        
        
//             echo "</tr>";
//         }
//     } else {
//         echo "No appointments found.";
//     }


//     }

// 	public function bookingOptions(){
// 		$sql = "select specialization from dr ";
// 		$res = mysqli_query($this->conn,$sql);
//         $spec=[];
// 		while ($row = $res->fetch_assoc())
// 		{
// $spec[]=[
// 	'specialization'=>[$row['specialization']]
// ]
// 		;}
// 	return $spec;
// 	}
  
// }
// class Usertype{
// public $utid;
// public $name;
// public $pages;

// function __construct($id)
// {
// 	if ($id !=""){
// 		$sql="select * from usertypes where utid=$id";
// 		$result=mysqli_query($GLOBALS['conn'],$sql);
// 		if ($row = mysqli_fetch_array($result))	{
// 			$this->name=$row["name"];
// 			$this->utid=$row["utid"];
// 			$sql="select pageid from usertype_pages where usertypeid=$this->utid";
// 			$result=mysqli_query($GLOBALS['conn'],$sql);
// 			$i=0;
// 			while($row1=mysqli_fetch_array($result)){
// 				$this->pages[$i]=new Pages($row1[0]);//3amlt array of pages we wsltha fil table el talet bel utid
// 				$i++;
// 			}
// 		}
// 	}	
// }

// static function getallusertypes() {
// 	$sql="select * from usertypes";
// 	$result = mysqli_query($GLOBALS['conn'],$sql);
// 	$i=0;
// $userarray=array();
// while($row4=mysqli_fetch_array($result)) {

// 	$userarray[$i++]=new Usertype($row4[0]);
// }	
// return $userarray;

// }


// }
// class Pages{
// 	public $pgid;
// 	public $name;
// 	public $linkaddress;
// 	public $icons;
// 	public $class;


// 	function __construct($id){
// 		if ($id !=""){	
// 			$sql="select * from pages where pgid=$id";
// 			$result2=mysqli_query($GLOBALS['conn'],$sql) ;
// 			if ($row2 = mysqli_fetch_array($result2)){
// 				$this->name=$row2["name"];
// 				$this->linkaddress=$row2["linkaddress"];
// 				$this->pgid=$row2["pgid"];
// 				$this->icons=$row2["icons"];
// 				$this->class=$row2["class"];



// 			}


// 		}




// 	}

// static function getallpages(){
// 	$sql="select * from pages";
// 	$PageDataSet = mysqli_query($GLOBALS['conn'],$sql);		
// 	$i=0;
// 	$Result=array();
// 	while ($row = mysqli_fetch_array($PageDataSet))	{
// 		$MyObj= new Pages($row["pgid"]);
// 		$Result[$i]=$MyObj;
// 		$i++;
// 	}
// 	return $Result;

// }

// }

?>