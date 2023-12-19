<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$db = Database::getInstance();
	$conn = $db->getConnection();	
$appointmentcntrl =new AppointmentController();

?>
<html>
<head>
    <title></title>
 
</head>
<body>
   <h1 id="h1h1">Showing appointmnts for: </h1>

    <table >
   
        <tr>
            <th>Appointment ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
            <th>Clinic</th>
           
        </tr>
     
      <?php 

if ($_SESSION["type"] == 'clinic') {
   $clinic_id = $appointmentcntrl->getClinicID($_SESSION["ID"]);
   $appointmentcntrl->viewAppointments($clinic_id);

} else {
   $docId =  $appointmentcntrl->getDocID($_SESSION["ID"]);
   $appointmentcntrl->getDoctorAppointments($docId);
}
?>

    </table>
    <input type="hidden" ID='AppView' value = <?php echo $_SESSION['AppView'] ?> >
    


    <style>
        /* body {
            
            padding-left: 60px;
            margin-left: 20px;
        } */

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 30px;
            margin-left: 350px;
        }
        h1{
            margin-left: 350px;  
            margin-top: 36px;
             
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
        tr:nth-child(even) {
    background-color: #EDE5E5;
}
        .crud-bar{
            width: 80%;
            
            margin-left: 350px;
        }
    </style>

</body>
<script>
    function updateAppViewHeading() {
        var appViewValue = '<?php echo $_SESSION['AppView']; ?>';
        document.getElementById('h1h1').innerText = "Showing appointments for: " + appViewValue;
    }

    window.onload = function() {
        updateAppViewHeading();
    };
</script>

</html>