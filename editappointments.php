<?php
include_once "includes/db.php";
include "includes/appnavbar.php";
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


    // Validation for required fields
    if (empty($a_date)) {
        $errors[] = "Date is required";
    }

    if (empty($a_time)) {
        $errors[] = "Time is required";
    }

    if (empty($a_status)) {
        $errors[] = "Status is required";
    } 
    if (empty($a_price)) {
        $errors[] = "price is required";
    } 
    if (empty($a_did)) {
        $errors[] = "doctor id is required";
    }
    if (empty($a_cid)) {
        $errors[] = "clinic id is required";
    }  
    if (empty($a_pid)) {
        $errors[] = "patient id is required";
    } 

    
    
    
    else {
        // Date validation
        $currentDate = date("Y-m-d");
        $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

        if ($a_date < $currentDate || $a_date > $maxAllowedDate) {
            $errors[] = "Date must be between today and 1.5 months ahead.";
        }
    }

    if (count($errors) === 0) {
        // Update the appointment using an SQL UPDATE statement with a WHERE clause
        $sql = "UPDATE appointments SET date = '$a_date', time = '$a_time', status = '$a_status' , price ='$a_price',Did ='$a_did',Cid ='$a_cid',Pid ='$a_pid' WHERE Appid = $appointmentId";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "Form submitted successfully!";
            header("location:viewappointments.php");
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
    <title>Update Appointment</title>
    <style>
        /* Style for the overall form container */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style for form labels */
        label {
            display: block;
            margin-bottom: 5px;
        }

        /* Style for input fields */
        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="submit"] {
            border-color: #333;
            outline: none;
        }

        /* Style for form submit button */
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
   <form action="" method="post" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date" value="<?php echo $appointment['date']; ?>">
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
    <input type="submit" id="submit" name="submit">
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
