<?php
include_once("../includes/navigation.php");
include_once ("./Appointments.php");
$appointment1 = new Appointments($conn);
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
    $a_status = htmlspecialchars($_POST['status']);
    $a_price = htmlspecialchars($_POST['price']);
    $a_did =htmlspecialchars($_POST['doctorid']);
    $a_cid =htmlspecialchars($_POST['clinicid']);
    $a_pid =htmlspecialchars($_POST['patientid']);

    $errors = $appointment1->validateAppointment($a_date, $a_time, $a_status,$a_price,$a_did, $a_cid, $a_pid);


    if (count($errors) === 0) 
    {
  if ($appointment1->updateAppointment($appointmentId,$a_date, $a_time, $a_status,$a_price,$a_did, $a_cid, $a_pid)) {
            echo "Form submitted successfully!";
            header("location:../views/viewappointments.php");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        // Display validation errors
        echo "Validation Errors:<br>";
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
    <label for="s">Status</label>
    <input type="text" placeholder="Enter status" id="s" name="status" value="<?php echo $appointment['status']; ?>">
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter price" id="p" name="price" value="<?php echo $appointment['price']; ?>">
    <br>
    <label for="did">doctor id</label>
    <input type="text" placeholder="Enter doctor id" id="did" name="doctorid" value="<?php echo $appointment['Did']; ?>">
    <br>
    <label for="pid">patient id</label>
    <input type="text" placeholder="Enter patient id" id="pid" name="patientid" value="<?php echo $appointment['Pid']; ?>">
    <br>
    <label for="cid">clinic id</label>
    <input type="text" placeholder="Enter clinic id " id="cid" name="clinicid" value="<?php echo $appointment['Cid']; ?>">
    <br>
    <input type="hidden" name="appointment_id" value="<?php echo $appointmentId; ?>">
    <input type="submit" id="submit" name="submit"  >
   </form>
   <?php include"../includes/appnavbar.php";?>
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
