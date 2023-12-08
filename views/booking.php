<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl =new AppointmentController($conn);
$spec =$appointmentcntrl->bookingOptions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="booking.php" method="get" id="specializationForm" onsubmit="submitForm(event)">

    <label for="sp">select a specialization</label>


    <select id="sp" name="specialization" onchange="updateFormAndSubmit(event)">
    <option value="">choose</option>
    <?php foreach ($spec as $specs) { ?>
        
        <option value="<?php echo $specs['specialization']; ?>">
            <?php echo $specs['specialization']; ?>
        </option>
    <?php } ?>
</select>


    <!-- <input type="submit" value = "search"onclick="updateFormAndSubmit(event)"> -->
    <div id='searching'>
<?php
$specUrl = null;

if (isset($_GET['specialization'])) {
    $specUrl = $_GET['specialization'];
    echo "<h3>" . "searching for : " . $specUrl . " " . "<h3>";
}

?>
    </div>
    </form>


    <div class = 'appointments'>
 <h1>Appointments</h1>
    <table >
        <tr>
            <th>Appointment Date</th>
            <th>Doctor's Name</th>
            <th>Doctor's specialization</th>
            <th>Time</th>
            <th>Price</th>
            <th>Clinic</th>
            <th>Actions</th>
           
            
        </tr>


        <?php
        $selectedSpecialization = isset($_GET['specialization']) ? $_GET['specialization'] : null;
        $appointmentcntrl->getSpecializationAppointments($selectedSpecialization);
        ?>
        
    </div>



    <script>
  
    function updateFormAndSubmit(event) {
        event.preventDefault(); 
        var selectedSpecialization = document.getElementById("sp").value;
        document.getElementById("specializationForm").action = "?specialization=" + selectedSpecialization;   
        document.getElementById("specializationForm").submit();
    }



      
    </script>

    <style>
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
       
        /* body {
            
            padding-left: 60px;
            margin-left: 20px;
        } */

        table {
            width: 70%;
            border-collapse: collapse;
            margin-left: 350px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .no-appointments-found {
    margin-left: 40%; 
    margin-top:30px;
    color: red; 
}
    
    </style>
</body>
</html>
