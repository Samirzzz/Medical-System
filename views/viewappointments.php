<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';
$appointmentcntrl =new AppointmentController($conn);

?>
<html>
<head>
    <title>Appointments</title>
 
</head>
<body>
    <h1>Appointments</h1>
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
$appointmentcntrl->viewAppointments();
        ?>

    </table>


    <style>
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
        .crud-bar{
            width: 80%;
            
            margin-left: 350px;
        }
    </style>

</body>
</html>