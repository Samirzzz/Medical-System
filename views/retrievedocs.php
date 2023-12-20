<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\AppointmentController.php';


$db = Database::getInstance();
$conn = $db->getConnection();
$appointmentcntrl =new AppointmentController();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <table>
    <tr>
            <th>Doctor ID</th>
            <th>Doctor's name</th>
            <th>Doctor's specialization</th>
            <th>Actions</th>
      
            
           
            
        </tr>
       <?php $appointmentcntrl->retreivedoc();?>
</table>
    
</body>
<style>
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
</style>
</html>