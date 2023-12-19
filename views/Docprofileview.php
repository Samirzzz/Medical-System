<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/docprofilestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Oswald:wght@600&family=Poppins:wght@300;600&family=Righteous&family=Rubik:ital@1&display=swap');
</style>
    <title>doctor details</title>
</head>
<body>
<?php 
    include_once '../includes/pnavigation.php'; 
    include_once "../includes/db.php";
    $db = Database::getInstance();
	$conn = $db->getConnection();	

    if (isset($_GET['Did']))
     {
        $Did = $_GET['Did'];
        $sql = "SELECT
        dr.firstname,
        dr.lastname,
        dr.number,
        dr.specialization
        from dr
        WHERE dr.did ='$Did'";
    }

$doctorInfoResult = mysqli_query($conn, $sql);
           if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) 
           {
            $firstname = $doctorRow['firstname']; 
            $lastname = $doctorRow['lastname']; 
            $specialization= $doctorRow['specialization']; 
              $Number= $doctorRow['number']; 
            //  $education= $doctorRow['educ']; 
           }
           echo
           '  
              
           <div class="box">
          <img src="../public/images/default.jpg" alt="image" class="drimg">
           <h1 class="doctitle"> DR '  .$firstname .$lastname. '</h1>
           <p class="info ">this is the doctor number : '
           .$Number.'  and eductaion : </p>
          </div> 
         ' 
           
          

?>

<!-- <div class="box">
<img src="..\public\images\default.jpg" alt="image" class="imgbox">
<div class="info">
    <h1>name </h1>
    <h1>specialization</h1>
    <h1>Number </h1>
</div>
</div> -->
</body>
</html>