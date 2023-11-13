<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="patientinfocss.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script>




</script>

    <?php 
    include_once 'navigation.php';
  
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
    
        $sql = "SELECT
        patient.firstname,
        patient.lastname,
        patient.age,
        patient.gender,
        patient.address,
        patient.number,
        medications.diagnosis,
        medications.treatment
    FROM
        patient
    JOIN
        appointments ON patient.Pid = appointments.Pid
    JOIN
        medications ON appointments.Appid = medications.Appid
        
        WHERE patient.uid ='$uid'";

        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_array($result)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $age = $row['age'];
            $gender = $row['gender'];
            $address = $row['address'];
            $number = $row['number'];
            $diagnosis=$row['diagnosis'];
            $treatment=$row['treatment'];
        } else {
            echo "Patient not found.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
    <div class="row">
        <div class="col-md-3 border-right">
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content between align-items-center mb-3">
                    <h4 class="text-right">Patient Profile</h4>
                </div>
                <form action="" method="post">
                        <div class="row mt-2">
                        <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" name="firstname"  value="<?php echo $row['firstname']; ?>"> 
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Number</label>
                        <input type="text" class="form-control" name="number" value="<?php echo $row['number']; ?>">

                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" >

                    </div>
                    
                    <div class="col-md-12">
                        <label class="labels">Diagnoses</label>
                        <input type="text" class="form-control" name="diagnosis" value="<?php echo $row['diagnosis']; ?>" >

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" >

                    </div>
                    <div class="col-md-6">
                        <label class="labels">treatment</label>
                        <input type="text" class="form-control" name="treatment"  value="<?php echo $row['treatment']; ?>">

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" name="con" type="submit">Confirm</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12">
                    <label class="labels" style="font-size: larger;">Medical History</label>
                </div>
                <br>
                <textarea class="ttt" name="diagnosis"  rows="20" cols="40"><?php echo $row['diagnosis'];
                date_default_timezone_set("Africa/Cairo");
                 $date = date('Y-m-d');
                  echo $date;
                ?></textarea>
            </div>
        </div>
    </div>


                    </form>
                  
    
<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        

    if (isset($_POST["con"])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $diagnosis = $_POST['diagnosis'];
        $treatment = $_POST['treatment'];




        $sql = "UPDATE patient
        JOIN appointments ON patient.Pid = appointments.Pid
        JOIN medications ON appointments.Appid = medications.Appid
        SET patient.firstname='$firstname',
            patient.lastname='$lastname',
            patient.gender='$gender',
            patient.address='$address',
            patient.number='$number',
            medications.diagnosis='$diagnosis',
            medications.treatment='$treatment'
        WHERE patient.uid ='$uid'";

    } 

    $result = mysqli_query($conn, $sql);
    }
    // if ($result) {
    //     if (isset($_POST["updateEmail"])) {
    //         $_SESSION['email'] = $email;
    //         echo "Email updated";
    //     } elseif (isset($_POST["updatePassword"])) {
    //         $_SESSION['password'] = $pass;
    //         echo "Password updated";
    //     }
    //}
    //  else {
    //     echo "Invalid input";
    // }
}

?>
</body>

</html>
