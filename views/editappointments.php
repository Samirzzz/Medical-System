<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl =new AppointmentController($conn);
$clinic_id = $appointmentcntrl->getClinicID($_SESSION["ID"]);
$clinic_name = $appointmentcntrl->getClinicName();
$errors = array();

if (isset($_GET['Appid'])) {
    $appointmentId = $_GET['Appid'];
}
$sql = "SELECT * FROM appointments WHERE Appid = $appointmentId";
$result = mysqli_query($conn, $sql);
$appointment = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $a_date = htmlspecialchars($_POST['date']);
    $a_time = htmlspecialchars($_POST['time']);
    $a_price = htmlspecialchars($_POST['price']);
    // $a_did =htmlspecialchars($_POST['doctorid']);
    // $a_cid =htmlspecialchars($_POST['clinicid']);
    // $a_pid =htmlspecialchars($_POST['patientid']);

    $errors = $appointmentcntrl->validateAppointmentUpdate($a_date, $a_time, $a_price);


    if (count($errors) === 0) 
    {
  if ($appointmentcntrl->updateAppointment($appointmentId,$a_date, $a_time, $a_price)) {
            echo "Form submitted successfully!";
            header("location:../views/viewappointments.php");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    // } else {
    //     // Display validation errors
    //     echo "Validation Errors:<br>";
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
    <link rel="stylesheet" href="../public/css/addevent.css">
    <title>Update Appointment</title>
    <style>
   
    </style>
</head>
<body>
   <form action="" method="post" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date" value="<?php echo Date($appointment['date']); ?>">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time" value="<?php echo $appointment['time']; ?>">
    <br>
    <!-- <label for="s">Status</label>
    <input type="text" placeholder="Enter status" id="s" name="status" value=""> -->
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter price" id="p" name="price" value="<?php echo $appointment['price']; ?>">
    <br>
    <!-- <label for="did">doctor id</label>
    <input type="text" placeholder="Enter doctor id" id="did" name="doctorid" value="">
    <br>
    < <label for="pid">patient id</label>
    <input type="text" placeholder="Enter patient id" id="pid" name="patientid" value=""> -->
    <br>
    <!-- <label for="cid">clinic id</label>
    <input type="text" placeholder="Enter clinic id " id="cid" name="clinicid" value="">
    <br> --> 
    <input type="hidden" name="appointment_id" value="<?php echo $appointmentId; ?>">
    <input type="submit" id="submit" name="submit"  >
    <span class = "error">
    <?php $appointmentcntrl->displayErrors($errors) ?>
</span>
   </form>
   <style>
    form{
        width:500px;
        height:500px;
    }
   </style>
   
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
        // clickViewButton();
        //     return true;
    }
</script>

</body>
</html>
