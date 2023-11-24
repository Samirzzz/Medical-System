<?php
// include_once("../includes/db.php");
include_once('../includes/navigation.php');
include_once ("./classes.php");
$appointment = new Appointments($conn);
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
$appointment->viewAppointments();
        ?>
            <?php
  include "../includes/appnavbar.php";
  ?>
    </table>


    <style>
        /* body {
            
            padding-left: 60px; Adjust this value based on your navigation bar height
            margin-left: 20px;
        } */

        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: 350px; /* Add some margin to separate the table from the navigation bar */
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