<?php
include_once('../includes/navigation.php');
include_once ('classes.php');
$errors = array();
$appointment = new Appointments($conn);
$clinic_id = $appointment->getClinicID($_SESSION["ID"]);
echo( "clinic id is ---------- ".$clinic_id);
// echo ("-----------------------aloooo" . $appointment->getClinicID($_SESSION["ID"]));
$doctors = $appointment->getClinicDrs($clinic_id);



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $a_date = htmlspecialchars($_POST['date']);
    $a_time = htmlspecialchars($_POST['time']);
    $a_status = htmlspecialchars($_POST['status']);
    $a_price = htmlspecialchars($_POST['price']);
    $a_did =htmlspecialchars($_POST['doctorid']);
    $a_cid = $appointment->getClinicID($_SESSION["ID"]);
    $a_pid =htmlspecialchars($_POST['patientid']);
//    echo ("----------------------------" . $a_cid);
    $errors = $appointment->validateAppointment($a_date, $a_time, $a_status,$a_price, $a_did, $a_cid, NULL);

    if (count($errors) === 0) {
      
        if ($appointment->addAppointment($a_date, $a_time, $a_status,$a_price, $a_did, $a_cid, $a_pid)) {
            echo "Form submitted successfully!";
            header("location:./nextAppointment.php?pid=$a_pid&did=$a_did");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    } else {
        echo "Validations :<br>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/addevent.css">
    <title>Appointment Form</title>
    <style>
   
    </style>
</head>
<body>
   <form action="" method="post" autocomplete="off" onsubmit="return validateForm();">
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
    <input type="text" placeholder="Enter clinic's id" id="ci" name="clinicid" value = "<?php echo $clinic_id ."           ". "( ".$appointment->getClinicName()." )"  ;?>">
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
  
    <input type="submit" id="submit" name="submit" value="submit + next appointment">
   </form>

   <?php 
   echo ("clinic id is ---------- ".$clinic_id);
    ?>

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
