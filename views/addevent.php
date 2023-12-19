<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl =new AppointmentController($conn);

$errors = array();
$clinic_id = $appointmentcntrl->getClinicID($_SESSION["ID"]);
echo( "clinic id is ---------- ".$clinic_id);
$doctors = $appointmentcntrl->getClinicDrs($clinic_id);




// $appointment = new Appointments($conn);


// echo ("-----------------------aloooo" . $appointment->getClinicID($_SESSION["ID"]));




if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $a_date = htmlspecialchars($_POST['date']);
    $a_time = htmlspecialchars($_POST['time']);
    $a_status = htmlspecialchars($_POST['status']);
    $a_price = htmlspecialchars($_POST['price']);
    $a_did =htmlspecialchars($_POST['doctorid']);
    $a_cid = $appointmentcntrl->getClinicID($_SESSION["ID"]);
    
//    echo ("----------------------------" . $a_cid);
    $errors = $appointmentcntrl->validateAppointment($a_date, $a_time, $a_status,$a_price, $a_did, $a_cid);

    if (count($errors) === 0) {
      
        if ($appointmentcntrl->addAppointment($a_date, $a_time, $a_status,$a_price, $a_did, $a_cid, $a_pid)) {
            echo "Form submitted successfully!";
            header("location: ./viewappointments.php");
            
            
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    // } else {
        
    //     echo "Validations :<br>";
    //     foreach ($errors as $error) {
    //         echo $error . "<br>";
    //     }
    // }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/addevent.css">
    <title>Appointment Form</title>
    <style>
   
    </style>
</head>
<body>

   <form action="" method="post" name="addeventform" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time">
    <br>
    <!-- <label for="dn">Status</label>
    <input type="text" placeholder="Enter doctor's name" id="dn" name="doctorname"> -->
    <br>

    <!-- <label for="pi">patient's id</label>
    <input type="text" placeholder="Enter patient's id" id="pi" name="patientid"> -->
    <br>
    <label for="di">doctor</label>
     <select id="di" name="doctorid">
        <?php foreach ($doctors as $doctor) { ?>
            <option value="<?php echo $doctor['did']; ?>">
                <?php echo $doctor['firstname'] . ' ' . $doctor['lastname']; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <br>
    <br>
    <label for="ci">clinic's id</label>
    <input type="text" placeholder="Enter clinic's id" id="ci" name="clinicid" value = "<?php echo $clinic_id ."           ". "( ".$appointmentcntrl->getClinicName()." )"  ;?>">
    <br>
    <label for="s">Status</label>
<select id="s" name="status">
    <option value="available">Available</option>
    <option value="reserved">reserved</option>
</select>
    <br>
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter the price" id="p" name="price">
    <br>
  
    <input type="submit" id="submit" name="submit" value="submit">
    <span class = "error">
    <?php $appointmentcntrl->displayErrors($errors) ?>
</span>
   </form>




<script>
    function validateForm() {
        var dateInput = document.getElementById("d");
        var currentDate = new Date();
        var maxAllowedDate = new Date();
        maxAllowedDate.setDate(maxAllowedDate.getDate() + 45); // 1.5 months ahead

        if (dateInput.value === "") {
            alert("Date is required");
            return false;
        }

        var selectedDate = new Date(dateInput.value);
        if (selectedDate < currentDate || selectedDate > maxAllowedDate) {
            alert("Date must be between today and 1.5 months ahead.");
            return false;
        }
    }
</script>
</body>
</html>
