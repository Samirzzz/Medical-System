<?php
include_once("../includes/db.php");
include_once'../includes/navigation.php';
$sql = "SELECT * FROM appointments";
$result = mysqli_query($conn,$sql);

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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Appid'] . "</td>";

                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='./editappointments.php?Appid=" . $row['Appid'] . "'>Edit</a> | <a href='./deleteappointments.php?Appid=" . $row['Appid'] . "'>Delete</a></td>";
                echo "<td>" . $row['Cid'] . "</td>";
            
                
                echo "</tr>";
            }
        } else {
            echo "No appointments found.";
        }
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