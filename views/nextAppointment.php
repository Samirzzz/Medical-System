<?php
$next_pid = isset($_GET['pid']) ? htmlspecialchars($_GET['pid']) : '';
$next_did = isset($_GET['did']) ? htmlspecialchars($_GET['did']) : '';
include_once "../includes/db.php";
include"../includes/appnavbar.php";
$errors = array();

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

    // Date validation
    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($a_date < $currentDate || $a_date > $maxAllowedDate  )  {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    if (count($errors) === 0) {
        // Process form data here

        $sql = "INSERT INTO appointments (date, time, status, pid, did, cid,price) VALUES ('$a_date', '$a_time', '$a_status', '$a_pid', '$a_did', '$a_cid','$a_price')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "Form submitted successfully!";
            // Add the following line to append pid and did to the URL
            header("location:./viewappointments.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    } else {
        // Display validation errors
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
    <title>Appointment Form</title>
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
    <input type="date" placeholder="Choose the date" id="d" name="date">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time">
    <br>
    <!-- <label for="dn">Status</label>
    <input type="text" placeholder="Enter doctor's name" id="dn" name="doctorname"> -->
    <br>
    <label for="di">doctor's id</label>
    <input type="text" placeholder="Enter doctor's id" id="di" name="doctorid" value="<?php echo $next_did ; ?>">
    <br>
    <label for="pi">patient's id</label>
    <input type="text" placeholder="Enter patient's id" id="pi" name="patientid" value="<?php echo $next_pid ; ?>">
     <br>
    <label for="cid">clinic's id</label>
    <input type="text" placeholder="Enter clinic's id" id="ci" name="clinicid">
    <br>
    <label for="s">Status</label>
    <input type="text" placeholder="Enter status" id="s" name="status">
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter the price" id="p" name="price">
    <br>
    <input type="submit" id="submit" name="submit" value="submit">
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