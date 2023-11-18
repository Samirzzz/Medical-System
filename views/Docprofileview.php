<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/Docprofileview_style.css">
    <title>doctor details</title>
</head>
<body>
<?php 
    include_once '../includes/pnavigation.php'; 
    include_once "../includes/db.php";

    if (isset($_GET['Did'])) {
        $Did = $_GET['Did'];
        $sql = "SELECT
        dr.firstname,
        dr.lastname,
        dr.number
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
             $education= $doctorRow['educ']; 
           }
           echo'
           <div class="box">
<img src=".\images\default.jpg" alt="image" class="drimg">
<div class="info">
   <p>Education: '. $firstname .'</p>
    <h1>name </h1>
    <h1>specialization</h1>
    <h1>Number </h1> 
</div>
</div>
         '  
           
          

?>

<!-- <div class="box">
<img src=".\images\default.jpg" alt="image" class="drimg">
<div class="info">
    <h1>name </h1>
    <h1>specialization</h1>
    <h1>Number </h1>
</div>
</div> -->
</body>
</html>